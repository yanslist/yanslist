<template>
  <base-layout>
    <div class="uk-section uk-section-primary">
      <div class="uk-container">
        <h3>{{ translate('home.browse_listings_by') }}</h3>
        <form class="" uk-grid @submit.prevent="form.post('/new')">
          <div class="uk-width-1-3@m uk-width-1-1@s">
            <select v-model="form.region" class="uk-select" @change="getTownships()">
              <option value="">{{ translate('home.select_region') }}</option>
              <option v-for="data in regions.data" :value="data">{{ data.name }}</option>
            </select>
          </div>
          <div class="uk-width-1-3@m uk-width-1-1@s">
            <select v-model="form.township" class="uk-select">
              <option value="">{{ translate('home.select_township') }}</option>
              <option v-for="data in townships" :value="data">{{ data.name }}</option>
            </select>
          </div>
          <div class="uk-width-1-3@m uk-width-1-1@s">
            <button :disabled="form.processing" class="uk-button uk-button-primary" type="submit">
              {{ translate('home.search') }}
            </button>
          </div>
        </form>
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
      townships: null,
      form: this.$inertia.form({
        region: '',
        township: '',
      }),
    }
  },
  props: {
    regions: Object,
    post_types: Object
  },
  methods: {
    getTownships: function () {
      this.townships = this.form.region.townships.data;
    },
    submit() {
      this.form
          .transform((data) => ({
            ...data,
            region: data.region.id,
            township: data.township.id
          }))
          .post('/new');
    },
  },
}
</script>
