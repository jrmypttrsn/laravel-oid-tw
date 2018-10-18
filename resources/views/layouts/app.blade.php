<!doctype html>
<html lang="{{ app()->getLocale() }}">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
      <link href="https://fonts.googleapis.com/css?family=Nunito:200,300,400,600,700,800,900" rel="stylesheet">
      <link rel="stylesheet" href="{{ mix('css/app.css') }}">
    <title>{{ config('app.name', 'OneCert OID') }}</title>
      @yield('styles')
  </head>
  <body class="font-sans antialiased text-grey-darkest leading-tight">
  @include('layouts.navbar')
  <div id="app">
      @yield('body')
    </div>
    @include('layouts.footer')
    <script src="{{ mix('js/app.js') }}"></script>
    @yield('scripts')
  </body>
</html>
