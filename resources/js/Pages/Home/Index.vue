<template>
  <base-layout>
    <div class="uk-section uk-section-primary">
      <div class="uk-container">
        <h3>{{ translate('home.browse_listings_by') }}</h3>
        <form class="" uk-grid>
          <div class="uk-width-1-2@m uk-width-1-1@s">
            <select v-model="region" class="uk-select" @change="regionSelected()">
              <option value="">{{ translate('main.select_region') }}</option>
              <option v-for="data in regions.data" :value="data">{{ data.id }} {{ data.name }}</option>
            </select>
          </div>
          <div class="uk-width-1-2@m uk-width-1-1@s">
            <select v-model="township" class="uk-select" @change="townshipSelected()">
              <option value="">{{ translate('main.select_township') }}</option>
              <option v-for="data in townships" :value="data">{{ data.id }} {{ data.name }}</option>
            </select>
          </div>
        </form>
      </div>
    </div>

    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-grid-large" uk-grid>
          <div v-for="(value, key) in post_types" class="uk-width-1-2@m uk-width-1-1@s">
            <h2>{{ translate('post.types.' + key) }}</h2>
            <ul class="uk-list">
              <li v-for="post in filtered_posts[key]">
                <a :href="post.slug" class="uk-link-text">
                  <span v-if="post.is_offer" class="uk-label">{{ translate('main.offer') }}</span>
                  {{ post.title }}
                  <span class="uk-text-meta">@{{ post.region.localized_name }}</span>
                </a>
              </li>
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
      townships: null,
      listings: null
    }
  },
  props: {
    regions: Object,
    post_types: Object,
    posts: Object
  },
  computed: {
    filtered_posts() {
      const raw = {};
      this.listings = this.posts.data;
      Object.keys(this.post_types).forEach(key => {
        raw[key] = this.listings.filter(post => {
          return post.type === key;
        }).filter(post => {
          if (this.region === '') {
            return true;
          } else {
            return post.region_id === this.region.id;
          }
        }).filter(post => {
          if (this.township === '') {
            return true;
          } else {
            return post.township_id === this.township.id;
          }
        });
      });
      return raw;
    },
  },
  methods: {
    regionSelected: function () {
      if (this.region === '') {
        this.townships = null
      } else {
        this.townships = this.region.townships.data;
      }
    }
  }
}
</script>
