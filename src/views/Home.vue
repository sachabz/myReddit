<template>
  <div class="home bgPage">
    <NavBar />
    <transition appear @before-enter="beforeEnter" @enter="enter">
      <div>
        <h3 v-if="user" class="text-warning">
          Hello
          <span class="text-uppercase font-weight-bold">{{ user.name }}</span>
        </h3>
        <p class="text-light">Bienvenue parmi les Myredditiens !</p>
      </div>
    </transition>
    <div class="container">
      <div class="row">
        <AddPost />
      </div>
      <div class="row">
        <div class="col-8">
          <Post
            class="justify-center items-center m-4"
            v-for="(post) of posts"
            :key="post.id"
            :post="post"
            :categories="categories.filter(element => post.categories.includes(element.id)).map(element => element.name)"
            show-button
            @deletePost="deletePost"
          />
        </div>
        <div class="col-4">
          <Channel class="justify-center items-center m-4" :onSelectCat="loadCat"></Channel>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Post from '@/components/Post.vue';
import axios from 'axios';
import Channel from '../components/Channel.vue';
import AddPost from '../components/AddPost.vue';
import NavBar from '../components/NavBar.vue';
import { getUser } from '../utils/userUtils';
import gsap from 'gsap'

export default {
  name: 'Home',
  created() {
    this.user = getUser()
    if (this.user === undefined) {
      this.$router.push({ name: 'Login' });
    }
  },
  components: {
    Post,
    Channel,
    AddPost,
    NavBar
  },
  data() {
    return {
      posts: [],
      categories: [],
      user: undefined,
    }
  },
  mounted() {
    this.loadPosts();
    this.loadCats();
  },
  setup() {
    const beforeEnter = (el) => {
      console.log("before enter - set initial state")
      el.style.transform = 'translateY(-60px)'
      el.style.opacity = 0
    }
    const enter = (el) => {
      console.log("starting")
      gsap.to(el, { duration: 1, y: 0, opacity: 1, ease: "bounce.out" });
    }
    return { beforeEnter, enter }
  },
  methods: {
    loadCats() {
      axios
        .get('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/categories')
        .then((response) => {
          console.log(response.data);
          this.categories = response.data;
        })
        .catch((error) => {
          console.log(error);
        })
    },
    loadPosts() {
      axios
        .get('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts')
        .then((response) => {
          console.log(response.data);
          this.posts = response.data;
        })
        .catch((error) => {
          console.log(error);
        })
    },
    loadCat(id) {
      console.log('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts/?categories=' + id)
      axios
        .get('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts/?categories=' + id)
        .then((response) => {
          console.log(response.data);
          this.posts = response.data;
        })
        .catch((error) => {
          console.log(error);
        })
    },
    addNewPost() {
      axios
        .post('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts', this.post)
        .then((response) => {
          console.log(response.data);
          this.posts = response.data;
        })
        .catch((error) => {
          console.log(error);
        })
    },
    deletePost(id) {
      var config = {
        method: 'delete',
        url: 'http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts/' + id,
        headers: {
          Authorization: 'Basic' + localStorage.getItem('token')
        }
      };

      axios(config)
        .then(function (response) {
          console.log(JSON.stringify(response.data));
          this.user = response.data[0];
          console.log("testtt", this.user)
        })
        .catch(function (error) {
          console.log(error);
        });
    },
    newUser() {
      var config = {
        method: 'get',
        url: 'http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/users',
        headers: {
          Authorization: 'Basic' + localStorage.getItem('token')
        }
      };

      axios(config)
        .then(function (response) {
          console.log(JSON.stringify(response.data));
          this.user = response.data[0];
          console.log("testtt", this.user)
        })
        .catch(function (error) {
          console.log(error);
        });
    }
  }
}
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

.colorTitle {
  color: #42b983;
}

.colorText {
  color: whitesmoke;
}

.colorLink {
  color: yellow;
}

.buttonBG {
  background-color: #42b983;
}

.bgPage {
  background-color: rgb(54, 54, 54);
}

.home {
  min-height: 100vh;
}
</style>

