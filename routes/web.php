<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\AdminController;

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

/*Route::get('/', function () {
    return view('welcome');
});*/

Route::get('/', [HomeController::class,'index']);

Route::get('/home', [HomeController::class,'redirect']);

Route::middleware(['auth'])->group(function () {
    Route::get('/update_data', [UserController::class,'add']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/show_data', [UserController::class,'view']);
});

Route::get('/login', function () {
    return view('auth\login');
})->name('login');

Route::post('/upload_data', [UserController::class,'upload']);

Route::post('/upload_detail', [UserController::class,'detail']);

Route::post('/upload_status', [UserController::class,'status']);

Route::post('/upload_profile_detail', [UserController::class,'profiledetail']);

Route::group(['middleware'=>'admins'],function(){
    Route::get('/add_user',[AdminController::class, 'register'])->name('AdminController');
});

Route::post('/upload_user', [AdminController::class,'upload']);

Route::group(['middleware'=>'admins'],function(){
    Route::get('/view_user', [AdminController::class,'view'])->name('AdminController');
});

Route::middleware(['middleware'=>'admins'])->group(function () {
    Route::get('/add_data', [AdminController::class,'add']);
});

Route::middleware(['middleware'=>'admins'])->group(function () {
    Route::get('/view_data', [AdminController::class,'viewdata']);
});

Route::post('/upload_data', [AdminController::class,'uploaddata']);

Route::post('/make_admin', [AdminController::class,'make']);

Route::post('/dismiss_admin', [AdminController::class,'dismiss']);

Route::post('/delete_user', [AdminController::class,'delete']);

Route::post('/edit_data', [AdminController::class,'edit']);

Route::post('/edit_user', [AdminController::class,'edituser']);

Route::post('/upload_edit', [AdminController::class,'uploadedit']);

Route::post('/upload_edituser', [AdminController::class,'uploadedituser']);

Route::post('/active_view', [AdminController::class,'active']);

Route::post('/deactive_view', [AdminController::class,'deactive']);

Route::post('/deleted_view', [AdminController::class,'deleted']);


Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
