<!-- <template>
  <h1>Authentification</h1>

  <div class="form-login">
    <div class="form-row">
      <input type="email" v-model="credantials.email" autocomplete="off">
    </div>

    <div class="form-row">
      <input type="password" v-model="credantials.password" autocomplete="off">
    </div>

    <div>
      <button @click="login" type="button">Se connecter</button>
    </div>
  </div>
</template> -->

<template>
  <v-sheet class="pa-12" rounded>
    <v-card class="mx-auto px-6 py-8" max-width="344">
      <v-form>
        <v-text-field
          v-model="credantials.email"
          :rules="[required]"
          class="mb-2"
          clearable
          label="Email"
        ></v-text-field>

        <v-text-field
          v-model="credantials.password"
          :rules="[required]"
          clearable
          label="Mot de passe"
          placeholder=""
        ></v-text-field>

        <br>

        <v-btn
          block
          color="success"
          size="large"
          type="button"
          variant="elevated"
          @click="login"
        >
          Se connecter
        </v-btn>
      </v-form>
    </v-card>
  </v-sheet>
</template>

<script>
  import axios from "axios"
  import loader from "@/components/loader/loader"
  import UserStore from "../store/user.store"

  export default {
    data() {
      return {
        credantials: {
          email: '',
          password: ''
        }
      }
    },
    methods: {
      async login() {
        const user = {
          email: this.credantials.email,
          password: this.credantials.password
        }
        // loader.enable()
        await axios.post('http://prototype.com.local/api/login_check', user, {
          'Content-Type': 'application/json',
        })
            .then(response => {

              if (response.data.token) {
                localStorage.setItem('user', JSON.stringify(response.data))

                this.$router.push({ name: 'home' })
              }

              return response.data
            })
            .catch(error => console.log(error))
            .finally(() => {
              //loader.clear()
              const $userStore = new UserStore();
              $userStore.getIsConnected()
            })
      },
      required (v) {
        return !!v || 'Field is required'
      },
    }
  }
</script>

<style>
  .form-row {
    margin-bottom: 10px;
  }
</style>