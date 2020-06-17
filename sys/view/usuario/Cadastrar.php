<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:wght@700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="../assets/css/login.css">
  <link rel="stylesheet" href="../assets/css/main.css">

  <title>Cadastro de Usuário</title>

</head>

<body>

  <?php //nav  
  ?>

  <div class="container">
    <form method="POST" action="../../controller/usuario/usuario_controller.php">
      <div class="form-group">
        <input type="hidden" name="id" value="" />
      </div>
      <fieldset class="dados-pessoais">
        <legend>Informações Pessoais</legend>
        <div class="form-group">
          <label>Nome Completo:</label>
          <input type="text" name="nome" class="form-control" placeholder="Informe o nome do paciente..." />
        </div>
        <div class="form-group">
          <label>CPF:</label>
          <input type="text" name="cpf" class="form-control" placeholder="Digite o CPF no formato nnn.nnn.nnn-nn" />
        </div>
        <div class="form-group">
          <label>Senha:</label>
          <input type="password" name="senha" class="form-control" placeholder="Informe uma senha de acesso..." />
          <div class="form-group">
            <label>Número de Cartão do SUS:</label>
            <input type="text" name="sus" class="form-control" placeholder="Insira um número válido..." />
          </div>
          <div class="form-group">
            <label>Data de Nascimento:</label>
            <input type="date" name="data-de-nascimento" class="form-control" />
          </div>
          <div class="form-group">
            <label>Sexo:</label>
            <select name="sexo" id="sexo">
              <option value="masculino">Masculino</option>
              <option value="feminino">Feminino</option>
            </select>
          </div>
          <div class="form-group">
            <label>Escolaridade</label>
            <select name="escolaridade" id="escolaridade">
              <option value="sem-escolaridade">Sem Escolaridade</option>
              <option value="ensino-fundamental">Ensino Fundamental Completo</option>
              <option value="ensino-medio">Ensino Médio Completo</option>
              <option value="ensino-superior">Ensino Superior Completo</option>
            </select>
          </div>
      </fieldset>
      <fieldset class="dados-endereco">
        <legend>Endereço</legend>
        <div class="form-group">
        <label>Logradouro:</label>
        <input type="text" name="logradouro" class="form-control" placeholder="Informe sua rua, avenida, lote..."/>
        </div>
        <div class="form-group">
        <label>Bairro:</label>
        <input type="text" name="bairro" class="form-control" placeholder="Informe o bairro em que é localizado..."/>
        </div>
        <div class="form-group">
        <label>Nº:</label>
        <input type="number" name="numero" class="form-control"/>
        </div>
        <div class="form-group">
        <label>Ponto de referência</label>
        <input type="text" name="referencia" class="form-control" placeholder="Descreva um ponto de referência para localização..."/>
        </div>
      </fieldset>
      <div class="form-group">
        <label>Email:</label>
        <input type="email" name="email" class="form-control" placeholder="Informe um email.." />
      </div>

      <div class="form-group">
        <label>Nível:</label>
        <select class="form-control" name="nivel" id="nivel">
          <option>Selecione o nivel de acesso...</option>
          <option value="1">1</option>
          <option value="2">2</option>
        </select>
      </div>
      <div class="form-group">
        <input type="hidden" name="acao" class="form-control" value="inserir" />
      </div>
      <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Salvar</button>
      <button type="reset" class="btn btn-warning"><span class="fa fa-close"></span> Limpar</button>
      <a href="Listar.php" class="btn btn-info">Pesquisar</a>
    </form>
  </div>
</body>

</html>