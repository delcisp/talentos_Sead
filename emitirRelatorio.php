<?php
use PhpOffice\PhpSpreadsheet\Spreadsheet;
use PhpOffice\PhpSpreadsheet\Writer\Xlsx;

//MODELO PRA FAZER A QUEBRA DE LINHA EM BREVE EM OUTROS CAMPOS
// $sheet->getCell('A2')->setValue("DADOS\nPESSOAIS");
   // $sheet->getStyle('A2:G2')->getAlignment()->setWrapText(true);

if (isset($_POST['emitirRelatorio'])) {
    $firstname = isset($_POST['firstname']) ? $_POST['firstname'] : '';
    $lastname = isset($_POST['lastname']) ? $_POST['lastname'] : '';
    $departament = isset($_POST['departament']) ? $_POST['departament'] : '';
    $role = isset($_POST['role']) ? $_POST['role'] : '';
    $firstquestion = isset($_POST['firstquestion']) ? $_POST['firstquestion'] : '';
    $competencia = isset($_POST['competencia']) ? $_POST['competencia'] : '';
    $hardcompetencia = isset($_POST['hardcompetencia']) ? $_POST['hardcompetencia'] : '';
    $birthdate = isset($_POST['birthdate']) ? $_POST['birthdate'] : '';
    $cep = isset($_POST['cep']) ? $_POST['cep'] : '';
    $uf = isset($_POST['uf']) ? $_POST['uf'] : '';
    $cidade = isset($_POST['cidade']) ? $_POST['cidade'] : '';
    $bairro = isset($_POST['bairro']) ? $_POST['bairro'] : '';
    $endereco = isset($_POST['endereco']) ? $_POST['endereco'] : '';
    $bloodtype = isset($_POST['bloodtype']) ? $_POST['bloodtype'] : '';
    $raca = isset($_POST['raca']) ? $_POST['raca'] : '';
    $telefone = isset($_POST['telefone']) ? $_POST['telefone'] : '';
    $genero = isset($_POST['genero']) ? $_POST['genero'] : '';
    $doador = isset($_POST['doador']) ? $_POST['doador'] : '';
    $situacaofunc = isset($_POST['situacaofunc']) ? $_POST['situacaofunc'] : '';
    $timeofservice = isset($_POST['timeofservice']) ? $_POST['timeofservice'] : '';
    $funcaogratificada = isset($_POST['funcaogratificada']) ? $_POST['funcaogratificada'] : '';
    $formadetrabalho = isset($_POST['formadetrabalho']) ? $_POST['formadetrabalho'] : '';
    $reuniaotrabalho = isset($_POST['reuniaotrabalho']) ? $_POST['reuniaotrabalho'] : '';
    $deadlines = isset($_POST['deadlines']) ? $_POST['deadlines'] : '';
    $suggestion = isset($_POST['suggestion']) ? $_POST['suggestion'] : '';
    $habespacial = isset($_POST['habespacial']) ? $_POST['habespacial'] : '';
    $habcorporal = isset($_POST['habcorporal']) ? $_POST['habcorporal'] : '';
    $habmusical = isset($_POST['habmusical']) ? $_POST['habmusical'] : '';
    $hablinguistica = isset($_POST['hablinguistica']) ? $_POST['hablinguistica'] : '';
    $habmath = isset($_POST['habmath']) ? $_POST['habmath'] : '';
    $habinterpessoal = isset($_POST['habinterpessoal']) ? $_POST['habinterpessoal'] : '';
    $habnatureba = isset($_POST['habnatureba']) ? $_POST['habnatureba'] : '';
    $habemocional = isset($_POST['habemocional']) ? $_POST['habemocional'] : '';
    $tinycourses = isset($_POST['tinycourses']) ? $_POST['tinycourses'] : '';
    $setorop = isset($_POST['setorop']) ? $_POST['setorop'] : '';
    $habsace = isset($_POST['habsace']) ? $_POST['habsace'] : '';
    $atividadesp = isset($_POST['atividadesp']) ? $_POST['atividadesp'] : '';
    $degreetextarea = isset($_POST['degreetextarea']) ? $_POST['degreetextarea'] : '';
    $temfuncaogratificada = isset($_POST['temfuncaogratificada']) ? $_POST['temfuncaogratificada'] : '';
    $teletrabalho = isset($_POST['teletrabalho']) ? $_POST['teletrabalho'] : '';
    $permuta = isset($_POST['permuta']) ? $_POST['permuta'] : '';
    //AUTOLOAD DO COMPOSER
    require __DIR__ . '/vendor/autoload.php';
    //criando um spreadsheet
    $spreadsheet = new Spreadsheet();
    //obtem a aba ativa dentro do arquivo do excel
    $sheet = $spreadsheet->getActiveSheet();

    //setando os titulos
    $sheet->setCellValue('A2', 'DADOS PESSOAIS');
    $sheet->setCellValue('B2', 'ENQUADRAMENTO FUNCIONAL');
    $sheet->setCellValue('C2', 'PERFIL PROFISSIONAL');
    $sheet->setCellValue('D2', 'HABILIDADES');
    
    //SETANDO OS VALORES DO BANCO DE DADOS NA COLUNA B - DADOS PESSOAIS
    $sheet->setCellValue('A3', 'NOME: ' . "" . $firstname . " " . $lastname);
    $sheet->setCellValue('A4', 'DATA DE NASCIMENTO: ' . "" . $birthdate);
    $sheet->setCellValue('A5', 'ENDEREÇO: ' . "" .  $endereco);
    $sheet->setCellValue('A6', 'CEP: ' . "" . $cep);
    $sheet->setCellValue('A7', 'UF: ' . "" . $uf);
    $sheet->setCellValue('A8', 'CIDADE: ' . "" . $cidade);
    $sheet->setCellValue('A9', 'BAIRRO: ' . "" . $bairro);
    $sheet->setCellValue('A10','TELEFONE: ' . "" . $telefone);
    $sheet->setCellValue('A11', 'TIPO SANGUÍNEO: ' . "" . $bloodtype);
    $sheet->setCellValue('A12', 'FORMAÇÃO: ' . "" . $firstquestion);
    $sheet->setCellValue('A13', 'COR OU RAÇA: ' . "" . $raca);
    $sheet->setCellValue('A14', 'DOADOR DE ÓRGÃOS: ' . "" . $doador);
    $sheet->setCellValue('A15', 'IDENTIDADE DE GÊNERO: ' . "" . $genero);
    $sheet->setCellValue('A16', 'CURSOS LIVRES:' . "" . $tinycourses);
    

    //SETANDO OS VALORES DO BANCO DE DADOS NA COLUNA C - ENQUADRAMENTO FUNCIONAL 
    $sheet->setCellValue('B3', 'DEPARTAMENTO: ' . "" . $departament);
    $sheet->setCellValue('B4', 'CARGO: ' . "" . $role);
    $sheet->setCellValue('B5', 'SITUAÇÃO FUNCIONAL: ' . "" .  $situacaofunc);
    $sheet->setCellValue('B6', 'FUNÇÃO GRATIFICADA: ' . "" . $funcaogratificada);
    $sheet->setCellValue('B7', 'TEMPO NA INSTITUIÇÃO: ' . "" .  $timeofservice);
    $sheet->setCellValue('B8', 'C0MPETÊNCIAS TÉCNICAS: ' . "" . $hardcompetencia);
    $sheet->setCellValue('B9', 'COMPETÊNCIAS SOCIOEMOCIONAIS: ' . "" .  $competencia);


    //SETANDO OS VALORES DO BANCO DE DADOS NA COLUNA F - PERFIL PROFISSIONAL
    $sheet->setCellValue('C3', 'PREFERÊNCIAS DE TRABALHO: ' . "" . $atividadesp);
    $sheet->setCellValue('C4', 'FORMA DE TRABALHO PREFERIDA: ' . "" . $formadetrabalho);
    $sheet->setCellValue('C5', 'PARTICIPAÇÃO EM REUNIÕES: ' . "" .  $reuniaotrabalho);
    $sheet->setCellValue('C6', 'PRAZOS E METAS: ' . "" .  $deadlines);
    $sheet->setCellValue('C7', 'SUGESTÃO DE MUDANÇAS: ' . "" .  $suggestion);
    $sheet->setCellValue('C8', 'SETORES OPCIONAIS:' . "" . $setorop);
    $sheet->setCellValue('C9', 'TELETRABALHO: '. "" .  $teletrabalho);
    $sheet->setCellValue('C10','INTERESSE EM PERMUTA: ' . "" . $permuta);

    //SETANDO OS VALORES DO BANCO DE DADOS NA COLUNA H - HABILIDADES
    $sheet->setCellValue('D3', 'HABILIDADE ESPACIAL: ' . "" . $habespacial);
    $sheet->setCellValue('D4', 'HABILIDADE CORPORAL: ' . "" . $habcorporal);
    $sheet->setCellValue('D5', 'HABILIDADE MUSICAL: ' . "" . $habmusical);
    $sheet->setCellValue('D6', 'HABILIDADE LINGUÍSTICA: ' . "" .  $hablinguistica);
    $sheet->setCellValue('D7', 'HABILIDADE LÓGICO-MATEMÁTICA: ' . "" .  $habmath);
    $sheet->setCellValue('D8', 'HABILIDADE INTERPESSOAL: ' . "" . $habinterpessoal);
    $sheet->setCellValue('D9', 'HABILIDADE NATURALISTA: ' . "" . $habnatureba);
    $sheet->setCellValue('D10','HABILIDADE EMOCIONAL: ' . "" . $habemocional);
    $sheet->setCellValue('D11', 'HABILIDADE SOCIAL/CULTURAL: ' . "" .  $habsace);

   
    
    $columns = ['A', 'B', 'C', 'D'];
    $width = 65;
    
    foreach ($columns as $column) {
        $sheet->getColumnDimension($column)->setWidth($width);
        $sheet->getStyle($column)->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_LEFT);
    }
    //setando tipo o align-items do titulo
    $sheet->getStyle('A2:D2')->getAlignment()->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER);
    $sheet->getStyle('A2:D2')->getFont()->setBold(true);

    //height para os titulos
    $sheet->getRowDimension('2')->setRowHeight(40);

    //height para os dados
    $height = 30;
    for ($row = 2; $row <= 16; $row++) {
        $sheet->getRowDimension($row)->setRowHeight($height);
    }
    
 

    


    //SETANDO BORDAS PARA OS TITULOS DE CADA COLUNA
    
    $styleTopArray = [
        'borders' => [
            'outline' => [
                'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'ff040406'],
            ],
        ],
    ];
    $sheet->getStyle('A2:G2')->applyFromArray($styleTopArray);

    $styleTitlesArray = [
        'borders' => [
            'outline' => [
            'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THICK,
                'color' => ['argb' => 'ff040406'],
        ],
        ],
        ];

   
    
    //criando o xlsx e setando as configurações de download
    $writer = new Xlsx($spreadsheet);
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet'); //suggestion: header('Content-Type: application/vnd.ms-excel');
    header('Content-Disposition: attachment;filename="Relatorio.xlsx"');
    header('Cache-Control: max-age=0');
    $writer->save('php://output');
    exit();
}
?>