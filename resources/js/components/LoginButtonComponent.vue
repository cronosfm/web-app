<template>
  <div class="container-menu">
    <div id="facebook">
      <img src="/img/perfil.jpg" />
      <h4>CONTINUAR CON FACEBOOK</h4>
    </div>
    <div id="apple">
      <img src="/img/perfil.jpg" />
      <h4>CONTINUAR CON APPLE</h4>
    </div>
    <div id="google">
      <img src="/img/perfil.jpg" />
      <h4>CONTINUAR CON GOOGLE</h4>
    </div>
    <div id="telefono">
      <img src="/img/perfil.jpg" />
      <h4>CONTINUAR CON NÚMERO DE TELÉFONO</h4>
    </div>
  </div>
</template>

<script>
export default {
  data() {},
};
</script>

<style>
h4 {
  color: white;
}
.container-menu {
  margin: 5px;
  display: flex;
  flex-direction: column;
  justify-content: center;
  align-items: center;
}
.container-menu div {
  margin: 5px;
}
#facebook {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgb(71, 95, 172);
  border-radius: 50px;
  width: 450px;
  height: 50px;
}
#facebook img {
  width: 25px;
  height: 25px;
  border-radius: 50px;
}
#apple {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgb(0, 0, 0);
  border-radius: 50px;
  width: 450px;
  height: 50px;
}
#apple img {
  width: 25px;
  height: 25px;
  border-radius: 50px;
}
#google {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgb(255, 255, 255);
  border-radius: 50px;
  border: 3px solid rgb(24, 24, 24);
  border-color: gray;
  width: 450px;
  height: 50px;
}
#google img {
  width: 25px;
  height: 25px;
  border-radius: 50px;
}
#google h4 {
  color: gray;
}
#telefono {
  display: flex;
  justify-content: center;
  align-items: center;
  background-color: rgb(255, 255, 255);
  border-radius: 50px;
  border: 3px solid rgb(24, 24, 24);
  border-color: gray;
  width: 450px;
  height: 50px;
}
#telefono img {
  width: 25px;
  height: 25px;
  border-radius: 50px;
}
#telefono h4 {
  color: gray;
}
</style>