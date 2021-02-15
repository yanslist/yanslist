<template>
  <base-layout>

    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-flex-center uk-flex-middle uk-grid-small" uk-grid>
          <article class="uk-article uk-width-1-1@s">
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
            <div class="uk-grid-small" uk-grid>
              <!--              <div>-->
              <!--                <a class="uk-button uk-button-text" href="#">Edit</a>-->
              <!--              </div>-->
              <div>
                <a class="uk-button uk-button-text" href="#">5 Comments</a>
              </div>
            </div>
          </article>
          <div class="uk-width-2-3@s">
            <form class="uk-grid-small" uk-grid>
              <div class="uk-width-1-1@s">
                <textarea id="" class="uk-textarea" name="" placeholder="Enter comment" rows="3"></textarea>
              </div>
              <div class="uk-width-2-3@m uk-width-1-1@s">
                <input class="uk-input" placeholder="Contact info" type="text">
              </div>
              <div class="uk-width-1-3@m uk-width-1-1@s">
                <button class="uk-button uk-width-1-1">Comment</button>
              </div>
            </form>
            <dl class="uk-description-list uk-description-list-divider uk-margin-medium-top">
              <dt>Description term</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</dd>
              <dt>Description term</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
              </dd>
              <dt>Description term</dt>
              <dd>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.
              </dd>
            </dl>
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
