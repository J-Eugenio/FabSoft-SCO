<?php
  include_once '../../controller/services/service_DAO.php';
  include_once "../header.php";
?>
  <div id="main-container">
  <?php 
         $reser = new service_DAO;
         $resultado = $reser->listarServices();
  ?>
  <!-- Script do select do serviços -->
    
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
      <button type="submit" class="btn btn-success"> Salvar</button>
      <button type="reset" class="btn btn-warning"> Limpar</button>
      <a href="Listar.php"><button type="button" class="btn btn-info"><img src="/fabsoft-sco/sys/assets/img/search.svg" alt="Pesquisar"></button></a>
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
                              if($res != null){
                           ?> 
                        <tr>
                           <th scope="row"><?php echo $res['id'] ?></th>
                           <td><?php echo $res['service'] ?> </td>
                           <td><?php echo $res['tipoDeSonda'] ?></td>
                           <td><?php echo $res['situacao'] ?></td>
                           <td><?php echo $res['dataRegistro'] ?></td>
                           <td><?php echo $res['horaRegistro'] ?></td>
                           <td><a href="../../controller/services/service_controller.php?acao=delete&id=<?php echo $res['id'] ?>" name="acao" class="btn btn-sm btn-danger excluir-usuario" onClick="remover()">
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
 include_once "../footer.php"
?>