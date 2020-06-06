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
Route::get('/about', function () {
    return view('about');
});

Auth::routes();

Route::get('/profile', 'UserController@index')->name('user.profile');
Route::get('/profile/{user}/edit', 'UserController@edit')->name('user.edit');
Route::patch('/profile/{user}', 'UserController@update')->name('user.update');
Route::get('/profile/{user}/password', 'UserController@password')->name('user.password');
Route::patch('/profile/{user}/password', 'UserController@updatePassword')->name('user.updatePassword');
Route::patch('/profile/{user}/picture', 'UserController@updatePicture')->name('user.updatePicture');

Route::get('profile/{user}/gallery', 'GalleryController@index')->name('gallery.index');
Route::post('profile/{user}/gallery', 'GalleryController@store')->name('gallery.store');
Route::delete('profile/{gallery}', 'GalleryController@destroy')->name('gallery.destroy');

Route::get('dates', 'UserController@dates')->name('user.dates');
Route::post('dates/{user}/like', 'InterestController@like')->name('user.like');
Route::post('dates/{user}/dislike', 'InterestController@dislike')->name('user.dislike');

Route::get('profile/match', 'UserController@match')->name('user.match');

Route::get('dates/profile/{user}', 'UserController@targetProfile')->name('user.targetProfile');
Route::get('dates/profile/{user}/gallery', 'GalleryController@show')->name('gallery.target');





