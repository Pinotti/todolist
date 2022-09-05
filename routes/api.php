<?php

use App\Http\Controllers\TodoController;
use App\Http\Controllers\TodoTaskController;
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

Route::apiResources([
    'todos' => TodoController::class,
    'todo-tasks' => TodoTaskController::class
]);

Route::post('todos/{todo}/task', [TodoController::class, 'addTask']);
