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

@yield('content')

<footer class="uk-section uk-section-primary uk-section-small">
    <div class="uk-container">
        <p style="text-align: justify;">
            <strong>{{config('app.name')}}</strong> &copy; {{date('Y')}}. Developed and maintained by <a
                    href="https://hiyan.xyz">Yan</a>.
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
