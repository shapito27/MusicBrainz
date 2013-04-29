<?php
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

namespace MusicBrainz\Filters;

use MusicBrainz\Recording;

/**
 *
 * @author Jeff Sherlock
 * @copyright Jeff Sherlock 2007
 * @package phpBrainz
 * @name phpBrainz_TrackFilter
 *
 */
class RecordingFilter extends AbstractFilter implements FilterInterface
{
    public $validArgTypes =
        array(
            'arid',
            'artist',
            'artistname',
            'creditname',
            'comment',
            'country',
            'date',
            'dur',
            'format',
            'isrc',
            'number',
            'position',
            'primarytype',
            'puid',
            'qdur',
            'recording',
            'recordingaccent',
            'reid',
            'release',
            'rgid',
            'rid',
            'secondarytype',
            'status',
            'tnum',
            'tracks',
            'tracksrelease',
            'tag',
            'type'
        );

    public function getEntity()
    {
        return 'recording';
    }

    public function parseResponse(array $response)
    {
        $recordings = array();
        if (isset($response['recording'])) {
            foreach ($response['recording'] as $recording) {
                $recordings[] = new Recording($recording);
            }
        } elseif (isset($response['recordings'])) {
            foreach ($response['recordings'] as $recording) {
                $recordings[] = new Recording($recording);
            }
        }

        return $recordings;
    }

}
