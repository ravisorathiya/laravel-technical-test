<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Illuminate\Http\Request;

class HomeController extends Controller
{

    public function index()
    {
        $tasks = Task::all();
        return view('task.index',compact('tasks'));
    }
}