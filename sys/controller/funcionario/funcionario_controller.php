<?php

    require_once 'funcionario_DAO.php';
    require_once '../../model/funcionario/funcionario_class.php';
    $funcClass = new funcionario_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $funcClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($funcClass->getCpf())  || !empty($funcClass->getSobrenome()) ||
           !empty($funcClass->getSenha())   || !empty($funcClass->getGenero()) ||
           !empty($funcClass->getNome())|| !empty($funcClass->getFuncao())
           || !empty($funcClass->getTipoDeFunc())){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $funcClass->setId($_POST['id']);
            }
            $funcClass->setCpf($_POST['cpf']);
            $funcClass->setSenha($_POST['senha']);
            $funcClass->setNome($_POST['nome']);
            $funcClass->setSobrenome($_POST['sobrenome']);
            $funcClass->setGenero($_POST['sexo']);
            $funcClass->setFuncao($_POST['funcao']);
            $funcClass->setTipoDeFunc($_POST['tipoDeFunc']);

        }
    }

switch($acao){
    case 'inserir':
        try{
            $funcClass->insert(
                $funcClass->getCpf(), 
                $funcClass->getSenha(), 
                $funcClass->getNome(), 
                $funcClass->getSobrenome(),
                $funcClass->getGenero(), 
                $funcClass->getFuncao(), 
                $funcClass->getTipoDeFunc()
            );
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $funcClass->delete($funcClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $funcClass->update($funcClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}