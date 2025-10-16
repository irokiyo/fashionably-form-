<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ContactController;

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

Route::get('/', [ContactController::class, 'index'])->name('index'); //お問い合わせフォーム入力ページ
Route::get('/confirm', [ContactController::class, 'confirm'])->name('confirm'); //お問い合わせフォーム確認ページ
Route::post('/confirm', [ContactController::class, 'store'])->name('store'); //お問い合わせフォームを登録
Route::get('/thanks', [ContactController::class, 'thanks'])->name('thanks'); //サンクスページ


Route::middleware('auth')->group(function () {
    Route::get('/admin', [ContactController::class, 'admin'])->name('admin');//管理画面
    });

