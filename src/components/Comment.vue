<template>
  <div class="card">
    <div class="card-body">
      <h6 class="card-subtitle mb-2 font-weight-bold text-muted">{{ comment.author_name }}</h6>
      <p class="card-text font-italic">{{ comment.date }}</p>
      <p class="card-text" v-html="comment.content.rendered"></p>
    </div>
  </div>
</template>

<script>

export default {
  name: 'Comment',
  props: {
    comment: Object
  },
  data() {
    return {

    }
  },
  mounted() {

  },
  methods: {

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
