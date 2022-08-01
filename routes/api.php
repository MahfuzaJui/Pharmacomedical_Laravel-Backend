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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});
Route::get('/Users/list',[AdminController::class,'list']);

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

Route::get('/appointmentlist', [AdminController::class, 'applist']);
Route::get('/addapp', [AdminController::class, 'addapp'])->name('addapp')->middleware('ValidAdmin');
Route::post('/addapp', [AdminController::class, 'addappSubmit'])->name('addapp')->middleware('ValidAdmin');
Route::get('/editapp/{appID}', [AdminController::class, 'editapp'])->name('editapp')->middleware('ValidAdmin');
Route::post('/editapp', [AdminController::class, 'editappSubmit'])->name('editapp')->middleware('ValidAdmin');
Route::get('/deleteapp/{appID}', [AdminController::class, 'deleteapp'])->name('deleteapp')->middleware('ValidAdmin');
Route::post('/deleteapp', [AdminController::class, 'deleteappSubmit'])->name('deleteapp')->middleware('ValidAdmin');
Route::get('/searchApp', [AdminController::class, 'searchApp'])->name('searchApp')->middleware('ValidAdmin');



Route::get('/Itemlist', [AdminController::class, 'Itemlist']);
Route::get('/searchProduct', [AdminController::class, 'searchProduct'])->name('searchProduct')->middleware('ValidAdmin');

Route::get('/docreviews', [AdminController::class, 'docreviews']);
Route::get('/deletereview/{doctorReviewID}', [AdminController::class, 'deletereviewSubmit'])->name('deletereview')->middleware('ValidAdmin');


Route::get('/unverified', [AdminController::class, 'unverified']);
Route::get('/accept/{name}', [AdminController::class, 'accept'])->name('accept')->middleware('ValidAdmin');
Route::post('/accept', [AdminController::class, 'acceptSubmit'])->name('accept')->middleware('ValidAdmin');
Route::get('/decline/{name}', [AdminController::class, 'decline'])->name('decline')->middleware('ValidAdmin');
Route::get('/ban/{name}', [AdminController::class, 'ban'])->name('ban')->middleware('ValidAdmin');
Route::post('/ban', [AdminController::class, 'banSubmit'])->name('ban')->middleware('ValidAdmin');
Route::get('/unban/{name}', [AdminController::class, 'unban'])->name('unban')->middleware('ValidAdmin');
Route::post('/unban', [AdminController::class, 'unbanSubmit'])->name('unban')->middleware('ValidAdmin');



//Appointment
Route::get('/appointments',[AdminController::class,'appDoctor'])->name('appDoctor')->middleware('ValidAdmin'); 

Route::get('/Doctorsapps', [AdminController::class, 'join']);
Route::get('/chart', [AdminController::class, 'chart'])->name('chart')->middleware('ValidAdmin');
Route::get('/downloadPdf', [AdminController::class, 'downloadPdf'])->name('downloadPdf')->middleware('ValidAdmin');


//Login
Route::post('/login',[LoginAPIController::class,'login']); 
Route::post('/logout',[LoginAPIController::class,'logout']);