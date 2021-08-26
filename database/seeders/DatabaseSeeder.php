<?php

namespace Database\Seeders;

use App\Models\Album;
use App\Models\Artist;
use App\Models\Genre;
use App\Models\Track;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
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

        });
    }
}
