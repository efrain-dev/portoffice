<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <script src="{{ asset('js/app.js') }}" defer></script>

      <!-- Fonts -->
      <link rel="dns-prefetch" href="//fonts.gstatic.com">
      <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
      <link rel="shortcut icon" href="/img/icono2.png" />

      <!-- Styles -->
      <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <style>


    </style>
    <title>@yield('title','Blog')</title>
  </head>
  <body>

    <div class="app d-flex flex-column h-screen justify-content-between" >
        <header>
            @include('partials/nav')
            @include('partials/session')
        </header>

        <main>
            @yield('content')
        </main>

        <footer class="bg-dark text-white py-3">
            <div style="text-align: center;">
                <span class="mx-2">{{config('app.name')}} | Copyright @ {{date('Y')}}</span>
            </div>

        </footer>

    </div>

  </body>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>

</html>
