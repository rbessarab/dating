<?php

class DataLayer
{
    private $_dbh;

    /**
     * DataLayer constructor.
     * @param $dbh
     */
    public function __construct($dbh)
    {
        $this->_dbh = $dbh;
    }

    /**
     * Inserting member's info into database
     * @param $member
     */
    function insertMember($member) {

    }

    /**
     * Getting all members from database
     */
    function getMembers() {

    }

    /**
     * Getting member's info from database
     * @param $member_id
     */
    function getMember($member_id) {

    }

    /**
     * Getting member's interests from the database
     * @param $member_id
     */
    function getInterests($member_id) {

    }

    /**
     *  @return array
     */
    function getInDoor() {
        return array("tv", "puzzles", "movies", "reading", "cooking", "playing cards", "board", "video");
    }

    /**
     * @return array
     */
    function getOutDoor() {
        return array("hiking", "walking", "biking", "climbing", "swimming", "collecting");
    }
}