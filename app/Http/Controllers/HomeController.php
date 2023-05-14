<?php

namespace App\Http\Controllers;

use App\Models\Task;

class HomeController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('task.index',compact('tasks'));
    }
}