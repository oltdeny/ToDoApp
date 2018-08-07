<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class TaskController extends Controller
{
    public function editTask(Request $request, \App\Task $task)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task->update(['name' => $request->name]);
        return redirect('/');

    }

    public function addTask(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required|max:255'
        ]);

        if ($validator->fails()) {
            return redirect('/')
                ->withInput()
                ->withErrors($validator);
        }

        $task = new\App\Task;
        $task->name = $request->name;
        if (Auth::id()) {
            $task->user_id = Auth::id();
        } else {
            $task->user_id = 0;
        }

        $task->save();

        return redirect('/');
    }

    public function deleteTask(\App\Task $task) {
        $task->delete();
        return redirect('/');
    }

    public function completeTask(\App\Task $task) {
        $task->update(['completed' => true]);
        return redirect('/');
    }
}
