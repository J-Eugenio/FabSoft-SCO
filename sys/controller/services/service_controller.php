<?php

    require_once 'service_DAO.php';
    require_once '../../model/services/service_class.php';
    $serviceDAO = new service_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $action = $_GET['acao']; break;
        case 'POST': $action = $_POST['acao']; break;
    }
    
    if($action == "delete"){
        $serviceDAO->setId($_GET['id']);
    }else{
        if(!empty($serviceDAO->getService()) || !empty($serviceDAO->getTipoDeSonda()) ||
        !empty($serviceDAO->getSituacao())   || !empty($serviceDAO->getDataRegistro()) ||
        !empty($serviceDAO->getHoraRegistro())|| !empty($serviceDAO->getId_paciente())){
        echo "Preencha os dados";
        }else{
            if($action == "update"){
                $serviceDAO->setId($_POST['id']);
            }
            $serviceDAO->setService($_POST['tipoDeService']);
            $serviceDAO->setTipoDeSonda($_POST['tipoDeSonda']);
            $serviceDAO->setSituacao($_POST['situacao'] ? $_POST['situacao'] : 'Enviado');
            $serviceDAO->setDataRegistro(date('d-m-Y'));
            $serviceDAO->setHoraRegistro(date('H:i:s'));
            $serviceDAO->setUser_type($_POST['user_type']);
            $serviceDAO->setId_paciente($_POST['id_paciente']);
        }
    }



switch($action){
    case 'inserir':
        try{
            $serviceDAO->insert();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $serviceDAO->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $serviceDAO->update();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}