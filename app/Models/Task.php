<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{   
    use SoftDeletes;

    protected $fillable = [
        'title',
        'content',
        'person_in_charge',
    ];

    public static function getAllTasks(): Collection
    {
        return self::all();
    }

    public static function findTaskById(int $id)
    {
        return self::findOrFail($id);
    }

    public static function updateTask(array $update_task, int $id)
    {
        $task = self::findOrFail($id);
        $task->update($update_task);

        return $task;
    }

    public static function deleteTask(int $id)
    {
        $task = self::findOrFail($id);
        $task->delete();
    }
}
