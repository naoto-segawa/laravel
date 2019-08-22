<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Task;

class TasklistController extends Controller
{
    //get通信
    public function tasklist(){
      $tasks =Task::orderBy('created_at','asc')->get();
      return view('auth.tasks',['tasks' => $tasks]);
    }

    //POST通信
    public function postTasklist(Request $request){
      $validator = $request->validate([
        'name' => ['required','string','max:280'],
      ]);

      $task = new Task;
      $task->name = $request->name;
      $task->save();

      return redirect('/task');
    }


    //DELETE
    public function deleteTasklist(Task $task){
      $task->delete();

      return redirect('/task');
    }
}
