<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    protected $fillable = [
        'title',
        'content',
        'person_in_charge',
    ];

    public static function getAllTasks(): Collection
    {
        return self::all();
    }

    public static function findTaskById(int $id): self
    {
        return self::findOrFail($id);
    }

    public static function updateTask(array $update_task, int $id): self
    {
        $task = self::findOrFail($id);
        $task->update($update_task);

        return $task;
    }
}
