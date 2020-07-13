
    <?php
      include_once("../header.php");
      ?>
    <div id="main-container">
      <h1>Cadastre um paciente</h1>
      <form id="form-register" method="POST" action="../../controller/paciente/paciente_controller.php">
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
          <label for="sus">Número de Cartão do SUS:</label>
          <input type="text" name="numeroCadSus" class="form-control" placeholder="Insira um número válido..." />
        </div>
        <div class="half-box">
          <label for="data-de-nascimento">Data de Nascimento:</label>
          <input type="date" name="dataNasc" class="form-control" />
        </div>
        <div class="half-box spacing">
          <label for="sexo">Sexo:</label>
          <select name="sexo" id="sexo">
            <option value="masculino">Masculino</option>
            <option value="feminino">Feminino</option>
          </select>
        </div>
        <div class="half-box">
          <label for="escolaridade">Escolaridade</label>
          <select name="escolaridade" id="escolaridade">
            <option value="sem-escolaridade">Sem Escolaridade</option>
            <option value="ensino-fundamental">Ensino Fundamental Completo</option>
            <option value="ensino-medio">Ensino Médio Completo</option>
            <option value="ensino-superior">Ensino Superior Completo</option>
          </select>
        </div>
        <div class="full-box">
          <label for="logradouro">Logradouro:</label>
          <input type="text" name="logradouro" class="form-control" placeholder="Informe sua rua, avenida, lote..." />
        </div>
        <div class="half-box spacing">
          <label for="bairro">Bairro:</label>
          <input type="text" name="bairro" class="form-control" placeholder="Informe o bairro em que é localizado..." />
        </div>
        <div class="half-box">
          <label for="numero">Nº:</label>
          <input type="number" name="numero" class="form-control" />
        </div>

        <div class="half-box spacing">
          <label for="bairro">Unidade de Saúde:</label>
          <input type="text" name="unidadeDeSaude" class="form-control"  />
        </div>
        <div class="half-box">
          <label for="numero">Data de Diagnostico:</label>
          <input type="text" name="dataDiagnostico" class="form-control" />
        </div>
        <div class="half-box spacing">
          <label for="bairro">Zona:</label>
          <input type="text" name="zona" class="form-control"  />
        </div>
        <div class="half-box">
          <label for="numero">Hospital de Tratamento:</label>
          <input type="text" name="hospitalDeTratamento" class="form-control" />
        </div>

        <div class="half-box spacing">
          <label for="referencia">Ponto de referência</label>
          <input type="text" name="pontoDeReferencia" class="form-control" placeholder="Descreva um ponto de referência para localização..." />
        </div>
        <div class="half-box">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" placeholder="Informe um email..." />
        </div>
        <div class="col-xs-4">
          <label for="telefone">Telefone:</label>
          <input type="text" name="telefone" class="form-control" placeholder="Informe um telefone" />
        </div>
        <div class="full-box">
          <input type="hidden" name="acao" class="form-control" value="inserir" />
        </div>
        <button type="submit" class="btn btn-success btn-lg"> Salvar</button>
        <button type="reset" class="btn btn-warning btn-lg"> Limpar</button>
        <a href="Listar.php"><button type="button" class="btn btn-info btn-lg"><img src="/fabsoft-sco/sys/assets/img/search.svg" alt="Pesquisar">Pesquisar</button></a>
      </form>
    </div>
    </div>
    <p class="error-validation template"></p>
    <script src="/fabsoft-sco/sys/assets/javascript/scripts.js"></script>
    <?php
      include_once("../footer.php");
      ?>