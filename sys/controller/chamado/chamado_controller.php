<?php

    require_once 'chamado_DAO.php';
    require_once '../../model/chamado/chamado_class.php';
    $chamadoDAO = new chamado_DAO();
    switch($_SERVER['REQUEST_METHOD']){
        case 'GET': $action = $_GET['acao']; break;
        case 'POST': $action = $_POST['acao']; break;
    }

    if($action == "delete"){
        $chamadoDAO->setId($_GET['id']);
    }else{
        if(!empty($chamadoDAO->getAssunto()) || !empty($chamadoDAO->getTextoDoChamado()) 
        || !empty($chamadoDAO->getData()) || !empty($chamadoDAO->getHora()) 
        || !empty($chamadoDAO->getSituacao()) || !empty($chamadoDAO->getId_paciente()) 
        || !empty($chamadoDAO->getUser_type())){
            echo "Preencha os dados";
        }else{
            if($action == "update"){
                $chamadoDAO->setId($_POST['id']);
            }
            $chamadoDAO->setAssunto();
            $chamadoDAO->setTextoDoChamado();
            $chamadoDAO->setData();
            $chamadoDAO->setHora();
            $chamadoDAO->setSituacao();
            $chamadoDAO->setId_paciente();
            $chamadoDAO->setUser_type();
        }
    }

    switch($action){
        case 'inserir':
            try{
                $chamadoDAO->inserir();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
        case 'delete':
            try{
                $chamadoDAO->delete();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
        case 'update':
            try{
                $chamadoDAO->update();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
    }

?>