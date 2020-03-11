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
Route::get('/challenge-details/{id_challenge}', 'ChallengeController@index')->name('details');
Route::get('/challenges', 'ChallengeController@get')->name('Challenges');
Route::get('/authority', 'UserController@index')->name('Authority');
Route::get('/edit-challenge', 'ChallengeController@edit')->name('Authority');
Route::get('/delete-challenge', 'ChallengeController@delete')->name('Authority');
Route::get('/add-challenge', 'ChallengeController@add')->name('Authority');
