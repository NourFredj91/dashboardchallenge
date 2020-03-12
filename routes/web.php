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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(['verify' => true]);

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/challenge-details/{id}', 'ChallengeController@index')->name('details');
Route::get('/challenges', 'ChallengeController@get')->name('Challenges');
Route::get('/authority', 'UserController@index')->name('Authority');
Route::get('/edit-challenge/{id}', 'ChallengeController@edit');
Route::get('/delete-challenge/{id}', 'ChallengeController@delete');
Route::get('/add-challenge', 'ChallengeController@add');

Route::post('/add-challenge', 'ChallengeController@storeChallenge')->name('challenge.store');
Route::patch('/edit-challenge/{id}', 'ChallengeController@update')->name('challenges.update');
Route::post('/challenge-details/{id}', 'ChallengeController@return')->name('challenges.return');
Route::post('/delete-challenge/{id}', 'ChallengeController@deleteChallenge')->name('challenge.delete');

Route::get('file-upload', 'FileController@fileUpload')->name('file.upload');
Route::post('file-upload', 'FileController@fileUploadPost')->name('file.upload.post');
