@extends('layouts.main')

@section('content')
  <div class="w-100 d-flex align-items-center justify-content-center" style="height: 100vh;">
    <div class="card" style="width: 360px;">
      <div class="card-header text-primary-emphasis bg-primary-subtle">
        <h4 class="card-title">Form Login</h4>
      </div>
      <div class="card-body">
        @if(session('error'))
          <div class="alert alert-danger alert-dismissible fade show text-capitalize" role="alert">
            <span>{{ session('error') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif

        @if(session('message'))
          <div class="alert alert-info alert-dismissible fade show text-capitalize" role="alert">
            <span>{{ session('message') }}</span>
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
          </div>
        @endif
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
              <button type="submit" name="submit" id="submit-form" class="btn btn-primary bg-gradient">Submit</button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection
