<?php include_once("../header.php"); ?>

<div id="main-container">
    <h1>Abrir um chamado de ajuda</h1>
    <form>
        <div class="half-box spacing">
            <label for="e-mail">Insira seu e-mail</label>
            <input type="email" class="form-control" id="e-mail" placeholder="name@example.com">
        </div>
        <div class="half-box">
            <label for="area-de-suporte">Em que setor você precisa de ajuda?</label>
            <select class="form-control" id="area-de-suporte">
                <option selected>Selecione</option>
                <option>Suporte Técnico</option>
                <option>Hospitalar</option>
                <option>Farmacêutico</option>
                <option>Enfermagem</option>
                <option>Transporte</option>
            </select>
        </div>
        <div class="full-box">
            <label for="descricao">Precisamos que nos dê alguns detalhes sobre o seu problema, você pode nos informar aqui.</label>
            <textarea class="form-control" id="descricao" rows="3"></textarea>
        </div>
        <div class="full-box mb-5">
            <input type="hidden" name="acao" class="form-control" value="inserir" />
        </div>
        <button type="submit" class="btn btn-success btn-lg">Enviar</button>
        <button type="reset" class="btn btn-warning btn-lg">Limpar</button>
        <a href="Listar.php"><button type="button" class="btn btn-info btn-lg"><img src="/fabsoft-sco/sys/assets/img/search.svg" alt="Pesquisar">Pesquisar</button></a>
    </form>
</div>

<?php
include_once '../footer.php';
?>