<template>
  <div id="ListView">
    <div id="top">
      <div id="top-left">
        <SelectButtonComponent> </SelectButtonComponent>
      </div>
      <PerfilComponent v-bind:name="username"></PerfilComponent>
    </div>
    <div id="titlebars">
      <img v-bind:src="playlist.image_url" class="image" />
      <div id="titletext">
        <a id="h6">PlayList</a>
        <a id="h1">{{ playlist.name}}}</a>
        <a id="h6"> ----------------- </a>
      </div>
    </div>
    <div id="subContent">
      <div 
        id="botonplay"
        >
        <p id="textbutton">►</p>
      </div>
      <div id="tabla">
        <table>
          <tr>
            <td>#</td>
            <td>TÍTULO</td>
            <td>ÁLBUM</td>
            <td>FECHA INCORPORACIÓN</td>
            <td>DURACIÓN</td>
          </tr>
          <td colspan="5" class="divider"><hr /></td>
          <tr
            v-for="desu in playlist.tracks"
            v-bind:key="desu.id">
            <td>   </td>
            <td >
              <img v-bind:src="desu.imagen" class="image2" />
              <div id="titlesList">
                <a>{{desu.name}}</a>
                <a> {{desu.album.artist.name}}</a>
              </div>
            </td>
            <td>666</td>
            <td>{{desu.created_at}}}}</td>
            <td>01:01</td>
          </tr>
        </table>
      </div>
    </div>
  </div>
</template>

<script>
import SelectButtonComponent from "./SelectButtonComponent.vue";
import PerfilComponent from "./PerfilComponent.vue";
export default {
  props: ["playlist"] , 
  data() {
    return {}
  },
  components: {
    SelectButtonComponent,
    PerfilComponent,
  },
  mounted : {

  }
  ,
  methods: {
    ReproducirRola(Rola)
    {

    }
  }
};
</script>

<style>
table {
  width: 100%;
  border-collapse: collapse;
}
td {
  padding: 5px;
  margin: 0px;
  border: 0px;
}
tr:hover {
  background-color: rgba(136, 136, 136, 0.74);
}
#titlelist {
  display: flex;
  align-items: center;  
}
#titlesList {
  display: flex;
  flex-direction: column;
  align-items: flex-start;  
}
#ListView {
  padding: 25px;
}
#botonplay {
  justify-self: right;
  margin-right: 5px;
  background-color: rgb(49, 214, 49);
  width: 50px;
  height: 50px;
  border-radius: 50px;
}
#botonplay #textbutton {
  margin: 33%;
  font-size: 20px;
}
#titlebars {
  display: flex;
  background-color: rgba(60, 11, 173, 0.541);
  height: 12vw;
  padding: 30px;
}
#titlebars #titletext {
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
#ListView #top {
  background-color: rgba(60, 11, 173, 0.541);
}
.image {
  border-radius: 5px;
  width: 240px;
  height: 240px;
}
.image2 {
  width: 50px;
  height: 50px;
  padding-right: 10px;
}

#subContent {
  display: flex;
  flex-direction: column;
  padding: 20px;
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
</style>