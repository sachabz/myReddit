<template>
  <div class="borderColor bgChannel overflow p-2">
    <h6 class="text-warning">Les Channels</h6>
    <ul class aria-labelledby>
      <li v-for="(categorie) of categories" :key="categorie.id" :categorie="categorie">
        <a class="text-light" v-on:click="onSelectCat(categorie.id)">{{ categorie.name }}</a>
      </li>
    </ul>
  </div>
</template>

<script>
import axios from 'axios';
export default {
  name: 'Channel',
  props: {
    categorie: undefined,
    onSelectCat: undefined
  },
  data() {
    return {
      categories: []
    }
  },
  mounted() {
    this.loadCats();
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
  }
}
</script>

<!-- Add "scoped" attribute to limit CSS to this component only -->
<style scoped lang="scss">
h3 {
  margin: 40px 0 0;
}
h6 {
  padding-top: 20px;
}

.colorText {
  color: whitesmoke;
}

.borderColor {
  border-color: rgb(12, 12, 12);
  border: solid 1px rgb(12, 12, 12);
}

ul {
  list-style-type: none;
  padding: 0;
}
li {
  display: inline-block;
  margin: 0 10px;
}

.bgChannel {
  background-color: rgb(41, 39, 39);
}

.overflow {
  overflow: hidden;
}
</style>
