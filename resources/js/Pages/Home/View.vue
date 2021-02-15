<template>
  <base-layout>

    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-flex-center uk-flex-middle uk-grid-small" uk-grid>
          <div class="uk-padding-large">
            <article class="uk-article">
              <h3 class="uk-article-title">
                {{ translate('post.types.' + post.type) }}
                <small>
                  <span v-if="post.is_offer" class="uk-label uk-label-success">{{
                      translate('main.is_offer')
                    }}</span>
                  <span v-else class="uk-label uk-label-warning">{{ translate('main.not_offer') }}</span>
                </small>
              </h3>
              <hr class="uk-divider-small">
              <h3>
                {{ post.title }}
              </h3>
              <p class="uk-text-meta">{{ post.duration }} @{{ post.location }}</p>
              <p>{{ post.body }}</p>
            </article>
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
    return {}
  },
  props: {
    post_types: Object,
    post: Object
  },
  computed: {},
  methods: {},
}
</script>
