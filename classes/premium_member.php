<?php

/**
 * Class PremiumMember represents premium member account
 */
class PremiumMember extends Member
{
    private $_inDoorInterests;
    private $_outDoorInterests;

    /**
     * @return array
     */
    function getInDoorInterests()
    {
        return $this->_inDoorInterests;
    }

    /**
     * @param array $inDoorInterests
     */
    function setInDoorInterests($inDoorInterests)
    {
        $this->_inDoorInterests = $inDoorInterests;
    }

    /**
     * @return array
     */
    function getOutDoorInterests()
    {
        return $this->_outDoorInterests;
    }

    /**
     * @param array $outDoorInterests
     */
    function setOutDoorInterests($outDoorInterests)
    {
        $this->_outDoorInterests = $outDoorInterests;
    }


}
