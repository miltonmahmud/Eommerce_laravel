<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="keywords" content="">
    <meta name="author" content="elemis">
    <title>Cartvelly</title>
    <link rel="shortcut icon" href="{{asset('assets3/img/favicon.png')}}">
    <link rel="stylesheet" href="{{asset('assets3/css/plugins.css')}}">
    <link rel="preload" href="{{asset('assets3/css/fonts/dm.css')}}">
    <link rel="stylesheet" href="{{asset('assets3/css/style.css')}}">

</head>

<body>

    {{$slot}}
    
    <script src="{{asset('assets3/js/plugins.js')}}"></script>
    <script src="{{asset('assets3/js/theme.js')}}"></script>
</body>

</html>