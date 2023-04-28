<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;

use App\Model\User;
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

Route::get('/',[
HomeController::class,
'index'
]);

Route::get('/home',[
HomeController::class,
'redirect'
])->middleware('auth','verified');
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::get('/add_doctor',[
AdminController::class,
'addview'
]);

Route::post('/upload_doctor',[
AdminController::class,
'upload'
]);

Route::post('/appointment',[
HomeController::class,
'appointment'
]);

Route::get('/myappointment',[
HomeController::class,
'myappointment'
]);

Route::get('/cancel_appoint/{id}',[
HomeController::class,
'cancel_appoint'
]);

Route::get('/show_appointments',[
AdminController::class,
'showappointments'
]);

Route::get('/approve/{id}',[
AdminController::class,
'approve'
]);

Route::get('/cancel/{id}',[
AdminController::class,
'cancel'
]);

Route::get('/show_all_doctors',[
AdminController::class,
'showdoctors'
]);

Route::get('/deletedoctor/{id}',[
AdminController::class,
'deletedoc'
]);

Route::get('/update_doctor/{id}',[
AdminController::class,
'updatedoc'
]);

Route::post('/editdoctor/{id}',[
AdminController::class,
'editdoc'
]);

Route::get('/emailview/{id}',[
AdminController::class,
'emailview'
]);

Route::get('/sendemail/{id}',[
AdminController::class,
'sendemail'
]);
