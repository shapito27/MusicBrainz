<?php

error_reporting(E_ALL);
@ini_set('display_errors', 1);

include 'MusicBrainz/MusicBrainz.php';

$pb2 = new MusicBrainz();


$include = array('releases');

/* @var $artist phpBrainz2_Artist */

$mbData = $pb2->lookupArtist('4dbf5678-7a31-406a-abbe-232f8ac2cd63', $include);  //bryan adams

print_r($mbData);




