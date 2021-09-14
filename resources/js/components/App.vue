<template>
 <div class="main">
    <div id="menu">
      <IconLogoComponent></IconLogoComponent>
      <MenuComponent
        name="Inicio"
        icon="|H|"
        v-on:click.native="inicioView()"
      ></MenuComponent>
      <MenuComponent
        name="Buscar"
        icon="|O|"
        v-on:click.native="busquedaView()"
      ></MenuComponent>
      <MenuComponent
        name="Tu biblioteca"
        icon="|M|"
        v-on:click.native="bibliotecaView()"
      ></MenuComponent>
      <br />
      <MenuComponent
        name="Crear lista"
        icon="|+|"
        v-on:click.native="crearListaView()"
      ></MenuComponent>
      <MenuComponent name="Canciones que te gustan" icon="|♥|" v-on:click.native="likedView()"></MenuComponent>
      <!-- <MenuComponent name="Tus episodios" icon="|8|" v-on:click.native="listaView()"></MenuComponent> -->
      <hr />
      <list-saved-component name="cumbias"></list-saved-component>
      <list-saved-component name="rock"></list-saved-component>
      <list-saved-component name="ska"></list-saved-component>
      <list-saved-component name="pop"></list-saved-component>
      <list-saved-component name="rap"></list-saved-component>
    </div>
    <div id="contenido">
    <div v-show="inicio">
      <InicioViewComponent v-bind:username="username" ></InicioViewComponent>
    </div>
    <div v-show="buscar">
      <BuscarViewComponent
        v-bind:username="username"></BuscarViewComponent>
    </div>
    <div v-show="biblioteca">
      <BibliotecaViewComponent
        v-bind:username="username"></BibliotecaViewComponent>      
    </div>
    <div v-show="crear_lista">
      <CrearListaComponent
        v-bind:username="username"></CrearListaComponent>
    </div>
    <div v-show="lista">
      <ListaComponent
        v-bind:playlist="playlist"
        v-bind:username="username"></ListaComponent>
    </div>

    </div>
    <div id="reproductor">
      <current-component
        name="Vientos del Sur"
        author="Avalanch"
      ></current-component>
      <PlayerComponent> </PlayerComponent>
      <current-config-component></current-config-component>
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
      playlists : [] ,
      playlist: "" , 
      api_token : ""
      
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
    MenuComponent,
    IconLogoComponent,
    ListSavedComponent,
    CurrentComponent,
    PlayerComponent,
    CurrentConfigComponent,

    InicioViewComponent,
    BuscarViewComponent,
    BibliotecaViewComponent,
    CrearListaComponent,
    ListaComponent,
  },
  
  methods : 
  {
    SacarPlaylists()
    {
       axios.get("/api/playlists")
      .then(response => {
        this.playlists = response.data;
        console.log(this.playlists);
      })
    }
    ,
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
      console.log("Abriendo vista de biblioteca")
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
      
      axios.get("/api/playlists/my-playlists")
        .then(response => {

        });
      this.lista = true;
    } , 
    likedView()
    {
      this.inicio = false;
      this.buscar = false;
      this.biblioteca = false;
      this.crear_lista = false;
      axios.get("/api/tracks/liked" , {headers: {"Authorization" : this.api_token}})
        .then(response => {

        });
      this.lista = true;
    }

    }
    ,
    mounted() 
    {
      
      axios.get("/auth/get-token")
      .then(response => 
      {
        localStorage.spoto_token = response.data;
        this.api_token = `Bearer ${response.data}`;
        console.log(this.api_token);
      })
    }
  }
  
</script>
<style>
body {
  margin: 0px;
  color: white;
}
hr {
  width: 80%;
  height: 1px;
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
}
#top {
  padding: 12px 24px;
  display: flex;
  justify-content: space-between;
}
#top-left {
  display: flex;
  justify-content: space-between;
  align-items: center;
}

#middle-up {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
  justify-content: flex-start;
  align-items: center;
}

#middle-up .CardComp {
  margin: 10px;
  align-items: center;
}
#middle {
  display: flex;
  justify-content: flex-start;
  flex-wrap: wrap;
}
#middle .CardComp {
  margin: 24px;
}
#reproductor {
  display: flex;
  justify-content: space-between;
  background-color: rgba(17, 17, 17, 0.96);
  border-top: 1px solid rgba(255, 255, 255, 0.1);
  grid-column-start: 1;
  grid-column-end: 3;
}
</style>
