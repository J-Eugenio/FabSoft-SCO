<?php
    require_once '../../model/transporte/transporte_DAO.php';
    require_once '../../model/transporte/transporte_class.php';

    $transporteDAO = new transporte_DAO();

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $action = $_GET['acao']; break;
        case 'POST': $action = $_POST['acao']; break;
    }

    switch($action){
        case 'inserir':
            try {
                $transporteDAO->setLugarSolicitado($_POST['lugarSolicitado']);
                $transporteDAO->setMotivoSolicitacao($_POST['motivo']);
                $transporteDAO->setDataConsulta($_POST['dataConsulta']);
                $transporteDAO->setHorarioConsulta($_POST['horaConsulta']);
                $transporteDAO->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : 'Enviado');
                $transporteDAO->setUser_type($_POST['user_type']);
                $transporteDAO->setId_paciente($_POST['id_paciente']);
                $transporteDAO->insert();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        break;
        case 'delete':
            try {
                $transporteDAO->setId($_GET['id']);
                $transporteDAO->delete();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        break;
        case 'update':
            try{
                $transporteDAO->setId($_POST['id']);
                $transporteDAO->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : 'Enviado');
                $transporteDAO->update();
            } catch(Exception $e){
                echo $e->getMessage();
            }
        break;
    }
    
?>