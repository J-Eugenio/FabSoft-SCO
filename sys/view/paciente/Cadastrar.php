<!DOCTYPE html>
<html lang="pt-br">

<head>
  <link rel="stylesheet" href="../../css/styleMenu.css">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <title>Cadastro Paciente</title>
</head>

<body>

  <?php //nav  ?>

  <div class="container">
    <form method="POST" action="../../controller/paciente/paciente_controller.php">
      <div class="form-group">
        <input type="hidden" name="id" value="" />
        <label>Cpf: </label>
        <input type="text" name="cpf" class="form-control" placeholder="Informe seu cpf...">
      </div>
      <div class="form-group">
        <label>Senha: </label>
        <input type="text" name="senha" class="form-control" placeholder="Informe a senha.."/>
      </div>
      <div class="form-group">
        <label>Nome: </label>
        <input type="text" name="nome" class="form-control" placeholder="Informe um nome.." />
      </div>
      <div class="form-group">
        <label>Data de Nascimento: </label>
        <input type="text" name="dataNasc" class="form-control" placeholder="Informe sua Data de Nascimento..."/>
      </div>
      <div class="form-group">
        <label>Idade: </label>
        <input type="text" name="idade" class="form-control" placeholder="Informe sua idade..."/>
      </div>
      <div class="form-group">
        <label>Sexo: </label>
        <input type="text" name="sexo" class="form-control" placeholder="Informe seu sexo"  />
      </div>
      <div class="form-group">
        <label>Escolaridade: </label>
        <input type="text" name="escolaridade" class="form-control" placeholder="Informe seu nível de escolaridade"  />
      </div>
      <div class="form-group">
        <label>Email: </label>
        <input type="text" name="email" class="form-control" placeholder="Informe seu email"  />
      </div>
      <div class="form-group">
        <label>telefone: </label>
        <input type="text" name="telefone" class="form-control" placeholder="Informe seu telefone"  />
      </div>
      <div class="form-group">
        <label>Número do CadSus: </label>
        <input type="text" name="numeroCadSus" class="form-control" placeholder="Informe seu CadSus"  />
      </div>
      <div class="form-group">
        <label>Unidade de saude: </label>
        <input type="text" name="unidadeDeSaude" class="form-control" placeholder="Informe sua unidade de saude"  />
      </div>
      <div class="form-group">
        <label>Data do diagnostico: </label>
        <input type="text" name="dataDiagnostico" class="form-control" placeholder="Informe a data do seu diagnostico"  />
      </div>
      <div class="form-group">
        <label>Bairro: </label>
        <input type="text" name="bairro" class="form-control" placeholder="Informe seu Bairro"  />
      </div>
      <div class="form-group">
        <label>Logradouro: </label>
        <input type="text" name="logradouro" class="form-control" placeholder="Informe seu logradouro"  />
      </div>
      <div class="form-group">
        <label>ponto de referencia: </label>
        <input type="text" name="pontoDeReferencia" class="form-control" placeholder="Informe um ponto de referencia"  />
      </div>
      <div class="form-group">
        <label>Zona: </label>
        <input type="text" name="zona" class="form-control" placeholder="Informe sua zona"  />
      </div>
      <div class="form-group">
        <label>Hospital de tratamento: </label>
        <input type="text" name="hospitalDeTratamento" class="form-control" placeholder="Informe o seu hospital de tratamento"  />
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