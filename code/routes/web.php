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

Route::get('/', 'Controller@index')->name('home');
Route::get('/q1', 'Controller@Q1page')->name('q1.page');
Route::get('/q2', 'Controller@Q2page')->name('q2.page');
Route::get('/q3', 'Controller@Q3page')->name('q3.page');
Route::post('/post', 'Controller@Q3post')->name('q3.post');
Route::get('/code/{line}', 'Controller@showCode')->name('code');
