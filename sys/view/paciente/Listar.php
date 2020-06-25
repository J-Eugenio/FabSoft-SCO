<?php 
include_once '../../controller/paciente/paciente_DAO.php';
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
         $reser = new paciente_DAO;
         $resultado = $reser->listarFuncionarios();
         ?>
      <h1>LISTAGEM DE USUÁRIO</h1>
      <div class="row">
         <div class="col-md-6">
            <div class="panel panel-primary table-ajustes">
               <div class="panel-heading">
                  Tabela de reservas
               </div>
               
               <div class="form-group" style="margin: 8px 10px;">
                  <table class="table">
                     <thead class="thead-dark">
                        <tr>
                           <th scope="col">#</th>
                           <th scope="col">Nome</th>
                           <th scope="col">Cpf</th>
                           <th scope="col">Idade</th>
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
                           <td><?php echo $res['dataNasc'] ?></td>
                           <td><a href="../../controller/paciente/paciente_controller.php?acao=delete&id=<?php echo $res['id'] ?>" name="acao" class="btn btn-sm btn-danger excluir-usuario" onClick="remover()">
                           <button type="button" class="btn btn-danger">Escluir</button></a>
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