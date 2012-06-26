<?php

abstract class phpBrainz2_Entity {

    protected $MBID;   //MusicBrainz ID
    
    private $ALLOWED_INC = array(
        'discids', 'media', 'puids', 'isrcs', 'artist-credits', 'various-artists',
        'aliases',
        'tags', 'ratings',  //not valid on releases - ###
        'user-tags', 'user-ratings'  //requires auth
    );

    protected function doRequest($query_string);
    
    protected function lookup($mbid, array $inc);

    protected function browse($mbid, array $inc);

    protected function search($mbid, array $inc);

    
}


?>
