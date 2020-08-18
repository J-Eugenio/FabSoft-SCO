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


    $dados = $chamadoDAO->listarChamados();
    //$dados = $funcionarioDAO->listarFuncionarios();

    
   


   
    $pdf->pdf($dados);
?>