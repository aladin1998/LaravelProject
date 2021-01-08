<?php

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

Route::view('/', 'welcome')->middleware('auth');;
Auth::routes(['verify' => true]);


Route::get('/home', 'HomeController@index')->name('home')->middleware('auth');


Route::get('admin/home', 'HomeController@adminHome')->name('admin.home')->middleware('is_admin');
Route::get('admin/addRep', 'addRepController@index')->middleware('is_admin');
Route::put('admin/etudiant','addRepController@envoyer')->middleware('is_admin');
Route::put('admin/etudiant/{id}','addRepController@confirmer')->middleware('is_admin');

Route::get('admin/deleteRep', 'deleteRepController@index')->middleware('is_admin');
Route::put('admin/deleteRep','deleteRepController@envoyer')->middleware('is_admin');
Route::put('admin/deleteRep/{id}','deleteRepController@confirmer')->middleware('is_admin');
Route::get('admin/list','ListController@index')->middleware('is_admin');
//represantant
Route::get('rep/home', 'repHomeController@repHome')->name('rep.home')->middleware('is_rep');
//cours
Route::get('rep/sendFile/content', 'sendFileController@indexContent')->name('rep.sendFileContent')->middleware('is_rep');
Route::get('rep/sendFile/cour', 'sendFileController@indexCour')->name('rep.sendFileCour')->middleware('is_rep');
Route::put('rep/sendFile/sendCour', 'sendFileController@storeCour')->name('rep.storeCour')->middleware('is_rep');
//TDs
Route::get('rep/sendFile/TD', 'sendFileController@indexTD')->name('rep.sendFileTD')->middleware('is_rep');
Route::put('rep/sendFile/sendTD', 'sendFileController@storeTD')->name('rep.storeTD')->middleware('is_rep');
//TPs
Route::get('rep/sendFile/TP', 'sendFileController@indexTP')->name('rep.sendFileTP')->middleware('is_rep');
Route::put('rep/sendFile/sendTP', 'sendFileController@storeTP')->name('rep.storeTP')->middleware('is_rep');

//Download files
Route::get('rep/downloadFile/modules','downloadFileController@indexModule')->name('rep.downloadFileModule');
Route::get('rep/downloadFile/modules/{id}','downloadFileController@indexCours')->name('rep.search');
Route::get('rep/downloadFile/cours/{id}','downloadFileController@downloadCours')->name('rep.downloadFileCours');

Route::DELETE('rep/deleteFile/cours/{id}','deleteFileController@destroy')->name('cour.destroy');
Route::get('rep/editeFile/cours/{id}','updateFileController@editeCour')->name('cour.edite');
Route::put('rep/updateFile/cours/{id}','updateFileController@updateCour')->name('cour.update');

Route::get('rep/downloadFile/cours/{id}/TDs','downloadFileController@indexTDs')->name('rep.downloadFileTDs');
Route::get('rep/downloadFile/tdsC/{id}','downloadFileController@downloadCorrectionTDs')->name('rep.downloadFileTDs');

Route::get('rep/downloadFile/tdsE/{id}','downloadFileController@downloadEnonceTDs')->name('rep.downloadFileTDs');


Route::get('rep/downloadFile/cours/{id}/TPs','downloadFileController@indexTPs')->name('rep.downloadFileTPs');
Route::get('rep/downloadFile/tpsC/{id}','downloadFileController@downloadCorrectionTPs')->name('rep.downloadFileTPs');

Route::get('rep/downloadFile/tpsE/{id}','downloadFileController@downloadEnonceTPs')->name('rep.downloadFileTPs');
//myUploads
Route::get('rep/myUploads','UploadsController@indexUploads');
//myAcount
Route::get('/myAccount', 'accountController@index')->name('myAccount')->middleware('auth');
//resetPassword

Route::get('rep/change-password', 'ChangePasswordController@index');
Route::post('rep/change-password', 'ChangePasswordController@store')->name('change.password');

Route::post('rep/change-email', 'ChangeEmailController@store')->name('change.email');
Route::put('rep/change-photo', 'ChangePhotoController@store')->name('change.photo');

//email
Route::post('resetPassword', 'resetController@email')->name('reset.email');
Route::post('resetPassword/confirm', 'resetController@confirm')->name('reset.confirm');
Route::post('resetPassword/update', 'resetController@updatePassword')->name('reset.fin');


