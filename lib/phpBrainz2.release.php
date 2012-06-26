<?php
/**
 * Represents a release object.
 * 
 */
class phpBrainz2_Release {
    
    private $artist;
    private $title;
    private $tracksCount;
    private $id;
    private $discCount;
    private $asin;
    private $tracks;
    private $score;
    private $tracksOffset;
    
    private $incList = array('artists', 'releases');

    
    function __construct(){
    	$this->tracks = array();
    }
    
    function getReleases(SimpleXMLElement $result, $entity) {
    
        $releases = array();
        
        if (isset($result->$entity->{'release-list'})) {
            
            foreach ( $result->$entity->{'release-list'}->release as $release) {
                
                $releases[] = new self($release);
                
            }
            
            
        }
        
        return $releases;
    }
}

?>