<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\web\UsersController;
use App\Http\Controllers\web\AdminController;
use App\Http\Controllers\web\SettingsController;
use App\Http\Controllers\web\TicketsController;
use App\Http\Controllers\web\EmailController;



/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

/*Route::get('loginform',[AdminController::class,'login'])->name('login');
Route::post('validate',[AdminController::class,'login_validation'])->name('validate.admin');
Route::post('registrationform',[AdminController::class,'register'])->name('registerform');
Route::post('create_admin',[AdminController::class,'store'])->name('add.admin');
Route::post('logout',[AdminController::class,'logout'])->name('logout');*/

Route::middleware('auth:web')->group(function () {

Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('users',[UsersController::class,'index'])->name('show_users');
Route::post('create_user',[UsersController::class,'store'])->name('create_new_users');
Route::get('add_new_users',[UsersController::class,'show'])->name('show_add_user_form');

Route::get('settings',[SettingsController::class,'index'])->name('show_settings');
Route::get('tickets',[TicketsController::class,'index'])->name('show_tickets');

Route::get('search', [UsersController::class,'search']);


});

Route::get("send-email", [EmailController::class, "sendEmail"]);
//get methods
//Route::get('users',[UsersController::class,'index']);



Auth::routes();

