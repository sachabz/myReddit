<template>
  <div class="container">
    <transition name="fade" mode="out-in">
      <button
        v-if="showNewPost === false"
        class="btn btn-secondary bg-success mb-2 mt-4"
        v-on:click="showAddPost"
      >Ajouter un nouveau commentaire</button>
      <div v-else class="border border-success p-2">
        <p v-on:click="showAddComment" class="text-success text-right">X</p>
        <h2 class="text-light">Créer un nouvel article</h2>
        <form v-on:submit.prevent="onSubmit">
          <div class="form-group text-light">
            <label for>Titre</label>
            <input
              type="text"
              class="form-control"
              v-model="post_title"
              required
              aria-required="true"
            />
          </div>
          <div class="form-group text-light">
            <label for>Description</label>
            <textarea class="form-control" cols="30" rows="10" v-model="post_content"></textarea>
          </div>
          <div class="mt-3">
            <button id="output" type="submit" class="btn btn-success">Créer l'article</button>
          </div>
        </form>
      </div>
    </transition>
  </div>
</template>

<script>
import axios from 'axios';
import { getNotif } from '../utils/notification';


export default {
  name: 'AddComment',
  props: {
    post: Object,
    categories: Array,
    showButton: Boolean,
    showContent: Boolean,

  },
  data() {
    return {
      comment_title: null,
      comment_content: null,
      showNewPost: false,
    }
  },
  methods: {
    showAddComment() {
      this.showNewPost = !this.showNewPost
    },

    onSubmit: function () {
      var config = {
        method: 'post',
        url: 'http://monsite.fr/myreddit/admin/index.php/wp-json/wp/v2/posts?author=1&content=' + this.comment_content + '&title=' + this.comment_title + '&status=publish',
        headers: {
          'Authorization': 'Basic bXlyZWRkaXQ6YWRtaW4='
        }
      };

      axios(config)
        .then(function (response) {
          console.log(JSON.stringify(response.data));
          getNotif();
          this.showNewPost = false;
          this.comment_title = null;
          this.comment_content = null;
        })
        .catch(function (error) {
          console.log(error);
        });

    },
    notif() {
      getNotif();
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
</style>
