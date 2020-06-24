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
                  <div class="table100 ver1 m-b-110">
                     <div class="table100-head">
                        <table>
                           <thead>
                              <tr class="row100 head">
                                 <th class="cell100 column1">id</th>
                                 <th class="cell100 column2">Serviço</th>
                                 <th class="cell100 column3">Tipo de Sonda</th>
                                 <th class="cell100 column3">Situação</th>
                                 <th class="cell100 column3">Data</th>
                                 <th class="cell100 column3">Hora</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                     <div class="table100-body js-pscroll">
                        <table>
                           <tbody>
                              <?php
                                 foreach($resultado as $res){
                                    if($res != null){
                                 ?>  
                              <tr class="row100 body">
                                 <td class="cell100 column1"> <?php echo $res['id'] ?> </th>
                                 <td class="cell100 column2"> <?php echo $res['service'] ?> </th>
                                 <td class="cell100 column3"> <?php echo $res['tipoDeSonda'] ?> </th>
                                 <td class="cell100 column3"> <?php echo $res['situacao'] ?> </th>
                                 <td class="cell100 column3"> <?php echo $res['dataRegistro'] ?> </th>
                                 <td class="cell100 column3"> <?php echo $res['horaRegistro'] ?> </th>
                                 <td class="text-center">
                                    <a href="../../controller/services/service_controller.php?acao=delete&id=<?php echo $res['id'] ?>" name="acao" class="btn btn-sm btn-danger excluir-usuario" onClick="remover()">
                                    <span class="fa fa-trash"></span> Excluir</a>
                                    </th>
                                    <?php }} ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </body>
</html>