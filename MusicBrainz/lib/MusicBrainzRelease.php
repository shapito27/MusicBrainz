<?php
/**
 * Represents a release object.
 * 
 */
class MusicBrainzRelease {
    
    private $artist;
    private $title;
    private $status;
    private $id;
    private $discCount;
    private $asin;
    private $tracks;
    private $score;
    private $tracksOffset;
    
    private $incList = array('artists', 'releases');

    
    function __construct(SimpleXMLElement $xml ){

        $this->id     = (string) $xml['id'];
        $this->title  = $xml->title;
        $this->status = $xml->status;

        //more to come #todo
    }

    /**
     * Get included releases from the XML of another entity
     *
     * @static
     * @param SimpleXMLElement $result
     * @param $entity string
     * @return array
     */
    public static function getIncludedReleases(SimpleXMLElement $result, $entity) {
    
        $releases = array();
        
        if (isset($result->$entity->{'release-list'}))
        {
            foreach ( $result->$entity->{'release-list'}->release as $release)
            {
                $releases[] = new self($release);
            }
        }
        
        return $releases;
    }
}

