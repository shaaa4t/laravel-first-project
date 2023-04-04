<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('about', function () {
//     $name = 'Ahmed';
//    // return view('about', ['name' => 'Ahmed']);
//    // return view('about')->with(['name', $name]);
//     return view('about',compact('name'));
// });





Route::get('/layout_lab', function () {
    return view('index');
});
Route::get('quote', function () {
    return view('quote');
});

Route::get('about', function () {
    return view('about');
});

Route::get('service', function () {
    return view('service');
});
//-----------------------------------
Route::get('taskapp', function () {
    return view('layout.taskapp');
});

Route::get('/', [TaskController::class, 'index']) -> name('tasks');

Route::post('store',  [TaskController::class, 'store']) -> name('task.store');

Route::delete('delete/{id}', [TaskController::class, 'delete'])-> name('task.delete');

Route::put('edit/{id}', [TaskController::class, 'edit'])-> name('task.edit');

Route::post('update/{id}',[TaskController::class, 'update'])-> name('task.update');

Route::post('/{id}',[TaskController::class, 'updated'])-> name('task.updated');
