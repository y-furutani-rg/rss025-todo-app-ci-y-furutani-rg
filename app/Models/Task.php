<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;

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
}