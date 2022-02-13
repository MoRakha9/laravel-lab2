<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ArticleController;

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

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/home', [HomeController::class, 'list'])->middleware(['auth'])->name('home');
/* articles pages routes */
/* show articles */
Route::get('/showArticle/{id}', [ArticleController::class, 'Alist'])->middleware(['auth','is_admin']);
Route::get('/insert/{d}', [ArticleController::class, 'insert'])->middleware(['auth','is_admin','birth']);
/* insert new article */
Route::post('/save', [ArticleController::class, 'save']);
/* delete article */
Route::delete('/delete/{id}/{C_id}', [ArticleController::class, 'delete']);
/* update new article */
Route::get('/insert/{d}/{dd}', [ArticleController::class, 'updatePage']);
Route::post('/update', [ArticleController::class, 'update']);