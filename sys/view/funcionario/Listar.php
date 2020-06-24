<?php 
include_once '../../controller/funcionario/funcionario_DAO.php';
?>

<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <link rel="stylesheet" href="/fabsoft-sco/sys/assets/css/tabelas.css">
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <title>Listar Usuário</title>
   </head>
   <body>
      <?php //NAV ?>
      <?php 
         $reser = new funcionario_DAO;
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
                  <div class="table100 ver1 m-b-110">
                     <div class="table100-head">
                        <table>
                           <thead>
                              <tr class="row100 head">
                                 <th class="cell100 column1">Nome</th>
                                 <th class="cell100 column2">Cpf</th>
                                 <th class="cell100 column3">Idade</th>
                              </tr>
                           </thead>
                        </table>
                     </div>
                     <div class="table100-body js-pscroll">
                        <table>
                           <tbody>
                              <?php
                                 foreach($resultado as $res){
                                 ?>  
                              <tr class="row100 body">
                                 <td class="cell100 column1"> <?php echo $res['nome'] ?> </th>
                                 <td class="cell100 column2"> <?php echo $res['cpf'] ?> </th>
                                 <td class="cell100 column3"> <?php echo $res['idade'] ?> </th>
                                 <td class="text-center">
                                    <a href="../../controller/funcionario/funcionario_controller.php?acao=delete&id=<?php echo $res['id'] ?>" name="acao" class="btn btn-sm btn-danger excluir-usuario" onClick="remover()">
                                    <span class="fa fa-trash"></span> Excluir</a>
                                    <a href="Editar.php?id=<?php echo $res['id'] ?>" class="btn btn-sm btn-primary" >
                                    <span class="fa fa-cogs"></span> Atualizar</a>
                                    </th>
                                    <?php } ?>
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