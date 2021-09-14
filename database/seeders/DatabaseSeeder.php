<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Playlist;
use App\Models\PlaylistTrack;
use App\Models\Track;
use App\Models\TrackLike;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        
        DB::transaction( function () 
        {
            $Usuario = new User();
            $Usuario->email = "correo@correo.com";
            $Usuario->password = Hash::make("contraseña");
            $Usuario->name = "Usuario";
            $Usuario->birthday = "1997-05-05";
            $Usuario->gender = "male";
            $Usuario->api_token = User::GenerateToken();
            $Usuario->save();

            $ImagenDefault = "images/DEFAULT.png";
            $ImagenJudasBanda = "images/JUDASBAND.jpg";
            $SFVALBUMART = "images/SFV_ALBUM.jpg";
            $SBGALBUMART = "images/SBG_ALBUM.jpg";

            $Metal = new Genre();
            $Metal->name = "Metal";
            $Metal->image_url = $ImagenDefault;
            $Metal->save();

            $TrashMetal = new Genre();
            $TrashMetal->name = "Trash Metal";
            $TrashMetal->image_url = $ImagenDefault;
            $TrashMetal->save();

            $HeavyMetal = new Genre();
            $HeavyMetal->name = "Heavy Metal";
            $HeavyMetal->image_url = $ImagenDefault;
            $HeavyMetal->save();

            $BlackMetal = new Genre();
            $BlackMetal->name = "Black Metal";
            $BlackMetal->image_url = $ImagenDefault;
            $BlackMetal->save();

            $PowerMetal = new Genre();
            $PowerMetal->name = "Power Metal";
            $PowerMetal->image_url = $ImagenDefault;
            $PowerMetal->save();

            $DeathMetal = new Genre();
            $DeathMetal->name = "Death Metal";
            $DeathMetal->image_url = $ImagenDefault;
            $DeathMetal->save();
            

            $JudasPriest = new Artist();
            $JudasPriest->name = "Judas Priest";
            $JudasPriest->genre_id = $Metal->id;
            $JudasPriest->image_url = $ImagenJudasBanda;
            $JudasPriest->save();

            $Bolt = new Artist();
            $Bolt->name = "Bolt Thrower";
            $Bolt->genre_id = $Metal->id;
            $Bolt->image_url = $ImagenDefault;
            $Bolt->save();

            $Slayer = new Artist();
            $Slayer->name = "Slayer";
            $Slayer->genre_id = $TrashMetal->id;
            $Slayer->image_url = $ImagenDefault;
            $Slayer->save();

            $Bathory = new Artist();
            $Bathory->name = "Bathory";
            $Bathory->genre_id = $BlackMetal->id;
            $Bathory->image_url = $ImagenDefault;
            $Bathory->save();

            $Exciter = new Artist();
            $Exciter->name = "Exciter";
            $Exciter->genre_id = $PowerMetal->id;
            $Exciter->image_url = $ImagenDefault;
            $Exciter->save();

            $IronMaiden = new Artist();
            $IronMaiden->name = "Iron Maiden";
            $IronMaiden->genre_id = $HeavyMetal->id;
            $IronMaiden->image_url = $ImagenDefault;
            $IronMaiden->save();

            $BlackSabbath = new Artist();
            $BlackSabbath->name = "Black Sabbath";
            $BlackSabbath->genre_id = $Metal->id;
            $BlackSabbath->image_url = $ImagenDefault;
            $BlackSabbath->save();

            $Motor = new Artist();
            $Motor->name = "Motorhead";
            $Motor->genre_id = $Metal->id;
            $Motor->image_url = $ImagenDefault;
            $Motor->save();

            $Death = new Artist();
            $Death->name = "Death";
            $Death->genre_id = $DeathMetal->id;
            $Death->image_url = $ImagenDefault;
            $Death->save();

            $SFV = new Album();
            $SFV->name = "Screaming For Vengeance";
            $SFV->artist_id = $JudasPriest->id;
            $SFV->image_url = $SFVALBUMART;
            $SFV->genre_id = $HeavyMetal->id;
            $SFV->save();

            $ScreamTrack =  new Track();
            $ScreamTrack->album_id = $SFV->id;
            $ScreamTrack->name = "Screaming For Vengeance";
            $ScreamTrack->storage_url = "Tracks/32131313213223131.mp3";
            $ScreamTrack->save();

           

            $SBG = new Album();
            $SBG->name = "Scream Bloody Gore";
            $SBG->artist_id = $Death->id;
            $SBG->image_url = $SBGALBUMART;
            $SBG->genre_id = $DeathMetal->id;
            $SBG->save();

            $TORN =  new Track();
            $TORN->album_id = $SBG->id;
            $TORN->name = "Torn To Pieces";
            $TORN->storage_url = "Tracks/08. Torn To Pieces.mp3";
            $TORN->save();

            $SCREAMB =  new Track();
            $SCREAMB->album_id = $SBG->id;
            $SCREAMB->name = "Scream Bloody Gore";
            $SCREAMB->storage_url = "Tracks/XJQr7VS9RPfozTNTAlFXRKRLDM6B5kzZGQmKGFAP.mp3";
            $SCREAMB->save();

            $EVILDEAD =  new Track();
            $EVILDEAD->album_id = $SBG->id;
            $EVILDEAD->name = "Evil Dead";
            $EVILDEAD->storage_url = "Tracks/HKmnl5mBOac718caEQ5yjT1SMSgYLuq5RgL66dh2.mp3";
            $EVILDEAD->save();

            $MUTILATION =  new Track();
            $MUTILATION->album_id = $SBG->id;
            $MUTILATION->name = "Mutilation";
            $MUTILATION->storage_url = "Tracks/ry3DQVe03XBgBs8xEuTVp97MuX2tOllUXFvFnViZ.mp3";
            $MUTILATION->save();


            //Playlist de prueba

            $PlaylistNueva = new Playlist();
            $PlaylistNueva->user_id = $Usuario->id;
            $PlaylistNueva->image_url = $ImagenDefault;
            $PlaylistNueva->name = "Para el Gym";
            $PlaylistNueva->save();

            $Rel1 = new PlaylistTrack();
            $Rel1->playlist_id = $PlaylistNueva->id;
            $Rel1->track_id = $MUTILATION->id;
            $Rel1->save();

            $Rel2 = new PlaylistTrack();
            $Rel2->playlist_id = $PlaylistNueva->id;
            $Rel2->track_id = $TORN->id;
            $Rel2->save();

            $Rel3 = new PlaylistTrack();
            $Rel3->playlist_id = $PlaylistNueva->id;
            $Rel3->track_id = $ScreamTrack->id;
            $Rel3->save();

            $Rel4 = new PlaylistTrack();
            $Rel4->playlist_id = $PlaylistNueva->id;
            $Rel4->track_id = $SCREAMB->id;
            $Rel4->save();

            $Like1 = new TrackLike();
            $Like1->user_id = $Usuario->id;
            $Like1->track_id = $TORN->id;
            $Like1->save();

        });
    }
}
