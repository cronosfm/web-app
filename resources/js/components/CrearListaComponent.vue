<template>
  <div id="secondary">
    <div id="top">
      <div id="top-left">
        <SelectButtonComponent> </SelectButtonComponent>
      </div>
      <PerfilComponent name="Angel Rodriguez"></PerfilComponent>
    </div>
    <div id="titlebar">
      <img src="/img/Album.jpg" class="image" />
      <div id="titletext">
        <a id="h6">PlayList</a>
        <a id="h1">Mi lista n.°16</a>
        <a id="h6">Angel Rodriguez</a>
      </div>
    </div>
    <div id="subContent">
      <div class="dropdown">
        <button class="dropbtn">...</button>
        <div class="dropdown-content">
          <a href="#">Añadir a la cola</a>
          <a href="#">Ir a radio de la lista</a>
          <a href="#">Añadir al perfil</a>
          <hr />
          <a href="#">Editar datos</a>
          <a href="#">Eliminar</a>
          <hr />
          <a href="#">Compartir</a>
        </div>
      </div>
      <hr />
      <a id="h5"> Encontremos algo para tu lista</a>
      <input type="search" placeholder="Buscar canciones o episodios"/>
    </div>
  </div>
</template>

<script>
import SelectButtonComponent from "./SelectButtonComponent.vue";
import PerfilComponent from "./PerfilComponent.vue";
export default {
  data() {
    return {}
  },
  components: {
    SelectButtonComponent,
    PerfilComponent,
  },
};
</script>

<style>
#secondary #titlebar {
  background-color: rgba(70, 70, 70, 0.541);
}
#titlebar {
  display: flex;
  height: 12vw;
  padding: 30px;
}
#titlebar #titletext {
  display: flex;
  flex-direction: column;
  padding-left: 20px;
  justify-content: flex-end;
  margin: 0px;
}
#titletext #h6 {
  font-weight: bold;
  font-size: 14px;
  font-family: sans-serif;
}
#titletext #h1 {
  font-weight: bold;
  font-size: 100px;
  font-family: sans-serif;
}
#secondary #top {
  background-color: rgba(70, 70, 70, 0.541);
}
.image {
  border-radius: 5px;
  width: 240px;
  height: 240px;
}

#subContent {
  display: flex;
  flex-direction: column;
  padding: 20px;
}
#subContent input {
  width: 350px;
  height: 30px;
  text-align: center;
  background-color: rgb(66, 66, 66);
}
#subContent #h5 {
font-size: 25px;
}
#subContent hr {
  width: 100%;
  height: 1px;
  border-width: 0px;
  border-style: inset;
  background-color: rgba(209, 209, 209, 0.616);
}

#subContent .dropdown {
  position: relative;
  display: inline;
}
#subContent .dropdown-content {
  display: none;
  position: absolute;
  background-color: rgb(41, 41, 41);
  min-width: 160px;
  max-width: 200px;
  box-shadow: 0px 8px 16px 0px rgba(0, 0, 0, 0.2);
  z-index: 1;
  right: 0;
}

#subContent .dropdown-content a {
  color: white;
  margin: 4px;
  border-radius: 4px;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

#subContent .dropdown-content a:hover {
  background-color: rgb(68, 68, 68);
}

#subContent .dropdown:hover .dropdown-content {
  display: block;
}

#subContent .dropdown:hover .dropbtn {
  background-color: #3e8e41;
}
#subContent .dropbtn {
  background: transparent;
  color: white;
  font-size: 35px;
  border: 0;
  padding-bottom: 50px;
}
</style>