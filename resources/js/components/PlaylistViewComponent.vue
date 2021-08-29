<template>
    <div>
        <table>
            <thead>
            </thead>
            <tbody>
                <PlayListItemComponent
                    v-for="desu in playlist_items"
                    v-bind:key="desu.id"
                    v-bind:genero="desu">
                    </PlayListItemComponent>
            <tbody>

        </table>
    </div>
</template>
<script>

import PlayListItemComponent from "./PlayListItemComponent.vue";

export default {
    

    data()
    {
        return {}
    }
    ,
    props : 
    {
        "thumbnail_url" : string , 
        "playlist_name" : string , 
        "playlist_description" : string , 
        "playlist_items" : Object , 
        "playlist_id" : integer , 
    }
}
</script>