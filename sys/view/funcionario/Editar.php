<?php
  include_once '../../controller/funcionario/funcionario_DAO.php';
  $funcDAO = new funcionario_DAO();//Instancia das funçoes do DAO
  $id =  filter_input(INPUT_GET,'id', FILTER_SANITIZE_NUMBER_INT);

  include_once("../header.php");
?>

<div id="main-container">
  <form method="POST" action="../../controller/funcionario/funcionario_controller.php">
    <div class="half-box spacing">
      <input type="hidden" name="id" value="" />
      <label>Cpf: </label>
      <input type="text" name="cpf" class="form-control" placeholder="Informe seu cpf.."
        value="<?php if(isset($resultaEditar['cpf'])) { echo $resultaEditar['cpf']; } ?>">
    </div>
    <div class="half-box">
      <label>Senha: </label>
      <input type="password" name="senha" class="form-control" placeholder="Informe a senha.."
        value="<?php if(isset($resultaEditar['senha'])) { echo $resultaEditar['senha']; } ?>" />
    </div>
    <div class="half-box spacing">
      <label>Nome: </label>
      <input type="text" name="nome" class="form-control" placeholder="Informe um nome.."
        value="<?php if(isset($resultaEditar['nome'])) { echo $resultaEditar['nome']; } ?>" />
    </div>
    <div class="half-box">
      <label for="data-de-nascimento">Data de Nascimento:</label>
      <input type="date" name="data-de-nascimento" class="form-control" />
    </div>
    <div class="half-box spacing">
      <label for="sexo">Sexo:</label>
      <select name="sexo" id="sexo">
        <option value="<?php if(isset($resultaEditar['genero'])) { echo $resultaEditar['genero']; } ?>">Masculino
        </option>
        <option value="<?php if(isset($resultaEditar['genero'])) { echo $resultaEditar['genero']; } ?>">Feminino
        </option>
      </select>
    </div>
    <div class="half-box">
      <label>Função: </label>
      <input type="text" name="funcao" class="form-control" placeholder="Informe sua função"
        value="<?php if(isset($resultaEditar['tipoDeFunc'])) { echo $resultaEditar['tipoDeFunc']; } ?>" />
    </div>
    <div class="half-box spacing">
      <label>Tipo de Função: </label>
      <select class="form-control" name="tipoDeFunc" id="tipoDeFunc">
        <?php if(isset($resultaEditar['tipoDeFunc'])) { ?>
        <option><?php echo $resultaEditar['tipoDeFunc']; ?></option>
        <?php }?>
        <option>Selecione o tipo da função...</option>
        <option value="secretariaDeSaude">Secretaria de saude</option>
        <option value="Coordenador">Coordenador</option>
        <option value="enfermeiro">Enfermeiro</option>
      </select>
    </div>
    <div class="half-box">
      <input type="hidden" name="acao" class="form-control" value="update" />
      <input type="hidden" name="id" class="form-control" value="<?php echo $id?>" />
    </div>
    <div id="main-container">
      <button type="submit" class="btn btn-success"><span class="fa fa-check"></span> Salvar</button>
      <button type="reset" class="btn btn-warning"><span class="fa fa-close"></span> Limpar</button>
    </div>
  </form>
</div>
