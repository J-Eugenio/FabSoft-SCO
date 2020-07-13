<?php
    include_once '../header.php';
    require_once '../../controller/transporte/transporte_DAO.php';

    $transporteDAO = new transporte_DAO();
    $dadosTransporte = $transporteDAO->listarTransportes();
    //var_dump($transporteDAO);
?>

<div>
<form method="POST" action="../../controller/transporte/transporte_controller.php">
      <div class="col justify-content-center  div-services">
         <h1>Solicitação de Transporte</h1>
         <div class="half-box">
            <label>Lugar Solicitado: </label>
            <select class="form-control" name="lugarSolicitado">
               <option value="Hospital">Hospital</option>
               <option value="Atenção Básica de Saúde">Atenção Básica de Saúde</option>
            </select>
         </div>
         <div class="half-box">
            <label>Motivo da Solicitação</Label>
            <input type="text" name="motivo" class="form-control" placeholder="Motivo..."/>
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
<div class="row justify-content-center ">
   <div class="col-auto">
      <div class="panel panel-primary table-ajustes">
         <div class="panel-heading">
            <h3>Tabela de Serviços</h3>
         </div>
         <div class="form-group" style="margin: 8px 10px;">
            <table class="table table-responsive">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Lugar Solicitado</th>
                     <th scope="col">Motivo da Solicitação</th>
                     <th scope="col">Data da Consulta</th>
                     <th scope="col">Hora da Consulta</th>
                     <th scope="col">*</th>
                  </tr>
               </thead>
               <tbody>
                  <?php
                     foreach($dadosTransporte as $res){
                        if($_SESSION['user_type'] != 1 && $res != null){
                        if($_SESSION['user_id'] == $res['id_paciente'] && $res['user_type'] != 1){
                     ?>
                  <tr>
                     <th scope="row"><?php echo $res['id'] ?></th>
                     <td><?php echo $res['lugarSolicitado'] ?> </td>
                     <td><?php echo $res['motivoSolicitacao'] ?></td>
                     <td><?php echo $res['dataConsulta'] ?></td>
                     <td><?php echo $res['horarioConsulta'] ?></td>
                     <td><a href="../../controller/transporte/transporte_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-sm btn-danger excluir-usuario btn-lg" onClick="remover()">
                        <span class="fa fa-trash"></span> Excluir</a>
                     </td>
                  </tr>
                  <?php }} else if($res != null){ ;?>
                  <tr>
                     <th scope="row"><?php echo $res['id'] ?></th>
                     <td><?php echo $res['lugarSolicitado'] ?> </td>
                     <td><?php echo $res['motivoSolicitacao'] ?></td>
                     <td><?php echo $res['dataConsulta'] ?></td>
                     <td><?php echo $res['horarioConsulta'] ?></td>
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

<?php
    include_once '../footer.php';
?>