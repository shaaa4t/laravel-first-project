<?php

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



Route::get('tasks', function () {
    //$tasks = ['Task #1', 'Task #2', 'Task #3'];
    $tasks = DB::table('tasks')->get(); // get() its for select //->where('name', 'like', 'Task 2%')
    return view('tasks', compact('tasks'));
});


Route::get('/', function () {
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
