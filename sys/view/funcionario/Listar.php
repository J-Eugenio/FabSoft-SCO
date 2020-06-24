<?php 
include_once '../../controller/funcionario/funcionario_DAO.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:wght@700&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="/fabsoft-sco/sys/assets/css/tabelas.css">
  <link rel="stylesheet" href="/fabsoft-sco/sys/assets/css/main.css">

  <title>Cadastro de Funcionários</title>

</head>
   <body>
      <?php //NAV ?>
      <?php 
         $reser = new funcionario_DAO;
         $resultado = $reser->listarFuncionarios();
         ?>
         <div id="main-container">
      <h1>Listagem de Pacientes</h1>
      <div class="row">
         <div class="col-md-6">
            <div class="panel panel-primary table-ajustes">
               <div class="panel-heading">
                  <h3>Tabela de reservas</h3>
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
                                    if($res != null){
                                 ?>  
                              <tr class="row100 body">
                                 <td class="cell100 column1" data-title="nome"> <?php echo $res['nome'] ?> </td>
                                 <td class="cell100 column2" data-title="cpf"> <?php echo $res['cpf'] ?> </td>
                                 <td class="cell100 column3" data-title="idade"> <?php echo $res['idade'] ?> </td>
                                 <td class="text-center" data-title="">
                                    <a href="../../controller/funcionario/funcionario_controller.php?acao=delete&id=<?php echo $res['id'] ?>" name="acao" class="btn btn-sm btn-danger excluir-usuario" onClick="remover()">
                                    <span class="fa fa-trash">Excluir</span></a>
                                    <a href="Editar.php?id=<?php echo $res['id'] ?>" class="btn btn-sm btn-primary" >
                                    <span class="fa fa-cogs">Atualizar</span></a>
                                 </td>
                                    <?php }} ?>
                              </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      </div>
   </body>
</html>