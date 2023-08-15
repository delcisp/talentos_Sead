<?php
require 'vendor/autoload.php'; // Certifique-se de que o autoload do PhpSpreadsheet esteja corretamente configurado

use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

function emitirRelatorio($user_data) {
    $spreadsheet = new Spreadsheet();
    $sheet = $spreadsheet->getActiveSheet();
    $sheet->setTitle('Relatorio');

    // Adicione dados à planilha
    $data = [
        ['Servidor', 'Respostas'],
        ['Nome', $user_data['firstname'] . ' ' . $user_data['lastname']],
        ['Departamento', $user_data['departament']],
        ['Cargo', $user_data['role']],
        ['Formações', $user_data['firstquestion']],
        // ...
    ];

    // Realizar divisão manual das linhas com quebra de linha
    $cursosSplit = explode("\n", $user_data['secondquestion']);
    foreach ($cursosSplit as $curso) {
        $data[] = ['Cursos', $curso];
    }

    $tecnicasSplit = explode("\n", $user_data['thirdquestion']);
    foreach ($tecnicasSplit as $tecnica) {
        $data[] = ['Competências Técnicas', $tecnica];
    }
    // Repetir o mesmo para outros campos que podem conter quebras de linha

    // Preencha a planilha com os dados
    foreach ($data as $rowIndex => $rowData) {
        foreach ($rowData as $columnIndex => $value) {
            $sheet->setCellValueByColumnAndRow($columnIndex + 1, $rowIndex + 1, $value);
        }
    }

    // Configurar quebra de linha automática
    foreach ($data as $rowIndex => $rowData) {
        $sheet->getStyle('B' . ($rowIndex + 1))->getAlignment()->setWrapText(true);
    }

    // Definir largura das colunas
    $sheet->getColumnDimension('A')->setWidth(15);
    $sheet->getColumnDimension('B')->setWidth(40);

    // Estilo para o cabeçalho
    $sheet->getStyle('A1:B1')->applyFromArray([
        'font' => ['bold' => true],
        'alignment' => ['horizontal' => \PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER],
    ]);

    // Crie um objeto Writer e retorne o relatório
    $writer = new Xlsx($spreadsheet);
    $fileName = 'relatorio.xlsx';

    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment;filename="' . $fileName . '"');
    header('Cache-Control: max-age=0');

    $writer->save('php://output');
}

// Supondo que você tenha recebido os dados do usuário via POST
$user_data = $_POST; // Isso depende de como você recebe os dados

emitirRelatorio($user_data);
