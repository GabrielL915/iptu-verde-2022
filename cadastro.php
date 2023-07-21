<?php include __DIR__ . '/layout/html_body.php'; ?>
    
<?php

$prerequisitos_selecionados = $_POST["prerequisitos"];

$content = file_get_contents('http://localhost/prerequisitos/listar.php');
$response = json_decode($content, true);
$prerequisitos_obrigatorios = $response['items'];

foreach ($prerequisitos_obrigatorios as $cod => $prerequisito) {
  if (! in_array($cod, $prerequisitos_selecionados)) {
    header("location: index.php?error=1");
    exit;
  }
}

?>

<div class="container">
  <main>

    <?php include __DIR__ . '/layout/components/header.php'; ?>

    <div class="row g-5">

      <?php include __DIR__ . '/layout/components/steps.php'; ?>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">
          Dados do Imóvel e do Proprietário
        </h4>
        <div class="alert alert-info">
            Preencha os dados para continuar com a requisição de desconto no IPTU VERDE
        </div>

        <form class="needs-validation" novalidate method="post" action="requisitos.php">
          <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="email_help">
            <div id="email_help" class="form-text">Este email será usado para consultas posteriores.</div>
          </div>
          <div class="mb-3">
            <label for="cpf" class="form-label">CPF</label>
            <input name="cpf" type="text" class="form-control" id="cpf">
          </div>
          <div class="mb-3">
            <label for="cadastro_tipo" class="form-label">Tipo de Imóvel:</label>
            <select name=cadastro_tipo"" id=cadastro_tipo"" class="form-select" aria-label="Default select example">
              <option value="1">Imóvel Residencial (casa)</option>
              <option value="2">Imóvel Residencial em condomínio horizontal</option>
              <option value="3">Imóvel Residencial em condomínio vetical</option>
              <option value="4">Terreno Residencial</option>
              <option value="4">Terreno Comercial</option>
              <option value="4">Imóvel Residencial</option>
            </select>
          </div>

          <button type="submit" class="btn btn-primary">Submit</button>
        </form>

      </div>
    </div>
  </main>

  <?php include __DIR__ . '/layout/components/footer.php'; ?>

</div>

<?php include __DIR__ . '/layout/html_body_end.php'; ?>