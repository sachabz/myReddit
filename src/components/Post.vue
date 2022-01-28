<template>
  <div class="card borderColor">
    <div class="card-header bgCard text-warning">
      <div>
        <p v-on:click="showAddPost" @click="deletePost" class="text-warning text-right">X</p>
      </div>
      <div>
        <h2>{{ post.title.rendered }}</h2>
      </div>
      <div class="text-light font-italic">{{ categories.join(" & ") }} | posté le : {{ post.date }}</div>
    </div>
    <div class="card-body bgPage">
      <div class="card-title"></div>
      <span>
        <div v-if="showContent" class="card-text text-light" v-html="post.content.rendered"></div>
      </span>
      <router-link
        v-if="showButton"
        :to="{
          name: 'ViewPost', params: { id: post.id }
        }"
      >
        <a href="#" class="btn bg-warning text-black">Voir le post</a>
      </router-link>
    </div>
  </div>
</template>

<script>
export default {
  name: 'Post',
  props: {
    post: Object,
    categories: Array,
    showButton: Boolean,
    showContent: Boolean
  },
  methods: {
    deletePost() {
      this.$emit("deletePost", this.post);
    },
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
}

.colorTitle {
  color: white;
}

.buttonBG {
  color: black;
}

.bgPage {
  background-color: rgb(68, 67, 67);
}

.bgCard {
  background-color: rgb(41, 39, 39);
}

.borderColor {
  border-color: rgb(12, 12, 12);
}
</style>
