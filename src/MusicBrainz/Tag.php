<?php

namespace MusicBrainz;

/**
 * Represents a tag object.
 *
 */
class Tag
{
    public $name;
    public $score;

    public function __construct(array $tag)
    {

        $this->name  = isset($tag['name']) ? (string) $tag['name'] : '';
        $this->score = isset($tag['score']) ? (string) $tag['score'] : '';

    }
}
