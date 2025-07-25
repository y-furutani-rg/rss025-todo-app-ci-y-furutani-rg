<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    public function index()
    {
        try {
            $tasks = Task::getAllTasks();

            return response()->json([
                'data' => $tasks,
                'message' => 'データの取得に成功しました。',
            ]);
        } catch (Exception $e) {
            Log::error($e);

            return response()->json([
                'message' => 'データを取得できませんでした。',
            ], 500);
        }
    }

    public function store(Request $request)
    {
        try {
            $task = Task::create([
                'title' => $request->title,
                'content' => $request->content,
                'person_in_charge' => $request->person_in_charge,
            ]);

            return response()->json([
                'data' => $task,
                'message' => 'データの登録に成功しました。']);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'データの登録に失敗しました。',
            ], 500);
        }
    }
}
