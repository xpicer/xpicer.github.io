<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','WelcomeController@index');

/* Lessons */

// Lesson1
Route::get('lesson1', array('as' => 'lesson1.index', 'uses' => 'Lesson1Controller@index'));

// Lesson2
Route::get('lesson2', array('as' => 'lesson2.index', 'uses' => 'Lesson2Controller@index'));
Route::get('lesson2/create', array('as' => 'lesson2.create', 'uses' => 'Lesson2Controller@create'));
Route::post('lesson2', array('as' => 'lesson2.store', 'uses' => 'Lesson2Controller@store'));

// Lesson3
Route::get('lesson3', array('as' => 'lesson3.index', 'uses' => 'Lesson3Controller@index'));
Route::post('lesson3/local', array('as' => 'lesson3.store.local', 'uses' => 'Lesson3Controller@store_local'));
Route::post('lesson3/global', array('as' => 'lesson3.store.global', 'uses' => 'Lesson3Controller@store_global'));

// Lesson4
Route::get('lesson4', array('as' => 'lesson4.index', 'uses' => 'Lesson4Controller@index'));
Route::post('lesson4', array('as' => 'lesson4.store', 'uses' => 'Lesson4Controller@store'));

// Lesson5
Route::get('lesson5', array('as' => 'lesson5.index', 'uses' => 'Lesson5Controller@index'));
Route::post('lesson5', array('as' => 'lesson5.store', 'uses' => 'Lesson5Controller@store'));

// Lesson6
Route::get('lesson6', array('as' => 'lesson6.index', 'uses' => 'Lesson6Controller@index'));

// Lesson7
Route::get('lesson7', array('as' => 'lesson7.index', 'uses' => 'Lesson7Controller@index'));
Route::post('lesson7/data', array('as' => 'lesson7.data', 'uses' => 'Lesson7Controller@dtdata'));

// Lesson8
Route::get('lesson8', array('as' => 'lesson8.index', 'uses' => 'Lesson8Controller@index'));