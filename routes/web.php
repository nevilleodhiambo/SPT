<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProjectController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\StakeHolderController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {

    // $permission = Permission::all();
    // $role = Role::where('name', 'doctor')->get();
    // $role = Role::create(['name' => 'admin']);
    // $role->givePermissionTo(['create', 'view']);
    // return 'true';
    return view('auth.login');
});

Route::middleware('auth')->group(function() {
    // Route::get('/dashboard', 'DashboardController@index')->middleware('auth');

    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/dashboard', AdminController::class);
    Route::resource('/user', UserController::class);
    Route::resource('/project', ProjectController::class);  
    Route::resource('/stakeholder', StakeHolderController::class);
    Route::resource('/users', UserController::class);
    Route::resource('/roles', RoleController::class);
    Route::resource('/task', TaskController::class);
    Route::get('/usrdashboard', [App\Http\Controllers\UserDashboard::class, 'dashboard'])->name('dashboard');
});
    

Auth::routes();

  

    Route::middleware('can:edit')->group(function() {

    });
