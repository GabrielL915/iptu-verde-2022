<?php

header('content-type: application/json');

$email = $_GET['email'] ?? null;
$code = (int) $_GET['code'];

$connection = include __DIR__ . '/../connection.php';

// TODO urgente fazer o prepare
$sql = "SELECT * FROM requisicoes INNER JOIN cadastro_tipos ON (id_cadastro_tipo = cadastro_tipos.id) WHERE email = '";
$sql .= $email . "' AND codigo_confirmacao = " . $code;

$result = $connection->query($sql);
$rows = $result->fetchAll();

if (!count($rows)) {
    print json_encode([
        'type' => 'error',
        'message' => 'Email não encontrado'
    ]);
    exit;
}

$sql = "SELECT * FROM requisitos_solicitados";
$sql .= " inner join requisitos on (requisitos_solicitados.requisito = requisitos.id)";
$sql .= " WHERE requisicao = " . $rows[0]['codigo'];

$requisitos_solicitados = [];

$result2 = $connection->query($sql);
$rows2 = $result2->fetchAll();

$requisitos_solicitados = array_map( function($row){
    return [
        'requisito' => $row['requisito'],
        'desconto_solicitado' => $row['desconto_solicitado'],
        'desconto_concedido' => $row['desconto_concedido'],
        'observacoes' => $row['observacoes']
    ];
}, $rows2);

print json_encode([
    'type' => 'array',
    'result' => [
        'email' => $rows[0]['email'],
        'cadastrado_em' => $rows[0]['cadastrado_em'],
        'proprietario_nome' => $rows[0]['proprietario_nome'],

        'id_cadastro_tipo' => $rows[0]['id_cadastro_tipo'],
        'cadastro_tipo' => $rows[0]['tipo'],

        'status' => 'respondido',
        'atualizado_em' => '2022-05-21 08:35',
        'analista' => 'Cleber Machado',
        'desconto_solicitado' => 18,
        'desconto_concedido' => 15,
        'observacoes' => 'A imagem anexada não apresenta quantidade suficiente de informações sobre o reaproveitamento de água',

        'requisitos_solicitados' => $requisitos_solicitados
    ]
]);