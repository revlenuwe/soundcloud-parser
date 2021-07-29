<?php

use App\Services\SoundCloud;
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

Route::get('/','TrackController@index')->name('index');

Route::group(['prefix' => 'download', 'as' => 'download.'], function () {
    Route::view('/','download')->name('index');
    Route::any('/process', 'TrackController@download')->name('process');
});

Route::group(['middleware' => 'auth'], function () {
    Route::group(['prefix' => 'fake-add', 'as' => 'fake-add.'], function () {
        Route::view('/','fake_add')->name('index');
        Route::post('/create','TrackController@create')->name('create');
    });


    Route::group(['prefix' => 'parse', 'as' => 'parse.'], function () {
        Route::view('/','parse')->name('index');
        Route::post('/process','TrackController@parseTrack')->name('process');
    });

    Route::group(['prefix' => 'you', 'as' => 'you.'], function (){
       Route::get('/tracks','UserController@tracks')->name('tracks.index');
       Route::post('/tracks/{track}/delete','TrackController@delete')->name('tracks.delete');
    });
});




require __DIR__.'/auth.php';
