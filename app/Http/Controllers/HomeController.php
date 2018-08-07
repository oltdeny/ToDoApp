<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $user_id = Auth::id();
        $completedTasks = \App\Task::where('user_id', '=', $user_id)->where('completed', '=', true)->get();
        $currentTasks = \App\Task::where('user_id', '=', $user_id)->where('completed', '=', false)->get();

        return view('tasks', [
            'completedTasks' => $completedTasks,
            'currentTasks' => $currentTasks
        ]);
    }

}
