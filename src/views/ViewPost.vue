<template>
  <div class="view-post bg-page">
    <NavBar />
    <div class="p-4">
      <Post
        v-if="post && categories"
        class="justify-center items-center m-4"
        :post="post"
        :categories="categories.filter(element => post.categories.includes(element.id)).map(element => element.name)"
        show-content
      />
      <Comment
        class="justify-center items-center m-4"
        v-for="(comment) of comments"
        :key="comment.id"
        :comment="comment"
      />
    </div>
  </div>
</template>

<script>
// @ is an alias to /src
import Post from '@/components/Post.vue';
import axios from 'axios';
import Comment from '../components/Comment.vue';
import { getUser } from '../utils/userUtils';
import NavBar from '../components/NavBar.vue';

export default {
  name: 'Home',
  components: {
    Post,
    Comment,
    NavBar
  },
  created() {
    this.user = getUser();
    if (this.user === undefined) {
      this.$router.push({ name: 'Login' });
    }
  },
  props: { id: Number },
  data() {
    return {
      post: undefined,
      comments: [],
      categories: [],
    }
  },
  mounted() {
    console.log('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts/' + this.id)
    axios
      .get('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts/' + this.id)
      .then((response) => {
        console.log(response.data);
        this.post = response.data;
      })
      .catch((error) => {
        console.log(error);
      });
    axios
      .get('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/categories')
      .then((response) => {
        console.log(response.data);
        this.categories = response.data;
      })
      .catch((error) => {
        console.log(error);
      }),
      console.log("commentaires", 'http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/comments?post=' + this.id)
    axios
      .get('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/comments?post=' + this.id)
      .then((response) => {
        console.log(response.data);
        this.comments = response.data;
      })
      .catch((error) => {
        console.log(error);
      })

  },
  methods: {
    loadComment(id) {
      console.log("commentaires", 'http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/comments?post=' + id)
      axios
        .get('http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/comments?post=' + id)
        .then((response) => {
          console.log(response.data);
          this.categories = response.data;
        })
        .catch((error) => {
          console.log(error);
        })
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

.bg-page {
  background-color: rgb(54, 54, 54);
}

.view-post {
  min-height: 100vh;
}
</style>

