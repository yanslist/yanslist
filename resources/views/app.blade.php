<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>{{config('app.name')}}</title>
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}">
    <link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">
    <script src="{{ mix('/js/app.js') }}" defer></script>
</head>
<body>
@routes
@inertia
<script src="{{ asset('/js/uikit.min.js')  }}"></script>
<script src="{{ asset('/js/uikit-icons.min.js') }}"></script>
</body>
</html>
