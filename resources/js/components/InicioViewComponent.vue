<template>
  <div>
    <div id="top">
    <div id="top-left">
      <SelectButtonComponent> </SelectButtonComponent>
    </div>
    <PerfilComponent v-bind:name="username" ></PerfilComponent>
  </div>
  <h1>¡Buenas tardes!</h1>
  <div id="middle-up">
     <PlaylistComponent
            v-for="desu in generos"
            v-bind:key="desu.id"
            class="CardComp" 
            v-bind:name="desu.name"></PlaylistComponent>
    
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

export default {
  props: 
  ["username"]
  ,
  data() {
    return {
      generos : [],
    }
  },
  components: {
    CardComponent,
    PlaylistComponent,
    SelectButtonComponent,
    PerfilComponent,
  },
  methods: 
  {
    conseguirGeneros()
    {
      axios.get("/api/genres")
      .then(response => {
        this.generos = response.data;
        console.log(this.generos);
      })
    } , 
  }
  ,
  mounted()
  {
    this.conseguirGeneros();
  }
};
</script>

<style>
</style>