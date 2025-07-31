<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreTaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\DB;
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

    public function store(StoreTaskRequest $request)
    {
        DB::beginTransaction();
        try {
            $task = Task::create($request->validated());
            DB::commit();

            return response()->json([
                'data' => $task,
                'message' => 'データの登録に成功しました。']);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            DB::rollBack();

            return response()->json([
                'message' => 'データの登録に失敗しました。',
            ], 500);
        }
    }

    public function show($id)
    {
        try {
            $task = Task::findOrFail($id);

            return response()->json([
                'data' => $task,
                'message' => 'データの取得に成功しました。',
            ]);
        } catch (ModelNotFoundException $e) {
            Log::error($e);

            return response()->json([
                'message' => 'データが見つかりませんでした。',
            ], 404);
        } catch (Exception $e) {
            Log::error($e);

            return response()->json([
                'message' => 'データを取得できませんでした。',
            ], 500);
        }
    }
}
