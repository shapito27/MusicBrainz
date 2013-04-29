<?php

namespace MusicBrainz;

/**
 * Represents a MusicBrainz artist.
 *
 */
class Artist
{
    public $id;
    private $type;
    public $name;
    private $sortName;
    private $gender;
    private $country;
    private $beginDate;
    private $endDate;

    private $data;

    private $releases = array();

    public function __construct(array $artist)
    {
        $this->data = $artist;
        $this->id        = isset($artist['id']) ? (string) $artist['id'] : '';
        $this->type      = isset($artist['type']) ? (string) $artist['type'] : '';
        $this->name      = isset($artist['name']) ? (string) $artist['name'] : '';
        $this->sortName  = isset($artist['sort-name']) ? (string) $artist['sort-name'] : '';
        $this->gender    = isset($artist['gender']) ? (string) $artist['gender'] : '';
        $this->country   = isset($artist['country']) ? (string) $artist['country'] : '';
        $this->beginDate = isset($artist['life-span']) ? (string) $artist['life-span']['begin'] : '';
        $this->endDate   = isset($artist['life-span']) ? (string) $artist['life-span']['ended'] : '';
    }

    /**
     *  Magic getter
     */
    public function __get($var)
    {
       return isset($this->$var) ? $this->$var : null;
    }

    /**
     *  The following methods are the getters for includes
     */

    public function getReleases()
    {
        return Release::getIncluded($this->xml, 'artist');
    }

    public function getRecordings()
    {
        return Recording::getIncluded($this->xml, 'artist');
    }

    public function getReleaseGroups()
    {
        return ReleaseGroup::getIncluded($this->xml, 'artist');
    }

}
