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
        if(!empty($serviceClass->getService()) || !empty($serviceClass->getTipoDeSonda()) ||
           !empty($serviceClass->getSituacao())   || !empty($serviceClass->getDataRegistro()) ||
           !empty($serviceClass->getHoraRegistro())|| !empty($serviceClass->getId_paciente())
           ){
            echo "Algum dado vazio";
        }else{
            if($acao == "update"){
                $serviceClass->setId($_POST['id']);
            }
            $serviceClass->setService($_POST['tipoDeService']);
            $serviceClass->setTipoDeSonda($_POST['tipoDeSonda']);
            $serviceClass->setSituacao('Enviado');
            $serviceClass->setDataRegistro(date('Y-m-d'));
            $serviceClass->setHoraRegistro(date('H:i:s'));
            $serviceClass->setId_paciente($_POST['id_paciente']);
        }
    }

switch($acao){
    case 'inserir':
        try{
            $serviceClass->insert(
                $serviceClass->getService(), 
                $serviceClass->getTipoDeSonda(), 
                $serviceClass->getSituacao(), 
                $serviceClass->getDataRegistro(), 
                $serviceClass->getHoraRegistro(), 
                $serviceClass->getId_paciente()
            );
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