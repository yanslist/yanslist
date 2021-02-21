<template>
  <div class="uk-button-group">
    <a :href="shareLinks['facebook']" class="uk-button uk-button-secondary"><span uk-icon="facebook"></span> Post</a>
    <a :href="shareLinks['twitter']" class="uk-button uk-button-secondary"><span uk-icon="twitter"></span> Tweet</a>
    <a :href="route('qrcode', {'path': qrcode})" class="uk-button uk-button-secondary"><span uk-icon="download"></span>
      Download</a>
  </div>
</template>

<script>
export default {
  name: "ShareComponent",
  props: {
    shareLinks: Object,
    qrcode: String
  }
}
</script>
