 <?php include_once("../header.php");?>

  <div id="main-container">
    <h1>Cadastro de Funcionários</h1>
    <form id="form-register" method="POST" action="../../controller/funcionario/funcionario_controller.php">

      <div class="full-box">
        <input type="hidden" name="id" value="" />
      </div>
      
      <div class="half-box spacing">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control" placeholder="Informe o nome do paciente..." />
      </div>

      <div class="half-box">
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" class="form-control" placeholder="Informe o nome do paciente..." />
      </div>
      <div class="half-box spacing">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" class="form-control" placeholder="Digite o CPF no formato nnn.nnn.nnn-nn" />
      </div>
      <div class="half-box">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" class="form-control" placeholder="Informe uma senha de acesso..." />
      </div>
      <div class="half-box spacing">
        <label for="data-de-nascimento">Data de Nascimento:</label>
        <input type="date" name="data-de-nascimento" class="form-control" />
      </div>
      <div class="half-box">
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo">
          <option value="masculino">Masculino</option>
          <option value="feminino">Feminino</option>
        </select>
      </div>
      <div class="half-box spacing">
        <label>Função: </label>
        <input type="text" name="funcao" class="form-control" placeholder="Informe sua função"  />
      </div>
      <div class="half-box">
        <label for="tipoDeFunc">Tipo de Função</label>
        <select name="tipoDeFunc" id="tipoDeFunc">
          <option value="sem-escolaridade">Secretaria de Saúde</option>
          <option value="ensino-fundamental">Coodenadoria de Atenção Básica</option>
          <option value="ensino-medio">Enfermagem</option>
        </select>
      </div>
      <div class="full-box">
        <input type="hidden" name="acao" class="form-control" value="inserir"/>
      </div>
      <button type="submit" class="btn btn-success btn-lg"> Salvar</button>
      <button type="reset" class="btn btn-warning btn-lg"> Limpar</button>
      <a href="Listar.php"><button type="button" class="btn btn-info btn-lg"><img src="/fabsoft-sco/sys/assets/img/search.svg" alt="Pesquisar">Pesquisar</button></a>
    </form>
  </div>
  </div>

  <?php include_once("../footer.php");?>