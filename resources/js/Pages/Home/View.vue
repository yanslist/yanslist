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
              <form class="uk-grid-small" uk-grid @submit.prevent="tokenSubmit">
                <div class="uk-width-1-2@s">
                  <input v-model="token_form.token" :placeholder="translate('comment.view.placeholder')"
                         class="uk-input" required type="text">
                </div>
                <div class="uk-width-1-2@s">
                  <button v-if="!token_match" class="uk-button uk-button-secondary" type="submit">
                    {{ translate('comment.view.submit', {count: comment_count}) }}
                  </button>
                  <button v-else class="uk-button uk-button-secondary" type="button"
                          uk-toggle="target: #comments-modal">
                    {{ translate('comment.view.submit', {count: comment_count}) }}
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

      <div id="comments-modal" class="uk-modal-full" uk-modal>
        <div class="uk-modal-dialog">
          <button class="uk-modal-close-full uk-button uk-padding-small uk-padding-remove-vertical" type="button">
            {{ translate('main.close') }}
          </button>
          <div class="uk-grid-small uk-flex uk-flex-center" uk-grid>
            <div class="uk-width-1-2@s uk-padding-large uk-height-viewport">
              <h3 class="uk-heading-bullet">{{ translate('comment.view.heading') }}</h3>
              <dl class="uk-description-list uk-description-list-divider" uk-margin>
                <template v-for="comment, index in comments">
                  <dt>
                    <mark>#{{ index + 1 }}</mark>
                    {{ comment.time_ago }}
                    <small class="uk-text-meta">| {{ comment.created_at }}</small>
                  </dt>
                  <dd>{{ comment.text }}</dd>
                </template>
              </dl>
            </div>
          </div>
        </div>
      </div>
    </div>

  </base-layout>
</template>

<script>
import BaseLayout from "../../Layouts/BaseLayout";
import helpers from "../../helpers";

export default {
  mixins: [helpers],
  components: {
    BaseLayout,
  },
  data() {
    return {
      token_form: {
        token: '',
      },
      token_match: false,
      comments: [],
    }
  },
  props: {
    post_types: Object,
    post: Object,
    comment_count: Number
  },
  computed: {},
  methods: {
    tokenSubmit() {
      window.axios.post(route('api.posts.comments', {post: this.post}), this.token_form)
          .then((res) => {
            if (res.data === false) {
              this.token_match = false;
              this.comments = [];
              this.showNoti('danger', this.translate('comment.view.token_not_match'));
            } else {
              this.token_match = true;
              this.comments = res.data.data;
              window.UIkit.modal(document.getElementById('comments-modal')).show();
              this.showNoti('success', this.translate('comment.view.token_match'));
            }
          });
    },
  },
}
</script>
