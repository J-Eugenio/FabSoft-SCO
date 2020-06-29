<?php
include_once '../../controller/paciente/paciente_DAO.php';
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
      <div class="col-md-6">
        <div class="panel panel-primary table-ajustes">
          <div class="panel-heading">
            <h3>Listagem de Pacientes</h3>
          </div>
          <div class="form-group" style="margin: 8px 10px;">
            <table class="table ">
              <thead class="thead-dark">
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Nome</th>
                  <th scope="col">Cpf</th>
                  <th scope="col">Idade</th>
                  <th scope="col"></th>
                  <th scope="col"></th>
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
                  <td>
                    <a href="../../controller/paciente/paciente_controller.php?acao=delete&id=<?php echo $res['id'] ?>"
                      name="acao" class="btn btn-danger btn-lg" onClick="remover()">
                      <span class="fa fa-cogs"></span>Excluir
                    </a>
                  </td>
                  <td>
                    <a href="Editar.php?id=<?php echo $res['id'] ?>" class="btn btn-primary btn-lg">
                      <span class="fa fa-trash"></span> Atualizar
                    </a>
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
<?php include_once "../footer.php"; ?>