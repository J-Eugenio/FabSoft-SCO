
    <?php
      include_once '../../controller/paciente/paciente_DAO.php';
      $paciDAO = new paciente_DAO();//Instancia das funçoes do DAO
      $id =  filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);//captura o ID por get e filtra em somente number
      
      $resultaEditar = $paciDAO->findUnic($id);
      include_once("../header.php");
    ?>
    <div id="main-container">
      <h1>Cadastre um paciente</h1>
      <form id="form-register" method="POST" action="../../controller/paciente/paciente_controller.php">
        <div class="half-box spacing">
          <label for="nome">Nome:</label>
          <input type="text" name="nome" class="form-control" value="<?php echo $resultaEditar['nome']?>" placeholder="Informe o nome do paciente..." />
        </div>
        <div class="half-box">
          <label for="sobrenome">Sobrenome:</label>
          <input type="text" name="sobrenome" class="form-control" value="<?php echo $resultaEditar['sobrenome']?>" placeholder="Informe o nome do paciente..." />
        </div>
        <div class="half-box spacing">
          <label for="cpf">CPF:</label>
          <input type="text" name="cpf" class="form-control" value="<?php echo $resultaEditar['cpf']?>" placeholder="Digite o CPF no formato nnn.nnn.nnn-nn" />
        </div>
        <div class="half-box">
          <label for="senha">Senha:</label>
          <input type="password" name="senha" class="form-control" placeholder="Informe uma senha de acesso..." />
        </div>
        <div class="half-box spacing">
          <label for="sus">Número de Cartão do SUS:</label>
          <input type="text" name="numeroCadSus" class="form-control" value="<?php echo $resultaEditar['numeroCardSUS']?>" placeholder="Insira um número válido..." />
        </div>
        <div class="half-box">
          <label for="data-de-nascimento">Data de Nascimento:</label>
          <input type="date" name="dataNasc" value="<?php echo $resultaEditar['dataNasc']?>" class="form-control" />
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
            <option selected value="<?php echo $resultaEditar['escolaridade']?>"><?php echo $resultaEditar['escolaridade']?></option>
          </select>
        </div>
        <div class="full-box">
          <label for="logradouro">Logradouro:</label>
          <input type="text" name="logradouro" class="form-control" value="<?php echo $resultaEditar['logradouro']?>" placeholder="Informe sua rua, avenida, lote..." />
        </div>
        <div class="half-box spacing">
          <label for="bairro">Bairro:</label>
          <input type="text" name="bairro" class="form-control" value="<?php echo $resultaEditar['bairro']?>" placeholder="Informe o bairro em que é localizado..." />
        </div>
        <div class="half-box spacing">
          <label for="bairro">Unidade de Saúde:</label>
          <input type="text" name="unidadeDeSaude" value="<?php echo $resultaEditar['unidadeDeSaude']?>" class="form-control"  />
        </div>
        <div class="half-box">
          <label for="numero">Data de Diagnostico:</label>
          <input type="text" name="dataDiagnostico" value="<?php echo $resultaEditar['dataDiagnostico']?>" class="form-control" />
        </div>
        <div class="half-box spacing">
          <label for="bairro">Zona:</label>
          <input type="text" name="zona" value="<?php echo $resultaEditar['zona']?>" class="form-control"  />
        </div>
        <div class="half-box">
          <label for="numero">Hospital de Tratamento:</label>
          <input type="text" name="hospitalDeTratamento" value="<?php echo $resultaEditar['hospitalDeTratamento']?>" class="form-control" />
        </div>


        <div class="half-box spacing">
          <label for="referencia">Ponto de referência</label>
          <input type="text" name="pontoDeReferencia" class="form-control" value="<?php echo $resultaEditar['pontoDeReferencia']?>" placeholder="Descreva um ponto de referência para localização..." />
        </div>
        <div class="half-box">
          <label for="email">Email:</label>
          <input type="email" name="email" class="form-control" value="<?php echo $resultaEditar['email']?>" placeholder="Informe um email..." />
        </div>
        <div class="half-box spacing">
          <label for="telefone">Telefone:</label>
          <input type="text" name="telefone" class="form-control" value="<?php echo $resultaEditar['telefone']?>" placeholder="Informe um telefone válido..." />
        </div>
      <div class="col">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success m-2 btn-lg"><span class="fa fa-check"></span> Salvar</button>
          <button type="reset" class="btn btn-warning m-2 btn-lg"><span class="fa fa-trash"></span> Limpar</button>
        </div>
        <div class="half-box">
          <input type="hidden" name="acao" class="form-control" value="update"/>
          <input type="hidden" name="id" class="form-control" value="<?php echo $id?>"/>
        </div>
      </div>
      </form>
    </div>
    </div>
  
    <p class="error-validation template"></p>
    <script src="/fabsoft-sco/sys/assets/javascript/scripts.js"></script>
    <?php
      include_once("../footer.php");
      ?>