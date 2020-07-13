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

    if(
        !empty($transporteClass->getId()) || !empty($transporteClass->getLugarSolicitado()) 
        || !empty($transporteClass->getMotivoSolicitacao()) || !empty($transporteClass->getDataConsulta())
        || !empty($transporteClass->getHorarioConsulta()) || !empty($transporteClass->getId_paciente())
    ){
        echo 'Dados Preenchidos';
    }else{
        if($action == "update"){
            $transporteClass->setId($_GET['id']);
        }
        $transporteClass->setLugarSolicitado($_POST['lugarSolicitado']);
        $transporteClass->setMotivoSolicitacao($_POST['motivo']);
        $transporteClass->setDataConsulta(date('Y-m-d'));
        $transporteClass->setHorarioConsulta(date('H:i:s'));
        $transporteClass->setUser_type($_POST['user_type']);
        $transporteClass->setId_paciente($_POST['id_paciente']);
    }

    switch($action){
        case 'inserir':
            try {
                $transporteClass->insert();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        break;
        case 'delete':
            try {
                $transporteClass->delete();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        break;
        case 'update':
            try{

            } catch(Exception $e){
                echo $e->getMessage();
            }
        break;
    }
    
?>