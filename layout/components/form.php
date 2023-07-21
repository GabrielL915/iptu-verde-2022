<?php

$form_completo = false;

if (isset($_GET['email'])) {
    // TODO

    if (empty($_GET['email'])) {
        echo "Erro";
        exit;
    }

    $email = $_GET['email'];

    $url = 'http://localhost/requisicoes/confirmar-email.php?email=' . $email;
    $response = json_decode(file_get_contents($url), true);

    if ($response['type'] == 'error') {
        echo $response['message'];
        exit;
    }

    // VALIDAÇÃO DOS DADOS
    $form_completo = true;
    // ENVIO PARA FORM
}

?>


<div class="col-md-5 col-lg-4 order-md-last">
    <h4 class="mb-3">Consultar Status</h4>

    <?php if ($form_completo == true): ?>
    <form action="status.php?email=<?php print $email; ?>" method="post">
        <div class="mb-3">
            <label for="code" class="form-label"><strong>Informe o Código</strong></label>
            <input name="code" type="text" class="form-control" id="code" aria-describedby="codeHelp">
            <div id="codeHelp" class="form-text">
                <p>Consulte seu email pois deve ter sido enviado um email para você</p>
            </div>
        </div>
    <?php else: ?>
    <form>
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Digite o email</label>
            <input name="email" type="email" class="form-control" id="email" aria-describedby="emailHelp">
            <div id="emailHelp" class="form-text">
                <p>Para consultar, use o mesmo email da requisição no dia do cadastro.</p>
                <p>Você receberá uma mensagem de confirmação com um código para prosseguir.</p>
            </div>
        </div>
    <?php endif; ?>

        <button type="submit" class="btn btn-primary">Consultar</button>
    </form>

</div>