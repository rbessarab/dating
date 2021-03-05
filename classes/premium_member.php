<?php

class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * PremiumMember constructor.
     * @param $_inDoorInterests
     * @param $_outDoorInterests
     */
    public function __construct($_fname, $_lname, $_age, $_gender, $_phone, $_inDoorInterests, $_outDoorInterests)
    {
        parent::__construct($_fname, $_lname, $_age, $_gender, $_phone);
        $this->_inDoorInterests = $_inDoorInterests;
        $this->_outDoorInterests = $_outDoorInterests;
    }


}
