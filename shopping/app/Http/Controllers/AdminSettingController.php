<?php

namespace App\Http\Controllers;

use App\Http\Requests\SettingAddRequest;
use App\Models\Setting;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminSettingController extends Controller
{
    use DeleteModelTrait;
    private $setting;
    public function __construct(Setting $setting)
    {
        $this->setting = $setting;
    }
    public function index()
    {
        $settings = $this->setting->latest()->paginate(5);
        return view('admin.setting.index')->with('settings', $settings);
    }

    public function create()
    {
        return view('admin.setting.add');
    }

    public function store(SettingAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $this->setting->create([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value,
                'type' => $request->type
            ]);
            DB::commit();
            return redirect()->route("setting.index");
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . ", Line: " . $exception->getLine());
        }
    }

    public function edit($id)
    {
        $setting = $this->setting->find($id);
        return view('admin.setting.edit')->with('setting', $setting);
    }

    public function update(Request $request, $id)
    {
        $this->setting->find($id)
            ->update([
                'config_key' => $request->config_key,
                'config_value' => $request->config_value
            ]);
        return redirect()->route('setting.index');
    }

    public function delete($id)
    {
        return $this->deleteModelTrait($id, $this->setting);
    }
}
