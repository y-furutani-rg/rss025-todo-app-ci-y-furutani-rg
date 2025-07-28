<?php

namespace App\Http\Controllers;

use App\Models\Task;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Validation\ValidationException;

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
            $validatedData = $request->validate([
                'title' => 'required|string|max:30',
                'content' => 'required|string',
                'person_in_charge' => 'required|string|max:10',
            ]);
            $task = Task::create($validatedData);

            return response()->json([
                'data' => $task,
                'message' => 'データの登録に成功しました。']);
        } catch (ValidationException $e) {
            return response()->json([
                'message' => 'データの登録に失敗しました。',
                'validationErrors' => $e->errors(),
            ], 422);
        } catch (Exception $e) {
            Log::error($e->getMessage());

            return response()->json([
                'message' => 'データの登録に失敗しました。',
            ], 500);
        }
    }
}
