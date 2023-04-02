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

Route::get('/', function () {
    $tasks = DB::table('tasks')->get(); // get() its for select //->where('name', 'like', 'Task 2%')
    return view('tasks', compact('tasks'));//, compact('tasks')
});

Route::post('insert', function () {
    DB::table('tasks')->insert([
        'name' => $_POST['name'],
        'created_at' => now(),
        'updated_at' => now()
    ]);

    return redirect() -> back();
});


Route::post('delete/{id}',function($id){
    DB::table('tasks') -> where('id',$id)-> delete();

    return redirect() -> back();
});

Route::post('update/{id}',function($id){
    $task = DB::table('tasks')->where('id',$id)->get();
    return view('task_update', compact('task'));
});

Route::post('/{id}',function($id){
    DB::table('tasks') -> where('id',$id)-> update([
        'name' => $_POST['updatedName'],
    ]);
    $tasks = DB::table('tasks')->get();

    return view('tasks', compact('tasks'));
});
