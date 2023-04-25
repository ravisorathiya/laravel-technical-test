<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Models\User;
use Illuminate\Http\Request;

class TaskController extends Controller
{
    public function index()
    {
        return view('task.create');
    }

    public function store()
    {
        $validateData = request()->validate([
            'title' => 'required',
            'description' => 'required',
        ]);

        $task = new Task;

        $task->title = $validateData['title'];
        $task->description = $validateData['description'];
        $task->username = auth()->user()->name;
        $task->save();
        return to_route('task.create');
    }
}
