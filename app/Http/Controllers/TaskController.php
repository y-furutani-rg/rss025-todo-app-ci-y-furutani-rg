<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use \Symfony\Component\HttpFoundation\Response;
use App\Models\Task;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * タスク全件取得API
     *
     * @return Task|JsonResponse
     */
    public function index() : JsonResponse
    {
        $tasks = Task::all();
        return response()->json($tasks); 
        // log::debug($tasks);
        // return Task::all();
    }
}
