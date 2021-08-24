<template>
    <div>
      <audio ref="player" controls>
        <source v-bind:src="track_url">
      </audio>
    </div>
</template>
<script >
export default {
  props : ["track_url"] , 
  data() {
    return {
      canciones : [] , 
      autor : "" , 
      album_imagen_url : "" , 
    }
  },
  mounted : function()
  {
    this.$watch("track_url" , function()
    {
      console.log("Se ha recibido la url" + this.track_url);
      this.$refs.player.load();
    })
  }
,
  methods: {
    ObtenerCancion(id)
    {
      return null;
    }
  },
};
</script>

<style >

</style>