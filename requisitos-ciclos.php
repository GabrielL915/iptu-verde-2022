<?php

session_start();

$requisitos = $_SESSION['requisitos'];

if (! count($requisitos)) {
    echo "erro pois nao encontrei requisitos";
    exit;
}

$requisito_escolhido = null;
foreach ($requisitos as $cod => $requisito) {
    if (! $requisito) {
        $requisito_escolhido = $cod;
    }
}

if (! $requisito_escolhido and count($requisitos)) {
    header('location: resumo.php');
    exit;
}

$content = file_get_contents('http://localhost/requisitos/listar.php');
$response = json_decode($content, true);
$items = $response['items'] ?? [];

?>
<?php include __DIR__ . '/layout/html_body.php'; ?>

<div class="container">
  <main>

    <?php include __DIR__ . '/layout/components/header.php'; ?>

    <div class="row g-5">

      <?php include __DIR__ . '/layout/components/steps.php'; ?>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">
          <?php echo $items[$requisito_escolhido] ?>
        </h4>
        <div class="alert alert-info">
            Preencha os dados para continuar probatórios em relação ao item acima
        </div>

        <form class="needs-validation" novalidate method="post" action="requisitos-atualizar.php?requisito=<?=$requisito_escolhido?>">
          <div class="mb-3">
            <label for="observacoes" class="form-label">
                Como você implementou este requisito? Forneça com maior detalhamento esta questão.
            </label>
            <textarea name="observacoes" class="form-control" id="observacoes" aria-describedby="observacoes_help"></textarea>
            <div id="observacoes_help" class="form-text">Este email será usado para consultas posteriores.</div>
          </div>

          <?php foreach(range(1,3) as $i): ?>
          <div class="mb-3">
            <label for="link_<?=$i?>" class="form-label">Link <?=$i?></label>
            <input name="link_<?=$i?>" type="text" class="form-control" id="link_<?=$i?>">
          </div>
          <?php endforeach; ?>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </main>

  <?php include __DIR__ . '/layout/components/footer.php'; ?>

</div>

<?php include __DIR__ . '/layout/html_body_end.php'; ?>