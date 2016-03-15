<?php

require_once 'database.class.php';

class Api
{
    private $db;

    public function __construct(Database $db) {
        $this->db = $db;
    }

    public function saveScore($username, $ticks) {
        $db = $this->db;
        $query = 'INSERT INTO ticks_to_1000_bitcoin (username, ticks) VALUES (:username, :ticks)';
        $db->query($query);
        $db->bind(':username', $username);
        $db->bind(':ticks', $ticks);
        $result = $db->execute();
        return $result;
    }

    public function getScores() {
        $db = $this->db;
        $query = 'SELECT username, ticks FROM ticks_to_1000_bitcoin ORDER BY ticks DESC';
        $db->query($query);
        $results = $db->resultset();
        return $results;
    }
}