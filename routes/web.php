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

use App\Http\Controllers\Api\RandomTravelController;

// 最初に表示するルート
Route::get('/', function () {
    return view('random_search');
});

// 地方IDを選択する画面
Route::get('/', [RandomTravelController::class, 'showRegionSelection']);

// 地方IDに基づいてランダム検索を実行する
Route::get('/random-search', [RandomTravelController::class, 'getRandomData']);