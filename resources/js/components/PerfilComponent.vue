<template>
  <div class="container">
    <img src="/assets/perfil.jpg" class="perfil-image" />
    <h4>{{ name }}</h4>
    <h4>↓</h4>
  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
  props: ["name"],
};
</script>

<style>
.container {
  display: flex;
  background-color: rgba(0, 0, 0, 0.918);
  width: 200px;
  height: 30px;
  border-radius: 50px;
  justify-content: space-around;
  align-items: center;
}

.container:hover {
  background-color: rgb(34, 34, 34);
}
.perfil-image {
  vertical-align: middle;
  width: 25px;
  height: 25px;
  border-radius: 50px;
}
</style>