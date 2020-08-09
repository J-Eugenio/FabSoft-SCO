<?php

    require_once 'chamado_DAO.php';
    require_once '../../model/chamado/chamado_class.php';
    $chamadoDAO = new chamado_DAO();

    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $action = $_GET['acao']; break;
        case 'POST': $action = $_POST['acao']; break;
    } 

    switch($action){
        case 'inserir':
            try{
                $chamadoDAO->setAssunto($_POST['assunto']);
                $chamadoDAO->setTextoDoChamado($_POST['textoDoChamado']);
                $chamadoDAO->setData($_POST['dataChamado']);
                $chamadoDAO->setHora($_POST['horaChamado']);
                $chamadoDAO->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : 'Enviado');
                $chamadoDAO->setId_paciente($_POST['id_paciente']);
                $chamadoDAO->setUser_type($_POST['user_type']);
                $chamadoDAO->insert();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
        case 'inserir-msg':
            try {
                $msg = $_POST['msg'];
                $id_chamada = $_POST['id_chamada'];
                $user_type = $_POST['user_type'];
                $chamadoDAO->setSituacao($_POST['nova_situacao']);
                $chamadoDAO->setId($_POST['id_chamada']);

                $chamadoDAO->insertMsg($msg, $id_chamada, $user_type);
            } catch (Exception $e) {
                
            }
        break;
        case 'delete':
            try{
                $chamadoDAO->setId($_GET['id']);
                $chamadoDAO->delete();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
        case 'update':
            try{
                $chamadoDAO->setId(isset($_POST['id']) ? $_POST['id'] : $_GET['id']);
                $chamadoDAO->setSituacao($_GET['situacao']);
                $chamadoDAO->update();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;

    }

?>