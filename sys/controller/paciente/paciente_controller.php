<?php

    require_once '../../model/paciente/paciente_DAO.php';
    require_once '../../model/paciente/paciene_class.php';
    
    $paciDAO = new paciente_DAO();
    switch($_SERVER['REQUEST_METHOD'])
    {
        case 'GET':  $acao = $_GET['acao']; break;
        case 'POST': $acao = $_POST['acao']; break;
    }


switch($acao){
    case 'inserir':
        try{
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
            $paciDAO->setSituacao(isset($_POST['situacao']) ? $_POST['situacao'] : 'Acompanhamento');
            $paciDAO->insert();
        }catch(Exception $e){
            echo $e->getMessage;
        }
    break;
    case 'delete':
        try{
            $paciDAO->setId($_GET['id']);
            $paciDAO->delete();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'update':
        try{
            $paciDAO->setId($_POST['id']);
            $paciDAO->setSituacao($_POST['situacao'] ? $_POST['situacao'] : 'Ativo');
            $paciDAO->update();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
    case 'updateSituacao':
        try{
            $paciDAO->setId($_POST['id']);
            $paciDAO->setSituacao($_POST['situacao'] ? $_POST['situacao'] : 'Ativo');
            $paciDAO->updateSituacao();
        }catch(Exception $e){
            echo $e->getMessage();
        }
    break;
}