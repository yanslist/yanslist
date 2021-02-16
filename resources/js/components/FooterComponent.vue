<template>
  <footer id="footer" class="uk-section uk-section-primary uk-section-small">
    <div class="uk-container">
      <p class="uk-align-right">
        <a :href="localeUrls.my" class="uk-link-text">မြန်မာ</a> /
        <a :href="localeUrls.en" class="uk-link-text">English</a>
      </p>
      <p>
        <strong>{{ $page.props.appName }}</strong> &copy; 2021.
        Developed and maintained by
        <inertia-link class="uk-link-muted" href="https://hiyan.xyz">Yan</inertia-link>
        .
        Powered by
        <inertia-link class="uk-link-muted" href="https://getuikit.com/">English</inertia-link>
        ,&nbsp;
        <inertia-link class="uk-link-muted" href="https://laravel.com/">Laravel</inertia-link>
        ,
        <inertia-link class="uk-link-muted" href="https://vuejs.org/">Vue.js</inertia-link>
        .
        <inertia-link class="uk-margin-small-left" href="https://github.com/yanslist/yanslist"
                      uk-icon="github"></inertia-link>
      </p>
    </div>
  </footer>
</template>

<script>
function getLocalizedUrl(locale) {
  const segments = window.location.pathname.split('/');
  segments[0] = window.location.origin;
  segments[1] = locale;
  return segments.join('/');
}

export default {
  name: "FooterComponent",
  data: function () {
    return {
      currentUrl: window.location.href,
      currentLocale: document.documentElement.lang
    }
  },
  computed: {
    localeUrls: function () {
      return {
        'en': getLocalizedUrl('en'),
        'my': getLocalizedUrl('my')
      }
    }
  }
}
</script>
