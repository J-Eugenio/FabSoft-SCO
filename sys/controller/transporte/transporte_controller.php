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
        echo 'Preencha os dados';
    }else{
        if($action == "update"){
            $transporteClass->setId($_POST['id']);
        }
        $transporteClass->setLugarSolicitado($_POST['lugarSolicitado']);
        $transporteClass->setMotivoSolicitacao($_POST['motivo']);
        $transporteClass->setDataConsulta($_POST['dataConsulta']);
        $transporteClass->setHorarioConsulta($_POST['horaConsulta']);
        $transporteClass->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : 'Enviado');
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
                $transporteClass->update();
            } catch(Exception $e){
                echo $e->getMessage();
            }
        break;
    }
    
?>