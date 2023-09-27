<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class PermissionController extends Controller
{
    public function create()
    {
        return view('admin.permission.add');
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $permission = Permission::create([
                'name' => $request->module_parent,
                'display_name' => $request->module_parent,
                'parent_id' => 0
            ]);

            // create permission action(list,add,edit,delete) for table
            foreach ($request->module_children as $childAction) {
                Permission::create([
                    'name' => $childAction,
                    'display_name' => $childAction . '-' . $request->module_parent,
                    'parent_id' => $permission->id,
                    'key_code' => $request->module_parent . '-' . $childAction
                ]);
            }

            DB::commit();
            return redirect()->route('permission.create')->with('successMsg', 'Đã thêm permission thành công!');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error("Message: " . $ex->getMessage() . ", Line: " . $ex->getLine());
        }
    }
}
