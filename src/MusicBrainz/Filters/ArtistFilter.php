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

use MusicBrainz\Artist;

/**
 * class LabelFilter
 * @author Jeff Sherlock
 * @copyright Jeff Sherlock 2007
 * @package phpBrainz
 * @name LabelFilter
 *
 */
class ArtistFilter extends AbstractFilter implements FilterInterface
{
    protected $validArgTypes =
        array(
            'arid',
            'artist',
            'artistaccent',
            'alias',
            'begin',
            'comment',
            'country',
            'end',
            'ended',
            'gender',
            'ipi',
            'sortname',
            'tag',
            'type'
        );

    public function getEntity()
    {
        return 'artist';
    }

    public function parseResponse(array $response)
    {
        $artists = array();
        if (isset($response['artist'])) {
            foreach ($response['artist'] as $artist) {
                $artists[] = new Artist($artist);
            }
        } elseif (isset($response['artists'])) {
            foreach ($response['artists'] as $artist) {
                $artists[] = new Artist($artist);
            }
        }

        return $artists;
    }
}
