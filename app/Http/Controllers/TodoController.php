<?php

namespace App\Http\Controllers;

use App\Services\TodolistService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class TodoController extends Controller
{
  private TodolistService $todoService;

  public function __construct(TodolistService $todoService)
  {
    $this->todoService = $todoService;
  }

  public function index(Request $request): Response|RedirectResponse
  {
    if (!$request->session()->exists('user')) {
      return redirect()->route('user-login')->with('error', 'Silahkan login terlebih dahulu');
    } else {
      return response()->view('content.todolist', [
        'tableHeader' => ['#', 'Todo', 'Aksi'],
        'data' => $this->todoService->getTodo(),
      ]);
    }
  }

  public function save(Request $request): RedirectResponse
  {
    $todo = $request->input('todo');
    $this->todoService->saveTodo(uniqid(), $todo);

    return redirect()->route('todolist')->with('message', 'Berhasil Menambahkan Todo');
  }

  public function delete(Request $request): RedirectResponse
  {
    $id = $request->input('id');
    $this->todoService->deleteTodo($id);

    return redirect()
      ->route('todolist')
      ->with('message', $id . ' Berhasil Dihapus');
  }
}
