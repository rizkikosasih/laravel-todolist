<?php

namespace App\Services;

interface TodolistService
{
  public function saveTodo(string|int $id, string $todo): void;

  public function getTodo(): array;

  public function removeTodo(string|int $id): void;
}
