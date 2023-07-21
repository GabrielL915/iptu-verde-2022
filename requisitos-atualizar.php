<?php

session_start();

$requisito = (int) $_GET['requisito'];
if (!$requisito) {
    echo "requisito nao informado";
    exit;
}

$observacoes = $_POST['observacoes'];
if (empty($observacoes)) {
    echo "observacoes obrigatoria";
    exit;
}

$link1 = $_POST['link_1'];
$link2 = $_POST['link_2'];
$link3 = $_POST['link_3'];

$_SESSION['requisitos'][$requisito] = [
    'observacoes' => $observacoes,
    'link_1' => $link1,
    'link_2' => $link2,
    'link_3' => $link3
];

header('location: requisitos-ciclos.php');

?>