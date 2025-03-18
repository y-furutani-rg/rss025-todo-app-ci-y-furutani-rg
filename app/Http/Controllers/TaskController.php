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
     * @return JsonResponse
     */
    public function index() : JsonResponse
    {
        try {
            $tasks = Task::all();
            return response()->json($tasks);
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }
    }
}
