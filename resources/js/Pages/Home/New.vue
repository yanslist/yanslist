<template>
  <base-layout>
    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-grid-small uk-flex-center" uk-grid>
          <div class="uk-width-3-4@m uk-width-expand@s">
            <h3>{{ translate('post.new.heading') }}</h3>
            <div class="uk-alert uk-alert-primary">
              {{ translate('post.new.help_text') }}
            </div>
            <form class="uk-grid-small" uk-grid @submit.prevent="submit">
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <div class="uk-form-label">{{ translate('post.new.aim') }}</div>
                <div class="uk-form-controls">
                  <label class="uk-margin-small-right">
                    <input v-model="form.is_offer" :value="true" class="uk-radio" name="is_offer" type="radio">&nbsp;
                    {{ translate('post.new.is_offer') }}
                  </label>
                  <label class="uk-margin-small-right">
                    <input v-model="form.is_offer" :value="false" class="uk-radio" name="is_offer" type="radio">&nbsp;
                    {{ translate('post.new.not_offer') }}
                  </label>
                </div>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <div class="uk-form-label">{{ translate('post.new.expire_at') }}</div>
                <div class="uk-form-controls">
                  <label v-for="(value, key) in expire_options" :key="key" class="uk-margin-small-right">
                    <input v-model="form.expire_at" :value="key" class="uk-radio" name="expire_at" type="radio">
                    {{ translate('post.expire_options.' + key) }}
                  </label>
                </div>
              </div>
              <div class="uk-width-1-1@s">
                <div class="uk-form-label">{{ translate('post.new.post_type') }}</div>
                <div class="uk-form-controls">
                  <label v-for="(value, key) in post_types" :key="key" class="uk-margin-small-right">
                    <input v-model="form.type" :value="key" class="uk-radio" name="type" type="radio">
                    {{ translate('post.types.' + key) }}
                  </label>
                </div>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <label class="uk-form-label" for="region">{{ translate('post.new.region') }}</label>
                <div class="uk-form-controls">
                  <select id="region" v-model="form.region_id" class="uk-select" @change="regionSelected()">
                    <option value="">{{ translate('main.select_region') }}</option>
                    <option v-for="data in regions.data" :value="data">{{ data.name }}</option>
                  </select>
                </div>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <label class="uk-form-label" for="township">{{ translate('post.new.township') }}</label>
                <div class="uk-form-controls">
                  <select id="township" v-model="form.township_id" class="uk-select">
                    <option value="">{{ translate('main.select_township') }}</option>
                    <option v-for="data in townships" :value="data">{{ data.name }}</option>
                  </select>
                </div>
              </div>
              <div class="uk-width-1-1@s">
                <label class="uk-form-label" for="title">{{ translate('post.new.title') }}</label>
                <div class="uk-form-controls">
                  <input id="title" v-model="form.title" :placeholder="translate('post.new.title_placeholder')"
                         class="uk-input" name="title"
                         type="text">
                </div>
              </div>
              <div class="uk-width-1-1@s">
                <label class="uk-form-label" for="body">{{ translate('post.new.body') }}</label>
                <div class="uk-form-controls">
                  <textarea id="body" v-model="form.body" :placeholder="translate('post.new.body_placeholder')"
                            class="uk-textarea" name="body"
                            rows="5"></textarea>
                </div>
              </div>
              <div class="uk-width-1-1@s">
                <p class="uk-text-meta uk-text-small">
                  {{ translate('post.new.email_info') }}<br>
                  {{ translate('post.new.submit_info') }}
                </p>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <label class="uk-form-label" for="email">
                  {{ translate('post.new.email') }}
                </label>
                <div class="uk-form-controls">
                  <input id="email" v-model="form.email" :placeholder="translate('post.new.email_placeholder')"
                         class="uk-input" name="email"
                         type="email">
                </div>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <br class="uk-visible@m">
                <div class="uk-form-controls">
                  <template v-if="appEnv!=='local'">
                    <vue-recaptcha
                        ref="recaptcha"
                        :sitekey="recaptchaSiteKey"
                        size="invisible"
                        @expired="onCaptchaExpired"
                        @verify="onCaptchaVerified">
                    </vue-recaptcha>
                  </template>
                  <button id="submit_btn" class="uk-button uk-button-primary uk-width-1-1" type="submit">
                    {{ translate('post.new.submit') }}
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
import VueRecaptcha from 'vue-recaptcha';

export default {
  components: {
    BaseLayout,
    VueRecaptcha
  },
  data() {
    return {
      recaptchaSiteKey: process.env.MIX_RECAPTCHA_SITEKEY,
      appEnv: process.env.MIX_APP_ENV,
      townships: null,
      form: {
        is_offer: true,
        region_id: '',
        township_id: '',
        type: '',
        expire_at: '',
        title: '',
        body: '',
        email: '',
        recaptcha_token: ''
      },
    }
  },
  props: {
    regions: Object,
    post_types: Object,
    default_post_type: String,
    expire_options: Object,
    default_expire_option: String,
  },
  methods: {
    regionSelected() {
      if (this.form.region_id === '') {
        this.townships = null
      } else {
        this.townships = this.form.region_id.townships.data;
      }
    },
    submit() {
      if (this.appEnv === 'local') {
        this.save();
      } else {
        this.$refs.recaptcha.execute();
      }
    },
    onCaptchaVerified: function (recaptchaToken) {
      const self = this;
      self.$refs.recaptcha.reset();
      this.save();
    },
    onCaptchaExpired: function () {
      this.$refs.recaptcha.reset();
    },
    save() {
      this.form.region_id = this.form.region_id.id;
      this.form.township_id = this.form.township_id.id;
      this.form.recaptcha_token = (this.appEnv === 'local') ? true : recaptchaToken;
      this.$inertia.post(route('store'), this.form);
    }
  },
  mounted() {
    this.form.type = this.default_post_type;
    this.form.expire_at = this.default_expire_option;
  }
}
</script>
