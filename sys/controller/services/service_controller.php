<?php

    require_once 'service_DAO.php';
    require_once '../../model/services/service_class.php';
    $serviceClass = new service_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $action = $_GET['acao']; break;
        case 'POST': $action = $_POST['acao']; break;
    }
    if($action == "delete"){
        $serviceClass->setId($_GET['id']);
    }

    if(!empty($serviceClass->getService()) || !empty($serviceClass->getTipoDeSonda()) ||
        !empty($serviceClass->getSituacao())   || !empty($serviceClass->getDataRegistro()) ||
        !empty($serviceClass->getHoraRegistro())|| !empty($serviceClass->getId_paciente())){
        echo "Preencha os dados";
    }else{
        if($action == "update"){
            $serviceClass->setId($_POST['id']);
        }
        $serviceClass->setService($_POST['tipoDeService']);
        $serviceClass->setTipoDeSonda($_POST['tipoDeSonda']);
        $serviceClass->setSituacao('Enviado');
        $serviceClass->setDataRegistro(date('d-m-Y'));
        $serviceClass->setHoraRegistro(date('H:i:s'));
        $serviceClass->setUser_type($_POST['user_type']);
        $serviceClass->setId_paciente($_POST['id_paciente']);
    }


switch($action){
    case 'inserir':
        try{
            $serviceClass->insert();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $serviceClass->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $serviceClass->update();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}