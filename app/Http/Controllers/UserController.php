<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class UserController extends Controller
{
    public function index()
    {
        $users = User::all();
        // return $users;
        return view('users.index', compact('users'));
    }

    public function create()
    {
        $roles = Role::all();
        return view('users/create',compact('roles'));
    }

    public function store(Request $gilly)
    {
        $user = User::create(
            [
                'name' => $gilly->name,
                'email' => $gilly->email,
                'password' => Hash::make($gilly->password),
            ]
        );
        $user->assignRole($gilly->role);

        return redirect(route('users.index'));            
            
    }

    public function edit($id)
    {
        $roles = Role::all();
        $user = User::where('id',$id)->first();
        return view('users/edit',compact('roles','user'));
    }

    public function update(Request $request, $id)
    {
        $user = User::where('id',$id)->first();
        $user->name = $request->name;
        $user->save();
        
        $user->syncRoles($request->role);

        
        return redirect(route('users.index'));   

    }
    public function destroy($id){
        $user = User::where('id', $id)->first();
        $user->delete();
        return redirect()->back();
    }


}
