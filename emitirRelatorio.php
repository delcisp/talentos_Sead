<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;


//fazendo os posts do dashtable e banco pra o relatorio
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
$departament = $_POST['departament'];
$role = $_POST['role'];
$competencia = $_POST['competencia'];


$competenciaLines = explode("\n", $competencia);
$competenciaLinesCount = count($competenciaLines);

if ($competenciaLinesCount > 1) {
    for ($i = 0; $i < $competenciaLinesCount; $i++) {
        $activeWorksheet->setCellValue('C12', $competenciaLines[$i]);  // Define cada linha individualmente
        if ($i < $competenciaLinesCount - 1) {
            $activeWorksheet->getRowDimension(12)->setRowHeight(-1);  // Ajusta a altura da linha automaticamente
            $activeWorksheet->setCellValue('C12', '');  // Limpa o valor para a próxima linha
        }
    }
}
if (isset($_POST['emitirRelatorio'])) {
    require __DIR__ . '/vendor/autoload.php';
    //criando um spreadsheet
    $spreadsheet = new Spreadsheet();

    //setando valores
    $activeWorksheet = $spreadsheet->getActiveSheet();

    $activeWorksheet->setCellValue('A2', 'SERVIDORES');
    $activeWorksheet->setCellValue('B2', 'RESPOSTAS DOS SERVIDORES');
    $activeWorksheet->getStyle('A2')->getFont()->setSize(20); // Tamanho maior para A1
    $activeWorksheet->getStyle('B2')->getFont()->setSize(20);
    $activeWorksheet->getStyle('A2:B2')->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
    $activeWorksheet->getStyle('A2:B2')->getFill()->getStartColor()->setARGB('ffa4ffa4');
    
    $activeWorksheet->setCellValue('B3', $firstname . " " . $lastname);
    $activeWorksheet->setCellValue('B6', $departament);
    $activeWorksheet->setCellValue('B5', $role);
    $activeWorksheet->setCellValue('B12', $competencia);
    $titles = [
        'NOME', 'DATA DE NASCIMENTO', 'CARGO ATUAL', 'DEPARTAMENTO', 
        'FORMAÇÃO DE ENSINO SUPERIOR', 'DEPARTAMENTOS OPCIONAIS', 'ENDEREÇO', 
        'CEP', 'COMPETÊNCIAS TÉCNICAS', 'COMPETÊNCIAS SOCIOEMOCIONAIS', 
        'SATISFAÇÃO COM A EQUIPE DE TRABALHO', 'JUSTIFICATIVA'
    ];
    $row = 3;  // Começar a partir da linha 2
    
    foreach ($titles as $title) {
        $activeWorksheet->setCellValue('A' . $row, $title);
        $activeWorksheet->getColumnDimension('A')->setWidth(45);  // Largura da coluna A
        $activeWorksheet->getColumnDimension('B')->setWidth(100);
        $spreadsheet->getActiveSheet()->getRowDimension($row)->setRowHeight(22);  // Altura da linha
        $row++;
    }
    $activeWorksheet->getStyle('A3:A' . ($row - 1))->getFont()->setSize(12);  // Tamanho menor para coluna A
$activeWorksheet->getStyle('B3:B' . ($row - 1))->getFont()->setSize(12); 
$activeWorksheet->getStyle('A3:A' . ($row - 1))->getFont()->setBold(true);
$activeWorksheet->getStyle('B3:B' . ($row - 1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$activeWorksheet->getStyle('B3:B' . ($row - 1))->getFill()->getStartColor()->setARGB('fffffff2');
$activeWorksheet->getStyle('A3:B' . ($row - 1))->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID);
$activeWorksheet->getStyle('A3:B' . ($row - 1))->getFill()->getStartColor()->setARGB('fffffff2');


    $spreadsheet->getActiveSheet()->getStyle('A2:B2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
   
    //setando a borda dos títulos de coluna
    $styleTopArray = [
        'borders' => [
            'allBorders' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'ff040406'],
            ],
        ],
    ];
    $activeWorksheet->getStyle('A2:B2')->applyFromArray($styleTopArray);

    $styleTitlesArray = [
        'borders' => [
            'allBorders' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'ff040406'],
        ],
        ],
        ];
    $activeWorksheet->getStyle('A3:B14')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $activeWorksheet->getStyle('A3:B14')->applyFromArray($styleTitlesArray);
    //criando o xlsx e setando as configurações de download
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //suggestion: header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Relatorio.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
}
?>