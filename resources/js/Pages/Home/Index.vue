<template>
  <base-layout>
    <div class="uk-section uk-section-primary uk-light">
      <div class="uk-container">
        <h3 class="">{{ translate('home.browse_listings_by') }}</h3>
        <form class="" uk-grid>
          <div class="uk-width-1-2@m uk-width-1-1@s">
            <label class="uk-hidden" for="region">{{ translate('main.select_region') }}</label>
            <select id="region" v-model="region" class="uk-select" @change="regionSelected()">
              <option value="">{{ translate('main.select_region') }}</option>
              <option v-for="data in regions.data" :value="data">{{ data.name }}</option>
            </select>
          </div>
          <div class="uk-width-1-2@m uk-width-1-1@s">
            <label class="uk-hidden" for="township">{{ translate('main.select_township') }}</label>
            <select id="township" v-model="township" class="uk-select" @change="townshipSelected()">
              <option value="">{{ translate('main.select_township') }}</option>
              <option v-for="data in townships" :value="data">{{ data.name }}</option>
            </select>
          </div>
        </form>
      </div>
    </div>

    <div class="uk-section">
      <div class="uk-container" uk-filter="target: .listing-filter; selActive: #reset_filter">
        <div class="uk-flex uk-flex-center" uk-grid>
          <button id="reset_filter" class="uk-button uk-button-secondary uk-margin-small-right" type="button"
                  uk-filter-control>{{ translate('home.all_types') }}
          </button>
          <button v-for="(value,key) in post_types" :uk-filter-control="'filter: .type-'+key"
                  class="uk-button uk-button-secondary uk-margin-small-right"
                  type="button">
            {{ translate('post.types.' + key) }}
          </button>
        </div>
        <!--        <h3 class="uk-heading-bullet">{{ translate('home.total_listings', {total: filtered_posts.length}) }}</h3>-->
        <ul class="uk-list listing-filter uk-margin-medium-top">
          <li v-for="post in filtered_posts" :class="'type-'+post.type">
            <a :href="route('view', {post: post})" class="uk-link-text">
              <span v-if="post.is_offer" class="uk-label uk-label-success">{{ translate('main.is_offer') }}</span>
              <span v-else class="uk-label uk-label-warning">{{ translate('main.not_offer') }}</span>
              {{ post.title }}
              <span class="uk-text-meta">@{{ post.location }}</span>
            </a>
          </li>
        </ul>
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
      listings: null,
    }
  },
  props: {
    regions: Object,
    post_types: Object,
    posts: Object
  },
  computed: {
    filtered_posts() {
      return this.posts.data.filter(post => {
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
    },
  },
  methods: {
    regionSelected() {
      this.reset_filter_button();
      this.township = '';
      if (this.region !== '') {
        this.townships = this.region.townships.data;
      }
    },
    townshipSelected() {
      this.reset_filter_button();
    },
    reset_filter_button() {
      document.getElementById('reset_filter').className = 'uk-active uk-button uk-button-secondary uk-margin-small-right';
    }
  }
}
</script>
