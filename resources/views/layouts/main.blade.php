<!DOCTYPE html>
<html
  lang="{{ config('app.locale') }}"
  data-url="{{ url('/') }}"
  data-bs-theme="{{ isset($_COOKIE['theme']) ? $_COOKIE['theme'] : 'light' }}"
>

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="csrf-token" content="{{ csrf_token() }}">
  <link rel="shortcut icon" href="{{ asset('favicon.svg') }}" type="image/svg">
  <title>{{ config('app.name') }}</title>
</head>

<body>
  <div class="container">
    @yield('content')
  </div>

  @vite(['resources/assets/js/app.js'])
</body>

</html>
