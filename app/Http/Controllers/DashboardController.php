<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Auth;
use App\Models\User; 


use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {

        $user = Auth::user(); // Get the currently logged in user

        // Check the user's role and redirect accordingly
        switch ($user->role->name) {
            case 'Admin1':
                return redirect()->route('dashboard');
            // case 'user':
            //     return redirect()->route('user.dashboard');
            // Add more cases for other roles if needed
            default:
                // Handle cases where the role doesn't match any known roles
                return redirect()->route('user.dashboard');
        }
    }
}
