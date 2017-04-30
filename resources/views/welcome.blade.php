<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <title>client-app</title>
        @foreach ($styles as $style)
            <link href={{$style}} rel=stylesheet>
        @endforeach
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
    </head>
    <body>
        <div id=app></div>
        <script type=text/javascript src={{$scripts['manifest']}}></script>
        <script type=text/javascript src={{$scripts['vendor']}}></script>
        <script type=text/javascript src={{$scripts['app']}}></script>
    </body>
</html>