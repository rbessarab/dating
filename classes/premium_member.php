<?php

/**
 * Class PremiumMember represents premium member account
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * @return String
     */
    function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param String $inDoorInterests
     */
    function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return String
     */
    function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param String $outDoorInterests
     */
    function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}
