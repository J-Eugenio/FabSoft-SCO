<?php
 include_once "../header.php"
?>
  <div id="main-container">
  <!-- Script do select do serviços -->
    <script src="select_service.js"></script>
  <!-- ---------------------------- -->
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
<?php
 include_once "../footer.php"
?>