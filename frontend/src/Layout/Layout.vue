<template>
  <v-app>
    <div class="loader loader-hide">
      <div class="loader-caption"></div>
      <span class="icon-spinner2" style="opacity: 1;"></span>
    <!--    <span class="icon-circle-o-notch"></span>-->
    </div>

    <Navigation />

    <v-main>
      <router-view></router-view>
    </v-main>
  </v-app>
  
</template>

<script>
import Navigation from '../components/nav/Navigation.vue';

export default {
  name: 'Layout',
  components: {
    Navigation,
  }
}
</script>

<style>
html, body {
  height: 100%;
  margin: 0;
  padding: 0;
}
h2 {
  text-align: center;
}
.loader span {
  opacity: 1;
  color: red;
  position: absolute;
  left: 50%;
  top: 30%;
  font-size: 60px;
  z-index: 1;
}
.loader-hide {
  display: none;
}
.loader-caption {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background-color: black;
  opacity: .7;
}
.loader-spinner {
  animation: loading 1.5s linear infinite;
}
@-webkit-keyframes loading {
  from {
    -webkit-transform: rotate(0deg);
  }
  to {
    -webkit-transform: rotate(360deg);
  }
}
@-moz-keyframes loading {
  from {
    -moz-transform: rotate(0deg);
  }
  to {
    -moz-transform: rotate(360deg);
  }
}
</style>