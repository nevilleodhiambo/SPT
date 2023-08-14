<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

class RoleController extends Controller
{
    public function index()
    {
        $roles = Role::all();
        return view('roles.index', compact('roles'));
    }
    public function create()
    {
        $permissions = Permission::all();
        return view('roles/create', compact('permissions'));
        
    }
    public function store(Request $request)
    {
        $role = Role::create(['name' => $request->name]);
        $role->syncPermissions($request->permission_ids);

        return redirect(route('roles.index'));
    }

    public function edit($id){
        $role = Role::where('id',$id)->first();
        $permissions = Permission::all();
        return view('roles/edit', compact('permissions','role'));

    }

    public function update(Request $request,$id)
    {
        $role = Role::where('id',$id)->first();
        $role->name = $request->name;
        $role->save();
        $role->syncPermissions($request->permission_ids);
        
        return redirect(route('roles.index'));

    }
    public function destroy($id){
        $role = Role::where('id', $id)->first();
        $role->delete();
        return redirect()->route('roles.index');
    }
}
