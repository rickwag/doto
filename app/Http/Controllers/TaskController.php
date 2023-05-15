<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    //show all tasks
    function index()
    {
        $tasks = Task::all();

        $data['tasks'] = $tasks;

        return view('task.index', $data);
    }

    //show create task form
    function create()
    {
        return view('task.create');
    }

    //store task
    function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        Task::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        return redirect('/');
    }

    //change status
    function check(Task $task, $status)
    {
        $task->status = (int)$status;

        $ok = $task->save();

        if ($ok)
            $msg = "successfully updated task " . $task->title;
        else 
            $msg = "failed to update task " . $task->title;

        return response()->json(array('msg' => $msg), 200);
    }

    //show edit page
    function edit(Task $task)
    {
        return view('task.edit', ['task' => $task]);
    }

    //update task
    function update(Request $request, Task $task)
    {
        $request->validate([
            'title' => 'required',
        ]);

        $task->title = $request->title;
        $task->description = $request->description;

        $ok = $task->save();

        return redirect('/');
    }

    //delete task
    function delete(Task $task)
    {
        $title = $task->title; 
        $ok = $task->delete();

        if ($ok)
            $msg = "successfully deleted task " . $title;
        else 
            $msg = "failed to deleted task " . $title;

        return response()->json(array('msg' => $msg), 200);
    }
}