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

        $this->pdf-> ezText('Relatório', 25,
        array(justification => 'center', spacing => 3.0));
        
            $this->pdf->ezTable($data,$cols,'', [
             'gridlines'=> EZ_GRIDLINE_DEFAULT,
             'shadeHeadingCol'=> [0.6,0.6,0.5],
             'alignHeadings'=>'center',
             'width'=>400,
             'cols'=> [
             'assunto'=> ['bgcolor'=> [0.9,0.9,0.7] ],
             'situacao'=> ['bgcolor'=> [0,0.6,1] ]
             ]
            ]);
        
        return  $this->pdf->ezStream(['compress' => 0]);
    }
}
