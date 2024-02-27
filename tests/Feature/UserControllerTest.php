<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserControllerTest extends TestCase
{
  public function testLoginSuccess()
  {
    $this->post('/_login', ['user' => 'rizki', 'password' => '123'])
      ->assertRedirectToRoute('todolist')
      ->assertSessionHas('user', 'rizki');
  }
}
