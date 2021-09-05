<template>
  <div class="InputSearch">
  <input type="search" placeholder="Artistas, canciones o pódcasts" >
  </div>
</template>

<script>
export default {
  props:[],
  data() {
    return {
      message: "I am an alert.",
    };
  },
};
</script>

<style>
.InputSearch input {
  border-radius: 25px;
  width: 300px;
  height: 40px;  
  text-align: center;
}
</style>