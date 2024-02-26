<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class UserController extends Controller
{
  private UserService $userService;

  public function __construct(UserService $userService)
  {
    $this->userService = $userService;
  }

  public function login(): Response
  {
    return response()->view('user.login', [
      'title' => 'Login Page',
    ]);
  }

  public function _login(Request $request): RedirectResponse|Response
  {
    $user = $request->input('user');
    $password = $request->input('password');

    if (!trim($user) || !trim($password)) {
      return response()->view('user.login', [
        'title' => 'Login Page',
        'error' => 'User or Password is required',
      ]);
    }

    if ($this->userService->login($user, $password)) {
      $request->session()->put('user', $user);
      return redirect('/');
    } else {
      return response()->view('user.login', [
        'title' => 'Login Page',
        'error' => 'User or Password wrong',
      ]);
    }
  }

  public function _logout()
  {
    //
  }
}
