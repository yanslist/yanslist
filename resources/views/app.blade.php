<!DOCTYPE html>
<html lang="{{config('app.locale')}}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0"/>
    <title>{{config('app.name')}}</title>
    <link rel="apple-touch-icon" sizes="180x180" href="{{asset('/favicons/apple-touch-icon.png')}}">
    <link rel="icon" type="image/png" sizes="32x32" href="{{asset('/favicons/favicon-32x32.png')}}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{asset('/favicons/favicon-16x16.png')}}">
    <link rel="manifest" href="{{asset('/favicons/site.webmanifest')}}">
    <link rel="mask-icon" href="{{asset('/favicons/safari-pinned-tab.svg" color="#1d1d50')}}">
    <link rel="shortcut icon" href="{{asset('/favicons/favicon.ico')}}">
    <meta name="apple-mobile-web-app-title" content="{{config('app.name')}}">
    <meta name="application-name" content="{{config('app.name')}}">
    <meta name="msapplication-TileColor" content="#fbf7ff">
    <meta name="msapplication-config" content="{{asset('/favicons/browserconfig.xml')}}">
    <meta name="theme-color" content="#fbf7ff">
    <link href="{{ asset('/css/style.min.css') }}" rel="stylesheet">
</head>
<body>
@routes
@inertia
<script src="https://www.google.com/recaptcha/api.js?onload=vueRecaptchaApiLoaded&render=explicit" async defer>
</script>
<script src="{{ mix('/js/app.js') }}" defer></script>
</body>
</html>
