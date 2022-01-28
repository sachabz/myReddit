<template>
    <div class="Login bgPage">
        <div class="flex justify-center items-center">
            <form class="p-10 rounded flex justify-center items-center flex-col shadow-md">
                <h1 class="text-light p-4">Connexion</h1>
                <div>
                    <input
                        v-model="login.username"
                        type="email"
                        name="username"
                        class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
                        autocomplete="off"
                        placeholder="Identifiant"
                        required
                    />
                </div>
                <div>
                    <input
                        v-model="login.password"
                        type="password"
                        name="password"
                        class="mb-5 p-3 w-80 focus:border-purple-700 rounded border-2 outline-none"
                        autocomplete="off"
                        placeholder="Mot de passe"
                        required
                    />
                </div>
                <div>
                    <button class="btn btn-success" id="login" type="submit" @click="login">
                        <span>Connexion</span>
                    </button>
                </div>
            </form>
        </div>
        <div class="block p-4">
            <router-link to="/register">
                <p class="text-warning text-center">Pas encore inscrit ? C’est par là !</p>
            </router-link>
        </div>
    </div>
</template>

<script>
// @ is an alias to /src
import axios from 'axios';
export default {
    name: "Login",
    components: {},
    data: () => {
        return {
            email: "",
            password: "",
        };
    },
    methods: {
        login(event) {
            event.preventDefault()
            var token = btoa(`${this.login.username}:${this.login.password}`)
            var config = {
                method: 'post',
                url: 'http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/users/me',
                headers: {
                    'Authorization': 'Basic ' + token
                }
            };
            axios(config)
                .then((response) => {
                    console.log(JSON.stringify(response.data));
                    localStorage.setItem('user', JSON.stringify(response.data));
                    localStorage.setItem('token', token);
                    this.$router.push({ name: 'Home' });
                })
                .catch((error) => {
                    console.log(error);
                    alert('mauvais mot de passe ou mauvaus identifiant');
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

.login {
    min-height: 100vh;
}
</style>
