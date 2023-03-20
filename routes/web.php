<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('welcome');
});

Route::get('about', function () {
    $name = 'Ahmed';
   // return view('about', ['name' => 'Ahmed']);
   // return view('about')->with(['name', $name]);
    return view('about',compact('name'));
});

Route::post('about', function () {
    $name = 'Ahmed';
    if(isset($_POST['name']))
        $name = $_POST['name'];
    return view('about',compact('name'));
});


Route::get('tasks', function () {
    $tasks = ['Task #1', 'Task #2', 'Task #3'];
    return view('tasks', compact('tasks'));
});
