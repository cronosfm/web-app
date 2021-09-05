<template>
  <div class="main">
    <div id="menu">
      <IconLogoComponent></IconLogoComponent>
      <MenuComponent name="Inicio" icon="|H|"></MenuComponent>
      <MenuComponent name="Buscar" icon="|O|"></MenuComponent>
      <MenuComponent name="Tu biblioteca" icon="|M|"></MenuComponent>
      <br />
      <MenuComponent name="Crear lista" icon="|+|"></MenuComponent>
      <MenuComponent name="Canciones que te gustan" icon="|♥|"></MenuComponent>
      <MenuComponent name="Tus episodios" icon="|8|"></MenuComponent>
      <hr>
      <list-saved-component name="cumbias"></list-saved-component>
      <list-saved-component name="rock"></list-saved-component>
      <list-saved-component name="ska"></list-saved-component>
      <list-saved-component name="pop"></list-saved-component>
      <list-saved-component name="rap"></list-saved-component>
    </div>
    <div id="contenido">
      <div id="top">
        <SelectButtonComponent> </SelectButtonComponent>
        <PerfilComponent v-bind:name="username"></PerfilComponent>
      </div>
      <h1>¡Buenas tardes!</h1>
      <div id="middle-up">
      <PlaylistComponent 
      v-for="desu in generos"
      v-bind:key="desu.id"
      v-bind:genero="desu"
       class="CardComp"></PlaylistComponent>
      
      </div>
      <h1>Recomendaciones:</h1>
      <div id="middle">
      <CardComponent
        v-on:click.native="ReproducirCancion(desu)"
        v-for="desu in recomendaciones" 
        v-bind:key="desu.track_id"
        v-bind:name="desu.track_name"
        v-bind:author="desu.artist_name"
        v-bind:image="desu.album_url"
        class="CardComp"></CardComponent>
      
      </div>
    </div>
    <div id="reproductor">
      <PlayerComponent v-bind:track_url="cancion_actual"></PlayerComponent>
    </div>
  </div>
</template>

<script>
import MenuComponent from "./MenuComponent.vue";
import IconLogoComponent from "./IconLogoComponent.vue";
import CardComponent from "./CardComponent.vue";
import SelectButtonComponent from "./SelectButtonComponent.vue";
import PerfilComponent from "./PerfilComponent.vue";
import ListSavedComponent from "./ListSavedComponent.vue";
import PlaylistComponent from "./PlaylistComponent.vue";
import PlayerComponent  from "./PlayerComponent.vue";
import CurrentComponent from "./CurrentComponent.vue";
import CurrentConfigComponent from "./CurrentConfig.vue";
import InicioViewComponent from "./InicioViewComponent.vue";
import BuscarViewComponent from "./BuscarViewComponent.vue";
import BibliotecaViewComponent from "./BibliotecaViewComponent.vue";
import CrearListaComponent from "./CrearListaComponent.vue";
import ListaComponent from "./ListComponent.vue";

export default {
  props : ["username"] , 

  name: "App",
  data() {
    return {
      generos : [] , 
      recomendaciones : [] ,
      cancion_actual : "" , 
      inicio: true,
      buscar: false,
      biblioteca: false,
      crear_lista: false,
      lista:false,
    }
  },
  components: {
    MenuComponent,
    IconLogoComponent,
    CardComponent,
    SelectButtonComponent,
    PerfilComponent,
    ListSavedComponent,
    PlaylistComponent,
    PlayerComponent,
  },
  
  methods : 
  {
    conseguirGeneros()
    {
      axios.get("/api/genres")
      .then(response => {
        this.generos = response.data;
        console.log(this.generos);
      })
    } , 
    conseguirRecs()
    {
      axios.get("/api/tracks/recs")
      .then(response => {this.recomendaciones = response.data})
    },
    ReproducirCancion(cancion)
    {
      this.cancion_actual = cancion.storage_url;
      console.log(`Se ha seleccionado la canción ${this.cancion_actual}`);
    }
    ,
    ReproducirGenero()
    {
      return null;
    }
    ,
    inicioView() {
      this.inicio = true;
      this.buscar = false;
      this.biblioteca = false;
      this.crear_lista = false;
      this.lista = false;
    },
    busquedaView() {
      this.inicio = false;
      this.buscar = true;
      this.biblioteca = false;
      this.crear_lista = false;
      this.lista = false;
    },
    bibliotecaView() {
      this.inicio = false;
      this.buscar = false;
      this.biblioteca = true;
      this.crear_lista = false;
      this.lista = false;
    },
    crearListaView(){
      this.inicio = false;
      this.buscar = false;
      this.biblioteca = false;
      this.crear_lista = true;
      this.lista = false;
    },
    listaView(){
      this.inicio = false;
      this.buscar = false;
      this.biblioteca = false;
      this.crear_lista = false;
      this.lista = true;
    }
  }
  ,
  mounted() 
  {
    this.conseguirGeneros();
    this.conseguirRecs();
  }
};
</script>

<style>
body {
  margin: 0px;
  color: white;
}
hr {
  width: 80%;
  height:1px;
  border-width: 0px;
  border-style: inset;
  background-color: rgba(255, 255, 255, 0.616);
}

.main {
  display: grid;
  width: 100%;
  height: 100%;
  grid-template-columns: 12.5% 87.5%;
  grid-template-rows: 90.5vh 9.5vh;
}

#menu {
  background-color: black;
  grid-column-start: 1;
}

#contenido {
  background-color: rgba(17, 17, 17, 0.96);
  grid-column-start: 2;
  overflow: scroll;
  overflow-x: unset;
  padding: 12px 24px;
}
#top {
  display: flex;
  justify-content: space-between;
}

#middle-up {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;

  align-items: center;
}

#middle-up .CardComp{  
  margin: 10px;
  align-items: center;
}
#middle {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
}
#middle .CardComp{  
  margin: 24px;
}

#reproductor {
  background-color: rgba(17, 17, 17, 0.96);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  grid-column-start: 1;
  grid-column-end: 3;
}
</style>
