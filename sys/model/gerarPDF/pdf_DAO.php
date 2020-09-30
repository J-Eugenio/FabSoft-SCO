<?php

include_once '../../config/src/Cezpdf.php';

class gerar_pdf {

    private $pdf;

    public function __construct()
    {
        $this->pdf = new Cezpdf();
    }
    
    public function pdf($data){

        $this->pdf->allowedTags .= '|comment:.*?';
        $this->pdf->ezSetMargins(20, 20, 20, 20);
        $this->pdf->selectFont('Helvetica');
        $this->pdf-> ezText('Relatório gerado por:', 12);
        $this->pdf-> ezText('Data:', 12);
        $this->pdf-> ezText('Sistema de Comunicação Oncológica', 25,
        array(justification => 'center', spacing => 2.0));
        
            $this->pdf->ezTable($data,$cols,'Relatório', [
               
             'textCol' => [0,0,0],
             'lineCol' => [0,0.8,1],
             'titleFontSize' => 15,
             'gridlines'=> EZ_GRIDLINE_DEFAULT,
             'shadeHeadingCol'=> [0,0.8,1],
             'alignHeadings'=>'center',
             'width'=>550,
             'cols'=> [
             'assunto'=> ['bgcolor'=> [0.9,0.9,0.7] ],
             'situacao'=> ['bgcolor'=> [0,0.6,1] ]
             ]
            ]);
        
        return  $this->pdf->ezStream(['compress' => 0]);
    }
}
