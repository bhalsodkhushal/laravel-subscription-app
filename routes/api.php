<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\Website;

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

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('websites', function() {
    return Website::all();
});

Route::post('create-post', 'App\Http\Controllers\PostController@createWebsitePost');
Route::post('store-subscription', 'App\Http\Controllers\SubscriptionController@storeSubscription');