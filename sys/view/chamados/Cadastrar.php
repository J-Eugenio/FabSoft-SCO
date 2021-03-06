<?php 
    include_once("../header.php"); 
    include_once '../../model/chamado/chamado_DAO.php';
    $chamadoDAO = new chamado_DAO;
    $resultado = $chamadoDAO->listarChamados();
?>

<div id="main-container">
    <h2>Abrir Chamado</h2>
    <?php if($_SESSION['user_type'] != 1){?>
    <form method="POST" action="../../controller/chamado/chamado_controller.php">
        <div class="col justify-content-center">
            <div class="half-box spacing">
                <label for="e-mail">Assunto</label>
                <input type="text" class="form-control" name="assunto" placeholder="Assunto">
            </div>
            <div class="half-box">
               <label>Data da consulta</label>
               <input required  type="date" id="data" name="dataChamado" class="form-control">
               <label>Hora da consulta</label>
               <input required  type="time" id="time" name="horaChamado" class="form-control">
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
            <div class="half-box d-flex justify-content-center">
                <button type="submit" class="btn btn-success btn-lg mr-4">Enviar</button>
                <button type="reset" class="btn btn-warning btn-lg">Limpar</button>
                <a href="Listar.php"><button type="button" class="btn btn-info btn-lg">Pesquisar</button></a>
            </div>
        </div>
    </form>
    <?php } ?>
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
                     <th scope="col">Situação</th>
                     <th scope="col">Data</th>
                     <th scope="col">Hora</th>
                     <th scope="col">*</th>
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
                     <td><?php echo $res['assunto'] ?> </td>
                     <td><?php echo $res['situacao'] ?></td>
                     <td><?php echo date('d/m/Y', strtotime($res['data'])) ?></td>
                     <td><?php echo $res['hora'] ?></td>
                     <?php if($res['situacao'] != "Enviado"){?>
                        <?php if($res['situacao'] != "Fechado"){?>
                        <td><a href="../../controller/chamado/chamado_controller.php?acao=update&situacao=Fechado&id=<?php echo $res['id'] ?>"
                           name="acao" class="btn btn-danger btn-lg" onClick="remover()">
                           <span class=""></span>Fechar</a>
                        </td>
                        <?php }else { ?>
                        <td><a href="../../controller/chamado/chamado_controller.php?acao=update&situacao=Aberto&id=<?php echo $res['id'] ?>"
                           name="acao" class="btn btn-primary btn-lg" onClick="remover()">
                           <span class=""></span>Abrir</a>
                        </td>
                        <?php }?>
                     <?php }else { ?>
                     <td><a href="../../controller/chamado/chamado_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-danger btn-lg" onClick="remover()">
                        <span class=""></span>Excluir</a>
                     </td>
                     <?php }?>
                     <td>
                        <!-- Button chama o  modal -->
                        <button type="button" <?php if($res['situacao'] == "Fechado"){?>class="btn btn-secondary" disable<?php }else{ ?> class="btn btn-primary" data-toggle="modal" data-target="#updateService<?php echo $res['id'] ?>"<?php }?> >
                            Respostas
                        </button>

                        <!-- Modal -->
                        <form id="modal-chat" method="POST" action="../../controller/chamado/chamado_controller.php">
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
                                    <div class="modal-texto">
                                        <?php
                                          $all_msg = $chamadoDAO->findAllMsg($res['id']);
                                          foreach ($all_msg as $value) {
                                        ?>
                                       <div>
                                            <?php 
                                                if($value['user_type'] == '1'){
                                             ?>
                                             <div>
                                                <div class="msg-chamada-admin" >Funcionário: <?php echo $value['msg']?></div>
                                             </div>
                                             <?php 

                                             }else{ ?>
                                             <div>
                                                <div class="msg-chamada-user">Eu: <?php echo $value['msg']?></div>
                                             </div>
                                             <?php }
                                             
                                             } ?>
                                                
                                       </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Mensagem:</label>
                                        <textarea class="form-control" name="msg" id="message-text"></textarea>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" name="modal-chat" class="btn btn-primary">Atualizar</button>
                                 </div>
                                 <div class="half-box">
                                 <input type="hidden" name="acao" class="form-control" value="inserir-msg" />
                                 <input type="hidden" name="id_paciente" class="form-control" value="<?php echo $_SESSION['user_id'];?>" />
                                 <input type="hidden" name="user_type" class="form-control" value="<?php echo $_SESSION['user_type'];?>" />
                                 <input type="hidden" name="id_chamada" class="form-control" value="<?php echo $res['id'];?>" />
                                 <input type="hidden" name="nova_situacao" class="form-control" value="Re-Enviado" />
                                 </div>
                              </div>
                           </div>
                           </div>
                        </form>
                     </td>
                  </tr>
                  <?php }} else if($res != null){ ;?>
                  <tr>
                     <th scope="row"><?php echo $res['id'] ?></th>
                     <td><?php echo $res['assunto'] ?> </td>
                     <td><?php echo $res['situacao'] ?></td>
                     <td><?php echo date('d/m/Y', strtotime($res['data'])) ?></td>
                     <td><?php echo $res['hora'] ?></td>
                     <?php if($res['situacao'] != "Fechado"){?>
                     <td><a href="../../controller/chamado/chamado_controller.php?acao=update&situacao=Fechado&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-danger btn-lg" onClick="remover()">
                        <span class=""></span>Fechar</a>
                     </td>
                     <?php }else { ?>
                     <td><a href="../../controller/chamado/chamado_controller.php?acao=update&situacao=Aberto&id=<?php echo $res['id'] ?>"
                        name="acao" class="btn btn-primary btn-lg" onClick="remover()">
                        <span class=""></span>Abrir</a>
                     </td>
                     <?php }?>
                     <td>
                        <!-- Button chama o  modal -->
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#updateService<?php echo $res['id']; ?>">
                            Respostas
                        </button>

                        <!-- Modal -->
                        <form method="POST" action="../../controller/chamado/chamado_controller.php">
                           <div class="modal fade" id="updateService<?php echo $res['id']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                           <div class="modal-dialog" role="document">
                              <div class="modal-content">
                                 <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                 </button>
                                 </div>
                                 <div class="modal-body">
                                    <div class="modal-texto">
                                        <?php
                                          $all_msg = $chamadoDAO->findAllMsg($res['id']);
                                          foreach ($all_msg as $value) {
                                        ?>
                                        <div>
                                            <?php 
                                                if($value['user_type'] == '1'){
                                             ?>
                                             <div>
                                                <div class="msg-chamada-admin" >Funcionário: <?php echo $value['msg']?></div>
                                             </div>
                                             <?php 

                                             }else{ ?>
                                             <div>
                                                <div class="msg-chamada-user">Eu: <?php echo $value['msg']?></div>
                                             </div>
                                             <?php }
                                             
                                             } ?>
                                                
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="message-text" class="col-form-label">Mensagem:</label>
                                        <textarea class="form-control" name="msg" id="message-text"></textarea>
                                    </div>
                                 </div>
                                 <div class="modal-footer">
                                 <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                                 <button type="submit" class="btn btn-primary">Atualizar</button>
                                 </div>
                                 <div class="half-box">
                                 <input type="hidden" name="acao" class="form-control" value="inserir-msg" />
                                 <input type="hidden" name="id_paciente" class="form-control" value="<?php echo $_SESSION['user_id'];?>" />
                                 <input type="hidden" name="user_type" class="form-control" value="<?php echo $_SESSION['user_type'];?>" />                                          
                                 <input type="hidden" name="id_chamada" class="form-control" value="<?php echo $res['id'];?>" />
                                 <input type="hidden" name="nova_situacao" class="form-control" value="Respondido" />
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
<?php if($_SESSION['user_type'] == 1){?>
    <div class="fixed-bottom">
    <?php include_once "../footer.php"; ?>
    </div>
<?php }else{ ?>
    <?php include_once "../footer.php"; ?>
<?php } ?>