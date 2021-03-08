<?php

class DataLayer
{
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