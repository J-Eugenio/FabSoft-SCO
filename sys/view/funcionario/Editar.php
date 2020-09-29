<?php
  include_once '../../model/funcionario/funcionario_DAO.php';
  $funcDAO = new funcionario_DAO();//Instancia das funçoes do DAO
  $id =  filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);
  $resultaEditar = $funcDAO->findUnic($id);
  include_once("../header.php");
?>

<div id="main-container">
  <form method="POST" action="../../controller/funcionario/funcionario_controller.php">
  <div class="full-box">
        <input type="hidden" name="id" value="" />
      </div>
      
      <div class="half-box spacing">
        <label for="nome">Nome:</label>
        <input type="text" name="nome" class="form-control"  value="<?php if(isset($resultaEditar['nome'])) { echo $resultaEditar['nome']; } ?>" placeholder="Informe o nome do paciente..." />
      </div>

      <div class="half-box">
        <label for="sobrenome">Sobrenome:</label>
        <input type="text" name="sobrenome" class="form-control" value="<?php if(isset($resultaEditar['sobrenome'])) { echo $resultaEditar['sobrenome']; } ?>" placeholder="Informe o nome do paciente..." />
      </div>
      <div class="half-box spacing">
        <label for="cpf">CPF:</label>
        <input type="text" name="cpf" class="form-control" value="<?php if(isset($resultaEditar['cpf'])) { echo $resultaEditar['cpf']; } ?>" placeholder="Digite o CPF no formato nnn.nnn.nnn-nn" />
      </div>
      <div class="half-box">
        <label for="senha">Senha:</label>
        <input type="password" name="senha" class="form-control"  value="<?php if(isset($resultaEditar['senha'])) { echo $resultaEditar['senha']; } ?>" placeholder="Informe uma senha de acesso..." />
      </div>
      <div class="half-box spacing">
        <label for="data-de-nascimento">Data de Nascimento:</label>
        <input type="date" name="data-de-nascimento" value="<?php if(isset($resultaEditar['dataNasc'])) { echo $resultaEditar['dataNasc']; } ?>"  class="form-control" />
      </div>
      <div class="half-box">
        <label for="sexo">Sexo:</label>
        <select name="sexo" id="sexo">
          <option selected value="<?php if(isset($resultaEditar['sexo'])) { echo $resultaEditar['sexo']; } ?>"><?php if(isset($resultaEditar['sexo'])) { echo $resultaEditar['sexo']; } ?></option>
          <option value="masculino">Masculino</option>
          <option value="feminino">Feminino</option>
        </select>
      </div>
      <div class="half-box spacing">
        <label>Função: </label>
        <input type="text" name="funcao" class="form-control" value="<?php if(isset($resultaEditar['funcao'])) { echo $resultaEditar['funcao']; } ?>" placeholder="Informe sua função"  />
      </div>
      <div class="half-box">
        <label for="tipoDeFunc">Tipo de Função</label>
        <select name="tipoDeFunc" id="tipoDeFunc">
        <option selected value="<?php if(isset($resultaEditar['tipoDeFunc'])) { echo $resultaEditar['tipoDeFunc']; } ?>"><?php if(isset($resultaEditar['tipoDeFunc'])) { echo $resultaEditar['tipoDeFunc']; } ?></option>
          <option value="sem-escolaridade">Secretaria de Saúde</option>
          <option value="ensino-fundamental">Coodenadoria de Atenção Básica</option>
          <option value="ensino-medio">Enfermagem</option>
        </select>
      </div>
    <div class="half-box spacing">
      <label>Tipo de Função: </label>
      <select class="form-control" name="tipoDeFunc" id="tipoDeFunc">
        <?php if(isset($resultaEditar['tipoDeFunc'])) { ?>
        <option><?php echo $resultaEditar['tipoDeFunc']; ?></option>
        <?php }?>
        <option>Selecione o tipo da função...</option>
        <option value="secretariaDeSaude">Secretaria de saude</option>
        <option value="coordenador">Coordenador</option>
        <option value="enfermeiro">Enfermeiro</option>
      </select>
    </div>
    <div class="half-box">
      <input type="hidden" name="acao" class="form-control" value="update" />
      <input type="hidden" name="id" class="form-control" value="<?php echo $id?>" />
    </div>
    <div class="col">
        <div class="d-flex justify-content-center">
          <button type="submit" class="btn btn-success m-2 btn-lg"><span class="fa fa-check"></span> Salvar</button>
          <button type="reset" class="btn btn-warning m-2 btn-lg"><span class="fa fa-trash"></span> Limpar</button>
        </div>
    </div>
  </form>
</div>

<?php include_once("../footer.php");?>
