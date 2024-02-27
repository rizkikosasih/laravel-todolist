<?php

namespace Tests\Feature;

use App\Services\TodolistService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Session;
use Tests\TestCase;

class TodolistServiceTest extends TestCase
{
  private TodolistService $todolistService;

  protected function setUp(): void
  {
    parent::setUp();

    $this->todolistService = $this->app->make(TodolistService::class);
  }

  public function testTodolist()
  {
    $this->assertNotNull($this->todolistService);
  }

  public function testSaveTodo()
  {
    $this->todolistService->saveTodo(1, 'Todo 1');
    $todolist = Session::get('todolist');
    foreach ($todolist as $value) {
      $this->assertEquals(1, $value['id']);
      $this->assertEquals('Todo 1', $value['todo']);
    }
  }

  public function testGetTodoEmpty()
  {
    $this->assertEquals([], $this->todolistService->getTodo());
  }

  public function testGetTodoNotEmpty()
  {
    $expected = [
      [
        'id' => 1,
        'todo' => 'Todo 1',
      ],
      [
        'id' => 2,
        'todo' => 'Todo 2',
      ],
    ];

    $this->todolistService->saveTodo(1, 'Todo 1');
    $this->todolistService->saveTodo(2, 'Todo 2');

    $this->assertEquals($expected, $this->todolistService->getTodo());
  }

  public function testRemoveTodo()
  {
    $this->todolistService->saveTodo(1, 'Todo 1');
    $this->todolistService->saveTodo(2, 'Todo 2');

    $this->assertEquals(2, sizeof($this->todolistService->getTodo()));

    $this->todolistService->removeTodo(3);

    $this->assertEquals(2, sizeof($this->todolistService->getTodo()));

    $this->todolistService->removeTodo(2);

    $this->assertEquals(1, sizeof($this->todolistService->getTodo()));

    $this->todolistService->removeTodo(1);

    $this->assertEquals(0, sizeof($this->todolistService->getTodo()));
  }
}
