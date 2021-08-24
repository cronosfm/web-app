<template>
  <div class="buttonMenu">
  <h3>{{icon}} {{name}}</h3>
  </div>
</template>

<script>
export default {
  props:['name','icon'],
  data() {
    return {
      message: "I am an alert.",
    };
  },
};
</script>

<style>
.buttonMenu {
  display: flexbox;
  background-color: #000;
  border-radius: 6px;
  border: none;
  color: rgba(255, 255, 255, 0.623);
  cursor: pointer;
  font-size: 12px;
  font-weight: bold;
  padding: 2px 24px;
  text-align: left;
  width: auto;
}
.buttonMenu:hover {
  color: #fff;
}
</style>