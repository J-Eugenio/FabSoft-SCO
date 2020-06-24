<?php 
   include_once '../../controller/services/service_DAO.php';
   ?>
<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Listar Usuário</title>
   </head>
   <body>
      <?php //NAV ?>
      <?php 
         $reser = new service_DAO;
         $resultado = $reser->listarServices();
         ?>
      <h1>LISTAGEM DE SERVIÇOS</h1>
      <div class="row">
         <div class="col-md-6">
            <div class="panel panel-primary table-ajustes">
               <div class="panel-heading">
                  Tabela de Serviços
               </div>
               <div class="form-group" style="margin: 8px 10px;">
                  <table class="table">
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
   </body>
</html>