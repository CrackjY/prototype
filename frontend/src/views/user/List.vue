<template>
  <h2>Utilisateurs</h2>

  <ul>
    <li v-for="(user, key) in users" v-bind:key="key">
      {{ user.id }} {{ user.email }}
    </li>
  </ul>

</template>

<script>
import axios from "axios";
import config from "@/security/api";
import loader from "@/components/loader/loader";

export default {
  data() {
    return {
      users: this.getUsers(),
    }
  },
  methods: {
    getUsers() {
      //loader.enable()
      return axios.get(config.url+'/admin/users', {
        headers: config.headers
      })
          .then(response => {
            this.users = JSON.parse(response.data)
          })
          .catch(error => console.log(error))
          .finally(() => loader.clear())
    }
  }
}
</script>

<style>
</style>
