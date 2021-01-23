<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Request;
use App\Http\Controllers\UserController;
use App\Http\Controllers\TodosController;
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

// Route::get('/', function () {
//     return view('welcome');
// });

Route::middleware(['auth'])->group(function(){

    Route::get('/todos', [TodosController::class, 'index'])->name('todo.index');
    
    Route::get('/todos/create', [TodosController::class, 'create']);
    
    Route::post('/todos/create', [TodosController::class, 'store']);
    
    Route::get('/todos/{todo}/edit', [TodosController::class, 'edit']);
    
    Route::patch('/todos/{todo}/update', [TodosController::class, 'update'])->name('todo.update');
    
    Route::patch('/todos/{todo}/complete', [TodosController::class, 'complete'])->name('todo.complete');
    
    Route::delete('/todos/{todo}/incomplete', [TodosController::class, 'incomplete'])->name('todo.incomplete');
    
    Route::delete('/todos/{todo}/delete', [TodosController::class, 'delete'])->name('todo.delete');
});
    

Route::view('/', 'welcome');
 
Route::get('/users', [UserController::class, 'index']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::post("/upload", [UserController::class, 'uploadAvatar']);
