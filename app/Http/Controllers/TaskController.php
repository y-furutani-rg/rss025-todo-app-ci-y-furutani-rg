<?php

namespace App\Http\Controllers;

use App\Models\Task;

class TaskController extends Controller
{
    /**
     * tasksテーブルの全てのデータをJSON形式で返す
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function index()
    {
        $tasks = Task::all();

        return $tasks;
    }
}