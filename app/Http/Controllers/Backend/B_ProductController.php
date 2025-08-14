<?php

namespace App\Http\Controllers\Backend;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\ProductImages;
use Yajra\DataTables\DataTables;
use App\Models\ProductCategories;
use App\Models\TransactionDetail;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class B_ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $products = Products::with('category')->get();
            // return $products;
            if ($request->ajax()) {
                return DataTables::of($products)
                    ->addIndexColumn()
                    ->addColumn('category', function ($item) {
                        return $item->category->name;
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each event
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="' . URL::to('back/product/detail/' . $item->slug) . '"><i class="icon-base bx bx-show me-1"></i> Detil</a>
                      <a class="dropdown-item" target="_blank" href="' . URL::to('back/product/edit/' . Crypt::encrypt($item->id) . '') . '"><i class="icon-base bx bx-edit-alt me-1"></i> Ubah</a>
                      <a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Hapus</a>
                    </div>
                  </div>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'category'])
                    ->make(true);
            }

            return view('back.product.index', compact('products'));
        } catch (\Exception $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    /**
     * Show the form for creating a new product.
     *
     * @return \Illuminate\View\View
     */
    public function create()
    {
        // Retrieve all product categories, ordered alphabetically by name
        $categories = ProductCategories::orderBy('name', 'asc')->get();

        // Return the view for creating a new product, passing the categories
        return view('back.product.create', compact('categories'));
    }

    public function store(Request $request)
    {

        $id = null;
        if (!empty($request->id)) {
            $id = Crypt::decrypt($request->id);
        }

        $price = str_replace('.', '', $request->price);
        $stock = str_replace('.', '', $request->quota);
        $weight = str_replace('.', '', $request->weight);

        $store = Products::updateOrCreate(
            ['id' => $id],
            [
                'name' => $request->name,
                'slug' => Str::slug($request->name, '-'),
                'description' => $request->description,
                'category_id' => $request->category_id,
                'price' => $price,
                'stock' => $stock,
                'weight' => $weight ?? 1000,
            ]
        );

        return redirect()->intended(URL::to('back/product'))->with('success', 'Data Berhasil Disimpan');
    }

    public function storeImages(Request $request)
    {
        try {
            $request->validate([
                'files.*' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);

            $product_id = Crypt::decrypt($request->product_id);

            foreach ($request->file('files') as $file) {
                $filename = $product_id . '_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images/product', $filename, 'public');

                ProductImages::create([
                    'id' => Str::orderedUuid(),
                    'product_id' => $product_id,
                    'filename' => $path,
                ]);
            }

            // check cover
            $productImages = ProductImages::where('product_id', $product_id)->where('is_cover', 1)->exists();

            if (!$productImages) {
                $update = ProductImages::where('product_id', $product_id)->first();
                $update->is_cover = 1;
                $update->save();
            }

            return response()->json([
                'success' => true,
            ]);
        } catch (\Exception $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }

    public function show($slug)
    {
        $product = Products::with(['category'])->where('slug', $slug)->first();
        
        $sold = TransactionDetail::with('transaction.user')->where('reference_id', $product->id)->get();
        
        return view('back.product.show', compact('product', 'sold'));
    }

    public function imagesShow($id, Request $request)
    {
        try {
            $id = Crypt::decrypt($id);
            $producImages = ProductImages::where('product_id', $id)->get();

            if ($request->ajax()) {
                return DataTables::of($producImages)
                    ->addIndexColumn()
                    ->addColumn('image', function ($item) {
                        $pathImage = asset('storage/' . $item->filename);
                        $result = '<div style=" width: 200px; height: 200px; overflow: hidden; border-radius: 10px; box-shadow: 0 4px 6px rgba(0,0,0,0.1);">
                            <img src="'.$pathImage.'" alt="Contoh Thumbnail" style="width: 100%; height: 100%; object-fit: cover; display: block;">
                        </div>';

                        return $result;
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each event
                        $btn = '<a class="dropdown-item destroy" data-id="' . Crypt::encrypt($item->id) . '" href="javascript:void(0);" ><i class="icon-base bx bx-trash me-1"></i> Hapus</a>';
                        return $btn;
                    })
                    ->rawColumns(['action', 'image'])
                    ->make(true);
            }
        } catch (\Throwable $th) {
            return response()->json([
                'status' => 'error',
                'message' => $th->getMessage()
            ], 500);
        }
    }
    public function imagesShow2($id)
    {
        $id = Crypt::decrypt($id);

        $images = ProductImages::where('product_id', $id)->get();

        return view('back.product.images', compact('images'));
    }

    public function edit($id)
    {
        $id = Crypt::decrypt($id);
        $categories = ProductCategories::all();
        $product = Products::with(['category'])->where('id', $id)->first();
        return view('back.product.edit', compact('product', 'categories'));
    }
}
