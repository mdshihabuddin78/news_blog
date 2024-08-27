<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

Route::get('comments_data', [\App\Http\Controllers\frontend\CommentController::class, 'getComments']);
Route::post('comments_data/delete', [\App\Http\Controllers\frontend\CommentController::class, 'commentDelete']);

//Route::get('/categories', [\App\Http\Controllers\CategoryController::class, 'getCategories']);
//Route::delete('/categories/{id}', [\App\Http\Controllers\CategoryController::class, 'deleteCategory']);


Route::resource('category_api',\App\Http\Controllers\CategoryApiController::class);