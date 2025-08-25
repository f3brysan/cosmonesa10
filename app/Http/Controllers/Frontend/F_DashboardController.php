<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\DashboardGallery;
use App\Models\DashboardProfile;
use App\Models\DashboardPivotTab;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Str;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class F_DashboardController extends Controller
{

    private function profileQuery()
    {
        // // Get the authenticated user
        // $userAuth = auth()->user();

        // // Redirect to login if user is not authenticated
        // if (!$userAuth) {
        //     return redirect()->route('login');
        // }
        // return DashboardProfile::all()->toArray();
        return DashboardProfile::query()
            ->join('profile_gallery_section as dashboard_pivot', 'dashboard_profile.id', '=', 'dashboard_pivot.profile_id')
            ->join('dashboard_gallery as gallery', 'dashboard_pivot.gallery_id', '=', 'gallery.id')
            ->select([
                'dashboard_profile.id as profile_id',
                'dashboard_profile.name as profile_name',
                'dashboard_profile.is_selected',
                'gallery.id as img_id',
                'gallery.name as img_name',
                'gallery.path as img_path',
                'gallery.description as img_desc',
            ]);
    }

    private function userProfileTranspose(array $data)
    {
        //jane expect ku koyok ngene, tapi mari tak pikir2 maneh, kok koyok e malah enak an hasil pivotan e sampean:
        $flatten_profile = [];

        foreach ($data as $entry) {
            $profId = $entry['profile_id'];

            if (!isset($flatten_profile[$profId])) {
                $flatten_profile[$profId] = [
                    'profile_name' => $profId,
                    'images' => []
                ];
            }

            $flatten_profile[$profId]['images'][] = [
                'img_name' => $entry['img_name'],
                'img_path' => $entry['img_path'],
                'img_desc' => $entry['img_desc']
            ];
        }

        return array_values($flatten_profile);
    }
    private function adminProfileTranspose(array $data)
    {
        $flatten_profile = [];
        foreach ($data as $entry) {
            $profId = $entry['profile_id'];
            $profile = $entry['profile_name'];
            $sel_status = $entry['is_selected'];
            foreach ($entry as $key => $value) {
                if ($key === 'profile_name' || $key === 'profile_id' || $key === 'is_selected') {
                    $flatten_profile[$profId][$key] = $value;
                } else {
                    $flatten_profile[$profId][$key][] = $value;
                }
            }
        }
        return array_values($flatten_profile);
    }

    public function profileDetail($profileId)
    {
        $imgList = $this->profileQuery()
            ->where('dashboard_pivot.profile_id', $profileId)
            ->get()
            ->toArray();
        return $imgList;
    }

    public function admin_profile()
    {

        return view('front.page.dashboard.profile_admin');

        // $images = $this->profileList($profile_list);
        // return view('front.page.dashboard.profile_admin', compact(['images']));
    }
    public function storeImages(Request $request)
    {
        try {
            $request->validate([
                'files.*' => 'required|image|mimes:jpg,jpeg,png|max:2048'
            ]);



            foreach ($request->file('files') as $file) {

                $filename = 'Banner_' . time() . '_' . Str::random(10) . '.' . $file->getClientOriginalExtension();
                $path = $file->storeAs('images/dash_banner', $filename, 'public');
                // $files_path[] = $path;

                DashboardGallery::create([
                    'path' => $path,
                ]);
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
    public function add_profile(Request $request)
    {
        $data = $request->all();
        dd($data);
    }
    public function destroy_profile($profileId)
    {
        // $profile = DashboardProfile::find($profileId);
        DB::beginTransaction();
        try {
            DB::delete('DELETE FROM profile_gallery_section WHERE profile_id = ?', [$profileId]);
            DB::delete('DELETE FROM dashboard_profile WHERE id = ?', [$profileId]);
            DB::commit();
        } catch (\Exception $e) {
            DB::rollBack();
            throw $e;
        }
    }
    private function editProfName($profId = null, $profName = null)
    {
        return DashboardProfile::upsert([
            $values = ['id' => $profId, 'name' => $profName],
            $update = ['name']
        ]);
    }

    /**
     * Compare two arrays and return the differences between them.
     *
     * @param array $currentList The original to compare against
     * @param array $newList The new array to compare with
     * @return array Associative array containing:
     *               'add' => array of elements will be added to current list
     *               'remove' => array of elements will be removed to current list
     */
    private function listDiff(array $currentList, array $newList)
    {
        $addition = array_diff($newList, $currentList);
        $substract = array_diff($currentList, $newList);
        return [
            'add' => array_values($addition),
            'remove' => array_values($substract)
        ];
    }

    public function editImgList($profId = null, $imgList = null)
    {
        $selectedProfile = DashboardPivotTab::query()->where('profile_id', $profId);
        $selectedImg = $selectedProfile->select('gallery_id')->get()->toArray();
        $currentImgList = collect($selectedImg)->flatten()->toArray();
        $diff = $this->listDiff($currentImgList, $imgList);
        $imgGallery = [];
        foreach ($imgList as $imgId) {
            $imgGallery[] = ['profile_id' => $profId, 'gallery_id' => $imgId];
        }
        // return $diff;
        if ($diff['add'] != null and $diff['remove'] != null) {
            try {
                DB::beginTransaction();
                if ($diff['add'] != null) {
                    $add_stack = [];
                    foreach ($diff['add'] as $adata) {
                        $add_stack[] = ['profile_id' => $profId, 'gallery_id' => $adata];
                    }
                    DashboardPivotTab::insert($add_stack);
                } else {
                };
                if ($diff['remove'] != null) {
                    $selectedProfile->whereIn('gallery_id', $diff['remove'])->delete();
                } else {
                };
            } catch (\Throwable $th) {
                return response()->json(['error' => $th->getMessage()], 500);
            }
            return response()->json([
                'status' => true,
                'message' => 'Profil berhasil disunting'
            ]);
        }

        // return DashboardPivotTab::upsert([
        //     $values = $imgGallery,
        //     $update = ['gallery_id']
        // ]);
    }



    public function admIndex()
    {
        $profile_list = $this->profileQuery()->get()->toArray();
        $data = $this->adminProfileTranspose($profile_list);
        // dd($data);
        if (request()->ajax()) {
            return DataTables::of($data)
                ->addIndexColumn()
                ->addColumn('img', function ($rows) {
                    $carouselId = 'carousel-' . uniqid();
                    $count = count($rows['img_path']);
                    if ($count === 0) {
                        return '';
                    }
                    $indicators = '';
                    $items = '';
                    for ($i = 0; $i < $count; $i++) {
                        $active = $i === 0 ? 'active' : '';
                        $imgName = htmlspecialchars($rows['img_name'][$i]);
                        $imgDesc = htmlspecialchars($rows['img_desc'][$i]);
                        $imgPath = asset('frontend/images/gallery/' . $rows['img_path'][$i]);
                        $queueNum = ($i + 1) . ' / ' . $count;
                        $indicators .= '<button type="button" data-bs-target="#' . $carouselId . '" data-bs-slide-to="' . $i . '" class="' . $active . '" aria-current="' . ($active ? 'true' : 'false') . '" aria-label="Slide ' . ($i + 1) . '"></button>';
                        $items .= '<div class="carousel-item ' . $active . '">';
                        $items .= '<img src="' . $imgPath . '" class="d-block w-500 img-fluid" alt="' . $imgName . '" style="max-height: 400px;">';
                        $items .= '<div class="carousel-caption d-none d-md-block">';
                        $items .= '<h5>' . $imgName . '</h5>';
                        $items .= '<p>' . $imgDesc . '</p>';
                        $items .= '<span class="badge bg-secondary">' . $queueNum . '</span>';
                        $items .= '</div></div>';
                    }
                    return '
                        <div id="' . $carouselId . '" class="carousel slide" data-bs-ride="false" style="max-width: 220px;">
                            <div class="carousel-indicators">' . $indicators . '</div>
                            <div class="carousel-inner">' . $items . '</div>
                            <button class="carousel-control-prev" type="button" data-bs-target="#' . $carouselId . '" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>
                            <button class="carousel-control-next" type="button" data-bs-target="#' . $carouselId . '" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>
                        </div>
                    ';
                })
                ->addColumn('action', function ($data) {
                    $edit = '<button class="btn btn-sm btn-primary" onclick="editProfile(' . $data['profile_id'] . ')">Edit</button>';
                    $delete = '<button class="btn btn-sm btn-danger destroy" data-id="' . $data['profile_id'] . ' ">Delete</button>';
                    return $edit . ' ' . $delete;
                })

                ->rawColumns(['img', 'action'])
                ->make(true);
        }
    }

    public function index()
    {
        $selected_profile = $this->profileQuery()
            ->where('dashboard_profile.is_selected', 1)
            ->get()
            ->toArray();
        $images = $this->userProfileTranspose($selected_profile)[0]['images'];
        return view('front.page.dashboard.index', compact(['images']));
    }

    public function getProfiles()
    {
        $profile_list = DashboardProfile::all()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'daftar profile berhasil dimuat',
            'data' => $profile_list
        ]);
    }
    public function getImages()
    {
        $imgList = DashboardGallery::all()->toArray();
        return response()->json([
            'status' => true,
            'message' => 'daftar gambar berhasil dimuat',
            'data' => $imgList
        ]);
    }
    public function selectProfile(Request $request)
    {
        $profileId = $request['profile_id'];
        try {
            $toBeSelected = DashboardProfile::find($profileId)->toArray();
            DB::beginTransaction();
            DashboardProfile::query()->update(['is_selected' => 0]);
            DashboardProfile::query()->where('id', $profileId)->update(['is_selected' => 1]);
            DB::commit();
            return response()->json([
                'status' => true,
                'message' => "Profile '$toBeSelected' berhasil dipilih"
            ]);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
    public function composeProfile(Request $request)
    {
        $profileId = $request['profile_id'];
        $profileName = $request['profile_name'];
        $gallery = $request['img_list'];
        try {
            DB::beginTransaction();
            if ($profileName != null) {
                $this->editProfName($profileId, $profileName);
            } else {
            }
            if ($gallery != null) {
                $this->editImgList($profileId, $gallery);
            } else {
            }
            DB::commit();
            if ($profileId === null) {
                return response()->json([
                    'status' => true,
                    'message' => 'profile berhasil dibuat'
                ], 201);
            }
            return response()->json([
                'status' => true,
                'message' => 'profile behasil disunting'
            ], 202);
        } catch (\Throwable $th) {
            DB::rollBack();
            return response()->json([
                'status' => false,
                'message' => $th->getMessage()
            ]);
        }
    }
    public function deleteProfile(Request $request)
    {
        $profileId = $request['profile_id'];
        $profileToDelete = DashboardProfile::find($profileId);
        if ($profileToDelete['is_selected'] === 0) {
            $profileToDelete->delete();
            return response()->json([
                'status' => false,
                'message' => 'profile berhasil dihapus'
            ], 204);
        }
        return response()->json([
            'status' => false,
            'message' => 'profile sedang digunakan'
        ], 400);
    }
    public function renameImage(Request $request) {}
    public function deleteImage(Request $request) {}
}
