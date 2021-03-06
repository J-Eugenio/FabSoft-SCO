<?php
    include_once '../header.php';
    require_once '../../model/transporte/transporte_DAO.php';

    $transporteDAO = new transporte_DAO();
    $dadosTransporte = $transporteDAO->listarTransportes();
    //var_dump($transporteDAO);
?>

<div id="main-container">
<?php if($_SESSION['user_type'] != 1){?>
<form method="POST" action="../../controller/transporte/transporte_controller.php">
      <div class="col justify-content-center  div-services">
         <h2 class="row justify-content-center">Solicitação de Transporte</h2>
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
         <div class="half-box">
            <label>Data da consulta</label>
            <input required  type="date" id="data" name="dataConsulta" class="form-control">
            <label>Hora da consulta</label>
            <input required  type="time" id="time" name="horaConsulta" class="form-control">
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
<?php } ?>
<div class="row justify-content-center ">
   <div class="col-auto">
      <div class="panel panel-primary table-ajustes">
         <div class="panel-heading">
            <h3>Tabela de Transporte</h3>
         </div>
         <div class="form-group" style="margin: 8px 10px;">
            <table class="table table-responsive table-bordered">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Lugar Solicitado</th>
                     <th scope="col">Motivo da Solicitação</th>
                     <th scope="col">Data da Consulta</th>
                     <th scope="col">Hora da Consulta</th>
                     <th scope="col">Situação</th>
                     <th scope="col">*</th>
                     <?php if($_SESSION['user_type'] == '1'){?>
                        <th scope="col">*</th>
                     <?php }?>
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
                     <td><?php echo date('d/m/Y', strtotime($res['dataConsulta'])) ?></td>
                     <td><?php echo $res['horarioConsulta'] ?></td>
                     <td><?php echo $res['situacao'] ?></td>
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
                     <td><?php echo date('d/m/Y', strtotime($res['dataConsulta'])) ?></td>
                     <td><?php echo $res['horarioConsulta'] ?></td>
                     <td><?php echo $res['situacao'] ?></td>
                     <td><a href="../../controller/transporte/transporte_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-sm btn-danger excluir-usuario btn-lg" onClick="remover()">
                        <span class="fa fa-trash"></span> Excluir</a>
                     </td>
                     <td>
                        <!-- Button chama o  modal -->
                        <button type="button" class="btn btn-primary fa fa-cogs " data-toggle="modal" data-target="#updateService<?php echo $res['id'] ?>">
                            Atualizar
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="../../controller/transporte/transporte_controller.php">
                           <div class="modal fade" id="updateService<?php echo $res['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                                 </div>
                                 <div class="modal-body">
                                    <select class="form-control" name="situacao">
                                       <option value="Enviado">Enviado</option>
                                       <option value="Cancelado">Cancelado</option>
                                       <option value="Definido">Definido</option>
                                       <option value="Indeferido">Indeferido</option>
                                    </select>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Atualizar</button>
                                 </div>
                                 <div class="half-box">
                                 <input type="hidden" name="acao" class="form-control" value="update" />
                                 <input type="hidden" name="id_paciente" class="form-control" value="<?php echo $_SESSION['user_id'];?>" />
                                 <input type="hidden" name="user_type" class="form-control" value="<?php echo $_SESSION['user_type'];?>" />

                                 <input type="hidden" name="id" class="form-control" value="<?php echo $res['id'];?>" />
                                 <input type="hidden" name="lugarSolicitado" class="form-control" value="<?php echo $res['lugarSolicitado'];?>" />
                                 <input type="hidden" name="motivo" class="form-control" value="<?php echo $res['motivoSolicitacao'];?>" />
                                 <input type="hidden" name="dataConsulta" class="form-control" value="<?php echo $res['dataConsulta'];?>" />
                                 <input type="hidden" name="horaConsulta" class="form-control" value="<?php echo $res['horarioConsulta'];?>" />
                                 </div>
                              </div>
                           </div>
                           </div>
                        </form>
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
<?php if($_SESSION['user_type'] == 1){?>
    <div class="fixed-bottom">
    <?php include_once "../footer.php"; ?>
    </div>
<?php }else{ ?>
    <?php include_once "../footer.php"; ?>
<?php } ?>