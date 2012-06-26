<?php

$curdir = dirname(__FILE__)."/";

/*
require($curdir."lib/phpBrainz2.abstractFilter.class.php");

require($curdir."lib/phpBrainz2.releaseFilter.class.php");
require($curdir."lib/phpBrainz2.trackFilter.class.php");
require($curdir."lib/phpBrainz2.artistFilter.class.php");

require($curdir."lib/phpBrainz2.track.class.php");
require($curdir."lib/phpBrainz2.release.class.php");
*/

require($curdir."lib/phpBrainz2.entity.php");
require($curdir."lib/phpBrainz2.artist.php");
require($curdir."lib/phpBrainz2.release.php");


class phpBrainz2 {	
    
    const URL = 'http://musicbrainz.org/ws/2/';

    private $user_agent;
    private $user_agent_client;
    
    /**
     * Set the user agent for POST requests
     * 
     */
    public function setUserAgent($application_name, $version, $contact_info) {
        
        if ( strpos($version, '-') !== false )
        {
            throw new Exception('User agent: version should not contain a "-" character.');
        }
        
        $this->user_agent = $application_name . '/' . $version . ' ( ' . $contact_info . ' )';
        $this->user_agent_client = $application_name . '-' . $version;
        
    }
    
    /* ======================================
     * 
     * LOOKUP
     * 
     * ======================================
     */

    public function lookupArtist($mbid, $inc = array())
    {
        $this->_checkAllowedInc('artist', $inc);
        $result = $this->_lookup('artist', $mbid, $inc);
        $data['artist'] = new phpBrainz2_Artist($result);
        foreach ($inc as $include) {
            $func = $this->_mapIncToMethod($include);
            $data[$include] = call_user_func($func, $result, 'artist');
        }
        return $data;
    }

    public function lookupLabel($mbid, $inc = array()) {
        
    }

    public function lookupRecording($mbid, $inc = array()) {
        
    }

    public function lookupRelease($mbid, $inc = array()) {
        
    }

    public function lookupReleaseGroup($mbid, $inc = array()) {
        
    }

    public function lookupWork($mbid, $inc = array()) {
        
    }

    /* ======================================
     * 
     * BROWSE
     * 
     * ======================================
     */
    

    public function browseArtist($entity, $mbid, $limit, $offset, array $inc) {
        
    }

    public function browseLabel($entity, $mbid, $limit, $offset, array $inc) {
        
    }

    public function browseRecording($entity, $mbid, $limit, $offset, array $inc) {
        
    }

    public function browseRelease($entity, $mbid, $limit, $offset, array $inc) {
        
    }

    public function browseReleaseGroup($entity, $mbid, $limit, $offset, array $inc) {
        
    }

    public function browseWork($entity, $mbid, $limit, $offset, array $inc) {
        
    }

    

    /* ======================================
     * 
     * SEARCH
     * 
     * ======================================
     */
    

    public function searchArtist($query, $limit, $offset) {
        
    }

    public function searchLabel($query, $limit, $offset) {
        
    }

    public function searchRecording($query, $limit, $offset) {
        
    }

    public function searchRelease($query, $limit, $offset) {
        
    }

    public function searchReleaseGroup($query, $limit, $offset) {
        
    }

    public function searchWork($query, $limit, $offset) {
        
    }

    
    /* ======================================
     * 
     * PRIVATE
     * 
     * ======================================
     */
    
    /**
     * Generic lookup method
     * 
     * @param type $entity
     * @param type $mbid
     * @param type $inc
     * @return SimpleXMLElement
     * @throws Exception 
     */
    private function _lookup($entity, $mbid, $inc) {
        
        $uri = self::URL.$entity.'/'.$mbid;
        
        if (!empty($inc))
        {
            $uri .= '?inc=' . implode('+', $inc);
        }
        
        $result = @simplexml_load_file($uri);
        
        if ( ! $result) {
            throw new Exception("The $entity lookup failed.");   ###throw custom Exception rather
        }
        
        return $result;
    }
	
    
    private function _checkAllowedInc($entity, $inc) {
    
        if ($inc[0] !== 'releases') {
            throw new Exception("$inc[0] may not be included for $entity");
        }
        
    }
  
    
    private function _mapIncToMethod($inc) {
    
        $map = array(
            'releases' => 'phpBrainz2_Release::getReleases',
        );
        
        return $map[$inc];
    }
}
?>