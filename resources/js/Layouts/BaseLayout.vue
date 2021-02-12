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
};
</script>
<style scoped>
</style>
