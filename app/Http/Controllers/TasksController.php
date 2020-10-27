<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TasksController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function getTask($track, $level)
    {
        $tasks = DB::table('tasks')->where('level', '=', $level)->where('track', '=', $track)->get();

        if (count($tasks) === 0) {
            return response()->json(['message' => 'No tasks found'], 404);
        }

        return response()->json($tasks);
    }

    public function getTaskByDay($track, $level, $day)
    {
        $tasks = DB::table('tasks')->where('level', '=', $level)->where('track', '=', $track)->where('task_day', '=', $day)->get();

        if (count($tasks) === 0) {
            return response()->json(['message' => 'No tasks found'], 404);
        }

        return response()->json($tasks);
    }
}
