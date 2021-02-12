<template>
  <nav class="uk-navbar-container">
    <div class="uk-container">
      <div uk-navbar>
        <div class="uk-navbar-left">
          <a class="uk-navbar-item uk-logo" href="#">Yan's List</a>
        </div>
        <div class="uk-navbar-right">
          <ul class="uk-navbar-nav">
            <li><a :href="route('home')">{{ translate('main.listings') }}</a></li>
            <li><a href="#">{{ translate('main.contact') }}</a></li>
          </ul>
          <div class="uk-navbar-item">
            <a :href="route('new')" class="uk-button uk-button-primary">{{ translate('main.post_new') }}</a>
          </div>
        </div>
      </div>
    </div>
  </nav>
</template>

<script>
export default {
  name: "HeaderComponent"
}
</script>
