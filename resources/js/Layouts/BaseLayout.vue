<template>
  <div>
    <header-component></header-component>
    <slot/>
    <footer-component></footer-component>
  </div>
</template>
<script>
import HeaderComponent from "../components/HeaderComponent";
import FooterComponent from "../components/FooterComponent";
import helpers from "../helpers";

export default {
  mixins: [helpers],
  name: "BaseLayout",
  components: {
    HeaderComponent,
    FooterComponent
  },
  mounted() {
    if (this.$page.props.flash.message) {
      const icon = (this.$page.props.flash.type === 'danger') ? 'warning' : 'bell';
      const msg = "<span uk-icon='icon: " + icon + "'></span> " + this.$page.props.flash.message;
      this.showNoti(this.$page.props.flash.type, msg);
    }
  }
};
</script>
<style scoped>
</style>
