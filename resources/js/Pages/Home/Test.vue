<template>
  <base-layout>
    <div class="uk-section">
      <div class="uk-container">
        <div class="uk-grid-small uk-flex-center" uk-grid>
          <div>
            <ul>
              <li>Original: {{ original }}</li>
              <li>Encrypted: {{ encryptedText }}</li>
              <li>Decrypted: {{ decryptedText }}</li>
            </ul>
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
      original: 'heellooo',
      secret: '123456',
      encryptedText: '',
      decryptedText: ''
    }
  },
  props: {},
  methods: {},
  created() {
    this.encryptedText = window.CryptoJS.AES.encrypt(this.original, this.secret).toString();
    this.decryptedText = window.CryptoJS.AES.decrypt(this.encryptedText, this.secret).toString(window.CryptoJS.enc.Utf8);
  }
}
</script>
