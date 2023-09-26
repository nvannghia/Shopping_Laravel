<?php

namespace App\Http\Controllers;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use App\Traits\DeleteModelTrait;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AdminRoleController extends Controller
{
    use DeleteModelTrait;
    private $role;
    private $permission;
    private $user;
    public function __construct(Role $role, Permission $permission, User $user)
    {
        $this->role = $role;
        $this->permission = $permission;
        $this->user = $user;
    }
    public function index()
    {
        // dd($this->user->find(2)->roles[0]->permissions);
        $roles = $this->role->paginate(5);
        return view('admin.role.index')->with('roles', $roles);
    }

    public function create()
    {
        $permissionParents = $this->permission->Where('parent_id', 0)->get();
        return view('admin.role.add', compact('permissionParents'));
    }

    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $roleInstance = $this->role->create([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            // insert to intermediate table `permission_role`
            $roleInstance->permissions()->attach($request->permission_id);
            DB::commit();
            return redirect()->route('role.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Message: ' . $ex->getMessage() . ', Line: ' . $ex->getLine());
        }
    }

    public function edit($id)
    {
        $role = $this->role->find($id);
        $permissionsOfRole = $role->permissions; // permissions is method in model defined
        $permissionParents = $this->permission->Where('parent_id', 0)->get();
        return view('admin.role.edit', compact('role', 'permissionsOfRole', 'permissionParents'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $roleInstance = $this->role->find($id);
            $roleInstance->update([
                'name' => $request->name,
                'display_name' => $request->display_name
            ]);
            // update intermediate table `permission_role`
            $roleInstance->permissions()->sync($request->permission_id);
            DB::commit();
            return redirect()->route('role.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Message: ' . $ex->getMessage() . ', Line: ' . $ex->getLine());
        }
    }

    public function delete($id)
    {
        try {
            DB::beginTransaction();
            $this->role->find($id)->permissions()->detach(); //detach role of user wanna delete
            $response = $this->deleteModelTrait($id, $this->role);
            DB::commit();
            return $response;
        } catch (Exception $exception) {
            DB::rollBack();
            Log::error("Message: " . $exception->getMessage() . ", Line: " . $exception->getLine());
        }
    }
}
