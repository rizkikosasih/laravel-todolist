<?php

namespace App\Services;

interface UserService
{
  function login(string $user, string|int $password): bool;
}
