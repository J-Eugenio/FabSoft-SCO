<?php
   include_once '../../controller/services/service_DAO.php';
   include_once "../header.php";
   $reser = new service_DAO;
   $resultado = $reser->listarServices();
?>
<div id="main-container-services">
<form method="POST" action="../../controller/services/service_controller.php">
      <div class="col justify-content-center  div-services">
         <h1>Solicitação de Serviços</h1>
         <div class="half-box">
            <label>Serviço: </label>
            <select class="form-control" name="tipoDeService" id="tipoDeService">
               <option value="Curativo">Curativo</option>
               <option value="Sonda">Sonda</option>
            </select>
         </div>
         <div id="typeSonda" class="half-box">
            <div class="half-box" id="tipoSonda">
               <label>Tipo de Sonda: </label>
               <select class="form-control" name="tipoDeSonda" id="tipoDeSonda">
                  <option value="N/A">Selecione o tipo de sonda...</option>
                  <option value="Vesical">Vesical</option>
                  <option value="Nasogastica">Nasogástrica</option>
               </select>
            </div>
         </div>
         <div class="half-box d-flex justify-content-center">
            <button type="submit" class="btn btn-success btn-lg m-2"> Salvar</button>
            <button type="reset" class="btn btn-warning btn-lg m-2"> Limpar</button>
         </div>
      </div>
</div>
<div class="half-box">
<input type="hidden" name="acao" class="form-control" value="inserir" />
<input type="hidden" name="id_paciente" class="form-control" value="<?php echo $_SESSION['user_id'];?>" />
<input type="hidden" name="user_type" class="form-control" value="<?php echo $_SESSION['user_type'];?>" />
</div>
</form>

<!-- Button chama o  modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateService">
  Launch demo modal
</button>

<!-- Modal -->
<div class="modal fade" id="updateService" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        ...
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>


<div class="row justify-content-center ">
   <div class="col-auto">
      <div class="panel panel-primary table-ajustes">
         <div class="panel-heading">
            <h3>Tabela de Serviços</h3>
         </div>
         <div class="form-group" style="margin: 8px 10px;">
            <table class="table table-responsive table-bordered">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Serviço</th>
                     <th scope="col">Tipo de Sonda</th>
                     <th scope="col">Situação</th>
                     <th scope="col">Data</th>
                     <th scope="col">Hora</th>
                     <th scope="col">*</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     foreach($resultado as $res){
                        if($_SESSION['user_type'] != 1 && $res != null){
                        if($_SESSION['user_id'] == $res['id_paciente'] && $res['user_type'] != 1){
                     ?>
                  <tr>
                     <th scope="row"><?php echo $res['id'] ?></th>
                     <td><?php echo $res['service'] ?> </td>
                     <td><?php echo $res['tipoDeSonda'] ?></td>
                     <td><?php echo $res['situacao'] ?></td>
                     <td><?php echo $res['dataRegistro'] ?></td>
                     <td><?php echo $res['horaRegistro'] ?></td>
                     <td><a href="../../controller/services/service_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-sm btn-danger excluir-usuario btn-lg" onClick="remover()">
                        <span class="fa fa-trash"></span> Excluir</a>
                     </td>
                  </tr>
                  <?php }} else if($res != null){ ;?>
                  <tr>
                     <th scope="row"><?php echo $res['id'] ?></th>
                     <td><?php echo $res['service'] ?> </td>
                     <td><?php echo $res['tipoDeSonda'] ?></td>
                     <td><?php echo $res['situacao'] ?></td>
                     <td><?php echo $res['dataRegistro'] ?></td>
                     <td><?php echo $res['horaRegistro'] ?></td>
                     <td><a href="../../controller/services/service_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-sm btn-danger excluir-usuario btn-lg" onClick="remover()">
                        <span class="fa fa-trash"></span> Excluir</a>
                     </td>
                  </tr>
                  <?php }} ?>
               </tbody>
            </table>
         </div>
      </div>
   </div>
</div>
</div>
<?php include_once "../footer.php"; ?>