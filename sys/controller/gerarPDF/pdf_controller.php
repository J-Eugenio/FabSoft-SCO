<?php
    include_once '../../model/gerarPDF/pdf_DAO.php';
    include_once '../../model/chamado/chamado_DAO.php';
    include_once '../../model/funcionario/funcionario_DAO.php';
    include_once '../../model/transporte/transporte_DAO.php';
    include_once '../../model/paciente/paciente_DAO.php';
    include_once '../../model/services/service_DAO.php';

    $pdf = new gerar_pdf();
    $chamadoDAO = new chamado_DAO();
    $funcionarioDAO = new funcionario_DAO();
    $transporteDAO = new transporte_DAO();
    $pacienteDAO = new paciente_DAO();
    $serviceDAO = new service_DAO();

    $dados = null;
    $action = $_GET['action'];

    switch($action){
        case 'chamado':
            try {
                $dados = $chamadoDAO->listarChamados();       
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        break;
        case 'funcionario':
            try{
                $dados = $funcionarioDAO->listarFuncionarios();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;
        case 'transporte':
            try{
                $dados = $transporteDAO->listarTransportes();
            }catch(Exception $e){
                echo $e->getMessage();
            }
        break;

        case 'paciente':
            try {
                $dados = $pacienteDAO->listarPacientes();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        break;
        case 'services':
            try {
                $dados = $serviceDAO->listarServices();
            } catch (Exception $e) {
                echo $e->getMessage();
            }
        break;
        default:
            echo 'Dados não encontrados';
        break;
    }
   
    if(!empty($action)){
        $pdf->pdf($dados);
    }
?>