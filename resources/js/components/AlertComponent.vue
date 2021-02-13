<template>
  <div class="uk-container">
    <div class="uk-child-width-1-4@s uk-flex uk-flex-center" uk-grid>
      <div v-if="$page.props.flash.message" uk-alert>
        <a class="uk-alert-close" uk-close></a>
        <p>{{ $page.props.flash.message }}</p>
      </div>
    </div>
  </div>
</template>

<script>
export default {
  name: "AlertComponent",
}
</script>
