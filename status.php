<?php

$email = $_GET['email'] ?? null;
$code = (int) $_POST['code'];

$url = 'http://localhost/requisicoes/consultar-status.php?email=' . $email . '&code=' . $code;
$response = json_decode(file_get_contents($url), true);

?>

<?php include __DIR__ . '/layout/html_body.php'; ?>

<?php 

$content = file_get_contents('http://localhost/prerequisitos/listar.php');
$response = json_decode($content, true);
$items = $response['items'] ?? [];

$error = (int) ($_GET['error'] ?? null);
?>
    
<div class="container">
  <main>

    <?php include __DIR__ . '/layout/components/header.php'; ?>

    <div class="row g-5">
      
      <?php include __DIR__ . '/layout/components/status-info.php'; ?>

      <div class="col-md-7 col-lg-8">
        <h4 class="mb-3">
          Detalhes da Requisição
        </h4>

        <p class="lead">Dados do Imóvel</p>
        <table class="table table-striped">
            <tbody>
                <tr>
                    <th>Proprietário:</th>
                    <td>Eduardo Bona</td>
                </tr>
                <tr>
                    <th>Tipo do Imóvel:</th>
                    <td>Residencial</td>
                </tr>
            </tbody>
        </table>

        <p class="lead">Descontos Requisitados</p>
        <table class="table table-striped">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Requisito</th>
                    <th>Desconto Solicitado</th>
                    <th>Desconto Concedido</th>
                    <th>Observações</th>
                </tr>
            </thead>
            <tbody>
                <tr>
                    <td>1</td>
                    <td>Reaproveitamento de Água da Chuva</td>
                    <td>5%</td>
                    <td>2%</td>
                    <td>Não parece ser suficiente para 500l</td>
                </tr>
                <tr>
                    <td>2</td>
                    <td>Reaproveitamento de Água da Chuva</td>
                    <td>5%</td>
                    <td>2%</td>
                    <td>Não parece ser suficiente para 500l</td>
                </tr>
                <tr>
                    <td>3</td>
                    <td>Reaproveitamento de Água da Chuva</td>
                    <td>5%</td>
                    <td>2%</td>
                    <td>Não parece ser suficiente para 500l</td>
                </tr>
            </tbody>
        </table>
     
      </div>
    </div>
  </main>

  <?php include __DIR__ . '/layout/components/footer.php'; ?>

</div>

<script>
  function checkedAll() {
    var checkBoxes = document.querySelectorAll("input[type=checkbox]");
    var submit = true;
    checkBoxes.forEach(function(el) {
      if(! el.checked) {
        submit = false;
      }
    });

    return submit;
  }

  function eventCheck() {
    var button = document.getElementById("submit");
    if (checkedAll()) {
      button.disabled = false;
    } else {
      button.disabled = true;
    }
  };

  var checkbox = document.querySelectorAll("input[type=checkbox]");
  checkbox.forEach(function(el) {
    el.addEventListener( 'change', eventCheck);
  });

</script>

<?php include __DIR__ . '/layout/html_body_end.php'; ?>