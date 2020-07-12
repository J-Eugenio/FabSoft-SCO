<?php
    require_once 'transporte_DAO.php';
    require_once '../../model/transporte/transporte_class.php';

    $transporteClass = new transporte_DAO();

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $action = $_GET['acao']; break;
        case 'POST': $action = $_POST['acao']; break;
    }

    if($action == "delete"){
        $transporteClass->setId($_GET['id']);
    }

    if(!empty($transporteClass->getId())){
        echo 'Dados Preenchidos';
    }else{
        if($action == "update"){
            $transporteClass->setId($_GET['id']);
        }

    }
    
?>