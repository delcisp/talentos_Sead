<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

if (isset($_POST['emitirRelatorio'])) {
    //AUTOLOAD DO COMPOSER
    require __DIR__ . '/vendor/autoload.php';
    //criando um spreadsheet
    $spreadsheet = new Spreadsheet();
    //obtem a aba ativa dentro do arquivo do excel
    $sheet = $spreadsheet->getActiveSheet();

    //setando os titulos
    $sheet->setCellValue('A2', 'DADOS PESSOAIS');
    $sheet->setCellValue('C2', 'ENQUADRAMENTO FUNCIONAL');
    $sheet->setCellValue('E2', 'PERFIL PROFISSIONAL');
    $sheet->setCellValue('G2', 'HABILIDADES');
    
    $titlesDados = [
        'NOME', 'DATA DE NASCIMENTO', 'ENDEREÇO', 
        'CEP', 'UF', 'CIDADE', 'BAIRRO', 'TELEFONE',
        'TIPO SANGUÍNEO', 'FORMAÇÃO', 'COR OU RAÇA', 'DOADOR DE ÓRGÃOS',
        'IDENTIDADE DE GÊNERO', 'CURSOS LIVRES'
    ];
    $row = 3;
    foreach ($titlesDados as $title) {
        $sheet->setCellValue('A' . $row, $title);
        $row++;
    }
   
    $titlesEnquadramento = [
        'DEPARTAMENTO', 'CARGO ATUAL', 'SITUAÇÃO FUNCIONAL', 'FUNÇÃO GRATIFICADA', 
        'TEMPO NA INSTITUIÇÃO', 'COMPETÊNCIAS TÉCNICAS',
        'COMPETÊNCIAS SOCIOEMOCIONAIS'
    ];
    $rowEnquadramento = 3;
    foreach($titlesEnquadramento as $title) {
        $sheet->setCellValue('C' . $rowEnquadramento, $title);
        $rowEnquadramento++;
    }

    $titlesPerfilProfissional = [
       'PREFERÊNCIAS DE TRABALHO', 'FORMA DE TRABALHO', 'PARTICIPAÇÃO EM REUNIÕES',
       'PRAZOS E METAS', 'SUGESTÃO DE MUDANÇAS', 'SETORES OPCIONAIS', 'TELETRABALHO',
       'INTERESSE EM PERMUTA' 
    ];
    $rowProfissional = 3;
    foreach($titlesPerfilProfissional as $title) {
        $sheet->setCellValue('E' . $rowProfissional, $title);
        $rowProfissional++;
    }

    $titlesHabilidades = [
        'HABILIDADE ESPACIAL', 'HABILIDADE CORPORAL', 'HABILIDADE MUSICAL', 'HABILIDADE LINGUÍSTICA',
        'HABILIDADE LÓGICO-MATEMÁTICA', 'HABILIDADE INTERPESSOAL', 'HABILIDADE NATURALISTA' ,'HABILIDADE EMOCIONAL',
        'HABILIDADES SOCIAIS/CULTURAIS'
    ];
    $rowHabilidades = 3;
    foreach($titlesHabilidades as $title) {
        $sheet->setCellValue('G' . $rowHabilidades, $title);
        $rowHabilidades++;
    }
   
    //criando o xlsx e setando as configurações de download
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //suggestion: header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Relatorio.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
}
?>