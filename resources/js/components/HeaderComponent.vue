<template>
  <nav class="uk-navbar-container">

    <div class="uk-container">
      <div uk-navbar>
        <div class="uk-navbar-left">
          <a :href="route('home')" class="uk-navbar-item uk-logo">{{ $page.props.appName }}</a>
        </div>
        <div class="uk-navbar-right uk-visible@m">
          <ul class="uk-navbar-nav">
            <li>
              <inertia-link :href="route('home')">{{ translate('main.listings') }}</inertia-link>
            </li>
            <li>
              <inertia-link :href="route('home')">{{ translate('main.contact') }}</inertia-link>
            </li>
          </ul>
          <div class="uk-navbar-item">
            <inertia-link :href="route('new')" class="uk-button uk-button-primary">
              {{ translate('main.post_new') }}
            </inertia-link>
          </div>
        </div>
        <div class="uk-navbar-right uk-hidden@m">
          <a class="uk-navbar-toggle" href="#offcanvas-slide" uk-navbar-toggle-icon uk-toggle></a>
        </div>
      </div>
    </div>

    <div id="offcanvas-slide" uk-offcanvas="flip: true">
      <div class="uk-offcanvas-bar">
        <button class="uk-offcanvas-close uk-icon uk-close" type="button" uk-close></button>
        <ul class="uk-nav uk-nav-default">
          <li>
            <inertia-link :href="route('home')">{{ translate('main.listings') }}</inertia-link>
          </li>
          <li>
            <inertia-link :href="route('home')">{{ translate('main.contact') }}</inertia-link>
          </li>
          <li class="uk-margin-small-top">
            <inertia-link :href="route('new')" class="uk-button uk-button-primary">
              {{ translate('main.post_new') }}
            </inertia-link>
          </li>
        </ul>
      </div>
    </div>

  </nav>
</template>

<script>
export default {
  name: "HeaderComponent",
}
</script>
