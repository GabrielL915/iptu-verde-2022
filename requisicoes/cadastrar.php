<?php

$hoje = new \Datetime();

$requisicao = [
    'dados' => [
        'email' => 'eduardobona@vivaweb.net',
        'cadastro' => $hoje->format('Y-m-d H:i:s'),
        'status' => 'enviado',
        'desconto_solicitado' => 20,
        'codigo_confirmacao' => rand(1111111111, 9999999999)
    ],
    'requisitos' => [
        1 => [
            "observacoes" => "Tenho uma sisterna de 500l com filtro e coletor com cao PVC de 25mm que é usada para atividades como limpar o imóvel e regar plantas",
            "desconto_solicitado" => 5,
            "link_1" => "rst",
            "link_2" => "rs",
            "link_3" => "r"
        ],
        2 => [
            "observacoes" => "Telhado 25x25",
            "desconto_solicitado" => 6,
            "link_1" => "abc",
            "link_2" => "ab",
            "link_3" => "a"
        ],
        4 => [
            "observacoes" => "Tenho 3 recipientes de lixo de 50l sendo um deles apenas para plástico. Além disso, tenho uma composteira (conforme link) e assim por diante;",
            "desconto_solicitado" => 7,
            "link_1" => "efg",
            "link_2" => "fg",
            "link_3" => "e"
        ]

    ]
];


$connection = include __DIR__ . '/../connection.php';

// TODO urgente fazer o prepare
$sql = "INSERT INTO requisicoes (email, cadastrado_em, status, desconto_soliticado, codigo_confirmacao) 
    VALUES (
        '{$requisicao['dados']['email']}', 
        '{$requisicao['dados']['cadastro']}', 
        '{$requisicao['dados']['status']}', 
        '{$requisicao['dados']['desconto_solicitado']}', 
        '{$requisicao['dados']['codigo_confirmacao']}'
    )
";

$result = $connection->query($sql);
$codigo = $connection->lastInsertId();

foreach ($requisicao['requisitos'] as $codigo_requisito => $requisito) {
    $sql = "
        INSERT INTO requisitos_solicitados (requisicao, requisito, desconto_solicitado, observacoes, 
        link_1, link_2, link_3) VALUES (
            '$codigo', 
            '$codigo_requisito', 
            '{$requisito['desconto_solicitado']}', 
            '{$requisito['observacoes']}', 
            '{$requisito['link_1']}', 
            '{$requisito['link_2']}', 
            '{$requisito['link_3']}'
        )
    ";
    $result = $connection->query($sql);
}


session_destroy();

header('location:index.php');