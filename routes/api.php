<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\LoginAPIController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

// Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
//     return $request->user();
// });
Route::get('/Users/list',[AdminController::class,'list']);

//----------------------------Admin----------------------------//
Route::get('/chart', [AdminController::class, 'chart'])->name('chart')->middleware('ValidAdmin');
Route::get('/admindash', [AdminController::class, 'admindash'])->name('admindash')->middleware('ValidAdmin');
Route::get('/profileAdmin', [AdminController::class, 'profileAdmin']);
Route::post('/profileAdmin', [AdminController::class, 'profileEdit']);
Route::get('/list', [AdminController::class, 'list'])->name('listAdmin');
Route::get('/searchUser', [AdminController::class, 'searchUser'])->name('searchUser')->middleware('ValidAdmin');
Route::get('/logout', [AdminController::class, 'logout'])->name('logout');

Route::get('/addUser', [AdminController::class, 'addUser']);
Route::post('/addUser', [AdminController::class, 'addUserSubmit']);
Route::get('/editUser/{userID}', [AdminController::class, 'editUser']);
Route::post('/editUser/{userID}', [AdminController::class, 'editUserSubmit']);
Route::get('/deleteUser/{userID}', [AdminController::class, 'deleteUserSubmit']);
// Route::post('/deleteUser/{userID}', [AdminController::class, 'deleteUserSubmit']);

Route::get('/appointmentlist', [AdminController::class, 'applist']);
Route::get('/addapp', [AdminController::class, 'addapp']);
Route::post('/addapp', [AdminController::class, 'addappSubmit']);
Route::get('/editapp/{appID}', [AdminController::class, 'editapp']);
Route::post('/editapp/{appID}', [AdminController::class, 'editappSubmit']);
Route::get('/deleteapp/{appID}', [AdminController::class, 'deleteappSubmit']);
// Route::post('/deleteapp/{appID}', [AdminController::class, 'deleteappSubmit']);
Route::get('/searchApp', [AdminController::class, 'searchApp'])->name('searchApp')->middleware('ValidAdmin');



Route::get('/Itemlist', [AdminController::class, 'Itemlist']);
Route::get('/searchProduct', [AdminController::class, 'searchProduct'])->name('searchProduct')->middleware('ValidAdmin');

Route::get('/docreviews', [AdminController::class, 'docreviews']);
Route::get('/deletereview/{doctorReviewID}', [AdminController::class, 'deletereviewSubmit']);


Route::get('/unverified', [AdminController::class, 'unverified']);
Route::get('/accept/{userID}', [AdminController::class, 'acceptSubmit']);
// Route::post('/accept/{userID}', [AdminController::class, 'acceptSubmit']);
Route::get('/decline/{userID}', [AdminController::class, 'decline']);
Route::get('/ban/{userID}', [AdminController::class, 'banSubmit']);
//Route::post('/ban/{userID}', [AdminController::class, 'banSubmit']);
Route::get('/unban/{userID}', [AdminController::class, 'unbanSubmit']);
// Route::post('/unban/{userID}', [AdminController::class, 'unbanSubmit']);



//Appointment
Route::get('/appointments',[AdminController::class,'appDoctor'])->name('appDoctor')->middleware('ValidAdmin'); 

Route::get('/Doctorsapps', [AdminController::class, 'join']);
Route::get('/chart', [AdminController::class, 'chart'])->name('chart')->middleware('ValidAdmin');
Route::get('/downloadPdf', [AdminController::class, 'downloadPdf'])->name('downloadPdf')->middleware('ValidAdmin');


//Login
Route::post('/login',[LoginAPIController::class,'login']);
Route::post('/logout',[LoginAPIController::class,'logout']);
Route::post('/registration',[LoginAPIController::class,'registration']);
Route::post('/verify',[LoginAPIController::class,'verify']);


//----------------------------Doctors----------------------------//
Route::get('/homeDoctor', [DoctorsAPIController::class, 'homeDoctor'])->middleware('APIAuth');
Route::get('/doctorProfile', [DoctorsAPIController::class, 'doctorProfile'])->middleware('APIAuth');;
Route::post('/doctorFee', [DoctorsAPIController::class, 'doctorFee'])->middleware('APIAuth');;
Route::get('/prescriptionsList', [DoctorsAPIController::class, 'prescriptionsList'])->middleware('APIAuth');;