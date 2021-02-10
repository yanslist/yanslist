<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{config('app.name')}}</title>
    <link rel="stylesheet" href="{{asset('css/style.min.css')}}">
    <link rel="icon" type="image/png" href="{{asset('favicon.png')}}">
</head>
<body>
@include('partials.header')

<div class="uk-container">
    @yield('content')
</div>

<footer class="uk-section uk-section-primary">
    <div class="uk-container">
        <p style="text-align: justify;">
            <strong>{{config('app.name')}}</strong> &copy; {{date('Y')}}
        </p>
        <p>
            Used <a href="https://getuikit.com/" target="_blank">UIkit</a>. Powered by <a href="https://laravel.com/"
                                                                                          target="_blank">Laravel</a>.
        </p>
    </div>
</footer>

<script src="{{ asset('js/uikit.min.js')  }}"></script>
<script src="{{ asset('js/uikit-icons.min.js') }}"></script>
</body>
</html>
