<template>
  <base-layout>
    <div class="uk-section uk-margin">
      <div class="uk-container">
        <div class="uk-grid-small uk-flex-center" uk-grid>
          <div class="uk-width-2-3">
            <h3>{{ translate('post.new.heading') }}</h3>
            <form class="uk-grid-small" uk-grid>
              <div class="uk-width-1-1">
                <div class="uk-form-controls">
                  <label class="uk-margin-small-right"><input checked class="uk-radio" name="is_offer" type="radio"
                                                              value="1"> {{ translate('post.new.is_offer') }}</label>
                  <label class="uk-margin-small-right"><input class="uk-radio" name="is_offer" type="radio" value="0">
                    {{ translate('post.new.not_offer') }}</label>
                </div>
              </div>
              <div class="uk-width-1-2">
                <label class="uk-form-label" for="region">{{ translate('post.new.region') }}</label>
                <div class="uk-form-controls">
                  <select id="region" v-model="region" class="uk-select" @change="regionSelected()">
                    <option value="">{{ translate('main.select_region') }}</option>
                    <option v-for="data in regions.data" :value="data">{{ data.name }}</option>
                  </select>
                </div>
              </div>
              <div class="uk-width-1-2">
                <label class="uk-form-label" for="township">{{ translate('post.new.township') }}</label>
                <div class="uk-form-controls">
                  <select id="township" v-model="township" class="uk-select">
                    <option value="">{{ translate('main.select_township') }}</option>
                    <option v-for="data in townships" :value="data">{{ data.name }}</option>
                  </select>
                </div>
              </div>
              <div class="uk-width-1-1">
                <div class="uk-form-label">{{ translate('post.new.type') }}</div>
                <div class="uk-form-controls">
                  <label v-for="(value, key) in post_types" :key="key" class="uk-margin-small-right">
                    <input v-model="type" :value="key" checked class="uk-radio" name="type" type="radio">
                    {{ translate('post.types.' + key) }}
                  </label>
                </div>
              </div>
              <div class="uk-width-1-1">
                <label class="uk-form-label" for="title">{{ translate('post.new.title') }}</label>
                <div class="uk-form-controls">
                  <input id="title" :placeholder="translate('post.new.title_placeholder')" class="uk-input" name="title"
                         type="text">
                </div>
              </div>
              <div class="uk-width-1-1">
                <label class="uk-form-label" for="body">{{ translate('post.new.body') }}</label>
                <div class="uk-form-controls">
                  <textarea id="body" :placeholder="translate('post.new.body_placeholder')" class="uk-textarea"
                            name="body" rows="10"></textarea>
                </div>
              </div>
              <div class="uk-width-1-1">
                <div class="uk-form-controls">
                  <button class="uk-button uk-button-primary uk-width-1-1" type="submit">{{
                      translate('post.new.submit')
                    }}
                  </button>
                </div>
              </div>
            </form>
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
    post_types: Object
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
