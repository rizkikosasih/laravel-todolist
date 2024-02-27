<?php

namespace App\Services\Impl;

use App\Services\TodolistService;
use Illuminate\Support\Facades\Session;

class TodolistServiceImpl implements TodolistService
{
  public function saveTodo(string|int $id, string $todo): void
  {
    if (!Session::exists('todolist')) {
      Session::put('todolist', []);
    }

    Session::push('todolist', [
      'id' => $id,
      'todo' => $todo,
    ]);
  }

  public function getTodo(): array
  {
    return Session::get('todolist', []);
  }

  public function deleteTodo(string|int $id): void
  {
    $todolist = Session::get('todolist', []);
    foreach ($todolist as $key => $value) {
      if ($value['id'] === $id) {
        unset($todolist[$key]);
        break;
      }
    }

    Session::put('todolist', $todolist);
  }
}
