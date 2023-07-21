<?php include __DIR__ . '/layout/html_body.php'; ?>

<?php 

$content = file_get_contents('http://localhost/requisitos/listar.php');
$response = json_decode($content, true);
$items = $response['items'] ?? [];

$error = (int) ($_GET['error'] ?? null);
?>
    
<div class="container">
  <main>

    <?php include __DIR__ . '/layout/components/header.php'; ?>

    <div class="row g-5">
      
      <?php include __DIR__ . '/layout/components/form.php'; ?>

      <div class="col-md-7 col-lg-8">

        <h4 class="mb-3">
          A quais requisitos seu imóvel atende?
        </h4>
        <div class="alert alert-info">
            Para cada requisito solicitado você irá preencher posteriormente mais detalhes
            além de poder enviar links de imagens
        </div>
        <form class="needs-validation" novalidate action="requisitos-salvar.php" method="post">
        
          <hr />

          <?php foreach ($items as $cod => $prerequisito): ?>

          <div class="form-check">
            <input name="requisitos[]" class="form-check-input" type="checkbox" value="<?=$cod?>" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              <?php print $prerequisito; ?>
            </label>
          </div>
          <hr />

        <?php endforeach; ?>

        <button id="submit" type="submit" class="btn btn-primary">Continuar</button>

        </form>
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/layout/components/footer.php'; ?>

</div>

<?php include __DIR__ . '/layout/html_body_end.php'; ?>