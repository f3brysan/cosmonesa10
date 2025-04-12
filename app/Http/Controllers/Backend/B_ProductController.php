<?php

namespace App\Http\Controllers\Backend;

use App\Models\Products;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Yajra\DataTables\DataTables;
use App\Models\ProductCategories;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Crypt;

class B_ProductController extends Controller
{
    public function index(Request $request)
    {
        try {
            $products = Products::with( 'categories')->get();
            // return $products;   
            if ($request->ajax()) {
                return DataTables::of($products)
                    ->addIndexColumn()
                    ->addColumn('category', function ($item) {
                        return $item->categories->name;
                    })
                    ->addColumn('action', function ($item) {
                        // Generate action buttons for each event
                        $btn = '<button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown"><i class="icon-base bx bx-dots-vertical-rounded"></i></button>
                    <div class="dropdown-menu">
                      <a class="dropdown-item" href="' . URL::to('back/event/detail/' . $item->slug) . '"><i class="icon-base bx bx-show me-1"></i> Detil</a>
                      <a class="dropdown-item" target="_blank" href="' . URL::to('back/event/edit/' . Crypt::encrypt($item->id) . '') . '"><i class="icon-base bx bx-edit-alt me-1"></i> Ubah</a>
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

        $id = NULL;
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
}
