<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>{{ $page_title ?? 'Brunoex' }}</title>
    </head>
    <body>
        {{ $slot }}
    </body>
</html>
<!-- The biggest battle is the war against ignorance. - Mustafa Kemal Atatürk -->