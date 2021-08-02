<?php

use Illuminate\Support\Facades\Route;

Route::get('/', 'PostListController@index');
Route::post('/post_lists', 'PostListController@store');
Route::delete('/post_lists/{post_list}', 'PostListController@delete');