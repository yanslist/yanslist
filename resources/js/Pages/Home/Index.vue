<template>
  <base-layout>
    <div class="uk-section uk-section-primary">
      <div class="uk-container">
        <h3>{{ translate('home.browse_listings_by') }}</h3>
        <form class="" uk-grid>
          <div class="uk-width-1-2@m uk-width-1-1@s">
            <select v-model="region" class="uk-select" @change="getTownships()">
              <option value="">{{ translate('home.select_region') }}</option>
              <option v-for="data in regions.data" :value="data">{{ data.name }}</option>
            </select>
          </div>
          <div class="uk-width-1-2@m uk-width-1-1@s">
            <select v-model="township" class="uk-select" @change="getPosts()">
              <option value="">{{ translate('home.select_township') }}</option>
              <option v-for="data in townships" :value="data">{{ data.name }}</option>
            </select>
          </div>
        </form>
      </div>
    </div>

    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-grid-large" uk-grid>
          <div v-for="(value, name) in post_types" class="uk-width-1-2@m uk-width-1-1@s">
            <h2>{{ value }}</h2>
            <ul class="uk-list uk-list-large">
              <li><a class="uk-link-text" href="#">List item 1</a></li>
              <li><a class="uk-link-text" href="">Lorem ipsum dolor sit amet, consectetur adipisicing
                elit. Ab aliquid autem consequatur cum eaque enim</a></li>
              <li><a class="uk-link-text" href="">List item 3</a></li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </base-layout>
</template>

<script>
import BaseLayout from "../../Layouts/BaseLayout";

export default {
  components: {
    BaseLayout,
  },
  data() {
    return {
      region: '',
      township: '',
      townships: null
    }
  },
  props: {
    regions: Object,
    post_types: Object,
    posts: Object
  },
  methods: {
    getTownships: function () {
      this.townships = this.region.townships.data;
    },
    getPosts: function () {
      // this.posts = null
    }
  },
}
</script>
