<?php

require_once 'database.class.php';

class Api
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function saveScore($ticks) {
        $db = $this->db;
        $query = 'INSERT INTO ticks_to_1000_bitcoin (ticks) VALUES (:ticks)';
        $db->query($query);
        $db->bind(':ticks', $ticks);
        $result = $db->execute();
        return $result;
    }
}