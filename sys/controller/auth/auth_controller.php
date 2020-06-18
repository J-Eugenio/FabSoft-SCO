<?php

    require_once 'auth_DAO.php';
    require_once '../../model/auth/auth_class.php';
    $userClass = new auth_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "autenticar"){
            $userClass->setCPF($_POST['cpf']);
            $userClass->setSenha($_POST['senha']);
    }

switch($acao){
    case 'autenticar':
        $userClass->autenticar(
            $userClass->getCPF(), 
            $userClass->getSenha()
        );
    break;
}