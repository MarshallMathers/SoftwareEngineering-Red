<?php
/**
 * Created by PhpStorm.
 * User: poliaf
 * Date: 3/26/18
 * Time: 1:56 PM
 */

class RoomData
{
    private $roomID;
    private $roomName;
    private $capacity;

    public function __construct($roomID, $roomName, $capacity)
    {
        $this->roomID = $roomID;
        $this->capacity = $capacity;
        $this->roomName = $roomName;
    }

    /**
     * Returns the room's ID
     * @return String - room ID
     */
    public function getRoomID(){
        return $this->roomID;
    }

    /**
     * Returns the room's name
     * @return String - name of the room
     */
    public function getRoomName(){
        return $this->roomName;
    }

    /**
     * Returns the room's capacity
     * @return String - capacity of the room
     */
    public function getCapacity(){
        return $this->capacity;
    }

    /**
     * Sets the room's name
     * @param String $name - new name of the room
     * @return void
     */
    public function setRoomName(String $name){
        $this->roomName = $name;
        return;
    }

    /**
     * Sets the room's capacity
     * @param int $capacity - new capacity of the room
     * @return void
     */
    public function setCapacity(Integer $capacity){
        $this->capacity = $capacity;
        return;
    }
}