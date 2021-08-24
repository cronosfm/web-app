<template>
  <div class="select">
    <div class="selector">
      <img src="/assets/l.png" />
    </div>
    <div class="selector">
      <img src="/assets/r.png" />
    </div>
  </div>
</template>

<script>
export default {
  data() {
    return {}
  },
};
</script>

<style>
.select {
  display: flex;
  border-radius: 30px;
}
.selector {
  display: flex;
  background: rgba(0, 0, 0, 0.712);
  border-radius: 30px;
  width: 30px;
  height: 30px;
  justify-content: space-between;
  align-items: stretch;  
}
</style>