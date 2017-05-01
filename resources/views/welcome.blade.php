<!DOCTYPE html>
<html>
    <head>
        <meta charset=utf-8>
        <meta name="csrf-token" content="{!! csrf_token() !!}">
        <meta name="viewport" content="width=device-width">
        <title>client-app</title>
        @foreach ($styles as $style)
            <link href={{$style}} rel=stylesheet>
        @endforeach
        <link href='https://fonts.googleapis.com/css?family=Roboto:300,400,500,700|Material+Icons' rel="stylesheet" type="text/css">
    </head>
    <body>
        <div id=app></div>
        <script type=text/javascript src={{$scripts['manifest']}}></script>
        <script type=text/javascript src={{$scripts['vendor']}}></script>
        <script type=text/javascript src={{$scripts['app']}}></script>
    </body>
</html>