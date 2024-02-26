@extends('layouts.main')

@section('content')
  <div class="w-100 d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card" style="width: calc(100vh - 25rem);">
      <div class="card-header text-primary-emphasis bg-primary-subtle">
        <h4 class="card-title">Login Form</h4>
      </div>
      <div class="card-body">
        <form action="_login" method="post" class="form-validate" novalidate>
          @csrf
          <div class="mb-3">
            <label for="username" class="form-label">Username</label>
            <input type="text" name="username" id="username" placeholder="Username" class="form-control" autofocus required/>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
          </div>
          <div class="mb-3">
            <div class="d-grid">
              <input type="submit" value="Submit" name="submit" id="submit" class="btn btn-outline-primary" />
            </div>
            <hr class="my-3">
            <div class="d-grid">
              <a href="javascript:void(0);" class="btn btn-outline-success" id="register">Register</a>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
