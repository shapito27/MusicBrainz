<?php

namespace MusicBrainz;

/**
 * Represents a MusicBrainz Recording
 *
 */
class Recording
{
    public $id;
    public $title;
    public $releases = array();

    public function __construct(array $recording)
    {

        $this->id        = (string) $recording['id'];
        $this->title     = (string) $recording['title'];

    }

    /**
     * Get included recordings from the XML of another entity
     *
     * @static
     * @param SimpleXMLElement $result
     * @param $entity string
     * @return array
     */
    public static function getIncluded(\SimpleXMLElement $result, $entity)
    {
        $recordings = array();

        if (isset($result->$entity->{'recording-list'})) {
            foreach ($result->$entity->{'recording-list'}->recording as $recording) {
                $recordings[] = new self($recording);
            }
        }

        return $recordings;
    }
}