<template>
  <div class="current-card">
    <img src="/images/Album.jpg" class="image" />
    <div id="textos">
      <p id="current-text">{{ name }}</p>
      <p id="current-text2">{{ author }}</p>
    </div>
    <div id="current-icons">
    <h3>♥</h3>
    <h3>[ .]</h3>
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
.current-card {
  display: flex;
  width: 300px;
  height: 80px;
}
.current-card .image {
  margin: 15px;
  width: 60px;
  height: 60px;
}

#textos {
   display: flex;
   flex-direction: column;
   justify-content: center;
}

#textos #current-text{
  padding: 0px;
  margin: 0px;
  text-align: left;
  padding-left: 4px;
  color: white;
  font-weight: bold;
  font-size: 14px;
}

#textos #current-text2{
  padding: 0px;
  margin: 0px;
  text-align: left;
  padding-left: 4px;
  color: white;
  font-size: 12px;
}

#current-icons {
   display: flex;
   flex-direction: row;
   align-items: center;
}
#current-icons h3 {
padding-left: 15px;
}
</style>