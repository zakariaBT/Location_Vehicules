<?php

use App\Http\Controllers\Admin\AccountController;
use App\Http\Controllers\Admin\AgencyController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\InvoiceController;
use App\Http\Controllers\Admin\LoginController;
use App\Http\Controllers\Admin\PagesController;
use App\Http\Controllers\Admin\ReservationController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\VehiculeController;
use Illuminate\Support\Facades\Route;

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

Route::group(['prefix' => 'Admin/dashboard',  'middleware' => 'auth:admin'], function()
{

Route::get('/',[DashboardController::class,'index'])->name('dashboard');

Route::resources([
    '/vehicules' => VehiculeController::class,
    '/agencies'  => AgencyController::class,
    '/Users'  =>    UserController::class,
    '/Reservations'  =>    ReservationController::class,
    '/invoices'  =>    InvoiceController::class,
]);
Route::post('/vehicules/{vehicule}/deleteimage', [VehiculeController::class, 'deleteImage'] )->name('image.delete');

Route::get('/Invoice/{invoice}',[InvoiceController::class,'print'])->name('invoice.print');

Route::get('/Pages',[PagesController::class,'index'])->name('Pages.index');
Route::patch('/Pages',[PagesController::class,'update'])->name('Pages.update');

Route::get('/Account/Settings',[AccountController::class,'index'])->name('Settings.index');
Route::patch('/Account/Settings/{admin}',[AccountController::class,'update'])->name('Settings.update');

});

Route::get('/Admin/login',[LoginController::class,'index'])->name('login');
Route::post('/Admin/login',[LoginController::class,'check'])->name('login.check');
Route::post('/Admin/logout',[LoginController::class,'logout'])->name('logout');

Route::get('/', function(){ return view('welcome');})->name('home');
