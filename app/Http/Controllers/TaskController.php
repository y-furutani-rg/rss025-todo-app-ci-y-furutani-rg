<?php

namespace App\Http\Controllers;

use Inertia\Inertia;
use Illuminate\Http\Request;
use App\Models\Task;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Lang;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
  public function index() {
    $tasks = Task::getAll();

    return $tasks;
  }
}
