<template>
  <nav class="navbar navbar-expand-lg navbar-dark bgNav">
    <router-link to="/">
      <a class="navbar-brand" href="#">MyReddit</a>
    </router-link>
    <button
      class="navbar-toggler"
      type="button"
      data-toggle="collapse"
      data-target="#navbarTogglerDemo02"
      aria-controls="navbarTogglerDemo02"
      aria-expanded="false"
      aria-label="Toggle navigation"
    >
      <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
      <ul class="navbar-nav mr-auto mt-2 mt-lg-0"></ul>
      <ul class="navbar-nav mt-2 mt-lg-0">
        <li class="nav-item" v-if="user">
          <a class="nav-link" @click="logout()" href="#">Se déconnecter</a>
        </li>
        <li class="nav-item" v-else>
          <router-link to="/login">
            <a class="nav-link" href="#">Se connecter</a>
          </router-link>
        </li>
      </ul>
    </div>
  </nav>
</template>

<script>
import { getUser, logoutUser } from "../utils/userUtils"

export default {
  name: 'AddPost',
  created() {
    this.user = getUser()
  },
  data() {
    return {
      user: undefined,
    }
  },
  methods: {
    logout() {
      logoutUser();
      this.$router.push({ name: 'Login' });
    }
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
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
.bgNav {
  background-color: rgb(41, 39, 39);
}
</style>
