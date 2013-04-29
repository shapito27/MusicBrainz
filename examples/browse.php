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

require_once '../vendor/autoload.php';

//Create new phpBrainz object
$brainz = new MusicBrainz();
$brainz->setUserAgent('ApplicationName', '0.1', 'http://example.com');

$includes = array('labels', 'recordings');
try {
    $details = $brainz->browseRelease('artist', '6fe07aa5-fec0-4eca-a456-f29bff451b04', $includes, 2);
    print_r($details);
} catch (Exception $e) {
    print $e->getMessage();
}

print "\n\n";

$includes = array('aliases', 'ratings');
try {
    $details = $brainz->browseArtist('recording', 'd615590b-1546-441d-9703-b3cf88487cbd', $includes);
    print_r($details);
} catch (Exception $e) {
    print $e->getMessage();
}

print "\n\n";

$includes = array('aliases');
try {
    $details = $brainz->browseLabel('artist', '6fe07aa5-fec0-4eca-a456-f29bff451b04', $includes);
    print_r($details);
} catch (Exception $e) {
    print $e->getMessage();
}

print "\n\n";

$includes = array('aliases');
try {
    $details = $brainz->browseLabel('release', 'b072b162-a733-3137-a4a0-4375172d98c9', $includes);
    print_r($details);
} catch (Exception $e) {
    print $e->getMessage();
}
