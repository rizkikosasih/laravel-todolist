<!DOCTYPE html>
<html lang="{{ config('app.locale') }}" data-url="{{ url('/') }}">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <title>{{ config('app.name') }}</title>
</head>

<body>
  <div class="container">
    @yield('content')
  </div>

  @vite(['resources/js/app.js'])
</body>

</html>
