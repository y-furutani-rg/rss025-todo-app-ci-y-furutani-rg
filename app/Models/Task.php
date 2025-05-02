<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
  use HasFactory;

  protected $fillable = [
    'title',
    'content',
    'person_in_change',
  ];

  public static function getAll($id = null) {
    $tasks = Task::where('deleted_at', NULL)
             ->get();
    return $tasks;
  }
}
