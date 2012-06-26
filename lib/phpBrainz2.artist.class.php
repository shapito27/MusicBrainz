<?php

/**
 * Represents a MusicBrainz artist.
 * 
 */
class phpBrainz2_Artist extends phpBrainz2_Entity {
    
    private $id;
    private $name;
    private $sortName;
    private $beginDate;
    private $endDate;
    private $type;
    private $disambiguation;
    private $releasesCount;
    private $releasesOffset;
    
    private $incList = array('recordings', 'releases', 'release-groups', 'works');
    
    
    
    function __construct(){}
    
    public function setName($name){
        $this->name = $name;
    }
    public function getName(){
        return $this->name;
    }
    
    public function setId($id){
        $this->id = $id;        
    }
    
    public function getId(){
        return $this->id;
    }
    
    public function setSortName($sortName){
        $this->sortName = $sortName;
    }
    
    public function getSortName(){
        return $this->sortName;
    }
    
    public function setBeginDate($beginDate){
        $this->beginDate = $beginDate;
    }
    public function getBeginDate(){
        return $this->beginDate;
    }
    
    public function setEndDate($endDate){
        $this->endDate = $endDate;
    }
    public function getEndDate(){
        return $this->endDate;
    }
    
    public function getType(){
        return $this->type;
    }
    
    public function setType($type){
        #TODO Validate the type
        $this->type = $type;
    }
    
    public function getDisambiguation(){
        return $this->disambiguation;
    }
    
    public function setDisambiguation($disambiguation){
        $this->disambiguation = $disambiguation;
    }
    
    public function getReleasesCount(){
        return $this->releasesCount;
    }
    
    public function setReleasesCount($count){
        $this->releasesCount = $count;
    }
    
    public function equals(phpBrainz_Artist $compareObj){
        if(
            $this->id           == $compareObj->getId() || (
            $this->name         == $compareObj->getName() &&
            $this->sortName     == $compareObj->getSortName() &&
            $this->beginDate    == $compareObj->getBeginDate() &&
            $this->endDate      == $compareObj->getEndDate())
            ){
                return true;
            }
        return false;
    }
}