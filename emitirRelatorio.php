<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


//fazendo os posts do dashtable e banco pra o relatorio
//$firstname = $_POST['firstname'];
//  $lastname = $_POST['lastname'];
//  $departament = $_POST['departament'];
//  $role = $_POST['firstquestion'];

if (isset($_POST['emitirRelatorio'])) {
    require __DIR__ . '/vendor/autoload.php';
    //criando um spreadsheet
    $spreadsheet = new Spreadsheet();

    //setando valores
    $activeWorksheet = $spreadsheet->getActiveSheet();

    $activeWorksheet->setCellValue('B1', 'SERVIDORES');
    $activeWorksheet->setCellValue('C1', 'RESPOSTAS DOS SERVIDORES');

    $activeWorksheet->getStyle('B1')->getFont()->setSize(20); // Tamanho maior para A1
    $activeWorksheet->getStyle('C1')->getFont()->setSize(20);
    
    // $activeWorksheet->setCellValue('A2', $firstname . " " . $lastname);

    $titles = [
        'NOME', 'DATA DE NASCIMENTO', 'CARGO ATUAL', 'DEPARTAMENTO', 
        'FORMAÇÃO DE ENSINO SUPERIOR', 'DEPARTAMENTOS OPCIONAIS', 'ENDEREÇO', 
        'CEP', 'COMPETÊNCIAS TÉCNICAS', 'COMPETÊNCIAS SOCIOEMOCIONAIS', 
        'SATISFAÇÃO COM A EQUIPE DE TRABALHO', 'JUSTIFICATIVA'
    ];
    $row = 2;  // Começar a partir da linha 2
    
    foreach ($titles as $title) {
        $activeWorksheet->setCellValue('B' . $row, $title);
        $activeWorksheet->getColumnDimension('B')->setWidth(45);  // Largura da coluna A
        $activeWorksheet->getColumnDimension('C')->setWidth(60);
        $spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(22);  // Altura da linha
        $row++;
    }
    $activeWorksheet->getStyle('B2:B' . ($row - 1))->getFont()->setSize(12);  // Tamanho menor para coluna A
$activeWorksheet->getStyle('C2:C' . ($row - 1))->getFont()->setSize(12); 
$activeWorksheet->getStyle('B2:B' . ($row - 1))->getFont()->setBold(true);
$activeWorksheet->getStyle('C2:C' . ($row - 1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$activeWorksheet->getStyle('C2:C' . ($row - 1))->getFill()->getStartColor()->setARGB('fff5ffe2');
$activeWorksheet->getStyle('B2:C' . ($row - 1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$activeWorksheet->getStyle('B2:C' . ($row - 1))->getFill()->getStartColor()->setARGB('fff5ffe2');

    $spreadsheet->getActiveSheet()->getStyle('B1:C1')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
    //setando a borda dos títulos de coluna
    $styleTopArray = [
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'ff50c878'],
            ],
        ],
    ];
    $activeWorksheet->getStyle('B1:C1')->applyFromArray($styleTopArray);

    $styleTitlesArray = [
        'borders' => [
            'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'ff91d2ff'],
        ],
        ],
        ];
    $activeWorksheet->getStyle('B2:C13')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('B2:C13')->applyFromArray($styleTitlesArray);
    //criando o xlsx e setando as configurações de download
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //suggestion: header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Testing.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
}
?>