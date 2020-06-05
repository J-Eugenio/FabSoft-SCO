<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="../../css/styleMenu.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>sys</title>
</head>

<body>

  <?php //nav  ?>

  <div class="container">
    <form method="POST" action="../../controller/usuario/usuario_controller.php">
      <div class="form-group">
        <input type="hidden" name="id" value="" />
        <label>Login: </label>
        <input type="text" name="login" class="form-control" placeholder="Informe o login..">
      </div>
      <div class="form-group">
        <label>Senha: </label>
        <input type="password" name="senha" class="form-control" placeholder="Informe a senha.."/>
      </div>
      <div class="form-group">
        <label>Nome: </label>
        <input type="text" name="nome" class="form-control" placeholder="Informe um nome.." />
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="email" name="email" class="form-control" placeholder="Informe um email.."/>
      </div>
      <div class="form-group">
        <label>CPF: </label>
        <input type="text" name="cpf" class="form-control" placeholder="Digite o CPF no formato nnn.nnn.nnn-nn"  />
      </div>
      <div class="form-group">
        <label>Nível: </label>
        <select class="form-control" name="nivel" id="nivel">
          <option>Selecione o nivel de acesso...</option>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </div>
      <div class="form-group">
        <input type="hidden" name="acao" class="form-control" value="inserir"/>
      </div>
      <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Salvar</button>
      <button type="reset" class="btn btn-warning"><span class="fa fa-close"></span> Limpar</button>
      <a href="Listar.php" class="btn btn-info" >Pesquisar</a>
    </form>
  </div>
</body>

</html>