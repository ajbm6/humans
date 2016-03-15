<?php

require_once 'database.class.php';
require_once 'api.class.php';

$db = new Database();
$api = new Api($db);

if (isset($_GET['ticks'])) {
    $username = isset($_GET['username']) ? $_GET['username'] : '';
    $ticks = $_GET['ticks'];
    $api->saveScore($username, $ticks);
}

if (isset($_GET['action']) && $_GET['action'] == 'get_scores') {
    echo json_encode($api->getScores());
}