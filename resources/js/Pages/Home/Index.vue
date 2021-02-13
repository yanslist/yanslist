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
            <select id="township" v-model="township" class="uk-select">
              <option value="">{{ translate('main.select_township') }}</option>
              <option v-for="data in townships" :value="data">{{ data.name }}</option>
            </select>
          </div>
        </form>
      </div>
    </div>

    <div id="post-modal" class="uk-modal-full" uk-modal>
      <div class="uk-modal-dialog">
        <button class="uk-modal-close-full uk-close-large" type="button" uk-close></button>
        <div class="uk-grid-small uk-child-width-auto uk-flex-center uk-flex-middle" uk-grid>
          <div class="uk-padding-large uk-height-viewport">
            <h1>Headline</h1>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
              dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex
              ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
              fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt
              mollit anim id est laborum.</p>
          </div>
        </div>
      </div>
    </div>

    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-grid-large" uk-grid>
          <div v-for="(value, key) in post_types" class="uk-width-1-2@m uk-width-1-1@s">
            <h2>{{ translate('post.types.' + key) }}</h2>
            <ul class="uk-list">
              <li v-for="post in filtered_posts[key]">
                <a :href="post.slug" class="uk-link-text" @click.prevent="openModal()">
                  <span v-if="post.is_offer" class="uk-label uk-label-success">{{ translate('main.is_offer') }}</span>
                  <span v-else class="uk-label uk-label-warning">{{ translate('main.not_offer') }}</span>
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
    regionSelected() {
      if (this.region === '') {
        this.townships = null
      } else {
        this.townships = this.region.townships.data;
      }
    },
    openModal() {
      window.UIkit.modal(document.getElementById('post-modal')).show();
    }
  }
}
</script>
