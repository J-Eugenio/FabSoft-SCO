<?php 
    include_once("../header.php"); 
?>

<div id="main-container">
    <form action="" method="POST"> 
        <div>
            <div class="panel-heading">
                <h3>Relatórios</h3>
            </div>
            <div class="btn-relatorio">
                <a href="../../controller/gerarPDF/pdf_controller.php?action=chamado" class="a-btn btn" name="action" onClick="remover()">
                    Chamados
                </a>
            </div>
            <div class="btn-relatorio">
                <a href="../../controller/gerarPDF/pdf_controller.php?action=funcionario" class="a-btn btn" name="action" onClick="remover()">
                    Funcionário
                </a>
            </div>
            <div class="btn-relatorio">
                <a href="../../controller/gerarPDF/pdf_controller.php?action=transporte" class="a-btn btn" name="action" onClick="remover()">
                    Transporte
                </a>
            </div>
            <div class="btn-relatorio">
                <a href="../../controller/gerarPDF/pdf_controller.php?action=paciente" class="a-btn btn" name="action" onClick="remover()">
                    Paciente
                </a>
            </div>
            <div class="btn-relatorio">
                <a href="../../controller/gerarPDF/pdf_controller.php?action=services" class="a-btn btn" name="action" onClick="remover()">
                    Serviços
                </a>
            </div>
        </div>
    </form>
</div>

<?php
include_once '../footer.php';
?>