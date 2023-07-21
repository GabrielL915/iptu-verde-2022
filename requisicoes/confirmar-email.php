<?php
header('content-type: application/json');

$email = $_GET['email'] ?? null;

$connection = include __DIR__ . '/../connection.php';

// TODO urgente fazer o prepare
$sql = "SELECT * FROM requisicoes WHERE email = '";
$sql .= $email . "'";

$result = $connection->query($sql);
$rows = $result->fetchAll();

if (!count($rows)) {
    print json_encode([
        'type' => 'error',
        'message' => 'Email não encontrado'
    ]);
    exit;
}

print json_encode([
    'type' => 'array',
    'result' => [
        'email' => $rows[0]['email'],
        'status' => $rows[0]['status'],
        'ultima_atualizacao' => $rows[0]['atualizado_em']
    ]
]);