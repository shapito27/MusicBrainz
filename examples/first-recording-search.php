<pre><?php

use Guzzle\Http\Client;
use MusicBrainz\Filters\RecordingFilter;
use MusicBrainz\MusicBrainz;

require dirname(__DIR__) . '/vendor/autoload.php';

//Create new MusicBrainz object
$brainz = new MusicBrainz(new Client(), 'username', 'password');
$brainz->setUserAgent('ApplicationName', '0.2', 'http://example.com');

// set some defaults
$releaseDate    = new DateTime();
$artistId       = null;
$songId         = null;
$trackLen       = -1;
$albumName      = '';
$lastScore      = null;
$firstRecording = array(
    'release'     => null,
    'relaseDate'  => new DateTime(),
    'recording'   => null,
    'artistId'    => null,
    'recordingId' => null,
    'trackLength' => null
);


$args = array(
    "recording" => 'we will rock you',
    "artist"    => 'Queen',
    'status'    => 'official',
    'country'   => 'GB'
);
try {
    $recordings = $brainz->search(new RecordingFilter($args));

    /** @var $recording \MusicBrainz\Recording */
    foreach ($recordings as $recording) {

        // if the recording has a lower score than the previous recording, stop the loop.
        // This is because scores less than 100 usually don't match the search well
        if (null != $lastScore && $recording->getScore() < $lastScore) {
            break;
        }

        $lastScore        = $recording->getScore();
        $releaseDates     = $recording->getReleaseDates();
        $oldestReleaseKey = key($releaseDates);

        if (strtoupper($recording->getArtist()->getName()) == strtoupper($args['artist'])
            && $releaseDates[$oldestReleaseKey] < $releaseDate
        ) {

            $firstRecording = array(
                'release'     => $recording->releases[$oldestReleaseKey],
                'relaseDate'  => $recording->releases[$oldestReleaseKey]->getReleaseDate(),
                'recording'   => $recording,
                'artistId'    => $recording->getArtist()->getId(),
                'recordingId' => $recording->getId(),
                'trackLength' => $recording->getLength('long')
            );
        }
    }

    var_dump(array($firstRecording));
} catch (Exception $e) {
    print ($e->getMessage());
}
