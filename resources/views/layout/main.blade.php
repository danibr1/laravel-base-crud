<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Laravel Crud</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        {{-- BOOTSTRAP --}}
        <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css' integrity='sha512-Ez0cGzNzHR1tYAv56860NLspgUGuQw16GiOOp/I2LuTmpSK9xDXlgJz3XN4cnpXWDmkNBKXR/VDMTCnAaEooxA==' crossorigin='anonymous'/>
        {{-- style --}}
        <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    </head>
    <body>

        {{-- HEADER --}}
        @include('partials.header')
        {{-- MAIN --}}
        <main>
            @yield('content')
        </main>
        {{-- FOOTER --}}
        @include('partials.footer')

    </body>
</html>
