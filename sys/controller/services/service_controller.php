<?php

    require_once 'service_DAO.php';
    require_once '../../model/services/service_class.php';
    $serviceClass = new service_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $serviceClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($serviceClass->getService()) || !empty($serviceClass->getIdade()) ||
           !empty($serviceClass->getSenha())   || !empty($serviceClass->getGenero()) ||
           !empty($serviceClass->getNome())|| !empty($serviceClass->getFuncao())
           || !empty($serviceClass->getTipoDeFunc())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $serviceClass->setId($_POST['id']);
            }
            $serviceClass->setCpf($_POST['cpf']);
            $serviceClass->setSenha($_POST['senha']);
            $serviceClass->setNome($_POST['nome']);
            $serviceClass->setIdade($_POST['idade']);
            $serviceClass->setGenero($_POST['genero']);
            $serviceClass->setFuncao($_POST['funcao']);
            $serviceClass->setTipoDeFunc($_POST['tipoDeFunc']);

        }
    }

switch($acao){
    case 'inserir':
        try{
            $serviceClass->insert($serviceClass->getCpf(), $serviceClass->getSenha(), $serviceClass->getNome(), $serviceClass->getIdade(), $serviceClass->getGenero(), $serviceClass->getFuncao(), $serviceClass->getTipoDeFunc());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $serviceClass->delete($serviceClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $serviceClass->update($serviceClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}