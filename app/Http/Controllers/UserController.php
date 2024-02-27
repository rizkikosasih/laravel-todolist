<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Http\JsonResponse;
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
    return response()->view('content.login', [
      'title' => 'Login Page',
    ]);
  }

  public function _login(Request $request): RedirectResponse
  {
    $user = strval($request->input('user'));
    $password = strval($request->input('password'));

    if (!$this->userService->login($user, $password)) {
      return redirect()->route('user-login')->with('error', 'User or Password wrong');
    }

    $request->session()->put('user', $user);
    return redirect()->route('todolist');
  }

  public function logout(Request $request): RedirectResponse
  {
    $request->session()->flush();
    return redirect()->route('user-login')->with('message', 'anda telah logout');
  }
}
