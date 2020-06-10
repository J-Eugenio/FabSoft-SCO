<?php

    require_once 'paciente_DAO.php';
    require_once '../../model/paciente/paciene_class.php';
    
    $funcClass = new paciente_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }
    if($acao == "delete"){
        $funcClass->setId($_GET['id']);
    }
    if($acao != "delete"){
        if(!empty($funcClass->getCpf())            ||!empty($funcClass->getIdade())     ||!empty($funcClass->getSenha())         ||!empty($funcClass->getNome()) 
        ||!empty($funcClass->getDataNasc())        ||!empty($funcClass->getIdade())     ||!empty($funcClass->getSexo())          ||!empty($funcClass->getEscolaridade())
        ||!empty($funcClass->getEmail())           ||!empty($funcClass->getTelefone())  ||!empty($funcClass->getNumeroCardSUS()) ||!empty($funcClass->getUnidadeDeSaude())
        ||!empty($funcClass->getDataDiagnostico()) ||!empty($funcClass->getBairro())    ||!empty($funcClass->getLogradouro())    ||!empty($funcClass->getPontoDeReferencia())
        ||!empty($funcClass->getZona())            ||!empty($funcClass->getHospitalDeTratamento())                               ||!empty($funcClass->getDataNasc())){
            echo "Preencha todos os dados";
        }else{
            if($acao == "update"){
                $funcClass->setId($_POST['id']);
            }
            $funcClass->setCpf($_POST['cpf']);
	        $funcClass->setSenha($_POST['senha']);
            $funcClass->setNome($_POST['nome']);
            $funcClass->setDataNasc($_POST['dataNasc']);
            $funcClass->setIdade($_POST['idade']);
            $funcClass->setSexo($_POST['sexo']);
            $funcClass->setEscolaridade($_POST['escolaridade']);
            $funcClass->setEmail($_POST['email']);
            $funcClass->setTelefone($_POST['telefone']);
            $funcClass->setNumeroCardSUS($_POST['numeroCadSus']);
            $funcClass->setUnidadeDeSaude($_POST['unidadeDeSaude']);
            $funcClass->setDataDiagnostico($_POST['dataDiagnostico']);
            $funcClass->setBairro($_POST['bairro']);
            $funcClass->setLogradouro($_POST['logradouro']);
            $funcClass->setPontoDeReferencia($_POST['pontoDeReferencia']);
            $funcClass->setZona($_POST['zona']);
            $funcClass->setHospitalDeTratamento($_POST['hospitalDeTratamento']);
            

        }
    }

switch($acao){
    case 'inserir':
        try{
            
            $funcClass->insert(
                $funcClass->getCpf(),
                $funcClass->getSenha(),
                $funcClass->getNome(),
                $funcClass->getDataNasc(),
                $funcClass->getIdade(),
                $funcClass->getSexo(),
                $funcClass->getEscolaridade(),
                $funcClass->getEmail(),
                $funcClass->getTelefone(),
                $funcClass->getNumeroCardSus(),
                $funcClass->getUnidadeDeSaude(),
                $funcClass->getDataDiagnostico(),
                $funcClass->getBairro(),
                $funcClass->getLogradouro(),
                $funcClass->getPontoDeReferencia(),
                $funcClass->getZona(),
                $funcClass->getHospitalDeTratamento(),
            );
        }catch(Exception $e){
            echo "alo", $e->getMessage();
        }
    break;
    case 'delete':
        try{
            $funcClass->delete($funcClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $funcClass->update($funcClass->getId());
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}