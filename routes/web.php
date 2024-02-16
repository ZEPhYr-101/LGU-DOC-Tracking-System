<?php
use App\Livewire\User\Dashboard;
use App\Livewire\User\Register;
use App\Livewire\User\Login;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AdminLogin;
use App\Livewire\Admin\ApproveUser;
use Illuminate\Support\Facades\Route;

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


Route::get('/user/dashboard', Dashboard::class)->name('user.dashboard');
Route::get('/user/register', Register::class)->name('user.register');
Route::get('/user/login', Login::class)->name('user.login');

//admin routes

Route::get('/admin/dashboard', AdminDashboard::class)->name('admin.admin-dashboard');
Route::get('/admin/login', AdminLogin::class)->name('admin.admin-login');

Route::get('/admin/users', ApproveUser::class)->name('admin.users');
