<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
  public function testLoginSuccess()
  {
    $this->post('/login', ['user' => 'rizki', 'password' => '123'])
      ->assertRedirect('/')
      ->assertSessionHas('user', 'rizki');
  }
}
