<!DOCTYPE html>
<html lang="pt-br">

<head>
    <?php
        session_start();
    ?>
  <script src="https://code.jquery.com/jquery-3.5.1.js" integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="/fabsoft-sco/sys/assets/css/formularios.css">
  <link rel="stylesheet" href="../../css/styleMenu.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <!-- Script do select do serviços -->
  <script src="select_service.js"></script>
  <!-- ---------------------------- -->

  <title>Cadastro de serviços</title>
</head>

<body>


  <div id="main-container">
    <form method="POST" action="../../controller/services/service_controller.php">
      <div class="half-box spacing">
        <label>Serviço: </label>
        <select class="form-control" name="tipoDeService" id="tipoDeService">
          <option>Selecione o tipo um serviço...</option>
          <option value="Curativo">Curativo</option>
          <option value="Sonda">Sonda</option>
        </select>
      </div>
      <div id="typeSonda">
        <div class="half-box" id="tipoSonda">
            <label>Tipo de Sonda: </label>
            <select class="form-control" name="tipoDeSonda" id="tipoDeSonda">
            <option value="N/A">Selecione o tipo de sonda...</option>
            <option value="Vesical">Vesical</option>
            <option value="Nasogastica">Nasogástrica</option>
            </select>
        </div>
      </div>
      <div class="half-box">
        <input type="hidden" name="acao" class="form-control" value="inserir"/>
        <input type="hidden" name="id_paciente" class="form-control" value="<?php echo $_SESSION['user_id'];?>"/>
      </div>
      <div id="main-container"></div>
      <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Salvar</button>
      <button type="reset" class="btn btn-warning"><span class="fa fa-close"></span> Limpar</button>
      <a href="Listar.php" class="btn btn-info">Pesquisar</a>
      </div>
    </form>
  </div>
</body>

</html>