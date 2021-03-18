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
        //Define the query
        $sql = "INSERT INTO `member`(`fname`, `lname`, `age`, `gender`, `phone`, `email`, `state`, `seeking`, `bio`, `premium`) 
	            VALUES (:fname, :lname, :age, :gender, :phone, :email, :state, :seeking, :bio, 1)";

        //Prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //Bind the parameters
        $statement->bindParam(':fname', $member->getFname(), PDO::PARAM_STR);
        $statement->bindParam(':lname', $member->getLname(), PDO::PARAM_STR);
        $statement->bindParam(':age', $member->getAge(), PDO::PARAM_STR);
        $statement->bindParam(':gender', $member->getGender(), PDO::PARAM_STR);
        $statement->bindParam(':phone', $member->getPhone(), PDO::PARAM_STR);
        $statement->bindParam(':email', $member->getEmail(), PDO::PARAM_STR);
        $statement->bindParam(':state', $member->getState(), PDO::PARAM_STR);
        $statement->bindParam(':seeking', $member->getSeeking(), PDO::PARAM_STR);
        $statement->bindParam(':bio', $member->getBio(), PDO::PARAM_STR);
        //$statement->bindParam(':interests', $member->getInDoorInterests(), PDO::PARAM_STR);

        //Execute
        $statement->execute();
    }

    /**
     * Getting all members from database
     */
    function getMembers() {
        $sql = "SELECT * FROM members";

        //prepare the statement
        $statement = $this->_dbh->prepare($sql);

        //execute
        $statement->execute();

        //Get the results
        return $statement->fetchAll(PDO::FETCH_ASSOC);
    }

    /**
     * Getting member's info from database
     * @param $member_id
     */
    function getMember($member_id) {
        $sql = "SELECT * FROM members WHERE member_id = $member_id";
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