<?php

    require_once 'usuario_DAO.php';
    require_once '../../model/usuario/usuario_class.php';
    $userClass = new usuario_DAO();
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
        $userClass->autenticar($userClass->getCPF(), $userClass->getSenha());
    break;
}