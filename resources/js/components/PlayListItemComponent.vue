<<template>
    <div>
        
    </div>
</template>

<script>
export default {
    props : {
        "number" : number  , 
        "thumbnail_url" : string , 
        "track_name" : string , 
        "artist_name" : string , 
        "times_played" : number , 
        "album_name" : string , 
        "duration_seconds" : integer
    }
    ,
    data()
    {
        return {}
    }   
}
</script>