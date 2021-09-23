<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>RaiNews</title>
</head>
<body>
    <div class="container">
       @include('templates.navbar')
       <header>
            @yield('header')

       </header>

       <main>

        @yield('articles')
       </main>
  

       <main>

        @yield('article')
       </main>

       <main>

        @yield('create')
       </main>
    </div>
</body>
</html>