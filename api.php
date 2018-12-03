<?php

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $logs = file_get_contents("logs.json");
    $json = json_decode($logs);
    $newlog = file_get_contents('php://input');
    array_push($json->logs, $newlog);
    $logs = json_encode($json);
    file_put_contents("logs.json", $logs);
}

if ($_SERVER['REQUEST_METHOD'] === 'DELETE') {
    $logs = file_get_contents("logs.json");
    $json = json_decode($logs);
    $json->logs = [];
    $logs = json_encode($json);
    file_put_contents("logs.json", $logs);
}

$logs = file_get_contents("logs.json");

echo $logs;

?>