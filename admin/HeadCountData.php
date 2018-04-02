<?php
/* Team: Red
 * Group: Client
 * Contributors: Ford Polia, Giles Holmes
 */

class HeadCountData
{
    private $roomID;
    private $timeSlot;
    private $headCount;
    private $headCountSlot;
    private $userID;
    private $timestamp;

    public function __construct($roomID, $timeSlot, $headCount, $headCountSlot, $userId, $timestamp)
    {
        $this->roomID = $roomID;
        $this->timeSlot = $timeSlot;
        $this->headCount = $headCount;
        $this->headCountSlot = $headCountSlot;
        $this->userID = $userId;
        $this->timestamp = $timestamp;
    }

    /**
     * Returns the room ID in the head count data
     * @return String
     */
    public function getRoomID(){
        return $this->roomID;
    }

    /**
     * Returns the time slot in the head count data
     * @return String
     */
    public function getTimeSlot(){
        return $this->timeSlot;
    }

    /**
     * Returns the head count
     * @return Integer
     */
    public function getHeadCount(){
        return $this->headCount;
    }

    /**
     * Returns the head count slot (beginning, middle, end) in the head count data
     * @return String
     */
    public function getHeadCountSlot(){
        return $this->headCountSlot;
    }

    /**
     * Returns the user ID in the head count data
     * @return String
     */
    public function getUserID(){
        return $this->userID;
    }

    /**
     * Returns the timestamp in the head count data
     * @return DateTime
     */
    public function getTimestamp(){
        return $this->timestamp;
    }

}