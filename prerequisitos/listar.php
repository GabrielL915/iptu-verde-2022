<?php

$connection = require __DIR__ . '/../connection.php';

$sql = "SELECT * FROM prerequisitos";
$result = $connection->query($sql);
$rows = $result->fetchAll();

$json_result = [
	'type' => 'array',
	'items' => []
];
foreach ($rows as $row) {
	$json_result['items'][$row['id']] = $row['prerequisito'];
}

header('Content-Type: application/json');

print json_encode($json_result);