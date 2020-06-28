<?php 
  include_once '../../controller/funcionario/funcionario_DAO.php';
  include_once "../header.php"
  ?>
<body>
  <?php 
    $reser = new funcionario_DAO;
    $resultado = $reser->listarFuncionarios();
    ?>
  <div id="main-container">
  <div class="row">
    <div class="col-md-6">
      <div class="panel panel-primary table-ajustes">
        <div class="panel-heading">
          <h3>Listagem de Funcionários</h3>
        </div>
        <div class="form-group" style="margin: 8px 10px;">
          <table class="table">
          <thead class="thead-dark">
            <tr>
              <th scope="col">#</th>
              <th scope="col">Nome</th>
              <th scope="col">Cpf</th>
              <th scope="col">Função</th>
              <th scope="col">*</th>
            </tr>
          </thead>
          <tbody>
            <?php
              foreach($resultado as $res){
                 if($res != null){
              ?> 
            <tr>
              <th scope="row"><?php echo $res['id'] ?></th>
              <td><?php echo $res['nome'] ?> </td>
              <td><?php echo $res['cpf'] ?></td>
              <td><?php echo $res['tipoDeFunc'] ?></td>
              <td><a href="../../controller/paciente/paciente_controller.php?acao=delete&id=<?php echo $res['id'] ?>" name="acao" class="btn btn-sm excluir-usuario" onClick="remover()">
                <button type="button" class="btn btn-danger">Excluir</button></a>
              </td>
            </tr>
            <?php }} ?>         
        </div>
      </div>
    </div>
  </div>
  <?php 
    include_once "../header.php"; 
   ?>