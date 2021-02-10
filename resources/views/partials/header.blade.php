<nav class="uk-navbar-container">
    <div class="uk-container">
        <div uk-navbar>
            <div class="uk-navbar-left">
                <a class="uk-navbar-item uk-logo" href="#">{{config('app.name')}}</a>
            </div>
            <div class="uk-navbar-right">
                <ul class="uk-navbar-nav">
                    <li><a href="{{ route('home') }}">{{__('Listings')}}</a></li>
                    <li><a href="#">{{__('Contact')}}</a></li>
                </ul>
                <div class="uk-navbar-item">
                    <a href="{{ route('new') }}" class="uk-button uk-button-primary">{{__('Post New')}}</a>
                </div>
            </div>
        </div>
    </div>
</nav>
