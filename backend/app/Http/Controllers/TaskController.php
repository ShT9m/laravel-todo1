<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    private $task;

    public function __construct(Task $task)
    {

        $this->task = $task;
    }

    public function index(){
        $all_tasks = $this->task->latest()->get();
        return view('tasks.index')->with('tasks', $all_tasks);
    }

    public function store(Request $request){

        $request->validate([
            'name' => 'required|min:1|max:50'
        ]);

        $this->task->name = $request->name;
        // $this->task->name refers to the column name of task model
        // $request->name refers to the input from the form.
        $this->task->save();

        return redirect()->back(); //return to previous page

    }

    public function edit($id){
        $task = $this->task->findOrFail($id);
        return view('tasks.edit')->with('task', $task);
    }

    public function update(Request $request, $id){
        $request->validate([
            'name' => 'required|min:1|max:50'
        ]);

        $task = $this->task->findOrFail($id);
        $task->name = $request->name;
        $task->save();

        return redirect()->route('index');
    }

    public function destroy($id){
        $this->task->destroy($id);
        return redirect()->back();
    }

}
