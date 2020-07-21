<?php

    require_once 'funcionario_DAO.php';
    require_once '../../model/funcionario/funcionario_class.php';
    $funcDAO = new funcionario_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $funcDAO->setId($_GET['id']);
    }
    if(!empty($funcDAO->getCpf())       || !empty($funcDAO->getSobrenome()) 
        || !empty($funcDAO->getSenha()) || !empty($funcDAO->getGenero()) 
        || !empty($funcDAO->getNome())  || !empty($funcDAO->getFuncao())
        || !empty($funcDAO->getTipoDeFunc())){
        echo "Preencha os dados";
    }else{
        if($acao == "update"){
            $funcDAO->setId($_POST['id']);
        }
        $funcDAO->setCpf($_POST['cpf']);
        $funcDAO->setSenha($_POST['senha']);
        $funcDAO->setNome($_POST['nome']);
        $funcDAO->setSobrenome($_POST['sobrenome']);
        $funcDAO->setGenero($_POST['sexo']);
        $funcDAO->setFuncao($_POST['funcao']);
        $funcDAO->setTipoDeFunc($_POST['tipoDeFunc']);

    }

switch($acao){
    case 'inserir':
        try{
            $funcDAO->insert();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $funcDAO->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $funcDAO->update();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}