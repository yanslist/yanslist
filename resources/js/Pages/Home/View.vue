<template>
  <base-layout>

    <div class="uk-section">
      <div class="uk-container">

        <h3 class="uk-article-title">
          {{ translate('post.types.' + post.type) }}
          <small>
            <span v-if="post.is_offer" class="uk-label uk-label-success">
              {{ translate('main.is_offer') }}
            </span>
            <span v-else class="uk-label uk-label-warning">{{ translate('main.not_offer') }}</span>
          </small>
        </h3>

        <hr class="uk-divider-small">

        <div class="uk-grid-large" uk-grid>

          <article class="uk-article uk-width-2-3@m uk-width-1-1@s">
            <h3>
              {{ post.title }}
            </h3>
            <p class="uk-text-meta">{{ post.duration }} @{{ post.location }}</p>
            <p>{{ post.body }}</p>

            <div class="uk-margin">
              <hr class="">
              <p class="uk-text-meta uk-text-small">{{ translate('comment.view.text') }}</p>
              <form class="uk-grid-small" uk-grid>
                <div class="uk-width-1-2@s">
                  <input :placeholder="translate('comment.view.placeholder')" class="uk-input" type="text">
                </div>
                <div class="uk-width-1-2@s">
                  <button class="uk-button uk-button-secondary" type="submit">
                    {{ translate('comment.view.submit', {count: 5}) }}
                  </button>
                </div>
              </form>
            </div>
          </article>

          <div class="uk-width-1-3@m uk-width-1-1@s">
            <h3 class="uk-heading-bullet">{{ translate('comment.new.text') }}</h3>
            <form class="uk-grid-small" uk-grid>
              <div class="uk-width-1-1@s">
                <textarea id="" :placeholder="translate('comment.new.placeholder')" class="uk-textarea" name=""
                          rows="5"></textarea>
              </div>
              <div class="uk-width-1-1@s">
                <button class="uk-button uk-align-right">{{ translate('comment.new.submit') }}</button>
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
