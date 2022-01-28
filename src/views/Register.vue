<template>
  <div class="register bgPage pt-4">
    <div class="block">
      <h1 class="text-warning pb-4">S'enregistrer</h1>
      <div class>
        <form class>
          <div>
            <input
              v-model="name"
              type="name"
              name="name"
              class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
              autocomplete="off"
              placeholder="Identifiant"
              required
            />
          </div>
          <div>
            <input
              v-model="email"
              type="email"
              name="email"
              class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
              autocomplete="off"
              placeholder="Email"
              required
            />
          </div>
          <div>
            <input
              v-model="password"
              type="password"
              name="password"
              class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
              autocomplete="off"
              placeholder="Mot de passe"
              required
            />
          </div>
          <div>
            <input
              v-model="password_confirmation"
              type="password"
              name="confirmPassword"
              class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
              autocomplete="off"
              placeholder="Confirmation"
              required
            />
          </div>

          <div class="flex items-start mb-6">
            <div class="flex items-center h-5">
              <input
                id="mentionslegales"
                aria-describedby="mentionslegales"
                type="checkbox"
                class="bg-gray-50 border-gray-300 focus:ring-3 focus:ring-blue-300 h-4 w-4 rounded"
                required
              />
            </div>
            <div class="text-sm ml-3">
              <label
                for="mentionslegales"
                class="font-medium text-light"
              >J’accepte les mentions légales</label>
            </div>
          </div>

          <button class="btn btn-success" id="login" type="submit" @click="signin">
            <span>S'enregister</span>
          </button>
        </form>
      </div>
    </div>
    <div class="block">
      <router-link to="/login">
        <p class="text-warning text-center pt-4">Déjà inscrit ? C’est par là !</p>
      </router-link>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios';
export default {
  name: "Register",
  components: {},
  data: () => {
    return {
      name: "",
      email: "",
      password: "",
      password_confirmation: "",
    };
  },
  methods: {
    signin(event) {
      event.preventDefault()
      var config = {
        method: 'post',
        url: 'http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/users?username=' + this.name + '&email=' + this.email + '&password=' + this.password,
        headers: {
        }
      };

      axios(config)
        .then(function (response) {
          console.log(JSON.stringify(response.data));
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  }
};
</script>

<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}
a {
  color: #42b983;
}
.bgPage {
  background-color: rgb(54, 54, 54);
}

.register {
  min-height: 100vh;
}
</style>
