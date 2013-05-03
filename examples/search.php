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
use MusicBrainz\Filters\ArtistFilter;
use MusicBrainz\Filters\RecordingFilter;
use MusicBrainz\Filters\LabelFilter;
use Guzzle\Http\Client;

require_once '../vendor/autoload.php';

//Create new phpBrainz object
$brainz = new MusicBrainz(new Client());
$brainz->setUserAgent('ApplicationName', '0.1', 'http://example.com');

$args = array(
    "artist"     => 'Weezer'
);
try {
    $artists = $brainz->search(new ArtistFilter($args));
    print_r($artists);
} catch (Exception $e) {
    print $e->getMessage();
}

print "\n\n";

$args = array(
    "recording"  => "Buddy Holly",
    "artist"     => 'Weezer',
    "creditname" => 'Weezer',
    "status"     => 'Official'
);
try {
    $recordings = $brainz->search(new RecordingFilter($args));
    print_r($recordings);
} catch (Exception $e) {
    print $e->getMessage();
}

print "\n\n";

$args = array(
    "label"  => "Devils"
);
try {
    $labels = $brainz->search(new LabelFilter($args));
    print_r($labels);
} catch (Exception $e) {
    print $e->getMessage();
}
