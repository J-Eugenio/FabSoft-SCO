<?php include_once("../header.php"); ?>

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
</div>

<?php
include_once '../footer.php';
?>