<template>
  <div class="uk-button-group">
    <a :href="shareLinks['facebook']" class="uk-button uk-button-secondary"><span uk-icon="facebook"></span> Post</a>
    <a :href="shareLinks['twitter']" class="uk-button uk-button-secondary"><span uk-icon="twitter"></span> Tweet</a>
    <a class="uk-button uk-button-secondary" href=""><span uk-icon="social"></span> Share</a>
  </div>
</template>

<script>
export default {
  name: "ShareComponent",
  props: {
    shareLinks: Object
  }
}
</script>
