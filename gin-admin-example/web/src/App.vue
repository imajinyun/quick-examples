<template>
  <div id="app">
    <router-view></router-view>
  </div>
</template>

<script>
export default {
  name: "app",
  components: {},
};
</script>

<style lang="scss">
@import "@/style/main.scss";
@import "@/style/base.scss";
@import "@/style/mobile.scss";

#app {
  background: #eee;
  height: 100vh;
  overflow: hidden;
}
</style>
