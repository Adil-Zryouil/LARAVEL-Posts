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

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard','MyController@index')->name('dashboard');

Route::get('/Home','MyController@index')->name('Home');

Route::get('Post/{slug}','MyController@show')->name('post.show');

Route::get('AddPage',function () {
    return view('add');
});

Route::post('/add/post','MyController@ajouter')->name('add.post');

Route::get('/UpdatePage/{id}','MyController@UpdatePage')->name('update.page');

Route::put("/update/post/{id}","MyController@modifier")->name('update.post');

Route::delete('/delete/post/{id}','MyController@supprimer')->name('delete.post');

Route::get('/myposts', function () {
    return view('myposts');
});
