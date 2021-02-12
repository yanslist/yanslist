<template>
  <base-layout>
    <div class="uk-section">
      <div class="uk-container">
        <h3>New Listing</h3>
        <form class="" uk-grid>
          <div class="uk-width-1-3@m uk-width-1-1@s">
            <select class="uk-select">
              <option value="">Select Region</option>
              <option>Option 01</option>
              <option>Option 02</option>
            </select>
          </div>
          <div class="uk-width-1-3@m uk-width-1-1@s">
            <select class="uk-select">
              <option value="">Select Township</option>
              <option>Option 01</option>
              <option>Option 02</option>
            </select>
          </div>
          <div class="uk-width-1-3@m uk-width-1-1@s">
            <button class="uk-button uk-button-primary" type="submit">Search</button>
          </div>
        </form>
      </div>
    </div>

    <InertiaLink :href="route('test')">
      All posts
    </InertiaLink>
  </base-layout>
</template>

<script>
import BaseLayout from "../../Layouts/BaseLayout";

export default {
  components: {
    BaseLayout,
  },
  props: {},
}
</script>
