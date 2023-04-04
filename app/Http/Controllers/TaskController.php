<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    public function index(){
        // $tasks = DB::table('tasks')->get();

        $tasks = Task::all();
        return view('tasks', compact('tasks'));
    }

    public function store(Request $request){
        $task = new Task;
        $task->name = $request->name;
        $task->save();

      //  dd($task);
      //  dd( $request);
        // DB::table('tasks')->insert([
        //     'name' =>  $request->name,
        //     'created_at' => now(),
        //     'updated_at' => now()
        // ]);

        return redirect() -> back();
    }

    public function delete($id){
        // DB::table('tasks') -> where('id',$id)-> delete();
        $task = Task::find($id);

        $task->delete();

        return redirect() -> back();
    }

    public function edit($id){
        DB::table('tasks') -> where('id',$id)-> delete();

        return redirect() -> back();
    }

    public function update($id){
        $task = DB::table('tasks')->where('id',$id)->get();
        return view('task_update', compact('task'));
    }

    public function updated($id){
        DB::table('tasks') -> where('id',$id)-> update([
            'name' => $_POST['updatedName'],
        ]);
        $tasks = DB::table('tasks')->get();

        return view('tasks', compact('tasks'));
    }


}
