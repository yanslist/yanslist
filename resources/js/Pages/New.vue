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
                    <input v-model="form.is_offer" :value="1" class="uk-radio" name="is_offer" type="radio">
                    {{ translate('post.new.is_offer') }}
                  </label>
                  <label class="uk-margin-small-right">
                    <input v-model="form.is_offer" :value="0" class="uk-radio" name="is_offer" type="radio">&nbsp;
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
                  <select id="region" v-model="form.region_id" class="uk-select" required @change="regionSelected()">
                    <option value="">{{ translate('main.select_region') }}</option>
                    <option v-for="data in regions.data" :value="data.id">{{ data.name }}</option>
                  </select>
                </div>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <label class="uk-form-label" for="township">{{ translate('post.new.township') }}</label>
                <div class="uk-form-controls">
                  <select id="township" v-model="form.township_id" class="uk-select" required>
                    <option value="">{{ translate('main.select_township') }}</option>
                    <option v-for="data in townships" :value="data.id">{{ data.name }}</option>
                  </select>
                </div>
              </div>
              <div class="uk-width-1-1@s">
                <label class="uk-form-label" for="title">{{ translate('post.new.title') }}</label>
                <div class="uk-form-controls">
                  <input id="title" v-model="form.title" :placeholder="translate('post.new.title_placeholder')"
                         :class="{ 'uk-form-danger': errors.title }" class="uk-input"
                         maxlength="200" minlength="20" name="title" required type="text">
                  <p v-if="errors.title" class="uk-text-danger">{{ translate(errors.title) }}</p>
                </div>
              </div>
              <div class="uk-width-1-1@s">
                <label class="uk-form-label" for="body">{{ translate('post.new.body') }}</label>
                <div class="uk-form-controls">
                  <!--                  <textarea id="body" v-model="form.body" :placeholder="translate('post.new.body_placeholder')"-->
                  <!--                            :class="{ 'uk-form-danger': errors.body }" class="uk-textarea"-->
                  <!--                            minlength="20" name="body" required rows="5"></textarea>-->
                  <ckeditor v-model="form.body" :config="editorConfig" :editor="editor"></ckeditor>
                  <p v-if="errors.body" class="uk-text-danger">{{ translate(errors.body) }}</p>
                </div>
              </div>
              <div class="uk-width-1-1@s">
                <p class="uk-text-meta uk-text-small">
                  {{ translate('post.new.email_info') }}
                </p>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <label class="uk-form-label" for="email">
                  {{ translate('post.new.email') }}
                </label>
                <div class="uk-form-controls">
                  <input id="email" v-model="form.email" :placeholder="translate('post.new.email_placeholder')"
                         :class="{ 'uk-form-danger': errors.email }" class="uk-input"
                         name="email" required type="email">
                  <p v-if="errors.email" class="uk-text-danger">{{ translate(errors.email) }}</p>
                </div>
              </div>
              <div class="uk-width-1-2@m uk-width-1-1@s">
                <span class="uk-text-meta uk-text-small">{{ translate('post.new.submit_info') }}</span>
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
import CKEditor from '@ckeditor/ckeditor5-vue2';
import ClassicEditor from '@ckeditor/ckeditor5-build-classic';

export default {
  components: {
    BaseLayout,
    VueRecaptcha,
    ckeditor: CKEditor.component
  },
  data() {
    return {
      recaptchaSiteKey: process.env.MIX_RECAPTCHA_SITEKEY,
      appEnv: process.env.MIX_APP_ENV,
      townships: null,
      form: {
        is_offer: 1,
        region_id: '',
        township_id: '',
        type: '',
        expire_at: '',
        title: '',
        body: '',
        email: '',
        recaptcha_token: ''
      },
      editor: ClassicEditor,
      editorConfig: {
        toolbar: ['bold', 'italic', 'bulletedList', 'numberedList', 'link'],
        placeholder: this.translate('post.new.body_placeholder')
      }
    }
  },
  props: {
    regions: Object,
    post_types: Object,
    default_post_type: String,
    expire_options: Object,
    default_expire_option: String,
    errors: Object
  },
  methods: {
    regionSelected() {
      if (this.form.region_id === '') {
        this.townships = null
      } else {
        const reg = this.regions.data.filter(region => region.id === this.form.region_id);
        this.townships = reg[0].townships.data;
      }
    },
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
      this.form.recaptcha_token = recaptchaToken;
      this.$inertia.post(route('store'), this.form);
    }
  },
  mounted() {
    this.form.type = this.default_post_type;
    this.form.expire_at = this.default_expire_option;
  }
}
</script>

<style>
.ck.ck-editor__main > .ck-editor__editable {
  background-color: #fffade;
}

.ck.ck-toolbar, .ck.ck-editor__editable_inline {
  border: 0px;
}

.ck.ck-editor__editable:not(.ck-editor__nested-editable).ck-focused {
  border-color: #fffade;
  box-shadow: none;
}

.ck.ck-placeholder:before, .ck .ck-placeholder:before {
  color: #D1C6FF;
}
</style>
