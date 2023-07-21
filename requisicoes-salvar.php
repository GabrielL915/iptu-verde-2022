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
            "link_1" => "rst",
            "link_2" => "rs",
            "link_3" => "r"
        ],
        2 => [
            "observacoes" => "Telhado 25x25",
            "link_1" => "abc",
            "link_2" => "ab",
            "link_3" => "a"
        ],
        4 => [
            "observacoes" => "Tenho 3 recipientes de lixo de 50l sendo um deles apenas para plástico. Além disso, tenho uma composteira (conforme link) e assim por diante;",
            "link_1" => "efg",
            "link_2" => "fg",
            "link_3" => "e"
        ]

    ]
];
  
$url = 'http://localhost/requisicoes/cadastrar.php';
var_dump (file_get_contents($url));

?>