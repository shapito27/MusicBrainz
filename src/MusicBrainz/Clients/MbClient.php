<?php

namespace MusicBrainz\Clients;

/**
 * MusicBrainz HTTP Client interface
 */
abstract class MbClient
{
    const URL = 'http://musicbrainz.org/ws/2';

    /**
     * Perform an HTTP request on MusicBrainz
     *
     * @param  string  $path
     * @param  array   $params
     * @param  array   $options
     * @param  boolean $isAuthRequired
     *
     * @return array
     */
    abstract public function call($path, array $params = array(), array $options = array(), $isAuthRequired = false);
}
