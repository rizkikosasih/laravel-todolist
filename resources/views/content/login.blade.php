@extends('layouts.main')

@section('content')
  <div class="w-100 d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card" style="width: 360px;">
      <div class="card-header text-primary-emphasis bg-primary-subtle">
        <h4 class="card-title">Login Form</h4>
      </div>
      <div class="card-body">
        <div class="alert alert-danger d-none" id="message-error" role="alert"></div>
        <form action="_login" method="post" class="form-validate" novalidate>
          @csrf
          <div class="mb-3">
            <label for="user" class="form-label">User</label>
            <input type="text" name="user" id="user" placeholder="User" class="form-control" autofocus required/>
          </div>
          <div class="mb-3">
            <label for="password" class="form-label">Password</label>
            <input type="password" name="password" id="password" placeholder="Password" class="form-control" required/>
          </div>
          <div class="mb-3">
            <div class="d-grid">
              <input type="submit" value="Submit" name="submit" id="submit-form" class="btn btn-outline-primary" />
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
