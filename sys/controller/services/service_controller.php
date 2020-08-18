<?php

    require_once '../../model/services/service_DAO.php';
    require_once '../../model/services/service_class.php';
    $serviceDAO = new service_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $action = $_GET['acao']; break;
        case 'POST': $action = $_POST['acao']; break;
    }
    
switch($action){
    case 'inserir':
        try{
            $serviceDAO->setService($_POST['tipoDeService']);
            $serviceDAO->setTipoDeSonda($_POST['tipoDeSonda']);
            $serviceDAO->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : 'Enviado');
            $serviceDAO->setDataRegistro($_POST['dataService']);
            $serviceDAO->setHoraRegistro($_POST['horaService']);
            $serviceDAO->setUser_type($_POST['user_type']);
            $serviceDAO->setId_paciente($_POST['id_paciente']);
            $serviceDAO->insert();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $serviceDAO->setId($_GET['id']);
            $serviceDAO->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $serviceDAO->setId($_POST['id']);
            $serviceDAO->setSituacao($_POST['situacao'] ? $_POST['situacao'] : 'Enviado');
            $serviceDAO->update();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}