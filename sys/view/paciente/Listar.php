<?php
include_once '../../model/paciente/paciente_DAO.php';
include_once "../header.php"
?>
<?php
$reser = new paciente_DAO;
$resultado = $reser->listarFuncionarios();
?>

<div class="body">
  <!-- Essa Div Seria o body-->
  <div id="main-container">
    <div class="row">
      <div class="">
        <div class="panel panel-primary table-ajustes">
          <div class="panel-heading">
            <h3>Listagem de Pacientes</h3>
          </div>
          <div class="form-group" style="margin: 8px 10px;">
            <table class="table table-responsive table-bordered ">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Cpf</th>
                  <th scope="col">Data de Nascimento</th>
                  <th scope="col">Situação</th>
                  <th scope="col">*</th>
                  <th scope="col">*</th>
                  <th scope="col">*</th>
                </tr>
              </thead>
              <tbody>
                <?php
                foreach ($resultado as $res) {
                  if ($res != null) {
                ?>
                <tr>
                  <th scope="row"><?php echo $res['id'] ?></th>
                  <td><?php echo $res['nome'] ?> </td>
                  <td><?php echo $res['cpf'] ?></td>
                  <td><?php echo $res['dataNasc'] ?></td>
                  <td><?php echo $res['situacao'] ?></td>
                  <td>
                    <a href="../../controller/paciente/paciente_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                      name="acao" class="btn btn-danger" onClick="remover()">
                      <span class="fa fa-cogs"></span>Excluir
                    </a>
                  </td>
                  <td>
                    <a href="Editar.php?id=<?php echo $res['id'] ?>" class="btn btn-primary ">
                      <span class="fa fa-trash"></span> Atualizar
                    </a>
                  </td>
                  <td>
                        <!-- Button chama o  modal -->
                        <button type="button" class="btn btn-primary fa fa-cogs btn-lg" data-toggle="modal" data-target="#updateService<?php echo $res['id'] ?>">
                            Atualizar
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="../../controller/paciente/paciente_controller.php">
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
                                       <option value="Ativo">Ativo</option>
                                       <option value="Inátivo ">Inátivo</option>
                                       <option value="Óbito">Óbito</option>
                                    </select>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Atualizar</button>
                                 </div>
                                 <div class="half-box">
                                 <input type="hidden" name="acao" class="form-control" value="updateSituacao" />
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
                <?php }
                } ?>
              </tbody>
            </table>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
</div>

<?php include_once "../footer.php"; ?>