<template>
  <div class="card">
    <img v-bind:src="image" class="image" />
    <h3 id="text">{{name}}</h3>
    <h5 id="text">{{author}}</h5>
  </div>
</template>

<script>
export default {
  props: ["name", "author", "image"],
  data() {
    return {}
  },
};
</script>

<style>
.card {
  border-radius: 5px;
  text-align: center;
  background-color: rgba(17, 17, 17, 0.98);
  width: 200px;
  height: 300px;
}
.card:hover {
  background-color: rgb(34, 34, 34);
}

.card .image {
  border-radius: 20px;
  padding-top: 10px;
  width: 180px;
  height: 180px;
}

#text {
  text-align: left;
  padding-left: 16px;
  color: white;
}
</style>