<?php

use App\Notifications\InquiryReceived;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegistrationController;
use App\Http\Controllers\AdminController;
use App\Livewire\UserItems;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\MessageController;
use App\Models\User;
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

route::get('/',[HomeController::class,'index']);

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
route::get('/redirect',[HomeController::class,'redirect']);
Route::post('/register', [RegistrationController::class, 'register'])->name('register');
Route::name('registration.success')->get('/registration/success', function () {
    return view('registration.success'); 
});
route::get('/view_category',[AdminController ::class,'view_category']);
route::post('/add_category',[AdminController ::class,'add_category']);
route::get('/delete_category/{id}',[AdminController ::class,'delete_category']);
route::get('/view_product',[AdminController ::class,'view_product']);
route::post('/add_product',[AdminController ::class,'add_product']);
route::get('/show_product',[AdminController ::class,'show_product']);
route::get('/delete_product/{id}',[AdminController ::class,'delete_product']);
route::get('/update_product/{id}',[AdminController ::class,'update_product']);
route::post('/update_product_confirm/{id}',[AdminController ::class,'update_product_confirm']);
route::get('/product_details/{id}',[HomeController ::class,'product_details']);
Route::get('/redirectToRole', [HomeController::class, 'redirectToRole']);
route::get('/view_seller',[HomeController ::class,'view_seller']);
Route::get('/user-items', [HomeController::class, 'showUserItems'])->name('user.items');
route::get('/view_products',[HomeController ::class,'view_products']);
Route::get('/notifications/fetch', 'NotificationController@fetch')->name('notifications.fetch');
Route::post('/send-notification', 'NotificationController@sendNotification')->name('send-notification');
Route::post('updateUserRole', [HomeController::class, 'updateUserRole'])->name('update.user.role');
