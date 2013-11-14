<?php

namespace MusicBrainz;

/**
 * Represents a MusicBrainz release group
 *
 */
class ReleaseGroup
{
    public $id;

    private $data;
    private $brainz;
    private $releases = array();

    /**
     * @param array       $releaseGroup
     * @param MusicBrainz $brainz
     */
    public function __construct(array $releaseGroup, MusicBrainz $brainz)
    {
        $this->data   = $releaseGroup;
        $this->brainz = $brainz;

        $this->id = isset($releaseGroup['id']) ? (string)$releaseGroup['id'] : '';
    }

    /**
     * @return string
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string
     */
    public function getTitle()
    {
        return $this->data['title'];
    }

    public function getScore()
    {
        return $this->data['score'];
    }

    public function getReleases()
    {
        if (!empty($this->releases)) {
            return $this->releases;
        }

        foreach ($this->data['releases'] as $release) {
            array_push($this->releases, new Release($release, $this->brainz));
        }

        return $this->releases;
    }
}
