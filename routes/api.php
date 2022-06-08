<?php
use App\Http\Controllers\ProductController;
use App\Http\Controllers\MeasureController;
use App\Http\Controllers\AuthController;
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

//Route::resource('products', ProductController::class);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/register', [AuthController::class, 'register']);

Route::get('/measures', [MeasureController::class, 'index']);
Route::get('/measures/{id}', [MeasureController::class, 'show']);
Route::get('/measures/search/{value}', [MeasureController::class, 'search']);


Route::get('/products/search/{name}', [ProductController::class, 'search']);
Route::get('/products', [ProductController::class, 'index']);
Route::get('/products/{id}', [ProductController::class, 'show']);



Route::group(['middleware' => ['auth:sanctum']], function() {


    Route::post('/measures', [MeasureController::class, 'store']);
    Route::put('/measures/{id}', [ProductController::class, 'update']);
    Route::delete('/measures/{id}', [ProductController::class, 'destroy']);

    Route::post('/products', [ProductController::class, 'store']);
    Route::put('/products/{id}', [ProductController::class, 'update']);
    Route::delete('/products/{id}', [ProductController::class, 'destroy']);


    Route::post('/logout', [ProductController::class, 'logout']);
});

