<?php

$dir = dirname(__FILE__);

require_once($dir . '/lib/MusicBrainzArtist.php');

/**
 * Musicbrainz XML web service
 *
 * http://musicbrainz.org/doc/XML_Web_Service
 *
 * @author Chris Dawson chrisd@wson.co.za
 */
class MusicBrainz {
    
    const URL = 'http://musicbrainz.org/ws/2/';

    private static $allowed_entities = array('artist', 'label', 'recording', 'release', 'release-group', 'work');

    private static $allowed_includes = array(
        'artist' => array('recordings', 'releases', 'release-groups', 'works'),
        //more to come.... #todo
    );


    private $user_agent;
    private $user_agent_client;


    /**
     * Do a MusicBrainz lookup
     *
     * http://musicbrainz.org/doc/XML_Web_Service
     *
     * @param $entity
     * @param $mbid
     * @param array $inc
     * @return object | bool
     */
    public function lookup($entity, $mbid, $inc = array())
    {

        if ( ! $this->_checkAllowedEntity($entity) )
        {
            return false;
        }

        $this->_checkAllowedIncludes($entity, $inc);

        $uri = self::URL . $entity . '/' . $mbid;

        if ( ! empty($inc) )
        {
            $uri .= '?inc=' . implode('+', $inc);
        }

        $result = simplexml_load_file($uri);

        if ( ! $result ) {
            throw new Exception("The $entity lookup failed.");   ###throw custom Exception rather
        }

        $class_name = 'MusicBrainz' . ucfirst($entity);

        $object = new $class_name($result);

        //not sure yet how this will work...
        /*foreach ($inc as $include) {
            $func = $this->_mapIncToMethod($include);
            $data[$include] = call_user_func($func, $result, 'artist');
        }*/

        return $object;
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
     * Check the list of allowed entities
     *
     * @param $entity
     * @return bool
     */
    private function _checkAllowedEntity($entity)
    {
        return in_array($entity, self::$allowed_entities);
    }
    
    private function _checkAllowedIncludes($entity, $inc)
    {
        if ( ! isset(self::$allowed_includes[$entity]))
        {
            return false;
        }
        return in_array($inc, self::$allowed_includes[$entity]);
    }
  
    
    private function _mapIncToMethod($inc) {
    
        $map = array(
            'releases' => 'phpBrainz2_Release::getReleases',
        );
        
        return $map[$inc];
    }


    /**
     * Set the user agent for POST requests
     *
     * @param $application_name
     * @param $version
     * @param $contact_info
     * @throws Exception
     */
    public function setUserAgent($application_name, $version, $contact_info) {

        if ( strpos($version, '-') !== false )
        {
            throw new Exception('User agent: version should not contain a "-" character.');
        }

        $this->user_agent = $application_name . '/' . $version . ' ( ' . $contact_info . ' )';
        $this->user_agent_client = $application_name . '-' . $version;

    }


}
?>