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
      
      <?php include __DIR__ . '/layout/components/form.php'; ?>

      <div class="col-md-7 col-lg-8">

        <?php if ($error == 1): ?>
        <div class="alert alert-danger fs-5">
            <strong>Atenção!</strong><br />
            É necessário estar com todos os pré-requisitos preenchidos.
        </div>
      <?php endif; ?>

        <h4 class="mb-3">
          Pré-Requisitos
        </h4>
        <div class="alert alert-info">
            Verifique se você atende a todos estes pré-requisitos antes de continuar
        </div>
        <form class="needs-validation" novalidate action="cadastro.php" method="post">
        
          <hr />

          <?php foreach ($items as $cod => $prerequisito): ?>

          <div class="form-check">
            <input name="prerequisitos[]" class="form-check-input" type="checkbox" value="<?=$cod?>" id="flexCheckDefault">
            <label class="form-check-label" for="flexCheckDefault">
              <?php print $prerequisito; ?>
            </label>
          </div>
          <hr />

        <?php endforeach; ?>

        <button id="submit" type="submit" class="btn btn-primary" disabled>Continuar</button>

        </form>
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