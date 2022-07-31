<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DoctorController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\AdminController;


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

//----------------------------Login&Registration----------------------------//
Route::get('/', [PagesController::class, 'login']);
Route::post('/', [PagesController::class, 'loginSubmit'])->name('login');
Route::get('/logout', [PagesController::class, 'logout'])->name('logout');

Route::get('/registration', [PagesController::class, 'registration'])->name('registration');
Route::post('/registration', [PagesController::class, 'registrationSubmit'])->name('registration');

//----------------------------Doctors----------------------------//
Route::get('/doctors/homeDoctor', [DoctorController::class, 'homeDoctor'])->name('homeDoctor')->middleware('ValidDoctors');

//----------------------------Admin----------------------------//
Route::get('/chart', [AdminController::class, 'chart'])->name('chart')->middleware('ValidAdmin');
Route::get('/admindash', [AdminController::class, 'admindash'])->name('admindash')->middleware('ValidAdmin');
Route::get('/profileAdmin', [AdminController::class, 'profileAdmin'])->name('profileAdmin')->middleware('ValidAdmin');
Route::post('/profileAdmin', [AdminController::class, 'profileEdit'])->name('profileAdmin')->middleware('ValidAdmin');
Route::get('/list', [AdminController::class, 'list'])->name('listAdmin')->middleware('ValidAdmin');
Route::get('/searchUser', [AdminController::class, 'searchUser'])->name('searchUser')->middleware('ValidAdmin');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/addUser', [AdminController::class, 'addUser'])->name('addUser')->middleware('ValidAdmin');
Route::post('/addUser', [AdminController::class, 'addUserSubmit'])->name('addUser')->middleware('ValidAdmin');
Route::get('/editUser/{name}', [AdminController::class, 'editUser'])->middleware('ValidAdmin');
Route::post('/editUser', [AdminController::class, 'editUserSubmit'])->name('editUser')->middleware('ValidAdmin');
Route::get('/deleteUser/{name}', [AdminController::class, 'deleteUser'])->middleware('ValidAdmin');
Route::post('/deleteUser', [AdminController::class, 'deleteUserSubmit'])->name('deleteUser')->middleware('ValidAdmin');

Route::get('/appointmentlist', [AdminController::class, 'applist'])->name('applist')->middleware('ValidAdmin');
Route::get('/addapp', [AdminController::class, 'addapp'])->name('addapp')->middleware('ValidAdmin');
Route::post('/addapp', [AdminController::class, 'addappSubmit'])->name('addapp')->middleware('ValidAdmin');
Route::get('/editapp/{appID}', [AdminController::class, 'editapp'])->name('editapp')->middleware('ValidAdmin');
Route::post('/editapp', [AdminController::class, 'editappSubmit'])->name('editapp')->middleware('ValidAdmin');
Route::get('/deleteapp/{appID}', [AdminController::class, 'deleteapp'])->name('deleteapp')->middleware('ValidAdmin');
Route::post('/deleteapp', [AdminController::class, 'deleteappSubmit'])->name('deleteapp')->middleware('ValidAdmin');
Route::get('/searchApp', [AdminController::class, 'searchApp'])->name('searchApp')->middleware('ValidAdmin');



Route::get('/Itemlist', [AdminController::class, 'Itemlist'])->name('Itemlist')->middleware('ValidAdmin');
Route::get('/searchProduct', [AdminController::class, 'searchProduct'])->name('searchProduct')->middleware('ValidAdmin');

Route::get('/docreviews', [AdminController::class, 'docreviews'])->name('docreviews')->middleware('ValidAdmin');
Route::get('/deletereview/{doctorReviewID}', [AdminController::class, 'deletereviewSubmit'])->name('deletereview')->middleware('ValidAdmin');


Route::get('/unverified', [AdminController::class, 'unverified'])->name('unverified')->middleware('ValidAdmin');
Route::get('/accept/{name}', [AdminController::class, 'accept'])->name('accept')->middleware('ValidAdmin');
Route::post('/accept', [AdminController::class, 'acceptSubmit'])->name('accept')->middleware('ValidAdmin');
Route::get('/decline/{name}', [AdminController::class, 'decline'])->name('decline')->middleware('ValidAdmin');
Route::get('/ban/{name}', [AdminController::class, 'ban'])->name('ban')->middleware('ValidAdmin');
Route::post('/ban', [AdminController::class, 'banSubmit'])->name('ban')->middleware('ValidAdmin');
Route::get('/unban/{name}', [AdminController::class, 'unban'])->name('unban')->middleware('ValidAdmin');
Route::post('/unban', [AdminController::class, 'unbanSubmit'])->name('unban')->middleware('ValidAdmin');



//Appointment
Route::get('/appointments',[AdminController::class,'appDoctor'])->name('appDoctor')->middleware('ValidAdmin'); 

Route::get('/Doctorsapps', [AdminController::class, 'join'])->name('join')->middleware('ValidAdmin');
Route::get('/chart', [AdminController::class, 'chart'])->name('chart')->middleware('ValidAdmin');
Route::get('/downloadPdf', [AdminController::class, 'downloadPdf'])->name('downloadPdf')->middleware('ValidAdmin');