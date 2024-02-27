<?php

namespace App\Http\Controllers;

use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function home(Request $request): RedirectResponse
  {
    if ($request->session()->exists('user')) {
      return redirect()->route('todolist');
    } else {
      return redirect()->route('user-login');
    }
  }
}
