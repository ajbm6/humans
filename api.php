<?php

require_once 'database.class.php';
require_once 'api.class.php';

$db = new Database();
$api = new Api($db);

if (isset($_POST['ticks'])) {
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $ticks = $_POST['ticks'];
    $result = $api->saveScore($username, $ticks);
    echo $result;
}

if (isset($_GET['action']) && $_GET['action'] == 'get_scores') {
    echo json_encode($api->getScores());
}