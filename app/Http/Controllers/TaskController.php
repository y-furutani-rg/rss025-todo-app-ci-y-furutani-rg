<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    public function index()
    {
        try {   
            $tasks = Task::getAllTasks();
            return response()->json([
                'data' => $tasks,
                'message' => 'データの取得に成功しました。']);
        } catch (\Exception $e) {
            Log::error($e);
            return response()->json([
                'message' => 'データを取得できませんでした。'
            ], 500); 
        }
    }
    public function store(Request $repuest)
    {
        try {
            $task = Task::create([
                'title' => $repuest->title,
                'content' => $repuest->content,
                'person_in_charge' => $repuest->person_in_charge
            ]);            
        }

    }
}