<?php

error_reporting(E_ALL);
@ini_set('display_errors', 1);

include '../MusicBrainz/MusicBrainz.php';

$mb = new MusicBrainz();

// Artist lookup

$artist = $mb->lookup('artist', '4dbf5678-7a31-406a-abbe-232f8ac2cd63' );  //bryan adams

print_r($artist);


// Artist lookup with release list

//$artist_with_releases = $mb->lookup('artist', '4dbf5678-7a31-406a-abbe-232f8ac2cd63', array('releases') );  //bryan adams
//print_r($artist_with_releases);  //TODO: get release list into the object

