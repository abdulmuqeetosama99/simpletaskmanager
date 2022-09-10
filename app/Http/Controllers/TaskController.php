<?php

namespace App\Http\Controllers;
use App\Models\Task;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{

    public function index()
    {
        $rshow = "off";
        $result =  DB::table('tasks')->where('completed','0')->get();
    
        return view('task_show',['taskArr'=>$result, 'rshow'=>$rshow]);
    }


    public function create()
    {
        return view('task_create');
    }


    public function store(Request $request)
    {
        $res = new Task;
        $res->name = $request->input('name');
        $res->completed = "0";
        try {
        $res->save();

        $request->session()->flash('msg','Data Submitted');
        return redirect('/');
        }catch (\Illuminate\Database\QueryException $e) {
            
            $request->session()->flash('msg','Task Already Available');
            return redirect('/');
        
        }
        return redirect('/');
    }


    public function show(Request $request, Task $task)
    {   $rshow = "off";
       if($request->show == "on"){
            $result =  DB::table('tasks')->get();
        }else{
            $result =  DB::table('tasks')->where('completed','0')->get();
            return redirect('/');
        }
        $rshow = $request->show;
        return view('task_show',['taskArr'=>$result,'rshow'=>$rshow]);
    }

    public function edit(Task $task, $id)
    {
        return view('task_edit')->with('taskArr',Task::find($id));
    }

    public function update(Request $request, Task $task)
    {
        $res = Task::find($request->id);
        $res->name = $request->input('name');
        $res->save();
        $request->session()->flash('msg','Data Updated');
        return redirect('/');
    }
    public function completed(Request $request, Task $task)
    {
        $res = Task::find($request->id);
        $res->completed = 1;
        $res->save();
        $request->session()->flash('msg','Task completed');
        return redirect('/');
    }

    public function destroy(Task $task, $id)
    {
        Task::destroy(array('id',$id));
        return redirect('/');
    }
}
