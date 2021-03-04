<template>
  <div class="uk-button-group">
    <inertia-link :href="shareLinks['facebook']" class="uk-button uk-button-secondary"><span
        uk-icon="facebook"></span> Post
    </inertia-link>
    <inertia-link :href="shareLinks['twitter']" class="uk-button uk-button-secondary"><span
        uk-icon="twitter"></span> Tweet
    </inertia-link>
    <inertia-link :href="route('qrcode', {'path': qrcode})" class="uk-button uk-button-secondary"><span
        uk-icon="download"></span>
      Download
    </inertia-link>
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
