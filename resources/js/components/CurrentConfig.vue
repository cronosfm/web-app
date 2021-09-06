<template>
  <div class="current-menu">
    <div class="buttons-menu">
      <button class="button-menu">K</button>
      <button class="button-menu">L</button>
      <button class="button-menu">C</button>
      <button class="button-menu">M</button>
      <input type="range" name="" id="">
      <button class="button-menu">F</button>
    </div>
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
.current-menu {
  display: flex;
  flex-direction: column;
  align-items: center;
  justify-content: center;
  width: 300px;
  height: 80px;
}
.current-menu .button-menu {
  background-color: transparent;
  border: 0px;
  color: white;
  width: 20px;
  height: 30px;
  text-align: center;
  font-size: 15px;
}
</style>