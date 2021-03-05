<?php

class DataLayer
{
    /**
     *  @return array
     */
    function getInDoor() {
        return array("tv", "puzzle", "movies", "reading", "cooking", "playing cards", "board games", "video games");
    }

    /**
     * @return array
     */
    function getOutDoor() {
        return array("hiking", "walking", "biking", "climbing", "swimming", "collecting");
    }
}