<template>
  <div class="album">
    <img v-bind:src="imagen" class="image" />
    <h3 id="text">{{ nombre }}</h3>
    <div id="boton">
      <p id="textbutton">►</p>
    </div>
  </div>
</template>

<script>
export default {
  props: ["genero"],
  data() {
    return {
      nombre : this.genero.name , 
      imagen : "/" +  this.genero.image_url
    }
  }
};
</script>

<style>
.album {
  display: flex;
  border-radius: 10px;
  text-align: center;
  background-color: rgb(65, 65, 65);
  width: 300px;
  height: 100px;
  flex-direction: row;
  justify-content: space-between;
}
.album:hover {
  background-color: rgba(117, 117, 117, 0.65);
}

.album:hover > #boton {
  visibility: visible;
}

#boton {
  visibility: hidden;
  justify-self: right;
  margin-right: 5px;
  background-color: rgb(69, 173, 69);
  width: 50px;
  height: 50px;
  border-radius: 50px;
}
#boton #textbutton {
  margin: 33%;
  font-size: 20px;
}
#boton:hover {
  width: 52px;
  height: 52px;
}
.album .image {
  width: 100px;
  height: 100px;
}

#text {
  text-align: left;
  padding-left: 16px;
  color: white;
}
</style>