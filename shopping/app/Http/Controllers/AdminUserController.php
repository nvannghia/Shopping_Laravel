<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserAddRequest;
use App\Models\Role;
use App\Models\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;

class AdminUserController extends Controller
{
    private $user;
    private $role;

    public function __construct(
        User $user,
        Role $role
    ) {
        $this->user = $user;
        $this->role = $role;
    }

    public function index()
    {
        $users = $this->user->paginate(10);
        return view('admin.user.index', compact('users'));
    }

    public function create()
    {
        return view('admin.user.add')->with('roles', $this->role->all());
    }

    public function store(UserAddRequest $request)
    {
        try {
            DB::beginTransaction();
            $userInsert = $this->user->create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            //insert data into `user_role` table
            $userInsert->roles()->attach($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Message: ' . $ex->getMessage() . ', Line: ' . $ex->getLine());
        }
    }

    public function edit($id)
    {
        $roles = $this->role->all();
        $user = $this->user->find($id);
        $rolesOfUser = $user->roles;
        return view('admin.user.edit', compact('roles', 'user', 'rolesOfUser'));
    }

    public function update(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $userInstance = $this->user->find($id);
            $userInstance->update([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password)
            ]);
            $userInstance->roles()->sync($request->role_id);
            DB::commit();
            return redirect()->route('user.index');
        } catch (Exception $ex) {
            DB::rollBack();
            Log::error('Message: ' . $ex->getMessage() . ', Line: ' . $ex->getLine());
        }
    }
}
