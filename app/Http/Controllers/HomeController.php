<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use App\Models\User; 
use Spatie\Permission\Models\Role;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    //  public function index(){
    //     $user = Auth::user(); 
    //     // Get the currently logged in user
    // //   dd($user->gilly);
    //     return view('home');
    //  }
    // public function index()
    // {
    //     $user = Auth::user(); // Get the currently logged in user
    //     dd($user->role->pluck('name'));
    //     // Check the user's role and redirect accordingly
    //     switch ($use+r->role->name) {
    //         case 'Admin1':
    //             return redirect()->route('admin.dashboard');
    //         // case 'user':
    //         //     return redirect()->route('user.dashboard');
    //         // Add more cases for other roles if needed
    //         default:
    //             // Handle cases where the role doesn't match any known roles
    //             return redirect()->route('user.dashboard');
    //     }
    // }

   public function index(){
    $user = Auth::user();

    // dd($user->hasPermissionTo('create'));
    // Check if the user has a role
    // if ($user->hasPermissionTo('create') && ($user->hasPermissionTo('edit'))) {
        return redirect()->route('dashboard.index');
        // return view('admin.index');
    }
      // elseif ($user->hasRole('user')) {
    //     return redirect()->route('user.dashboard');
    // } 
    // else {
        // Handle cases where the user has no recognized role
        // return redirect()->route('user.dashboard');
        // return redirect()->route('dashboard');
        
    // }
// }
}
