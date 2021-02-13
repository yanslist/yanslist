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

export default {
  name: "BaseLayout",
  components: {
    HeaderComponent,
    FooterComponent
  },
  mounted() {
    if (this.$page.props.flash.message) {
      const icon = (this.$page.props.flash.type === 'danger') ? 'warning' : 'bell';
      const msg = "<span uk-icon='icon: " + icon + "'></span> ";
      window.UIkit.notification({
        message: msg + this.$page.props.flash.message,
        status: this.$page.props.flash.type,
        pos: 'top-right',
      });
    }
  }
};
</script>
<style scoped>
</style>
