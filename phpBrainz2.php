<?php

$curdir = dirname(__FILE__)."/";

/*
require($curdir."lib/phpBrainz2.abstractFilter.class.php");

require($curdir."lib/phpBrainz2.releaseFilter.class.php");
require($curdir."lib/phpBrainz2.trackFilter.class.php");
require($curdir."lib/phpBrainz2.artistFilter.class.php");

require($curdir."lib/phpBrainz2.artist.class.php");
require($curdir."lib/phpBrainz2.track.class.php");
require($curdir."lib/phpBrainz2.release.class.php");
*/


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

    public function lookupArtist($mbid, array $inc) {
        $result = $this->_lookup('artist', $mbid, $inc);
        return $result;
    }

    public function lookupLabel($mbid, array $inc) {
        
    }

    public function lookupRecording($mbid, array $inc) {
        
    }

    public function lookupRelease($mbid, array $inc) {
        
    }

    public function lookupReleaseGroup($mbid, array $inc) {
        
    }

    public function lookupWork($mbid, array $inc) {
        
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
    
    private function _lookup($entity, $mbid, $inc) {
        
        $xml = @simplexml_load_file(self::URL);
        
        if (!$xml) {
            throw new Exception("The $entity lookup failed.");   ###throw custom Exception
        }
        
        $result = $this->_parse_MB_xml($xml);
        
        return $result;
    }
	
}
?>