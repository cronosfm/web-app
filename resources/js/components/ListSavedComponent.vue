<template>
  <div class="List">
  <h3>{{name}}</h3>
  </div>
</template>

<script>
export default {
  props:['name'],
  data() {
    return {}
  },
};
</script>

<style>
.List {
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
.List:hover {
  color: #fff;
}
</style>