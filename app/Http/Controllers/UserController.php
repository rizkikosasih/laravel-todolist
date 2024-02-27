<?php

namespace App\Http\Controllers;

use App\Services\UserService;
use Illuminate\Support\Str;
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

  public function _login(Request $request): JsonResponse|Response
  {
    $user = strval($request->input('user'));
    $password = strval($request->input('password'));
    $code = 200;
    $message = null;
    $error = null;

    if ($this->userService->login($user, $password)) {
      $request->session()->put('user', $user);
      $message = 'Login Success';
    } else {
      $code = 405;
      $error = 'User or Password wrong';
    }

    return response()->json([
      'code' => $code,
      'message' => $message,
      'error' => $error,
    ]);
  }

  public function _logout()
  {
    //
  }
}
