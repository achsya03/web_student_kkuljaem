<?php

use App\Http\Controllers\V1\AuthController;
use App\Http\Controllers\V1\ClassController;
use App\Http\Controllers\V1\QnaController;
use App\Http\Controllers\V1\ForumController;
use App\Http\Controllers\V1\DashboardController;
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
Route::group(['middleware' => 'cors', 'checkHTTPS'], function () {
    // Home
    Route::get('/', [DashboardController::class, 'index'])->name('dashboard.index');

    // Search


    // Auth
    Route::get('/login', [AuthController::class, 'login'])->name('login.index');
    Route::post('/login', [AuthController::class, 'loginProcess'])->name('login.process');
    Route::get('/register', [AuthController::class, 'register'])->name('register.index');
    Route::post('/register', [AuthController::class, 'registerProcess'])->name('register.process');
    Route::get('/forgot', [AuthController::class, 'forgot'])->name('forgot.index');

});


Route::group(['middleware' => 'authtoken', 'cors', 'checkHTTPS'], function () {
    // Kelas
    Route::group(['prefix' => 'class'], function () {
        Route::get('/', [ClassController::class, 'index'])->name('class.index');
        Route::get('/history', [ClassController::class, 'history'])->name('class.history');
        Route::get('/detail/{id}', [ClassController::class, 'detail'])->name('class.detail');
        Route::get('/kategori/{id}', [ClassController::class, 'kategori'])->name('class.kategori');
        Route::get('/mentor/{id}', [ClassController::class, 'mentor'])->name('class.mentor');
        Route::get('/video/{id}', [ClassController::class, 'video'])->name('class.video');
    });
    // Route::get('/search', [DashboardController::class, 'search'])->name('dashboard.search');
    Route::post('/search', [DashboardController::class, 'search'])->name('dashboard.search');

    Route::group(['prefix' => 'qna'], function () {
        Route::get('/', [QnaController::class, 'index'])->name('qna.index');
        
    });

    Route::group(['prefix' => 'forum'], function () {
        Route::get('/', [ForumController::class, 'index'])->name('forum.index');
        
    });
   

    //qna
    

    
});
