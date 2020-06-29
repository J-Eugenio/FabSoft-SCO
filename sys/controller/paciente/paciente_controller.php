<?php

    require_once 'paciente_DAO.php';
    require_once '../../model/paciente/paciene_class.php';
    
    $paciClass = new paciente_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $paciClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($paciClass->getCpf())            ||!empty($paciClass->getSenha())         ||!empty($paciClass->getNome()) 
        ||!empty($paciClass->getDataNasc())        ||!empty($paciClass->getSobrenome())     ||!empty($paciClass->getSexo())          ||!empty($paciClass->getEscolaridade())
        ||!empty($paciClass->getEmail())           ||!empty($paciClass->getTelefone())  ||!empty($paciClass->getNumeroCardSUS()) ||!empty($paciClass->getUnidadeDeSaude())
        ||!empty($paciClass->getDataDiagnostico()) ||!empty($paciClass->getBairro())    ||!empty($paciClass->getLogradouro())    ||!empty($paciClass->getPontoDeReferencia())
        ||!empty($paciClass->getZona())            ||!empty($paciClass->getHospitalDeTratamento())                               ||!empty($paciClass->getDataNasc())){
            echo "Preencha todos os dados";
        }else{
            if($acao == "update"){
                $paciClass->setId($_POST['id']);
            }
            $paciClass->setCpf($_POST['cpf']);
	        $paciClass->setSenha($_POST['senha']);
            $paciClass->setNome($_POST['nome']);
            $paciClass->setDataNasc($_POST['dataNasc']);
            $paciClass->setSobrenome($_POST['sobrenome']);
            $paciClass->setSexo($_POST['sexo']);
            $paciClass->setEscolaridade($_POST['escolaridade']);
            $paciClass->setEmail($_POST['email']);
            $paciClass->setTelefone($_POST['telefone']);
            $paciClass->setNumeroCardSUS($_POST['numeroCardSus']);
            $paciClass->setUnidadeDeSaude($_POST['unidadeDeSaude']);
            $paciClass->setDataDiagnostico($_POST['dataDiagnostico']);
            $paciClass->setBairro($_POST['bairro']);
            $paciClass->setLogradouro($_POST['logradouro']);
            $paciClass->setPontoDeReferencia($_POST['pontoDeReferencia']);
            $paciClass->setZona($_POST['zona']);
            $paciClass->setHospitalDeTratamento($_POST['hospitalDeTratamento']);
            

        }
    }

switch($acao){
    case 'inserir':
        try{
            
            $paciClass->insert(
                $paciClass->getCpf(),
                $paciClass->getSenha(),
                $paciClass->getNome(),
                $paciClass->getDataNasc(),
                $paciClass->getSobrenome(),
                $paciClass->getSexo(),
                $paciClass->getEscolaridade(),
                $paciClass->getEmail(),
                $paciClass->getTelefone(),
                $paciClass->getNumeroCardSus(),
                $paciClass->getUnidadeDeSaude(),
                $paciClass->getDataDiagnostico(),
                $paciClass->getBairro(),
                $paciClass->getLogradouro(),
                $paciClass->getPontoDeReferencia(),
                $paciClass->getZona(),
                $paciClass->getHospitalDeTratamento()
            );
        }catch(Exception $e){
            echo $e->getMessage;
        }
    break;
    case 'delete':
        try{
            $paciClass->delete($paciClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $paciClass->update($paciClass->getId());
            //var_dump($paciClass);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}