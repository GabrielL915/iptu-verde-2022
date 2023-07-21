<?php

session_start();

echo "<h1>RESUMO</h1>";
echo "<pre>";
var_dump($_SESSION);
echo "</pre>";

echo "<hr>";
?>

<a href="requisicoes-salvar.php">Confirmar</a>