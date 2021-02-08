<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PageController;
use App\Http\Controllers\PostController;
use Illuminate\Foundation\Application;
use Inertia\Inertia;
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
//Route::get('/home', 'PageController@index');

Route::get('/home', [PageController::class, 'index']);
Route::get('/about', [PageController::class, 'about']);
Route::get('/service', [PageController::class, 'service']);
//PostController
Route::get('/post', [PostController::class, 'index']);
Route::get('/post/create', [PostController::class, 'create']);


Route::post('/post', [PostController::class, 'store']);

Route::get('/posts/{id}', [PostController::class, 'show']);
Route::get("/posts/edit/{id}", [PostController::class, 'edit']);
Route::put("/posts/{id}", [PostController::class, 'update']);

Route::delete('/posts/{id}', [PostController::class, 'destroy']);

/*Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->name('dashboard');
*/


//Route::put('/post/{id}', [PostController::class, 'edit']);
//Route::resource('/posts', PostController::class);

//Route::resource('posts', "App\Http\Controllers\PostController");

/*Route::get('/', function () {
    return view('welcome'); 
});

Route::get('/hello', function () {
    return '<h1> hello</h1>';
});*/

