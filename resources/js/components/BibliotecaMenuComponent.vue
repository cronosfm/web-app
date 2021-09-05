<template>
  <ul id="navbar">
    <li> <a href="#">Listas</a> </li>
    <li> <a href="#">Podcasts</a> </li>
    <li> <a href="#">Artistas</a> </li>
    <li> <a href="#">Álbumes</a> </li>
  </ul>
</template>

<script>
export default {
  props: [],
  data() {
    return {
      message: "I am an alert.",
    };
  },
};
</script>

<style>
#navbar {
  margin: 0;
  padding: 0;
  list-style-type: none;
}
#navbar li a {
  display: inline;
  margin: 5px;
  padding: 10px;
  color: white;
  font-weight: bold;
  font-family: sans-serif;
  font-size: 15px;
  border-radius: 5px;
}
#navbar li{
  display: inline;
  margin: 5px;
  padding: 10px;
  color: white;
  font-weight: bold;
  font-family: sans-serif;
  font-size: 15px;
  background-color: rgba(88, 88, 88, 0.513);
  border-radius: 5px;
  font-style: normal;
}
</style>