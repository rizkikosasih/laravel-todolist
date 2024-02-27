@extends('layouts.main')

@section('content')
  <div class="row align-items-center justify-content-between py-3">
    <div class="col-auto">
      <h1 class="text-capitalize">Hello {{ session()->get('user') }}</h1>
    </div>
    <div class="col-auto">
      <form action="{{ route('user-logout') }}" method="post" class="form-validate" novalidate>
        @csrf
        <button type="submit" class="btn btn-danger bg-gradient">Logout</button>
      </form>
    </div>
  </div>

  @if(session('message'))
    <div class="alert alert-success alert-dismissible fade show text-capitalize" role="alert">
      <span>{{ session('message') }}</span>
      <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
    </div>
  @endif

  <div class="row py-3">
    <div class="col-md-4">
      <div class="card">
        <div class="card-header">
          <h4 class="my-0">Add Todo</h4>
        </div>
        <div class="card-body">
          <form action="{{ route('todolist-save') }}" method="post" class="form-validate" novalidate>
            @csrf
            <div class="mb-3">
              <label for="todo" class="form-label">Todo</label>
              <input type="text" name="todo" id="todo" class="form-control" placeholder="Masukkan Todo" required />
            </div>
            <div class="d-grid">
              <button type="submit" class="btn btn-primary bg-gradient">Submit</button>
            </div>
          </form>
        </div>
      </div>
    </div>

    <div class="col-md-8">
      <div class="table-responsive">
        <table class="table table-bordered table-hover">
          <thead>
            @foreach ($tableHeader as $th)
              <th class="align-middle text-center">{{ $th }}</th>
            @endforeach
          </thead>
          <tbody>
            @if ($data)
              @foreach ($data as $row)
                <tr>
                  <td class="text-center">{{ $row['id'] }}</td>
                  <td class="text-start">{{ $row['todo'] }}</td>
                  <td class="text-center">
                    <form action="{{ route('todolist-delete') }}" method="post" class="form-validate" novalidate>
                      @csrf
                      <input type="hidden" name="id" value="{{ $row['id'] }}" autocomplete="off"/>
                      <button type="submit" class="btn btn-sm btn-danger bg-gradient">Hapus</button>
                    </form>
                  </td>
                </tr>
              @endforeach
            @else
              <tr>
                <td colspan="{{ sizeof($tableHeader) }}">
                  <div class="d-flex align-items-center justify-content-center py-3">
                    <span class="text-muted">Tidak Ada Data</span>
                  </div>
                </td>
              </tr>
            @endif
          </tbody>
        </table>
      </div>
    </div>
  </div>
@endsection
