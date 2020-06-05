<?php 
include_once '../../controller/usuario/usuario_DAO.php';
$userDAO = new usuario_DAO();//Instancia das funçoes do DAO
$id =  filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);//captura o ID por get e filtra em somente number
?>
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
    <?php
     $resultaEditar = $userDAO->findUnic($id);//Retorna a pequisa por um unico ID
    ?>

  <div class="container">
    <form method="POST" action="../../controller/usuario/usuario_controller.php">
      <div class="form-group">
        <input type="hidden" name="id" value="" />
        <label>Login: </label>
        <input type="text" name="login" class="form-control" placeholder="Informe o login.." value="<?php if(isset($resultaEditar['login'])) { echo $resultaEditar['login']; } ?>">
      </div>
      <div class="form-group">
        <label>Senha: </label>
        <input type="password" name="senha" class="form-control" placeholder="Informe a senha.." value="<?php if(isset($resultaEditar['senha'])) { echo $resultaEditar['senha']; } ?>"/>
      </div>
      <div class="form-group">
        <label>Nome: </label>
        <input type="text" name="nome" class="form-control" placeholder="Informe um nome.." value="<?php if(isset($resultaEditar['nome'])) { echo $resultaEditar['nome']; } ?>" />
      </div>
      <div class="form-group">
        <label>E-mail: </label>
        <input type="email" name="email" class="form-control" placeholder="Informe um email.." value="<?php if(isset($resultaEditar['email'])) { echo $resultaEditar['email']; } ?>"/>
      </div>
      <div class="form-group">
        <label>CPF: </label>
        <input type="text" name="cpf" class="form-control"  placeholder="Digite o CPF no formato nnn.nnn.nnn-nn" value="<?php if(isset($resultaEditar['cpf'])) { echo $resultaEditar['cpf']; } ?>"  />
      </div>
      <div class="form-group">
        <label>Nível: </label>
        <select class="form-control" name="nivel" id="nivel">
        <?php if(isset($resultaEditar['nivel'])) { ?>
          <option><?php echo $resultaEditar['nivel']; ?></option>          
        <?php }?>
          <option>Selecione o nivel de acesso...</option>
          
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </div>
      <div class="form-group">
        <input type="hidden" name="acao" class="form-control" value="update"/>
        <input type="hidden" name="id" class="form-control" value="<?php echo $id?>"/>
      </div>
      <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Salvar</button>
      <button type="reset" class="btn btn-warning"><span class="fa fa-close"></span> Limpar</button>
    </form>
  </div>

</body>

</html>