<?php

    require_once 'paciente_DAO.php';
    require_once '../../model/paciente/paciene_class.php';
    
    $paciDAO = new paciente_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $paciDAO->setId($_GET['id']);
    }

    if(!empty($paciDAO->getCpf())                ||!empty($paciDAO->getSenha())         ||!empty($paciDAO->getNome()) 
        ||!empty($paciDAO->getDataNasc())        ||!empty($paciDAO->getSobrenome())     ||!empty($paciDAO->getSexo())          ||!empty($paciDAO->getEscolaridade())
        ||!empty($paciDAO->getEmail())           ||!empty($paciDAO->getTelefone())  ||!empty($paciDAO->getNumeroCardSUS()) ||!empty($paciDAO->getUnidadeDeSaude())
        ||!empty($paciDAO->getDataDiagnostico()) ||!empty($paciDAO->getBairro())    ||!empty($paciDAO->getLogradouro())    ||!empty($paciDAO->getPontoDeReferencia())
        ||!empty($paciDAO->getZona())            ||!empty($paciDAO->getHospitalDeTratamento())                               ||!empty($paciDAO->getDataNasc())){
        echo "Preencha os dados";
    }else{
        if($acao == "update"){
            $paciDAO->setId($_POST['id']);
        }
            $paciDAO->setCpf($_POST['cpf']);
	        $paciDAO->setSenha($_POST['senha']);
            $paciDAO->setNome($_POST['nome']);
            $paciDAO->setDataNasc($_POST['dataNasc']);
            $paciDAO->setSobrenome($_POST['sobrenome']);
            $paciDAO->setSexo($_POST['sexo']);
            $paciDAO->setEscolaridade($_POST['escolaridade']);
            $paciDAO->setEmail($_POST['email']);
            $paciDAO->setTelefone($_POST['telefone']);
            $paciDAO->setNumeroCardSUS($_POST['numeroCadSus']);
            $paciDAO->setUnidadeDeSaude($_POST['unidadeDeSaude']);
            $paciDAO->setDataDiagnostico($_POST['dataDiagnostico']);
            $paciDAO->setBairro($_POST['bairro']);
            $paciDAO->setLogradouro($_POST['logradouro']);
            $paciDAO->setPontoDeReferencia($_POST['pontoDeReferencia']);
            $paciDAO->setZona($_POST['zona']);
            $paciDAO->setHospitalDeTratamento($_POST['hospitalDeTratamento']);
            

        }


switch($acao){
    case 'inserir':
        try{
            $paciDAO->insert();
        }catch(Exception $e){
            echo $e->getMessage;
        }
    break;
    case 'delete':
        try{
            $paciDAO->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $paciDAO->update();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}