<template>
<div>
<div id="top">
          <div id="top-left">
            <SelectButtonComponent> </SelectButtonComponent>
            <biblioteca-component></biblioteca-component>
          </div>
          <PerfilComponent name="Angel Rodriguez"></PerfilComponent>
        </div>
        <h1>¡Buenas tardes!</h1>
        <div id="middle-up">
          <PlaylistComponent class="CardComp" name="Rap"></PlaylistComponent>
          <PlaylistComponent class="CardComp" name="Rock"></PlaylistComponent>
          <PlaylistComponent class="CardComp" name="Pop"></PlaylistComponent>
          <PlaylistComponent
            class="CardComp"
            name="Baladas"
          ></PlaylistComponent>
          <PlaylistComponent class="CardComp" name="Salsa"></PlaylistComponent>
          <PlaylistComponent
            class="CardComp"
            name="Cumbias"
          ></PlaylistComponent>
          <PlaylistComponent
            class="CardComp"
            name="Rancheras"
          ></PlaylistComponent>
          <PlaylistComponent
            class="CardComp"
            name="Flamenco"
          ></PlaylistComponent>
          <PlaylistComponent
            class="CardComp"
            name="Electronica"
          ></PlaylistComponent>
        </div>
        <h1>Recomendaciones:</h1>
        <div id="middle">
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
          <CardComponent class="CardComp"></CardComponent>
        </div>
</div>
</template>

<script>
import CardComponent from "./CardComponent.vue";
import PlaylistComponent from "./PlaylistComponent.vue";
import SelectButtonComponent from "./SelectButtonComponent.vue";
import PerfilComponent from "./PerfilComponent.vue";
import BibliotecaComponent from "./BibliotecaMenuComponent.vue";

export default {
  data() {},
  components:{      
    CardComponent,
    PlaylistComponent,    
    SelectButtonComponent,
    PerfilComponent,
    BibliotecaComponent,
  }
};
</script>

<style>
</style>