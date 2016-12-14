<?php

use Illuminate\Http\Request;

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

// Route::post('/folders', 'FolderController@postfoldername');
Route::post('/folders', 'FolderController@store');
Route::get('/folders', 'FolderController@getfoldername');
Route::get('/phimmoi/filmle', 'CrawlerController@getphimmoi');
Route::post('/crawlers', 'CrawlerController@store');
// Route::post('/crawlers', 'CrawlerController@postcrawler');
Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:api');
