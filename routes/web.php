<?php

use App\Livewire\User\Dashboard;
use App\Livewire\User\Register;
use App\Livewire\User\Login;
use App\Livewire\User\UserDocuments;
use App\Livewire\Admin\AdminDashboard;
use App\Livewire\Admin\AdminLogin;
use App\Livewire\Admin\ApproveUser;
use App\Livewire\Admin\Documents;
use App\Livewire\Admin\UserManagement;
use App\Livewire\Admin\AccessLog;
use App\Livewire\Admin\TrackingLog;
use App\Livewire\Admin\EditUserForm;
use App\Livewire\Admin\ChangePassword;
use App\Livewire\AddDocuments;
use App\Livewire\Admin\AdminUploadDocuments;
use App\Livewire\IncomingDocuments;
use App\Livewire\UploadDucuments;
use App\Livewire\User\UserUploadDocuments;
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

Route::get('user/register', Register::class)->name('user.register');
Route::get('user/login', Login::class)->name('user.login');
Route::get('/admin/login', AdminLogin::class)->name('admin.login');

Route::group(['middleware' => ['User_auth']], function () {
    Route::get('/add', AddDocuments::class)->name('add');
    Route::get('user/dashboard', Dashboard::class)->name('user.dashboard');
    Route::get('user/documents', UserDocuments::class)->name('user.documents');
    Route::get('user/incomingDocs', IncomingDocuments::class)->name('user.incomingDocs');
});

Route::group(['middleware' => ['Admin_auth']], function (){
    Route::get('admin/dashboard', AdminDashboard::class)->name('admin.admin-dashboard');
    Route::get('admin/users', ApproveUser::class)->name('admin.users');
    Route::get('admin/access-log', AccessLog::class)->name('AccessLog');
    Route::get('admin/tracking-log', TrackingLog::class)->name('TrackingLog');
    Route::get('admin/user-management', UserManagement::class)->name('userManagement');
    Route::get('admin/edit-user-form/{id}', EditUserForm::class)->name('editUserForm');
    Route::get('admin/documents', Documents::class)->name('admin.documents');
    Route::get('admin/change-password/{id}', ChangePassword::class)->name('admin.changePassword');
});

