<?php

namespace App\Http\Controllers;

use App\Http\Requests\SliderAddRequest;
use App\Models\Slider;
use App\Traits\DeleteModelTrait;
use App\Traits\StorageImageTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;

class AdminSliderController extends Controller
{
    use StorageImageTrait, DeleteModelTrait;
    private $slider;
    public function __construct(Slider $slider)
    {
        $this->slider = $slider;
    }
    public function index()
    {
        // cause doesn't use eloquant method, so need to add query 'deleted=null' (eloquant will auto add this query)
        $sliders = Slider::where('deleted_at', null)->orderBy('created_at', 'desc')->paginate(3);
        return view('admin.slider.index')->with('sliders', $sliders);
    }

    public function create()
    {
        return view('admin.slider.add');
    }

    public function store(SliderAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $dataUploadImage = $this->storageTraitUpload($request, "image", "slider");
            if (!empty($dataUploadImage)) {
                Slider::create([
                    'name' => $request->name,
                    'description' => $request->description,
                    'image_name' => $dataUploadImage['file_name'],
                    'image_path' => $dataUploadImage['file_path']
                ]);
            }
            DB::commit();
            return redirect()->route('slider.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error("Message: " . $ex->getMessage() . ", Line: " . $ex->getLine());
        }
    }

    public function edit($id)
    {
        $slider = DB::table('sliders')->Where('id', $id)->first();
        return view('admin.slider.edit')->with('slider', $slider);
    }

    public function update(Request $request, $id)
    {
        $dataUploadImage = $this->storageTraitUpload($request, "image", "slider");
        if (!empty($dataUploadImage)) {
            DB::table('sliders')
                ->Where('id', $id)
                ->update([
                    'name' => $request->name,
                    'description' => $request->description,
                    'image_name' => $dataUploadImage['file_name'],
                    'image_path' => $dataUploadImage['file_path']
                ]);
        }
        return redirect()->route('slider.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->slider);
    }
}
