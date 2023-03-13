<template>
  <v-toolbar color="success">
    <v-app-bar-nav-icon></v-app-bar-nav-icon>

    <v-toolbar-title>Logo Title</v-toolbar-title>

    <v-spacer></v-spacer>

    <v-toolbar-title>Mon compte</v-toolbar-title>

  </v-toolbar>
  
  <v-tabs
    bg-color="white"
  >
    <RouterLink class="text-decoration-none text-success" to="/"><v-tab value="one">Accueil</v-tab></RouterLink>
    <RouterLink class="text-decoration-none text-success" to="/users"><v-tab>Utilisateurs</v-tab></RouterLink>
    <!-- <RouterLink class="text-decoration-none" to="/logout"><v-tab>Se deconnecter</v-tab></RouterLink> -->
    <RouterLink class="text-decoration-none text-success" to="/login"><v-tab>Se connecter</v-tab></RouterLink>
  </v-tabs>

</template>

<script>
import UserStore from '../../store/user.store';

const $userStore = new UserStore();

export default {
  name: "Navigation",
  data() {
    return {
      state: $userStore.state,
    }
  },
  computed: {
    isConnected: function() {



      return this.state.isConnected
    }
  }
}
</script>

<style>
nav a {
  margin-left: 10px;
}
.coucou {
    background: red!;
    height:200px;
}
</style>