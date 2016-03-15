<?php

require_once 'database.class.php';
require_once 'api.class.php';

$db = new Database();
$api = new Api($db);

if (isset($_GET['ticks'])) {
    $api->saveScore($_GET['ticks']);
}
