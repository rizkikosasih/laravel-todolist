<?php

namespace App\Services\Impl;

use App\Services\UserService;

class UserServiceImpl implements UserService
{
  public array $users = [
    'rizki' => '123',
  ];

  public function login(string $user, string|int $password): bool
  {
    if (!isset($this->users[$user])) {
      return false;
    }
    $correctPassword = $this->users[$user];
    return $correctPassword === $password;
  }
}
