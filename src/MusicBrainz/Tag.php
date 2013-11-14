<?php

namespace MusicBrainz;

/**
 * Represents a MusicBrainz tag object
 *
 */
class Tag
{
    public $name;
    public $score;

    private $data;

    /**
     * @param array       $tag
     * @param MusicBrainz $brainz
     */
    public function __construct(array $tag, MusicBrainz $brainz)
    {
        $this->data   = $tag;
        $this->brainz = $brainz;

        $this->name  = isset($tag['name']) ? (string)$tag['name'] : '';
        $this->score = isset($tag['score']) ? (string)$tag['score'] : '';
    }
}
