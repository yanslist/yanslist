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

        <div class="uk-grid-large" uk-grid="masonry: true">

          <div class="uk-width-2-3@m uk-width-1-1@s">
            <article class="uk-article uk-width-1-1@s">
              <h3>
                {{ post.title }}
              </h3>
              <p class="uk-text-meta">
                Until {{ post.duration }} @{{ post.location }}
              </p>
              <p v-html="post.body"></p>
            </article>
          </div>

          <div class="uk-width-1-3@m uk-width-1-1@s">
            <h3 class="uk-heading-bullet">{{ translate('comment.heading') }}</h3>
            <p class="uk-text-meta">{{ translate('comment.text') }}</p>
            <form class="uk-grid-small" uk-grid @submit.prevent="submit">
              <div class="uk-width-1-1@s">
                <textarea id="" v-model="comment_form.text" :placeholder="translate('comment.new.placeholder')"
                          class="uk-textarea" name="text"
                          required rows="5"></textarea>
              </div>
              <div class="uk-width-1-1@s">
                <label for="is_message"><input id="is_message" v-model="comment_form.is_message" class="uk-checkbox"
                                               name="is_message" type="checkbox">
                  {{ translate('comment.new.is_message') }}</label>
              </div>
              <div class="uk-width-1-1@s">
                <template v-if="appEnv!=='local'">
                  <vue-recaptcha
                      ref="recaptcha"
                      :sitekey="recaptchaSiteKey"
                      size="invisible"
                      badge="inline"
                      @expired="onCaptchaExpired"
                      @verify="onCaptchaVerified">
                  </vue-recaptcha>
                </template>
                <button id="submit_btn" class="uk-button uk-width-1-1" type="submit">
                  <template v-if="comment_form.is_message">
                    {{ translate('comment.new.message_submit') }}
                  </template>
                  <template v-else>
                    {{ translate('comment.new.comment_submit') }}
                  </template>
                </button>
              </div>
            </form>

            <h3 class="uk-heading-bullet">{{ translate('main.share') }}</h3>
            <img :alt="post.title" :data-src="post.ogs.image" uk-img>
            <br>
            <share-component :qrcode="post.qrcode" :share-links="share_links" class="uk-margin"></share-component>
            <div class="uk-inline uk-width-1-1">
              <a class="uk-form-icon uk-form-icon-flip" href="#" uk-icon="icon: link"
                 @click.prevent="copyUrl(post.short_url)"></a>
              <input id="url_copy" v-model="post.short_url" class="uk-input" readonly type="text">
            </div>
          </div>

          <div class="uk-width-1-2@m uk-width-1-1@s">
            <h3 class="uk-heading-bullet">{{ translate('comment.count', {count: total_comments}) }}</h3>
            <dl class="uk-description-list uk-description-list-divider" uk-margin>
              <template v-for="comment, index in comments.data">
                <dt>
                  <mark>{{ comment.time_ago }}</mark>
                  <small class="uk-text-meta"> {{ comment.created_at }}</small>
                </dt>
                <dd>{{ comment.text }}</dd>
              </template>
            </dl>
          </div>

        </div>
      </div>

    </div>

  </base-layout>
</template>

<script>
import BaseLayout from "../Layouts/BaseLayout";
import helpers from "../helpers";
import ShareComponent from "../components/ShareComponent";

export default {
  mixins: [helpers],
  components: {
    BaseLayout,
    ShareComponent,
  },
  metaInfo() {
    return {
      meta: [
        {name: 'title', content: this.post.ogs.title},
        {name: 'description', content: this.post.ogs.description},
        {name: 'og:type', content: this.post.ogs.type},
        {name: 'og:url', content: this.post.ogs.url},
        {name: 'og:title', content: this.post.ogs.title},
        {name: 'og:description', content: this.post.ogs.description},
        {name: 'og:image', content: this.post.ogs.image}
      ]
    }
  },
  data() {
    return {
      recaptchaSiteKey: process.env.MIX_RECAPTCHA_SITEKEY,
      appEnv: process.env.MIX_APP_ENV,
      comment_form: {
        text: '',
        is_message: false,
        recaptcha_token: ''
      },
      total_comments: 0,
    }
  },
  props: {
    post_types: Object,
    post: Object,
    comments: Object,
    share_links: Object,
  },
  computed: {},
  methods: {
    submit() {
      if (this.appEnv === 'local') {
        this.save(true);
      } else {
        this.$refs.recaptcha.execute();
      }
    },
    onCaptchaVerified: function (recaptchaToken) {
      const self = this;
      self.$refs.recaptcha.reset();
      this.save(recaptchaToken);
    },
    onCaptchaExpired: function () {
      this.$refs.recaptcha.reset();
    },
    save(recaptchaToken) {
      this.comment_form.recaptcha_token = recaptchaToken;
      // transform true, false into 1, 0
      this.comment_form.is_message = this.comment_form.is_message * 1;
      window.axios.post(route('api.posts.comment', {post: this.post}), this.comment_form)
          .then((res) => {
            if (!this.comment_form.is_message) {
              this.total_comments += 1;
              this.comments.data.unshift(res.data);
            }

            this.comment_form.text = '';
            this.comment_form.is_message = false;

            this.showNoti('success', this.translate('comment.new.noti'));
          });
    },
    copyUrl(url) {
      let el = document.getElementById('url_copy');
      el.select();
      document.execCommand('copy');
    }
  },
  created() {
    this.total_comments = this.comments.data.length;
  }
}
</script>
