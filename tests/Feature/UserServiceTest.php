<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

use function PHPUnit\Framework\assertTrue;

class UserServiceTest extends TestCase
{
  private UserService $userService;

  public function setUp(): void
  {
    parent::setUp();

    $this->userService = $this->app->make(UserService::class);
  }

  function testLoginSuccess()
  {
    $this->assertTrue($this->userService->login('rizki', '123'));
  }

  function testLoginUserNotFound()
  {
    $this->assertFalse($this->userService->login('kosasih', '123'));
  }

  function testLoginWrongPassword()
  {
    $this->assertFalse($this->userService->login('rizki', '12345'));
  }
}
