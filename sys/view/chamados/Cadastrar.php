<?php 
    include_once("../header.php"); 
    include_once '../../controller/chamado/chamado_DAO.php';
    $reser = new chamado_DAO;
    $resultado = $reser->listarChamados();
?>

<div id="main-container">
    <h1>Abrir um chamado de ajuda</h1>
    <form method="POST" action="../../controller/chamado/chamado_controller.php">
        <div>
            <div class="half-box spacing">
                <label for="e-mail">Assunto</label>
                <input type="text" class="form-control" name="assunto" placeholder="Assunto">
            </div>
            <div class="half-box ">
                <label for="descricao">Precisamos que nos dê alguns detalhes sobre o seu problema.</label>
                <textarea class="form-control" name="textoDoChamado" rows="5"></textarea>
            </div>
            <div class="half-box spacing mb-5">
                <input type="hidden" name="acao" class="form-control" value="inserir" />
                <input type="hidden" name="id_paciente" class="form-control" value="<?php echo $_SESSION['user_id'];?>" />
                <input type="hidden" name="user_type" class="form-control" value="<?php echo $_SESSION['user_type'];?>" />
            </div>
            <button type="submit" class="btn btn-success btn-lg">Enviar</button>
            <button type="reset" class="btn btn-warning btn-lg">Limpar</button>
            <a href="Listar.php"><button type="button" class="btn btn-info btn-lg"><img src="/fabsoft-sco/sys/assets/img/search.svg" alt="Pesquisar">Pesquisar</button></a>
        </div>
    </form>

    <div class="row justify-content-center ">
   <div class="col-auto">
      <div class="panel panel-primary table-ajustes">
         <div class="panel-heading">
            <h3>Chamados</h3>
         </div>
         <div class="form-group" style="margin: 8px 10px;">
            <table class="table table-responsive table-bordered">
               <thead class="thead-dark">
                  <tr>
                     <th scope="col">#</th>
                     <th scope="col">Assunto</th>
                     <th scope="col">msg</th>
                     <th scope="col">Situação</th>
                     <th scope="col">Data</th>
                     <th scope="col">Hora</th>
                     <th scope="col">*</th>
                     <?php if($_SESSION['user_type'] == '1'){?>
                        <th scope="col">*</th>
                     <?php }?>
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
                     <td><?php echo $res['assunto'] ?> </td>
                     <td><?php echo $res['textoDoChamado'] ?></td>
                     <td><?php echo $res['situacao'] ?></td>
                     <td><?php echo $res['data'] ?></td>
                     <td><?php echo $res['hora'] ?></td>
                     <td><a href="../../controller/services/service_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-sm btn-danger excluir-usuario btn-lg" onClick="remover()">
                        <span class="fa fa-trash"></span> Excluir</a>
                     </td>
                  </tr>
                  <?php }} else if($res != null){ ;?>
                  <tr>
                     <th scope="row"><?php echo $res['id'] ?></th>
                     <td><?php echo $res['assunto'] ?> </td>
                     <td><?php echo $res['textoDoChamado'] ?></td>
                     <td><?php echo $res['situacao'] ?></td>
                     <td><?php echo $res['data'] ?></td>
                     <td><?php echo $res['hora'] ?></td>
                     <td><a href="../../controller/chamado/chamado_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-sm btn-danger excluir-usuario btn-lg" onClick="remover()">
                        <span class="fa fa-trash"></span> Excluir</a>
                     </td>
                     <td>
                        <!-- Button chama o  modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateService<?php echo $res['id'] ?>">
                            Respostas
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="../../controller/chamado/chamado_controller.php">
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
                                 <form>
                                    <div class="form-group">
                                        <?php
                                             $array[1] = array(
                                                "MSG1" => "MSG2",
                                            ); 
                                            $array[2] = array(
                                                "MSG1" => "MSG3",
                                            );  
                                            $array[3] = array(
                                                "MSG1" => "MSG4",
                                            ); 
                                            $array[4] = array(
                                                "MSG1" => "MSG5",
                                            );  
                                            
                                            foreach ($array as $res) {
                                        ?>
                                        <div>
                                            <?php echo $res['MSG1']; }?>
                                        </div>


                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Message:</label>
                                        <textarea class="form-control" id="message-text"></textarea>
                                    </div>
                                 </form>
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
</div>

<?php
include_once '../footer.php';
?>