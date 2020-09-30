<?php

    require_once '../../model/funcionario/funcionario_DAO.php';
    require_once '../../model/funcionario/funcionario_class.php';
    $funcDAO = new funcionario_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }


switch($acao){
    case 'inserir':
        try{
            $funcDAO->setCpf($_POST['cpf']);
            $funcDAO->setSenha($_POST['senha']);
            $funcDAO->setNome($_POST['nome']);
            $funcDAO->setSobrenome($_POST['sobrenome']);
            $funcDAO->setGenero($_POST['sexo']);
            $funcDAO->setFuncao($_POST['funcao']);
            $funcDAO->setTipoDeFunc($_POST['tipoDeFunc']);

            $funcDAO->insert();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $funcDAO->setId($_GET['id']);
            
            $funcDAO->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $funcDAO->setId($_POST['id']);
            $funcDAO->setCpf($_POST['cpf']);
            $funcDAO->setSenha($_POST['senha']);
            $funcDAO->setNome($_POST['nome']);
            $funcDAO->setSobrenome($_POST['sobrenome']);
            $funcDAO->setGenero($_POST['sexo']);
            $funcDAO->setFuncao($_POST['funcao']);
            $funcDAO->setTipoDeFunc($_POST['tipoDeFunc']);
            $funcDAO->update();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}