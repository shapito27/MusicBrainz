<pre><?php
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA

phpBrainz is a php class for querying the musicbrainz web service.
Copyright (c) 2007 Jeff Sherlock

*/
use MusicBrainz\MusicBrainz;
use Guzzle\Http\Client;

require_once '../vendor/autoload.php';

//Create new phpBrainz object
$brainz = new MusicBrainz(new Client(), 'username', 'password');
$brainz->setUserAgent('ApplicationName', '0.1', 'http://example.com');



$includes = array(
    'releases',
    'recordings',
    'release-groups',
    'user-ratings'
);
try {
    $artist = $brainz->lookup('artist', '4dbf5678-7a31-406a-abbe-232f8ac2cd63', $includes);  //bryan adams
    print_r($artist);
} catch (Exception $e) {
    print $e->getMessage();
}

print "\n\n";

try {
    //born this way: the remix
    $releaseGroup = $brainz->lookup('release-group', 'e4307c5f-1959-4163-b4b1-ded4f9d786b0');
    print_r($releaseGroup);
} catch (Exception $e) {
    echo $e->getMessage();
}



