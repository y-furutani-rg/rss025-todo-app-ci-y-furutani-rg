<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        try {   
            $tasks = Task::getAllTasks();
            return response()->json($tasks);
        } catch (\Throwable) {
            return response()->json([
                'message' => 'データを取得できませんでした。'
            ], 500); 
        }
    }
}