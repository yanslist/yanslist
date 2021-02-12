<template>
  <footer class="uk-section uk-section-primary uk-section-small">
    <div class="uk-container">
      <div class="uk-grid-margin-small uk-child-width-1-2" uk-grid>
        <div>
          <p>
            <strong>Yan's List</strong> &copy; 2021. Developed and maintained by <a class="uk-link-muted"
                                                                                    href="https://hiyan.xyz">Yan</a>.
          </p>
          <p>
            Used <a class="uk-link-muted" href="https://getuikit.com/" target="_blank">UIkit</a>.
            Powered by <a class="uk-link-muted" href="https://laravel.com/" target="_blank">Laravel</a>.
          </p>
        </div>
        <div>
          <p class="uk-align-right">
            <a :href="localeUrls.my" class="uk-link-text">မြန်မာ</a> / <a :href="localeUrls.en" class="uk-link-text">English</a>
          </p>
        </div>
      </div>
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
      currentUrl: route(route().current()),
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
