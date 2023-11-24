<?php

//PARA ZERAR OS REGISTROS DE ID NO BANCO DE DADOS E COMEÇAR DO ID 1 O COMANDO É : ALTER TABLE usuarios AUTO_INCREMENT = 1;
session_start();
if (isset($_POST['submit'])) {
  // Verifica se todas as perguntas foram respondidas
  $allAnswered = true;
  $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";

  $cargoSelecionado = isset($_POST["role"]) ? $_POST["role"] : null;
  $bloodtypeSelecionado = isset($_POST["bloodtype"]) ? $_POST["bloodtype"] : null;
  $formacaoSelecionada = isset($_POST["firstquestion"]) ? $_POST["firstquestion"] : null;
  $departamentoSelecionado = isset($_POST["departament"]) ? $_POST["departament"] : null;
  if ($bloodtypeSelecionado == "Selecione" || empty($bloodtypeSelecionado)  || $departamentoSelecionado == "Selecione" || empty($departamentoSelecionado) || $cargoSelecionado == "Selecione" || empty($cargoSelecionado) || 
  $formacaoSelecionada == "Selecione" || empty($formacaoSelecionada) || empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["email"]) || empty($_POST["birthdate"]) || empty($_POST["telefone"])
  || empty($_POST["cpf"]) || empty($_POST["bairro"]) || empty($_POST["cep"]) || empty($_POST["endereco"]) || empty($_POST["nacionalidade"]) || empty($_POST["ufnascimento"]) || empty($_POST["cidadenascimento"]) || empty($_POST["estadocivil"]) 
  || empty($_POST["deficiencia"]) || empty($_POST["doador"]) || empty($_POST["raca"]) || empty($_POST["genero"]) || empty($_POST["tipomoradia"]) || empty($_POST["pessoamoradia"]) 
  || empty($_POST["zona"]) || empty($_POST["situacaofunc"]) || empty($_POST["funcaogratificada"]) || empty($_POST["matricula"]) || empty($_POST["nomecurso"]) || empty($_POST["instituicao"]) || empty($_POST["tipoescola"])
  || empty($_POST["timeofservice"]) || empty($_POST["nomeinstituicao"]) || empty($_POST["formadetrabalho"]) || empty($_POST["teletrabalho"]) || empty($_POST["reuniaotrabalho"]) || empty($_POST["deadlines"]) 
  || empty($_POST["servicosaude"]) || empty($_POST["meiotransporte"]) || empty($_POST["anosdeservico"]) || empty($_POST["habespacial"]) || empty($_POST["habcorporal"]) || empty($_POST["habmusical"]) || empty($_POST["hablinguistica"])
  || empty($_POST["segerirequipe"]) || empty($_POST["interesse"]) || empty($_POST["empatia"])  || empty($_POST["participacao"]) || empty($_POST["inclusao"]) || empty($_POST["conhecimento"]) || empty($_POST["conhecimento"]) 
  || empty($_POST["ambienteseguro"])|| empty($_POST["trabalhoemequipe"]) || empty($_POST["emocoes"]) || empty($_POST["controle"]) || empty($_POST["reconhecimento"]) || empty($_POST["conflitos"]) || empty($_POST["metasclaras"]) || empty($_POST["temposead"])
  || empty($_POST["prioridades"]) || empty($_POST["impactos"]) || empty($_POST["sucessos"]) || empty($_POST["metodos"]) || empty($_POST["explorar"]) || empty($_POST["disposicao"]) || empty($_POST["colaboracao"]) 
  || empty($_POST["receptiva"]) || empty($_POST["confianca"]) || empty($_POST["eficiencia"]) || empty($_POST["dialogo"]) || empty($_POST["parcerias"]) || empty($_POST["possibilidades"]) || empty($_POST["ferramentas"]) || count($_POST["setorop"]) == 0 || count($_POST["habsace"]) == 0 || count($_POST["atividadesp"]) == 0  || count($_POST["competencia"]) == 0 || count($_POST["hardcompetencia"]) == 0   
   ) {
    $allAnswered = false;
    $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";
  }

  if ($allAnswered) {
    include_once('config.php');
    
    // Supondo que você tenha uma variável de sessão que armazena o ID do usuário (por exemplo, $_SESSION['user_id'])
    $id_user = $_SESSION['user_id'];

    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $email = $_POST['email'];
    $birthdate = $_POST['birthdate'];
    $telefone =  $_POST['telefone'];
    $cpf = $_POST['cpf'];
    $bairro =  $_POST['bairro'];
    $cep = $_POST['cep'];
    $endereco = $_POST['endereco'];
    $nacionalidade = $_POST['nacionalidade'];
    $ufnascimento = $_POST['ufnascimento'];
    $cidadenascimento = $_POST['cidadenascimento'];
    $estadocivil = $_POST['estadocivil'];
    $deficiencia = $_POST['deficiencia'];
    $bloodtype = $_POST['bloodtype'];
    $doador =  $_POST['doador'];
    $raca =   $_POST['raca'];
    $genero = $_POST['genero'];
    $tipomoradia = $_POST['tipomoradia'];
    $pessoamoradia = $_POST['pessoamoradia'];
    $zona = $_POST['zona'];
    
    $situacaofunc = $_POST['situacaofunc'];
    $departament = $_POST['departament'];
    $funcaogratificada = $_POST['funcaogratificada'];
    $temfuncaogratificada = $_POST['temfuncaogratificada'];
    $role = $_POST['role'];
    $anotherrole = $_POST['anotherrole'];
    $matricula = $_POST['matricula'];
    $firstquestion = $_POST['firstquestion'];
    $nomecurso = $_POST['nomecurso'];
    $instituicao = $_POST['instituicao'];
    $tipoescola = $_POST['tipoescola'];
    $timeofservice = $_POST['timeofservice'];
    $nomeinstituicao = $_POST['nomeinstituicao'];
    $formadetrabalho = $_POST['formadetrabalho'];
    $teletrabalho = $_POST['teletrabalho'];
    $reuniaotrabalho = $_POST['reuniaotrabalho'];
    $deadlines =  $_POST['deadlines'];
    $servicosaude = $_POST['servicosaude'];
    $meiotransporte = $_POST['meiotransporte'];
    $anosdeservico = $_POST['anosdeservico'];
    $temposead = $_POST['temposead'];
    $degreetextarea  = $_POST['degreetextarea'];
    $seconddegreetextarea = $_POST['seconddegreetextarea'];

    $habespacial = $_POST['habespacial']; 
    $habcorporal = $_POST['habcorporal'];
    $habmusical = $_POST['habmusical'];
    $hablinguistica = $_POST['hablinguistica'];
    $habmath = $_POST['habmath'];
    $habinterpessoal = $_POST['habinterpessoal'];
    $habnatureba = $_POST['habnatureba'];
    $habemocional =  $_POST['habemocional'];
    $segerirequipe = $_POST['segerirequipe'];
    $setorop = $_POST['setorop'];
    $habsace = $_POST['habsace'];
    $atividadesp = $_POST['atividadesp'];

    $interesse = $_POST['interesse'];
    $empatia = $_POST['empatia'];
    $participacao = $_POST['participacao'];
    $inclusao = $_POST['inclusao'];
    $conhecimento = $_POST['conhecimento'];
    $ambienteseguro = $_POST['ambienteseguro'];
    $trabalhoemequipe =  $_POST['trabalhoemequipe'];
    $emocoes = $_POST['emocoes'];
    $controle = $_POST['controle'];
    $reconhecimento = $_POST['reconhecimento'];
    $conflitos = $_POST['conflitos'];
    $metasclaras = $_POST['metasclaras'];
    $prioridades = $_POST['prioridades'];
    $impactos = $_POST['impactos'];
    $sucessos = $_POST['sucessos'];
    $metodos = $_POST['metodos'];
    $explorar = $_POST['explorar'];
    $disposicao = $_POST['disposicao'];
    $colaboracao = $_POST['colaboracao'];
    $receptiva = $_POST['receptiva'];
    $confianca = $_POST['confianca'];
    $dialogo = $_POST['dialogo'];
    $parcerias = $_POST['parcerias'];
    $possibilidades = $_POST['possibilidades'];
    $ferramentas = $_POST['ferramentas'];
    $eficiencia = $_POST['eficiencia'];
    $suggestion = $_POST['suggestion'];


    

    $birthdate = str_replace('/', '-', $birthdate);
    $birthdate = date('Y-m-d', strtotime($birthdate));

    $telefone_limpo = preg_replace("/[^0-9]/", "", $telefone);


    $query = "INSERT INTO personal_data (id_user, firstname, lastname, email, birthdate, telefone, cpf, bairro, cep, endereco, nacionalidade, ufnascimento, cidadenascimento, estadocivil, deficiencia, bloodtype,
     doador, raca, genero, tipomoradia, pessoamoradia, zona) VALUES ('$id_user', '$firstname', '$lastname', '$email', '$birthdate', '$telefone', '$cpf', '$bairro', '$cep', '$endereco', '$nacionalidade', '$ufnascimento',
    '$cidadenascimento', '$estadocivil', '$deficiencia', '$bloodtype', '$doador', '$raca', '$genero', '$tipomoradia', '$pessoamoradia', '$zona')";
    $result = mysqli_query($conn, $query);

    $query = "INSERT INTO professional_road (id_user,  situacaofunc, departament, funcaogratificada, role, anotherrole, matricula, firstquestion, nomecurso, instituicao, tipoescola, timeofservice, nomeinstituicao, formadetrabalho, teletrabalho, reuniaotrabalho, deadlines, servicosaude, meiotransporte, anosdeservico, temfuncaogratificada,
     temposead, degreetextarea, seconddegreetextarea) 
    VALUES ('$id_user', '$situacaofunc', '$departament', '$funcaogratificada', '$role', '$anotherrole', '$matricula', '$firstquestion', '$nomecurso', '$instituicao', '$tipoescola', '$timeofservice', '$nomeinstituicao', '$formadetrabalho', '$teletrabalho', '$reuniaotrabalho', '$deadlines', '$servicosaude', '$meiotransporte', '$anosdeservico', '$temfuncaogratificada', 
    '$temposead', '$degreetextarea', '$seconddegreetextarea')";
    $result2 = mysqli_query($conn, $query);

    $competenciaSelecionada = isset($_POST['competencia']) ? $_POST['competencia'] : [];
    $competenciaString = implode(", ", $competenciaSelecionada);

    $competenciaHardSelecionada = isset($_POST['hardcompetencia']) ? $_POST['hardcompetencia'] : [];
    $competenciaHardString = implode(" / ", $competenciaHardSelecionada);

    $setorSelecionado = isset($_POST['setorop']) ? $_POST['setorop'] : [];
    $setorString = implode (" / ", $setorSelecionado);
    
    $habsaceSelecionada = isset($_POST['habsace']) ? $_POST['habsace'] : [];
    $habsaceString = implode (" / ", $habsaceSelecionada);

    $atividadespSelecionada = isset($_POST['atividadesp']) ? $_POST['atividadesp'] : [];
    $atividadespString = implode (" / ", $atividadespSelecionada);

    $query = "INSERT INTO professional_competences (id_user, habespacial, habcorporal, habmusical, hablinguistica, habmath, habinterpessoal, habnatureba, habemocional, segerirequipe, setorop, habsace, competencia, hardcompetencia, atividadesp)
     VALUES ('$id_user', '$habespacial', '$habcorporal', '$habmusical', '$hablinguistica', '$habmath', '$habinterpessoal', '$habnatureba', '$habemocional', '$segerirequipe', '$setorString', '$habsaceString', '$competenciaString', '$competenciaHardString', '$atividadespString')";
    $result3 = mysqli_query($conn, $query);

    $query =  "INSERT INTO autoavaliacao (id_user, interesse, empatia, participacao, inclusao, conhecimento, ambienteseguro, trabalhoemequipe, emocoes, controle, reconhecimento, conflitos, metasclaras, prioridades,
    impactos, sucessos, metodos, explorar, disposicao, colaboracao, receptiva, confianca, dialogo, parcerias, possibilidades, ferramentas, eficiencia, suggestion) VALUES ('$id_user', '$interesse', '$empatia', '$participacao', '$inclusao',
    '$conhecimento', '$ambienteseguro', '$trabalhoemequipe', '$emocoes', '$controle', '$reconhecimento', '$conflitos', '$metasclaras', '$prioridades', '$impactos', '$sucessos', '$metodos', '$explorar', '$disposicao',
    '$colaboracao', '$receptiva', '$confianca', '$dialogo', '$parcerias', '$possibilidades', '$ferramentas', '$eficiencia', '$suggestion')";
    $result4 = mysqli_query($conn, $query);




    $redirectURL = 'agradecimento.php?firstname=' . urlencode($firstname);
    header('Location: ' . $redirectURL);
    exit;
  } else {
    echo "<script>";
    echo "var errorMsg = '$errorMsg';";
    echo "alert(errorMsg);";
    echo "history.back();"; // Volta para a página anterior sem recarregar
    echo "</script>";
    exit;
  }
}

?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <meta charset="UTF-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <title>Formulário</title>
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.42507" />  <!--LINK DO ROUND DE RATING Q-->
    <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script> <!-- bilioteca p autocomplete de endereço -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"> </script> <!-- biblioteca p mask de input -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap"/>
    <link rel="stylesheet" href="./Form/css/mdb.min.css" />
    <link rel="stylesheet" href="./Form/css/style.css">
    <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
    <script src="./Form/js/pagination.js" defer></script>
  </head>

<style>


    .competencias {
    display: grid;
    grid-template-columns: repeat(5, 1fr);
    gap: 10px;
  }

  .form-check-competencias {
    margin-bottom: 10px;
    text-align: center;
    font-size: 14px;
  }

  @media (max-width: 768px) {
    .competencias {
      grid-template-columns: repeat(2, 1fr); /* Altere para 2 colunas em telas menores */
    }
  }



 .form-container {
            max-width: 900px;
            height: auto;
            background-color: #FFF;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.9);
            padding: 0;
            margin-top: 10px;
        }
    </style>
</head>
<body>

    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6" id="censo_img" style="margin-top: 10px;" >
                <img src="Imagens/logo_censo.jpeg" alt="Logo">
            </div>

            <div class="col-md-6" id="container">
                <form id="pagination-form" action="form.php" method="POST" novalidate>
                    <div class="form-container">
                        <div class="form-page" id="page-0">
                            <div class="row">
                            <div class="col-md-6"> 
  <label class="form-label-top" for="nome">Nome</label>
  <div class="form-outline-left">
    <input type="text" id="firstname" name="firstname" class="form-control input-style" autocomplete="username" />

  </div>
</div>


<div class="col-md-6">
  <label class="form-label-top-right" for="lastname">Sobrenome</label>
  <div class="form-outline-right">
    <input type="text" id="lastname" name="lastname" class="form-control input-style" value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>"
required>
    
  </div>
</div>

<div class="col-md-6">
  <label class="form-label-top" for="birthdate">Data de Nascimento</label>
  <div class="form-outline-left">
   <input type="text" id="birthdate" name="birthdate" class="form-control input-style" /> 
   </div>
 </div>

 <div class="col-md-6">
  <label class="form-label-top-right" for="telefone">Telefone</label>
  <div class="form-outline-right">
   <input type="text" id="telefone" name="telefone" class="form-control input-style" placeholder="(DDD) XXXXX-XXXX" /> 
   </div>
 </div>
 <div class="col-md-6">
  <label class="form-label-top" for="email">Email Institucional</label>
  <div class="form-outline-left">
   <input type="text" id="email" name="email" class="form-control input-style" /> 
   </div>
 </div>

 <div class="col-md-6">
  <label class="form-label-top-right" for="CPF">CPF</label>
  <div class="form-outline-right">
   <input type="text" id="cpf" name="cpf" class="form-control input-style" /> 
   </div>
 </div>
 <form action="#" onsubmit="return false">
 <div class="col-md-6">
  <label class="form-label-top" for="cep">CEP</label>
  <div class="form-outline-left">
   <input type="text" id="cep" name="cep" class="form-control input-style" placeholder="Insira o CEP para preenchimento automático de endereço" data-component="cep" autofocus /> 
   </div>
 </div>

   <div class="col-md-6">
    <label class="form-label-top-right" for="bairro">Bairro</label>
    <div class="form-outline-right">
     <input type="text" id="bairro" name="bairro" class="form-control input-style" /> 
     </div>
   </div>

   <div class="col-md-6">
    <label class="form-label-top" for="endereco">Endereço</label>
    <div class="form-outline-left">
     <input type="text" id="endereco" name="endereco" class="form-control input-style" /> 
     </div>
   </div>

     <div class="col-md-6"> 
    <label class="form-label-top-right" for="ufnascimento">UF de Nascimento</label>
    <div class="form-outline-right">
      <input type="text" id="ufnascimento" name="ufnascimento" class="form-control input-style" /> 
      </div>
    </div>

    <div class="col-md-6">
      <label class="form-label-top" for="cidadenascimento">Cidade de Nascimento </label>
      <div class="form-outline-left">
       <input type="text" id="cidade" name="cidadenascimento" class="form-control input-style" /> 
       </div>
     </div>     

   <div class="col-md-6">
    <label class="form-label-top-right" for="nacionalidade">Nacionalidade</label>
    <div class="form-outline-right">
      <select class="select form-control input-style" id="nacionalidade" name="nacionalidade" aria-placeholder="Selecione" >
        <option value="" disabled selected>Selecione</option>
      <option value="brasileira">Brasileira</option>
      <option value="outra">Outra</option>
    </select>
    </div>
   </div>

   <div class="col-md-6">
      <label class="form-label-top" for="estadocivil">Estado Civil</label>
      <div class="form-outline-left">
      <select class="select form-control input-style" id="estadocivil" name="estadocivil" aria-placeholder="Selecione" >
        <option value="" disabled selected>Selecione</option>
      <option value="Solteiro(a)">Solteiro(a)</option>
      <option value="União Estável">União Estável</option>
      <option value="Casado(a)">Casado(a)</option>
      <option value="Divorciado(a)">Divorciado(a)</option>
      <option value="Viúvo(a)">Viúvo(a)</option>
    </select>
       </div>
     </div>   

   <div class="col-md-6">
    <label class="form-label-top-right" for="bloodtype">Qual o seu tipo sanguíneo?</label>
    <div class="form-outline-right">
      <select class="select form-control input-style" id="bloodtype" name="bloodtype" aria-placeholder="Selecione" >
        <option value="" disabled selected>Selecione</option>
      <option value="A+">A+</option>
      <option value="B+">B+</option>
      <option value="AB+">AB+</option>
      <option value="O+">O+</option>
      <option value="A-">A-</option>
      <option value="B-">B-</option>
      <option value="AB-">AB-</option>
      <option value="O-">O-</option>
    </select>
    </div>
   </div>
   <div class="col-md-6">
    <label class="form-label-top" for="doador">Você é doador de órgãos?</label>
    <div class="form-outline-left">
    <select class="select form-control input-style" id="doador" name="doador" aria-placeholder="Selecione" >
      <option value="" disabled selected>Selecione</option>
      <option value="Sim">Sim</option>
      <option value="Não">Não</option>
      <option value="Ainda não me decidi">Ainda não me decidi</option>    
    </select>
    </div>
   </div>

   <div class="col-md-6">
    <label class="form-label-top-right" for="deficiencia">Possui alguma deficiência?</label>
    <div class="form-outline-right">
    <select class="select form-control input-style" id="deficiencia" name="deficiencia" aria-placeholder="Selecione" >
      <option value="" disabled selected>Selecione</option>
      <option value="Sim">Sim</option>
      <option value="Não">Não</option>
    </select>
    </div>
   </div>

   <div class="col-md-6">
    <label class="form-label-top" for="tipomoradia" style="white-space: nowrap;" >Qual o tipo de moradia em que você reside?</label>
    <div class="form-outline-left">
    <select class="select form-control input-style" id="tipomoradia" name="tipomoradia" aria-placeholder="Selecione" >
      <option value="" disabled selected>Selecione</option>
      <option value="Própria">Própria</option>
      <option value="Alugada">Alugada</option>
      <option value="Compartilhada (familiar/amigos/ terceiros)">Compartilhada (familiar/amigos/ terceiros)</option>    
    </select>
    </div>
   </div>

   <div class="col-md-6">
    <label class="form-label-top-right" for="pessoasmoradia" >Quantas pessoas residem na sua moradia?</label>
    <div class="form-outline-right">
    <select class="select form-control input-style" id="pessoamoradia" name="pessoamoradia" aria-placeholder="Selecione" >
      <option value="" disabled selected>Selecione</option>
      <option value="01">01</option>
      <option value="02">02</option>
      <option value="03">03</option>
      <option value="04">04</option>
      <option value="05">05</option>
      <option value="06">06</option>
      <option value="07">07</option>
      <option value="08">08</option>
      <option value="09">09</option>
      <option value="10">10</option>
      <option value="11">11</option>
      <option value="12">12</option>
      <option value="13">13</option>
      <option value="14">14</option>
      <option value="15">15</option>
      <option value="16">16</option>
    </select>
    </div>
   </div>
   

</div> <!--AQUI FECHA O ROW-->

<p class="form-label-top questions-titles">Em qual zona da cidade está localizada a sua moradia?</p>
<div class="form-check zona ">
<input class="form-check-input" type="checkbox" name="zona" value="Zona Norte" id="zonanorte" />
<label class="form-check-label" for="zonanorte"><b>Zona Norte</b></label>    
</div>
<div class="form-check zona ">
<input class="form-check-input" type="checkbox" name="zona" value="Zona Leste" id="zonaleste" />
<label class="form-check-label" for="zonaleste"><b>Zona Leste</b></label>    
</div>
<div class="form-check zona ">
<input class="form-check-input" type="checkbox" name="zona" value="Zona Sul" id="zonasul" />
<label class="form-check-label" for="zonasul"><b>Zona Sul</b></label>    
</div>
<div class="form-check zona ">
<input class="form-check-input" type="checkbox" name="zona" value="Zona Oeste" id="zonaoeste" />
<label class="form-check-label" for="zonaoeste"><b>Zona Oeste</b></label>    
</div>
<div class="form-check zona ">
<input class="form-check-input" type="checkbox" name="zona" value="Zona Centro-Sul" id="zonacsul" />
<label class="form-check-label" for="zonacsul"><b>Zona Centro-Sul</b></label>    
</div>
<div class="form-check zona ">
<input class="form-check-input" type="checkbox" name="zona" value="Zona Centro-Oeste" id="zonacoeste" />
<label class="form-check-label" for="zonacoeste"><b>Zona Centro-Oeste</b></label>    
</div>


<p class="form-label-top questions-titles">Qual a sua identidade de gênero?</p>
<div class="form-check gender ">
<input class="form-check-input" type="checkbox" name="genero" value="Homem cisgênero" id="Homemcis" />
<label class="form-check-label" for="Homemcis"><b>Homem cisgênero</b> (se identifica com o gênero que lhe foi atribuído ao nascer)</label>    
</div>
<div class="form-check gender ">
<input class="form-check-input" type="checkbox" name="genero" value="Mulher cisgênera" id="Mulhercis" />
<label class="form-check-label" for="Mulhercis"><b>Mulher cisgênera</b> (se identifica com o gênero que lhe foi atribuído ao nascer)</label> 
</div>
<div class="form-check gender ">
<input class="form-check-input" type="checkbox" name="genero" value="Homem Trans" id="Homemtrans" />
<label class="form-check-label" for="Homemtrans"><b>Homem Trans</b> (se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</label>
</div>
<div class="form-check gender ">
<input class="form-check-input" type="checkbox" name="genero" value="Mulher Trans" id="Mulhertrans" />
<label class="form-check-label" for="Mulhertrans"><b>Mulher Trans</b> (se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</label>
</div>
<div class="form-check gender ">
<input class="form-check-input" type="checkbox" name="genero" value="Não binário" id="Naobinario" />
<label class="form-check-label" for="Naobinario"><b>Não binário</b> (não se sente pertencente ao gênero masculino ou ao feminino)</label>
</div>
<div class="form-check gender ">
<input class="form-check-input" type="checkbox" name="genero" value="Prefiro não me classificar" id="naoclassifica" />
<label class="form-check-label" for="naoclassifica"><b>Prefiro não me classificar</b></label>
</div>

<div class="d-flex align-items-center">
<!--ESSA DIV FAZ d-block (display block) para o <label> e mt-2 (margin top) para dar um espaçamento entre o <input> e o <label> -->
</div>

<p class="form-label-top questions-titles">Qual a sua cor ou raça?</p>
<div class="form-check raca ">
<input class="form-check-input" type="checkbox" name="raca" value="Amarela" id="amarela" />
<label class="form-check-label" for="Amarela"><b>Amarela</b></label>    
</div>
<div class="form-check raca ">
<input class="form-check-input" type="checkbox" name="raca" value="Branca" id="Branca" />
<label class="form-check-label" for="Branca"><b>Branca</b></label>    
</div>
<div class="form-check raca ">
<input class="form-check-input" type="checkbox" name="raca" value="Parda" id="Parda" />
<label class="form-check-label" for="Parda"><b>Parda</b></label>    
</div>
<div class="form-check raca ">
<input class="form-check-input" type="checkbox" name="raca" value="Preta" id="Preta" />
<label class="form-check-label" for="Preta"><b>Preta</b></label>    
</div>
<div class="form-check raca ">
<input class="form-check-input" type="checkbox" name="raca" value="Indígena" id="indígena" />
<label class="form-check-label" for="Indígena"><b>Indígena</b></label>    
</div>
<div class="form-check raca " >
<input class="form-check-input" type="checkbox" name="raca" value="Prefiro não me classificar" id="naoseclassifica" />
<label class="form-check-label" for="naoseclassifica"><b>Prefiro não me classificar</b></label>    
</div>

<p class="form-label-top questions-titles">Em relação à sua orientação sexual, dentre as opções abaixo, com qual você se identifica? </p>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Heterossexual" id="heterossexual" />
<label class="form-check-label" for="heterossexual"><b>Heterossexual</b></label>    
</div>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Gay" id="gay" />
<label class="form-check-label" for="Gay"><b>Gay</b></label>    
</div>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Lésbica" id="lesbica" />
<label class="form-check-label" for="lesbica"><b>Lésbica</b></label>    
</div>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Bissexual" id="bissexual" />
<label class="form-check-label" for="bissexual"><b>Bissexual</b></label>    
</div>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Pansexual" id="pansexual" />
<label class="form-check-label" for="pansexual"><b>Pansexual</b></label>    
</div>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Assexual" id="assexual" />
<label class="form-check-label" for="assexual"><b>Assexual</b></label>    
</div>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Outra" id="outra" />
<label class="form-check-label" for="outra"><b>Outra</b></label>    
</div>
<div class="form-check orientacao ">
<input class="form-check-input" type="checkbox" name="orientacao" value="Prefiro não me classificar" id="naomeclassifica" />
<label class="form-check-label" for="naomeclassifica"><b>Prefiro não me classificar</b></label>    
</div>
<div class="form-check orientacao"  style="margin-bottom: 20px;">
<input class="form-check-input" type="checkbox" name="orientacao" value="Prefiro não informar" id="Prefiro não informar" />
<label class="form-check-label" for="Prefiro não informar"><b>Prefiro não informar</b></label>    
</div>
      </div> <!-- AQUI A PAGINA 0 -->
      
        <div class="form-page" id="page-1">
        <div class="row">
          <div class="col-md-6">
            <label class="form-label-top" for="situacaofunc">Qual a sua situação funcional atual?</label>
            <div class="form-outline-left">
            <select class="select form-control input-style" id="situacaofunc" name="situacaofunc" aria-placeholder="Selecione" >
              <option value="" disabled selected>Selecione</option>
              <option value="Estatutário">Estatutário</option>
              <option value="Comissionado">Comissionado</option>
              <option value="Licenciado">Licenciado</option>
              <option value="À disposição de outro órgão">À disposição de outro órgão</option>
              <option value="Temporário">Temporário</option>
              <option value="CLT">CLT</option>
              <option value="De outras esferas">De outras esferas</option>
            </select>
            </div>
           </div>

           <div class="col-md-6">
            <label class="form-label-top-right" for="departament">Departamento</label>
            <div class="form-outline-right">
            <select class="select form-control input-style" id="departament" name="departament" aria-placeholder="Selecione" >
              <option value="" disabled selected>Selecione</option>
              <option value="Arquivo público do Amazonas">Arquivo público do Amazonas
            </option>
            <option value="Apoio ao Gabinete">Apoio ao Gabinete</option>
            <option value="Arquivo administrativo" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Arquivo administrativo')
              echo 'selected'; ?>>Arquivo administrativo</option>
            <option value="Assessoria de Comunicação" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Assessoria de Comunicação')
              echo 'selected'; ?>>Assessoria de Comunicação
            </option>
            <option value="Assessoria Técnica" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Assessoria Técnica')
              echo 'selected'; ?>>Assessoria Técnica</option>
            <option value="Auditoria Externa" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Auditoria Externa')
              echo 'selected'; ?>>Auditoria Externa</option>
            <option value="Controladoria Interna" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Controladoria Interna')
              echo 'selected'; ?>>Controladoria Interna</option>
            <option value="Coordenadoria de Patrimônio" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Coordenadoria de Patrimônio')
              echo 'selected'; ?>>Coordenadoria de Patrimônio
            </option>
            <option value="Comissão de Regime Disciplinar" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Comissão de Regime Disciplinar')
              echo 'selected'; ?>>Comissão de Regime
              Disciplinar</option>
            <option value="CRD Defensoria" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'CRD Defensoria')
              echo 'selected'; ?>>CRD Defensoria</option>
            <option value="Comissão de Regularização de Imóveis" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Comissão de Regularização de Imóveis')
              echo 'selected'; ?>>Comissão de
              Regularização de Imóveis</option>
            <option value="Consultoria Técnico Administrativa" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Consultoria Técnico Administrativa')
              echo 'selected'; ?>>Consultoria Técnico
              Administrativa</option>
            <option value="Administração e Finanças - DAFI" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Administração e Finanças - DAFI')
              echo 'selected'; ?>>Administração e Finanças -
              DAFI</option>
            <option value="Tecnologia da informação - DETI" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Tecnologia da informação - DETI')
              echo 'selected'; ?>>Tecnologia da informação -
              DETI</option>
            <option value="Gestão de Frota e Combustível" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Gestão de Frota e Combustível')
              echo 'selected'; ?>>Gestão de Frota e
              Combustível</option>
            <option value="Escola de Governo - ESASP" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Escola de Governo - ESASP')
              echo 'selected'; ?>>Escola de Governo - ESASP
            </option>
            <option value="Gerência de Contas Públicas" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Gerência de Contas Públicas')
              echo 'selected'; ?>>Gerência de Contas Públicas
            </option>
            <option value="Gerência de Diárias e Passagens" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Gerência de Diárias e Passagens')
              echo 'selected'; ?>>Gerência de Diárias e
              Passagens</option>
            <option value="Gerência de Apoio Logístico" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Gerência de Apoio Logístico')
              echo 'selected'; ?>>Gerência de Apoio Logístico
            </option>
            <option value="Gerência de Planejamento, Orçamento e Finanças" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Gerência de Planejamento, Orçamento e Finanças')
              echo 'selected'; ?>>Gerência de
              Planejamento, Orçamento e Finanças</option>
            <option value="Gerência de Pessoal" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Gerência de Pessoal')
              echo 'selected'; ?>>Gerência de Pessoal</option>
            <option value="GIPIAP" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'GIPIAP')
              echo 'selected'; ?>>GIPIAP</option>
            <option value="GT-CTA" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'GT-CTA')
              echo 'selected'; ?>>GT-CTA</option>
            <option value="GT-MD" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'GT-MD')
              echo 'selected'; ?>>GT-MD</option>
            <option value="Junta Médica" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Junta Médica')
              echo 'selected'; ?>>Junta Médica</option>
            <option value="Ouvidoria" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Ouvidoria')
              echo 'selected'; ?>>Ouvidoria</option>
            <option value="Protocolo" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Protocolo')
              echo 'selected'; ?>>Protocolo</option>
            <option value="Setor de Contratos Institucionais" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Setor de Contratos Institucionais')
              echo 'selected'; ?>>Setor de Contratos
              Institucionais</option>
            <option value="Secretaria Executiva Administração e Gestão" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Secretaria Executiva Administração e Gestão')
              echo 'selected'; ?>>Secretaria
              Executiva Administração e Gestão</option>
            <option value="SEPAGAP" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SEPAGAP')
              echo 'selected'; ?>>SEPAGAP</option>>
            <option value="SGPGP" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SGPGP')
              echo 'selected'; ?>>SGPGP</option>
            <option value="SGRH" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SGRH')
              echo 'selected'; ?>>SGRH</option>
            <option value="SGRH-GRD" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SGRG-GRD')
              echo 'selected'; ?>>SGRH-GRD</option>
            <option value="SGRH-ASS" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SRGH-ASS')
              echo 'selected'; ?>>SGRH-ASS</option>
            <option value="SGRH-FP" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SGRH-FP')
              echo 'selected'; ?>>SGRH-FP</option>
            <option value="SGRH-GB" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SGRH-GB')
              echo 'selected'; ?>>SGRH-GB</option>
            <option value="SGRH-GV" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'SGRH-GV')
              echo 'selected'; ?>>SGRH-GV</option>
            <option value="TRANSPORTE" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'TRANSPORTE')
              echo 'selected'; ?>>TRANSPORTE</option>
            </select>
            </div>
           </div>

           <div class="col-md-6">
            <label class="form-label-top-right" style="margin-left: 10px;" for="funcaogratificada" >Você tem função </label>
            <a href="#" data-mdb-toggle="gratificada?" title="Exemplo: Gerente, Secretario(a), Coordenador(a)" style="font-size: 20px;"> gratificada?</a>
            <div class="form-outline-left">
            <select class="select form-control input-style" id="funcaogratificada" name="funcaogratificada" aria-placeholder="Selecione" >
              <option value="" disabled selected>Selecione</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
             
            <div class="mb-3" id="gratificationTextareaDiv" style="display: none;" >

              <textarea class="form-control" id="gratificationTextarea" name="temfuncaogratificada" rows="4" placeholder="Informe a sua função gratificada e há quanto tempo você atua nela" style="resize: none;" ></textarea>
          </div>
          
            </div>
           </div>

           <div class="col-md-6">
            <label class="form-label-top-right" for="cargo">Cargo atual</label>
            <div class="form-outline-right">
            <select class="select form-control input-style" id="cargo" name="role" aria-placeholder="Selecione" >
              <option value="" disabled selected>Selecione</option>
                 <option value="Selecione">Selecione</option>
                 <option value="Consultor técnico">Consultor técnico</option>
                 <option value="Engenheiro">Engenheiro</option>
                 <option value="Auditor de folha de pagamento">Auditor de folha de pagamento</option>
                 <option value="Técnico de nível superior">Técnico de nível superior</option>
                 <option value="Assistente técnico">Assistente técnico</option>
                 <option value="Assistente operacional">Assistente operacional</option>
                 <option value="Auxiliar administrativo">Auxiliar administrativo</option>
                 <option value="Auxiliar operacional">Auxiliar operacional</option>
                 <option value="Auxiliar de serviços gerais">Auxiliar de serviços gerais</option>
                 <option value="Motorista">Motorista</option>
                 <option value="Vigia">Vigia</option>
                 <option value="Outro">Outro</option>
            </select>
            <div class="mb-3" id="roleTextareaDiv" style="display: none;" >

              <textarea class="form-control" id="roleTextarea" name="anotherrole" rows="2" placeholder="Informe o seu cargo" style="resize: none;" ></textarea>
          </div>
            </div>
           </div>

           <div class="col-md-6">
  <label class="form-label-top" for="matricula">N° de matrícula</label>
  <div class="form-outline-left">
    <input type="text" id="matricula" name="matricula" class="form-control input-style">
    
  </div>
</div>

           <div class="col-md-6">
              <label class="form-label-top-right" for="firstquestion">Qual o seu grau de escolaridade?</label>
              <div class="form-outline-right">
              <select class="select form-control input-style" id="firstquestion" name="firstquestion" aria-placeholder="Selecione" >
                <option value="" disabled selected>Selecione</option>
                <option value="Ensino fundamental incompleto" >Ensino Fundamental Incompleto</option>
                <option value="Ensino Fundamental Completo">Ensino Fundamental Completo</option>
                <option value="Ensino médio incompleto">Ensino Médio Incompleto</option>
                <option value="Ensino médio Completo">Ensino Médio Completo</option>
                <option value="Ensino Superior Incompleto">Ensino Superior Incompleto</option>
                <option value="Ensino Superior Completo">Ensino Superior Completo</option>
                <option value="Pós-graduação Incompleta">Pós-graduação Incompleta</option>
                <option value="Pós-graduação Completa">Pós-graduação Completa</option>
                <option value="Mestrado Incompleto">Mestrado Incompleto</option>
                <option value="Mestrado Completo">Mestrado Completo</option>
                <option value="Doutorado Incompleto">Doutorado Incompleto</option>
                <option value="Doutorado Completo">Doutorado Completo</option>
              </select>
              <div class="mb-3" id="degreeTextareaDiv" style="display: none;" >
                <textarea class="form-control" id="degreeTextarea" name="degreetextarea" rows="2" placeholder="Informe aqui a sua formação" style="resize: none;" ></textarea>
            </div>
            <div class="mb-3" id="secondDegreeTextareaDiv" style="display: none;" >
              <textarea class="form-control" id="secondDegreeTextarea" name="seconddegreetextarea" rows="2" placeholder="Informe aqui a sua outra formação" style="resize: none;" ></textarea>
          </div>
              </div>
             </div>

   
</div> <!--AQUI ACABA O ROW-->


<p class="form-label-top questions-titles">Nome da instituição em que finalizou o diploma mais recente:</p>
        <div class="mb-3">
          <textarea class="form-control" id="nomeinstituicao" name="nomeinstituicao" rows="1" style="resize: none; width: 98%; margin-left: 5px; padding: 10px; " ></textarea>
      </div>

      <p class="form-label-top questions-titles">Nome do curso mais recente:</p>
        <div class="mb-3">
          <textarea class="form-control" id="nomecurso" name="nomecurso" rows="1" style="resize: none; width: 98%; margin-left: 5px; padding: 10px; " ></textarea>
      </div>

      <p class="form-label-top questions-titles">Tipo de instituição em que finalizou o diploma mais recente:</p> 
<div class="form-check tipoinstituicao ">
  <input class="form-check-input" type="checkbox" value="Pública Federal" name="instituicao" id="publica" />
  <label class="form-check-label" for="publica">Pública Federal</label>    
</div>
<div class="form-check tipoinstituicao ">
  <input class="form-check-input" type="checkbox" value="Pública Estadual" name="instituicao" id="publicaestadual" />
  <label class="form-check-label" for="publicaestadual">Pública Estadual</label>    
</div>
<div class="form-check tipoinstituicao ">
  <input class="form-check-input" type="checkbox" value="Pública Municipal" name="instituicao" id="publicamunicipal" />
  <label class="form-check-label" for="publicamunicipal">Pública Municipal</label>    
</div>
<div class="form-check tipoinstituicao ">
  <input class="form-check-input" type="checkbox" value="Privada" name="instituicao" id="privada" />
  <label class="form-check-label" for="privada">Privada</label>    
</div>

<p class="form-label-top questions-titles">Na maioria de seus anos de estudo, qual tipo de escola você frequentou?</p> 
<div class="form-check tipoescola ">
  <input class="form-check-input" type="checkbox" value="Apenas em escola pública" name="tipoescola" id="sonapublica" />
  <label class="form-check-label" for="sonapublica">Apenas em escola pública</label>    
</div>
<div class="form-check tipoescola ">
  <input class="form-check-input" type="checkbox" value="Na maior parte do tempo, em escola pública" name="tipoescola" id="enapublica" />
  <label class="form-check-label" for="enapublica">Na maior parte do tempo, em escola pública</label>    
</div>
<div class="form-check tipoescola ">
  <input class="form-check-input" type="checkbox" value="Na maior parte do tempo, em escola particular" name="tipoescola" id="enaparticular" />
  <label class="form-check-label" for="enaparticular">Na maior parte do tempo, em escola particular</label>    
</div>
<div class="form-check tipoescola ">
  <input class="form-check-input" type="checkbox" value="Apenas em escola particular" name="tipoescola" id="soparticular" />
  <label class="form-check-label" for="sonaparticular">Apenas em escola particular</label>    
</div>
<div class="form-check tipoescola ">
  <input class="form-check-input" type="checkbox" value="Outro" name="tipoescola" id="emoutro" />
  <label class="form-check-label" for="emoutro"> Outro</label>    
</div>



      <p class="form-label-top questions-titles">Quantidade de anos de atuação profissional, incluindo entidades privadas e/ou do terceiro setor:</p> 
<div class="form-check timeofservice ">
  <input class="form-check-input" type="checkbox" value="Até 1 ano" name="timeofservice" id="ateumano" />
  <label class="form-check-label" for="ateumano">Até 1 ano</label>    
</div>
<div class="form-check timeofservice ">
  <input class="form-check-input" type="checkbox" value="De 1 a 4 anos" name="timeofservice" id="quatroanos" />
  <label class="form-check-label" for="quatroanos">De 1 a 4 anos</label>    
</div>
<div class="form-check timeofservice ">
  <input class="form-check-input" type="checkbox" value="De 5 a 8 anos" name="timeofservice" id="cincoanos" />
  <label class="form-check-label" for="cincoanos">De 5 a 8 anos</label>    
</div>
<div class="form-check timeofservice ">
  <input class="form-check-input" type="checkbox" value="De 8 a 12 anos" name="timeofservice" id="oitoanos" />
  <label class="form-check-label" for="oitoanos">De 8 a 12 anos</label>    
</div>
<div class="form-check timeofservice ">
  <input class="form-check-input" type="checkbox" value="Mais de 12 anos" name="timeofservice" id="naoseimporta" />
  <label class="form-check-label" for="naoseimporta">Mais de 12 anos</label>    
</div>

      <p class="form-label-top questions-titles">Há quanto tempo você trabalha na Sead?</p> 
<div class="form-check temposead ">
  <input class="form-check-input" type="checkbox" value="Até 1 ano" name="temposead" id="ateumano" />
  <label class="form-check-label" for="ateumano">Até 1 ano</label>    
</div>
<div class="form-check temposead ">
  <input class="form-check-input" type="checkbox" value="De 1 a 4 anos" name="temposead" id="quatroanos" />
  <label class="form-check-label" for="quatroanos">De 1 a 4 anos</label>    
</div>
<div class="form-check temposead ">
  <input class="form-check-input" type="checkbox" value="De 5 a 8 anos" name="temposead" id="cincoanos" />
  <label class="form-check-label" for="cincoanos">De 5 a 8 anos</label>    
</div>
<div class="form-check temposead ">
  <input class="form-check-input" type="checkbox" value="De 8 a 12 anos" name="temposead" id="oitoanos" />
  <label class="form-check-label" for="oitoanos">De 8 a 12 anos</label>    
</div>
<div class="form-check temposead ">
  <input class="form-check-input" type="checkbox" value="Mais de 12 anos" name="temposead" id="naoseimporta" />
  <label class="form-check-label" for="naoseimporta">Mais de 12 anos</label>    
</div>

<p class="form-label-top questions-titles">Qual a forma de realização de trabalho você prefere?</p> 
<div class="form-check realizacaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Prefiro trabalhar sozinho" name="formadetrabalho" id="trabalharsozinho" />
  <label class="form-check-label" for="trabalharsozinho">Prefiro trabalhar sozinho</label>    
</div>
<div class="form-check realizacaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Prefiro trabalhar em grupo" name="formadetrabalho" id="trabalharemgrupo" />
  <label class="form-check-label" for="trabalharemgrupo">Prefiro trabalhar em grupo</label>    
</div>
<div class="form-check realizacaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Não tenho preferências" name="formadetrabalho" id="naoseimporta" />
  <label class="form-check-label" for="naoseimporta">Não tenho preferências</label>    
</div>




<p class="form-label-top questions-titles">Quantidade de anos de atuação no Serviço Público:</p> 
<div class="form-check anosdeservico ">
  <input class="form-check-input" type="checkbox" value="Até 1 ano" name="anosdeservico" id="anosdeservico" />
  <label class="form-check-label" for="anosdeservico">Até 1 ano</label>    
</div>
<div class="form-check anosdeservico ">
  <input class="form-check-input" type="checkbox" value="De 1 a 4 anos" name="anosdeservico" id="manosdeservico" />
  <label class="form-check-label" for="manosdeservico">De 1 a 4 anos</label>    
</div>
<div class="form-check anosdeservico ">
  <input class="form-check-input" type="checkbox" value="De 5 a 8 anos" name="anosdeservico" id="sanosdeservico" />
  <label class="form-check-label" for="sanosdeservico">De 5 a 8 anos</label>    
</div>
<div class="form-check anosdeservico ">
  <input class="form-check-input" type="checkbox" value="De 8 a 12 anos" name="anosdeservico" id="vanosdeservico" />
  <label class="form-check-label" for="vanosdeservico">De 8 a 12 anos</label>    
</div>
<div class="form-check anosdeservico ">
  <input class="form-check-input" type="checkbox" value="Mais de 12 anos" name="anosdeservico" id="banosdeservico" />
  <label class="form-check-label" for="banosdeservico">Mais de 12 anos</label>    
</div>

<p class="form-label-top questions-titles">Você tem interesse em entrar para o programa de Teletrabalho?</p> 
<div class="form-check teletrabalho ">
  <input class="form-check-input" type="checkbox" value="Sim" name="teletrabalho" id="teletrabalhosim" />
  <label class="form-check-label" for="teletrabalhosim">Sim</label>    
</div>
<div class="form-check teletrabalho ">
  <input class="form-check-input" type="checkbox" value="Não" name="teletrabalho" id="teletrabalhonao" />
  <label class="form-check-label" for="teletrabalhonao">Não</label>    
</div>
<div class="form-check teletrabalho ">
  <input class="form-check-input" type="checkbox" value="Não se aplica" name="teletrabalho" id="naoseaplica" />
  <label class="form-check-label" for="naoseaplica">Não se aplica</label>    
</div>

<p class="form-label-top questions-titles">Como você costuma agir quando participa de reuniões de trabalho?</p> 
<div class="form-check reuniaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Gosto de expor minhas ideias mostrando claramente os pontos com os quais discordo ou concordo" name="reuniaotrabalho" id="reuniaotrabalhogosto" />
  <label class="form-check-label" for="reuniaotrabalhogosto">Gosto de expor minhas ideias mostrando claramente os pontos com os quais discordo ou concordo</label>    
</div>
<div class="form-check reuniaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Prefiro não emitir opinião durante a reunião, mas converso com meu gestor após para discutir pontos relevantes" name="reuniaotrabalho" id="reuniaotrabalhonao" />
  <label class="form-check-label" for="reuniaotrabalhonao">Prefiro não emitir opinião durante a reunião, mas converso com meu gestor após para discutir pontos relevantes</label>    
</div>
<div class="form-check reuniaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Não exponho a minha opinião em momento algum" name="reuniaotrabalho" id="reuniaotrabalhonunca" />
  <label class="form-check-label" for="reuniaotrabalhonunca">Não exponho a minha opinião em momento algum</label>    
</div>

<p class="form-label-top questions-titles">Como você costuma agir diante de prazos e metas?</p> 
<div class="form-check deadlines ">
  <input class="form-check-input" type="checkbox" value="Tenho dificuldade quanto ao atendimento de prazos mas busco realizar as atividades de forma satisfatória e atingir a meta." name="deadlines" id="deadlinedifuc" />
  <label class="form-check-label" for="deadlinedifuc">Tenho dificuldade com atendimento de prazos mas busco realizar as atividades de forma satisfatória e atingir a meta.</label>    
</div>
<div class="form-check deadlines ">
  <input class="form-check-input" type="checkbox" value="Organizo minhas atividades para realizá-las dentro do prazo determinado" name="deadlines" id="deadlineorganizo" />
  <label class="form-check-label" for="deadlineorganizo">Organizo minhas atividades para realizá-las dentro do prazo determinado</label>    
</div>
<div class="form-check deadlines ">
  <input class="form-check-input" type="checkbox" value="Priorizo, a partir da indicação do(a) gestor(a), as atividades com prazos específicos" name="deadlines" id="deadlinepriorizo" />
  <label class="form-check-label" for="deadlinepriorizo">Priorizo, a partir da indicação do(a) gestor(a), as atividades com prazos específicos</label>    
</div>
<div class="form-check deadlines  " style="margin-bottom: 20px;">
  <input class="form-check-input" type="checkbox" value="Priorizo, de forma autônoma, as atividades com prazos específicos" name="deadlines" id="deadlineespecificos" />
  <label class="form-check-label" for="deadlineespecificos">Priorizo, de forma autônoma, as atividades com prazos específicos</label>    
</div>

<p class="form-label-top questions-titles">Como você acessa os serviços de saúde?</p> 
<div class="form-check servicosaude ">
  <input class="form-check-input" type="checkbox" value="Apenas pelo SUS" name="servicosaude" id="teamsus" />
  <label class="form-check-label" for="teamsus">Apenas pelo SUS</label>    
</div>
<div class="form-check servicosaude ">
  <input class="form-check-input" type="checkbox" value="Normalmente pelo SUS, mas às vezes pago por consultas, exames e procedimentos." name="servicosaude" id="teamsusq" />
  <label class="form-check-label" for="teamsusq">Normalmente pelo SUS, mas às vezes pago por consultas, exames e procedimentos.</label>    
</div>
<div class="form-check servicosaude ">
  <input class="form-check-input" type="checkbox" value="Pago por consultas, exames e procedimentos sem depender do SUS" name="servicosaude" id="pgsus" />
  <label class="form-check-label" for="pgsus">Pago por consultas, exames e procedimentos sem depender do SUS</label>    
</div>
<div class="form-check servicosaude ">
  <input class="form-check-input" type="checkbox" value="Normalmente por plano de saúde privado" name="servicosaude" id="privado" />
  <label class="form-check-label" for="privado">Normalmente por plano de saúde privado</label>    
</div>
<div class="form-check servicosaude ">
  <input class="form-check-input" type="checkbox" value="Apenas por plano de saúde privado" name="servicosaude" id="soprivado" />
  <label class="form-check-label" for="soprivado">Apenas por plano de saúde privado</label>    
</div>
<div class="form-check servicosaude ">
  <input class="form-check-input" type="checkbox" value="Outro" name="servicosaude" id="anotherone" />
  <label class="form-check-label" for="anotherone">Outro</label>    
</div>


<p class="form-label-top questions-titles">No seu dia a dia, quais são os meios de transporte que você utiliza com mais frequência?</p> 
<div class="form-check meiotransporte ">
  <input class="form-check-input" type="checkbox" value="Carro" name="meiotransporte" id="carro" />
  <label class="form-check-label" for="carro">Carro</label>    
</div>
<div class="form-check meiotransporte ">
  <input class="form-check-input" type="checkbox" value="Transporte público (ônibus, lotação, metrô, trem)" name="meiotransporte" id="onibus" />
  <label class="form-check-label" for="onibus">Transporte público (ônibus, lotação, metrô, trem)</label>    
</div>
<div class="form-check meiotransporte ">
  <input class="form-check-input" type="checkbox" value="Motocicleta" name="meiotransporte" id="motocicleta" />
  <label class="form-check-label" for="motocicleta">Motocicleta</label>    
</div>
<div class="form-check meiotransporte ">
  <input class="form-check-input" type="checkbox" value="Bicicleta" name="meiotransporte" id="bicicleta" />
  <label class="form-check-label" for="bicicleta">Bicicleta</label>    
</div>
<div class="form-check meiotransporte ">
  <input class="form-check-input" type="checkbox" value="A pé" name="meiotransporte" id="pe" />
  <label class="form-check-label" for="pe">A pé</label>    
</div>
<div class="form-check meiotransporte ">
  <input class="form-check-input" type="checkbox" value="Barco, balsa" name="meiotransporte" id="barco" />
  <label class="form-check-label" for="barco">Barco, balsa</label>    
</div>
<div class="form-check meiotransporte " style="margin-bottom: 10px;" >
  <input class="form-check-input" type="checkbox" value="Outro" name="meiotransporte" id="outro" />
  <label class="form-check-label" for="outro">Outro</label>    
</div>

        </div> <!--AQUI ACABA A PÁGINA 1-->
      
        <div class="form-page" id="page-2">
       
        <p class="form-label-top questions-titles">Habilidade espacial</p>
          <p class="small form-sub-label ">Compreendo e elaboro facilmente quadros, desenhos, esquemas, gráficos e tabelas.  </p>
          <div id="cid_habesp" class="form-input-wide text-center" data-layout="full">
            <div role="radiogroup"  cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="1" title="1"
                    id="input_habesp_1" />
                  <label for="input_habesp_1">1</label>
                   </div>
              
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="2" title="2"
                    id="input_habesp_2" />
                  <label for="input_habesp_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="3" title="3"
                    id="input_habesp_3" />
                  <label for="input_habesp_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="4" title="4"
                    id="input_habesp_4" />
                  <label for="input_habesp_4">4</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="5" title="5"
                    id="input_habesp_5" />
                  <label for="input_habesp_5">5</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="6" title="6"
                    id="input_habesp_6" />
                  <label for="input_habesp_6">6</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="7" title="7"
                    id="input_habesp_7" />
                  <label for="input_habesp_7">7</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="8" title="8"
                    id="input_habesp_8" />
                  <label for="input_habesp_8">8</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="9" title="9"
                    id="input_habesp_9" />
                  <label for="input_habesp_9">9</label>
                </div>
                <div class="rating-item">
                  <span class="rating-item-title for-to"></span>
                  <input type="radio" aria-describedby="label_habesp" class="form-radio" name="habespacial" value="10" title="10"
                    id="input_habesp_10" />
                  <label for="input_habesp_10">10</label>
                </div>
              </div>  
              
            </div>
   <div style="display: flex; justify-content: space-between;">
              <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
              <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
            </div>
            </span>
          </div>

          <p class="form-label-top questions-titles"> Habilidade corporal </p>
          <p class="small form-sub-label ">Tenho capacidade de equilíbrio flexibilidade, velocidade e coordenação motora.  </p>
          <div id="cid_habcorp" class="form-input-wide text-center" data-layout="full">
            <div role="radiogroup"  aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="1" title="1"
                    id="input_habcorp_1" />
                  <label for="input_habcorp_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="2" title="2"
                    id="input_habcorp_2" />
                  <label for="input_habcorp_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="3" title="3"
                    id="input_habcorp_3" />
                  <label for="input_habcorp_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="4" title="4"
                    id="input_habcorp_4" />
                  <label for="input_habcorp_4">4</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="5" title="5"
                    id="input_habcorp_5" />
                  <label for="input_habcorp_5">5</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="6" title="6"
                    id="input_habcorp_6" />
                  <label for="input_habcorp_6">6</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="7" title="7"
                    id="input_habcorp_7" />
                  <label for="input_habcorp_7">7</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="8" title="8"
                    id="input_habcorp_8" />
                  <label for="input_habcorp_8">8</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="9" title="9"
                    id="input_habcorp_9" />
                  <label for="input_habcorp_9">9</label>
                </div>
                <div class="rating-item">
                  <span class="rating-item-title for-to"></span>
                  <input type="radio" aria-describedby="label_habcorp" class="form-radio" name="habcorporal" value="10" title="10"
                    id="input_habcorp_10" />
                  <label for="input_habcorp_10">10</label>
                </div>
              </div>
            </div>
            <div style="display: flex; justify-content: space-between;">
              <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
              <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
            </div>
            </span>
          </div>

          <p class="form-label-top questions-titles">Habilidade musical </p>
          <p class="small form-sub-label ">Possuo afinidade com instrumentos musicais, ritmo e harmonia. </p>
          <div id="cid_habmus" class="form-input-wide text-center" data-layout="full">
             <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
               class="form-scale-table" data-component="scale" style="white-space: nowrap;">
               <div class="rating-item-group">
                 <div class="rating-item">
                   <span class="rating-item-title for-from"></span>
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="1" title="1"
                     id="input_habmus_1" />
                   <label for="input_habmus_1">1</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="2" title="2"
                     id="input_habmus_2" />
                   <label for="input_habmus_2">2</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="3" title="3"
                     id="input_habmus_3" />
                   <label for="input_habmus_3">3</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="4" title="4"
                     id="input_habmus_4" />
                   <label for="input_habmus_4">4</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="5" title="5"
                     id="input_habmus_5" />
                   <label for="input_habmus_5">5</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="6" title="6"
                     id="input_habmus_6" />
                   <label for="input_habmus_6">6</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="7" title="7"
                     id="input_habmus_7" />
                   <label for="input_habmus_7">7</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="8" title="8"
                     id="input_habmus_8" />
                   <label for="input_habmus_8">8</label>
                 </div>
                 <div class="rating-item">
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="9" title="9"
                     id="input_habmus_9" />
                   <label for="input_habmus_9">9</label>
                 </div>
                 <div class="rating-item">
                   <span class="rating-item-title for-to"></span>
                   <input type="radio" aria-describedby="label_7" class="form-radio" name="habmusical" value="10" title="10"
                     id="input_habmus_10" />
                   <label for="input_habmus_10">10</label>
                 </div>
               </div>
             </div>
             <div style="display: flex; justify-content: space-between;">
              <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
              <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
            </div>
             </span>
           </div>
    
           <p class="form-label-top questions-titles">Habilidade linguística</p>
           <p class="small form-sub-label ">Possuo facilidade em aprender novos idiomas bem como para me expressar oralmente ou através da escrita. </p>
           <div id="cid_7" class="form-input-wide text-center" data-layout="full">
              <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
                class="form-scale-table" data-component="scale" style="white-space: nowrap;">
                <div class="rating-item-group">
                  <div class="rating-item">
                    <span class="rating-item-title for-from"></span>
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="1" title="1"
                      id="input_habling_1" />
                    <label for="input_habling_1">1</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="2" title="2"
                      id="input_habling_2" />
                    <label for="input_habling_2">2</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="3" title="3"
                      id="input_habling_3" />
                    <label for="input_habling_3">3</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="4" title="4"
                      id="input_habling_4" />
                    <label for="input_habling_4">4</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="5" title="5"
                      id="input_habling_5" />
                    <label for="input_habling_5">5</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="6" title="6"
                      id="input_habling_6" />
                    <label for="input_habling_6">6</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="7" title="7"
                      id="input_habling_7" />
                    <label for="input_habling_7">7</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="8" title="8"
                      id="input_habling_8" />
                    <label for="input_habling_8">8</label>
                  </div>
                  <div class="rating-item">
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="9" title="9"
                      id="input_habling_9" />
                    <label for="input_habling_9">9</label>
                  </div>
                  <div class="rating-item">
                    <span class="rating-item-title for-to"></span>
                    <input type="radio" aria-describedby="label_7" class="form-radio" name="hablinguistica" value="10" title="10"
                      id="input_habling_10" />
                    <label for="input_habling_10">10</label>
                  </div>
                </div>
              </div>
              <div style="display: flex; justify-content: space-between;">
                <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
                <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
              </div>
              </span>
            </div>

          <p class="form-label-top questions-titles">Habilidade Lógico-Matemática </p>

          <p class="small form-sub-label ">Tenho boa capacidade de raciocínio lógico, compreensão de cálculos,
             utilização de fórmulas, interpretação de números e resolução de problemas. </p>
      <div id="cid_hablog" class="form-input-wide text-center" data-layout="full">
          <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
            class="form-scale-table" data-component="scale" style="white-space: nowrap;">
            <div class="rating-item-group">
              <div class="rating-item">
                <span class="rating-item-title for-from"></span>
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="1" title="1"
                  id="input_hablog_1" />
                <label for="input_hablog_1">1</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="2" title="2"
                  id="input_hablog_2" />
                <label for="input_hablog_2">2</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="3" title="3"
                  id="input_hablog_3" />
                <label for="input_hablog_3">3</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="4" title="4"
                  id="input_hablog_4" />
                <label for="input_hablog_4">4</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="5" title="5"
                  id="input_hablog_5" />
                <label for="input_hablog_5">5</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="6" title="6"
                  id="input_hablog_6" />
                <label for="input_hablog_6">6</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="7" title="7"
                  id="input_hablog_7" />
                <label for="input_hablog_7">7</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="8" title="8"
                  id="input_hablog_8" />
                <label for="input_hablog_8">8</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="9" title="9"
                  id="input_hablog_9" />
                <label for="input_hablog_9">9</label>
              </div>
              <div class="rating-item">
                <span class="rating-item-title for-to"></span>
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habmath" value="10" title="10"
                  id="input_hablog_10" />
                <label for="input_hablog_10">10</label>
              </div>
            </div>
          </div>
          <div style="display: flex; justify-content: space-between;">
            <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
            <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
          </div>
          </span>
        </div>
   
        <p class="form-label-top questions-titles"> Habilidade interpessoal </p>
        
        <p class="small form-sub-label ">Tenho facilidade para me relacionar, escutar e compreender pessoas, para dar e receber feedbacks.</p>

        <div id="cid_habinter" class="form-input-wide text-center" data-layout="full">
          <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
            class="form-scale-table" data-component="scale" style="white-space: nowrap;">
            <div class="rating-item-group">
              <div class="rating-item">
                <span class="rating-item-title for-from"></span>
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="1" title="1"
                  id="input_habinter_1" />
                <label for="input_habinter_1">1</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="2" title="2"
                  id="input_habinter_2" />
                <label for="input_habinter_2">2</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="3" title="3"
                  id="input_habinter_3" />
                <label for="input_habinter_3">3</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="4" title="4"
                  id="input_habinter_4" />
                <label for="input_habinter_4">4</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="5" title="5"
                  id="input_habinter_5" />
                <label for="input_habinter_5">5</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="6" title="6"
                  id="input_habinter_6" />
                <label for="input_habinter_6">6</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="7" title="7"
                  id="input_habinter_7" />
                <label for="input_habinter_7">7</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="8" title="8"
                  id="input_habinter_8" />
                <label for="input_habinter_8">8</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="9" title="9"
                  id="input_habinter_9" />
                <label for="input_habinter_9">9</label>
              </div>
              <div class="rating-item">
                <span class="rating-item-title for-to"></span>
                <input type="radio" aria-describedby="label_7" class="form-radio" name="habinterpessoal" value="10" title="10"
                  id="input_habinter_10" />
                <label for="input_habinter_10">10</label>
              </div>
            </div>
            
          </div>
          <div style="display: flex; justify-content: space-between;">
            <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
            <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
          </div>
          </span>
        </div>

           <p class="form-label-top questions-titles"> Habilidade naturalista</p>
           <p class="small form-sub-label ">Possuo sensibilidade para reconhecer a importância dos elementos da natureza e sua relação com a vida humana. </p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full">
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="1" title="1"
                    id="input_habnat_1" />
                  <label for="input_habnat_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="2" title="2"
                    id="input_habnat_2" />
                  <label for="input_habnat_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="3" title="3"
                    id="input_habnat_3" />
                  <label for="input_habnat_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="4" title="4"
                    id="input_habnat_4" />
                  <label for="input_habnat_4">4</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="5" title="5"
                    id="input_habnat_5" />
                  <label for="input_habnat_5">5</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="6" title="6"
                    id="input_habnat_6" />
                  <label for="input_habnat_6">6</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="7" title="7"
                    id="input_habnat_7" />
                  <label for="input_habnat_7">7</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="8" title="8"
                    id="input_habnat_8" />
                  <label for="input_habnat_8">8</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="9" title="9"
                    id="input_habnat_9" />
                  <label for="input_habnat_9">9</label>
                </div>
                <div class="rating-item">
                  <span class="rating-item-title for-to"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="habnatureba" value="10" title="10"
                    id="input_habnat_10" />
                  <label for="input_habnat_10">10</label>
                </div>
              </div>
            
            </div>
            <div style="display: flex; justify-content: space-between;">
              <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
              <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
            </div>
             </div>
 
             <p class="form-label-top questions-titles">Habilidade emocional</p>
             <p class="small form-sub-label ">Possuo capacidade de conhecer e lidar com as minhas emoções, de reconhecer emoções em outras pessoas e de gerenciar conflitos. </p>
             <div id="cid_habemoc" class="form-input-wide text-center" data-layout="full">
               <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
                 class="form-scale-table" data-component="scale" style="white-space: nowrap;">
                 <div class="rating-item-group">
                   <div class="rating-item">
                     <span class="rating-item-title for-from"></span>
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="1" title="1"
                       id="input_habemoc_1" />
                     <label for="input_habemoc_1">1</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="2" title="2"
                       id="input_habemoc_2" />
                     <label for="input_habemoc_2">2</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="3" title="3"
                       id="input_habemoc_3" />
                     <label for="input_habemoc_3">3</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="4" title="4"
                       id="input_habemoc_4" />
                     <label for="input_habemoc_4">4</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="5" title="5"
                       id="input_habemoc_5" />
                     <label for="input_habemoc_5">5</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="6" title="6"
                       id="input_habemoc_6" />
                     <label for="input_habemoc_6">6</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="7" title="7"
                       id="input_habemoc_7" />
                     <label for="input_habemoc_7">7</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="8" title="8"
                       id="input_habemoc_8" />
                     <label for="input_habemoc_8">8</label>
                   </div>
                   <div class="rating-item">
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="9" title="9"
                       id="input_habemoc_9" />
                     <label for="input_habemoc_9">9</label>
                   </div>
                   <div class="rating-item">
                     <span class="rating-item-title for-to"></span>
                     <input type="radio" aria-describedby="label_7" class="form-radio" name="habemocional" value="10" title="10"
                       id="input_habemoc_10" />
                     <label for="input_habemoc_10">10</label>
                   </div>
                 </div>
                 
               </div>
               <div style="display: flex; justify-content: space-between;">
                <p class="small" style="text-align: left; margin-left: 35px; ">Discordo plenamente</p>
                <p class="small" style="text-align: right; margin-right: 35px;">Concordo plenamente</p>
              </div>
               </span>
             </div>

<p class="form-label-top questions-titles">Você é responsável por gerir uma equipe? Se sim, quantas pessoas? </p> 

<div class="form-check segerirequipe ">
  <input class="form-check-input" type="checkbox" value="Apenas 1 pessoa" name="segerirequipe" id="oneperson" />
  <label class="form-check-label" for="oneperson">Apenas 1 pessoa</label>    
</div>
<div class="form-check segerirequipe ">
  <input class="form-check-input" type="checkbox" value="Entre 2 e 4 pessoas" name="segerirequipe" id="entre2e4" />
  <label class="form-check-label" for="entre2e4">Entre 2 e 4 pessoas</label>    
</div>
<div class="form-check segerirequipe ">
  <input class="form-check-input" type="checkbox" value="Entre 5 e 10 pessoas" name="segerirequipe" id="entre5e10" />
  <label class="form-check-label" for="entre5e10">Entre 5 e 10 pessoas</label>    
</div>
<div class="form-check segerirequipe ">
  <input class="form-check-input" type="checkbox" value="Entre 11 e 20 pessoas" name="segerirequipe" id="entre11e20" />
  <label class="form-check-label" for="entre11e20">Entre 11 e 20 pessoas</label>    
</div>
<div class="form-check segerirequipe ">
  <input class="form-check-input" type="checkbox" value="Entre 20 e 30 pessoas" name="segerirequipe" id="entre20e30" />
  <label class="form-check-label" for="entre20e30">Entre 20 e 30 pessoas</label>    
</div>
<div class="form-check segerirequipe ">
  <input class="form-check-input" type="checkbox" value="Mais de 30 pessoas" name="segerirequipe" id="mais30" />
  <label class="form-check-label" for="mais30">Mais de 30 pessoas</label>    
</div>
<div class="form-check segerirequipe ">
  <input class="form-check-input" type="checkbox" value="Não sou gerente de equipe" name="segerirequipe" id="naoeh" />
  <label class="form-check-label" for="naoeh">Não sou responsável por gerir uma equipe</label>    
</div>


        <p class="form-label-top questions-titles">Se você pudesse trabalhar em outros setores, quais seriam? </p>
        <div class="competencias">
          <div class="form-check-competencias ">
            <input type="checkbox" class="form-check-input" id="setor1" name="setorop[]"
              value="DAFI" />
            <label class="form-check-label d-block mt-2" for="setor1">Dafi</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor2" name="setorop[]"
              value="Gabinete" />
            <label class="form-check-label d-block mt-2" for="setor2">Gabinete</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor3" name="setorop[]"
              value="ESASP" />
            <label class="form-check-label d-block mt-2" for="setor3">Esasp</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor4" name="setorop[]"
              value="Atualização constante em relação às novas tecnologias e tendências da área" />
            <label class="form-check-label d-block mt-2" for="setor4">Assessoria técnica Administrativa</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor5" name="setorop[]"
              value="ASCOM" />
            <label class="form-check-label d-block mt-2" for="setor5">Ascom</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor6" name="setorop[]"
              value="OUVIDORIA" />
            <label class="form-check-label d-block mt-2" for="setor3">Ouvidoria</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor7" name="setorop[]"
              value="CRD" />
            <label class="form-check-label d-block mt-2" for="setor7">CRD</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor8" name="setorop[]"
              value="JUNTA MÉDICA" />
            <label class="form-check-label d-block mt-2" for="setor8">Junta médica</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor9" name="setorop[]"
              value="SGRH" />
            <label class="form-check-label d-block mt-2" for="setor9">SGRH</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor10" name="setorop[]"
              value="CTA" />
            <label class="form-check-label d-block mt-2" for="setor10">CTA</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor11" name="setorop[]"
              value="APEAM" />
            <label class="form-check-label d-block mt-2" for="setor11">Apeam</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor12" name="setorop[]"
              value="Gestão de bens móveis" />
            <label class="form-check-label d-block mt-2" for="setor12">Gestão de bens móveis</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor13" name="setorop[]"
              value="Tecnologia da informação" />
            <label class="form-check-label d-block mt-2" for="setor13">Tecnologia da informação</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="setor14" name="setorop[]"
              value="Gestão de gastos públicos e combustíveis" />
            <label class="form-check-label d-block mt-2" for="setor14">Gestão de gastos públicos e combustíveis</label>
          </div>
         
        </div> <!--AQUI ACABA A DIV COMPETENCIAS-->
  <p class="form-label-top questions-titles" >Selecione até 3 habilidades sociais, artísticas, culturais e esportivas que gostaria de conduzir/participar na SEAD. </p>
        <div class="competencias">
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace1" name="habsace[]"
              value="Literatura, leitura, escrita" />
            <label class="form-check-label d-block mt-2" for="habsace1">Literatura, leitura, escrita</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace2" name="habsace[]"
              value="Língua Brasileira de Sinais" />
            <label class="form-check-label d-block mt-2" for="habsace2">Língua Brasileira de Sinais</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace3" name="habsace[]"
              value="Pintura, Desenho" />
            <label class="form-check-label d-block mt-2" for="habsace3">Pintura, Desenho</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace4" name="habsace[]"
              value="Jogos Eletrônicos, Virtuais" />
            <label class="form-check-label d-block mt-2" for="habsace4">Jogos Eletrônicos, Virtuais</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace5" name="habsace[]"
              value="Esportes, Atividades Físicas" />
            <label class="form-check-label d-block mt-2" for="habsace5">Esportes, Atividades Físicas</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace6" name="habsace[]"
              value="Instrumento Musical" />
            <label class="form-check-label d-block mt-2" for="habsace6">Instrumento Musical</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace7" name="habsace[]"
              value="Canto, Coral" />
            <label class="form-check-label d-block mt-2 " for="habsace7">Canto, Coral</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace8" name="habsace[]"
              value="Culinária" />
            <label class="form-check-label d-block mt-2" for="habsace8">Culinária</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace10" name="habsace[]"
              value="Trabalhos Manuais" />
            <label class="form-check-label d-block mt-2" for="habsace10">Trabalhos Manuais</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace11" name="habsace[]"
              value="Fotografia" />
            <label class="form-check-label d-block mt-2" for="habsace11">Fotografia</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace12" name="habsace[]"
              value="Cinegrafia" />
            <label class="form-check-label d-block mt-2" for="habsace12">Cinegrafia</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace13" name="habsace[]"
              value="Teatro" />
            <label class="form-check-label d-block mt-2" for="habsace13">Teatro</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace14" name="habsace[]"
              value="Idiomas" />
            <label class="form-check-label d-block mt-2" for="habsace14">Idiomas</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace15" name="habsace[]"
              value="Meditação, Ioga" />
            <label class="form-check-label d-block mt-2" for="habsace15">Meditação, Ioga</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace16" name="habsace[]"
              value="Jardinagem, Horta" />
            <label class="form-check-label d-block mt-2" for="habsace16">Jardinagem, Horta</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace17" name="habsace[]"
              value="Decoração" />
            <label class="form-check-label d-block mt-2" for="habsace17">Decoração</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="habsace18" name="habsace[]"
              value="Não tenho ou não gostaria de informar" />
            <label class="form-check-label d-block mt-2" for="habsace18">Não tenho ou não gostaria de informar</label>
          </div>
        </div>
        <p class="form-label-top questions-titles">Selecione até 5 competências socioemocionais que você se identifica: </p>
<div class="competencias">
  
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia1" name="competencia[]" value="Afabilidade" />
    <label class="form-check-label d-block mt-2" for="competencia1">Afabilidade</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia2" name="competencia[]"
      value="Assertividade" />
    <label class="form-check-label d-block mt-2" for="competencia2">Assertividade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia3" name="competencia[]" value="Autocontrole" />
    <label class="form-check-label d-block mt-2" for="competencia3">Autocontrole</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia4" name="competencia[]"
      value="Capacidade de agir sob pressão" />
    <label class="form-check-label d-block mt-2" for="competencia4">Capacidade de agir<br> sob pressão</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia6" name="competencia[]"
      value="Capacidade de análise e síntese" />
    <label class="form-check-label d-block mt-2" for="competencia6">Capacidade de análise<br> e síntese</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia7" name="competencia[]"
      value="Capacidade de comunicação" />
    <label class="form-check-label d-block mt-2" for="competencia7">Capacidade de<br> comunicação</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia8" name="competencia[]"
      value="Capacidade de concentração" />
    <label class="form-check-label d-block mt-2" for="competencia8">Capacidade de<br> concentração</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia9" name="competencia[]"
      value="Cooperação e trabalho em equipe" />
    <label class="form-check-label d-block mt-2" for="competencia9">Cooperação e <br>trabalho em equipe</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia10" name="competencia[]"
      value="Negociação e mediação" />
    <label class="form-check-label d-block mt-2" for="competencia10">Negociação e mediação</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia11" name="competencia[]"
      value="Capacidade de observação" />
    <label class="form-check-label d-block mt-2" for="competencia11">Capacidade de<br> observação</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia12" name="competencia[]"
      value="Condicionamento físico" />
    <label class="form-check-label d-block mt-2" for="competencia12">Condicionamento físico</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia13" name="competencia[]"
      value="Coordenação motora" />
    <label class="form-check-label d-block mt-2" for="competencia13">Coordenação motora</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia14" name="competencia[]"
      value="Criatividade" />
    <label class="form-check-label d-block mt-2" for="competencia14">Criatividade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia15" name="competencia[]" value="Deferência" />
    <label class="form-check-label d-block mt-2" for="competencia15">Deferência</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia16" name="competencia[]" value="Destreza" />
    <label class="form-check-label d-block mt-2" for="competencia16">Destreza</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia17" name="competencia[]" value="Discrição" />
    <label class="form-check-label d-block mt-2" for="competencia17">Discrição</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia18" name="competencia[]" value="Empatia" />
    <label class="form-check-label d-block mt-2" for="competencia18">Empatia</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia19" name="competencia[]"
      value="Equilíbrio emocional" />
    <label class="form-check-label d-block mt-2" for="competencia19">Equilíbrio emocional</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia20" name="competencia[]" value="Esmero" />
    <label class="form-check-label d-block mt-2" for="competencia20">Esmero</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia21" name="competencia[]" value="Ética" />
    <label class="form-check-label d-block mt-2" for="competencia21">Ética</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia22" name="competencia[]"
      value="Flexibilidade" />
    <label class="form-check-label d-block mt-2" for="competencia22">Flexibilidade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia23" name="competencia[]"
      value="Habilidade manual" />
    <label class="form-check-label d-block mt-2" for="competencia23">Habilidade manual</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia24" name="competencia[]" value="Idoneidade" />
    <label class="form-check-label d-block mt-2" for="competencia24">Idoneidade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia25" name="competencia[]"
      value="Imparcialidade" />
    <label class="form-check-label d-block mt-2" for="competencia25">Imparcialidade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia27" name="competencia[]" value="Iniciativa" />
    <label class="form-check-label d-block mt-2" for="competencia27">Iniciativa</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia28" name="competencia[]"
      value="Manter-se atualizado" />
    <label class="form-check-label d-block mt-2" for="competencia28">Manter-se atualizado</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia29" name="competencia[]"
      value="Objetividade" />
    <label class="form-check-label d-block mt-2" for="competencia29">Objetividade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia30" name="competencia[]" value="Organização" />
    <label class="form-check-label d-block mt-2" for="competencia30">Organização</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia31" name="competencia[]" value="Paciência" />
    <label class="form-check-label d-block mt-2" for="competencia31">Paciência</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia32" name="competencia[]" value="Parcimônia" />
    <label class="form-check-label d-block mt-2" for="competencia32">Parcimônia</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia33" name="competencia[]"
      value="Percepção visual e táctil" />
    <label class="form-check-label d-block mt-2" for="competencia33">Percepção visual <br>e táctil</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia34" name="competencia[]"
      value="Persistência e tolerância" />
    <label class="form-check-label d-block mt-2" for="competencia34">Persistência e tolerância</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia35" name="competencia[]" value="Prontidão" />
    <label class="form-check-label d-block mt-2" for="competencia35">Prontidão</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia36" name="competencia[]"
      value="Raciocínio analítico e dedutivo" />
    <label class="form-check-label d-block mt-2" for="competencia36">Raciocínio analítico <br>e dedutivo</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia37" name="competencia[]"
      value="Raciocínio lógico" />
    <label class="form-check-label d-block mt-2" for="competencia37">Raciocínio lógico</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia38" name="competencia[]"
      value="Respeito às diferenças" />
    <label class="form-check-label d-block mt-2" for="competencia38">Respeito às diferenças</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia39" name="competencia[]"
      value="Responsabilidade" />
    <label class="form-check-label d-block mt-2" for="competencia39">Responsabilidade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia40" name="competencia[]"
      value="Sociabilidade" />
    <label class="form-check-label d-block mt-2" for="competencia40">Sociabilidade</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia41" name="competencia[]"
      value="Tomar decisões observando diretrizes institucionais" />
    <label class="form-check-label d-block mt-2" for="competencia41">Tomar decisões observando diretrizes
      institucionais</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="competencia43" name="competencia[]"
      value="Visão crítica" />
    <label class="form-check-label d-block mt-2" for="competencia43">Visão crítica</label>
  </div>
  </div>

<p class="form-label-top questions-titles">Selecione 5 competências técnicas que você se identifica: </p> 
<div class="competencias">
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia1" name="hardcompetencia[]"
      value="Proficiências completa em Word, Excel, PowerPoint e Outlook" />
    <label class="form-check-label" for="hardcompetencia1">Proficiências completa em Word, Excel, PowerPoint e
      Outlook</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia2" name="hardcompetencia[]"
      value="Conhecimento em sistemas operacionais (windows, macOS, Linux)" />
    <label class="form-check-label" for="hardcompetencia2">Conhecimento em sistemas operacionais (windows, macOS,
      Linux)</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia3" name="hardcompetencia[]"
      value="Coleta de dados(pesquisa questionários entrevistas)" />
    <label class="form-check-label" for="hardcompetencia3">Coleta de dados(pesquisa, questionários,
      entrevistas)</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia4" name="hardcompetencia[]"
      value="Análise de dados quantitativos e qualitativos" />
    <label class="form-check-label" for="hardcompetencia4">Análise de dados quantitativos e qualitativos</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia5" name="hardcompetencia[]"
      value="Apresentação de dados de forma clara e atraente (gráficos, tabelas)" />
    <label class="form-check-label" for="hardcompetencia5">Apresentação de dados de forma clara e atraente
      (gráficos, tabelas)</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia6" name="hardcompetencia[]"
      value="Domínio de programas de design gráfico (Adobe Illustrator, Adobe Photoshop, CorelDRAW)" />
    <label class="form-check-label" for="hardcompetencia6">Domínio de programas de design gráfico (Adobe
      Illustrator, Adobe Photoshop, CorelDRAW)</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia7" name="hardcompetencia[]"
      value="Conhecimento de princípios de design (cores, tipografia, composição)" />
    <label class="form-check-label" for="hardcompetencia7">Conhecimento de princípios de design (cores,
      tipografia, composição)</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia8" name="hardcompetencia[]"
      value="Criação de conteúdo para mídias sociais (imagens, vídeos, infográficos)" />
    <label class="form-check-label" for="hardcompetencia8">Criação de conteúdo para mídias sociais (imagens,
      vídeos, infográficos)</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia9" name="hardcompetencia[]"
      value="Escrita clara concisa e gramaticalmente correta" />
    <label class="form-check-label" for="hardcompetencia9">Escrita clara, concisa e gramaticalmente
      correta</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia10" name="hardcompetencia[]"
      value="Habilidade em redação acadêmica, jornalística ou técnica" />
    <label class="form-check-label" for="hardcompetencia10">Habilidade em redação acadêmica, jornalística ou
      técnica</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia11" name="hardcompetencia[]"
      value="Vocabulário variado e adequado ao contexto" />
    <label class="form-check-label" for="hardcompetencia11">Vocabulário variado e adequado ao contexto</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia12" name="hardcompetencia[]"
      value="Proficiência em línguas estrangeiras" />
    <label class="form-check-label" for="hardcompetencia12">Proficiência em línguas estrangeiras</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia13" name="hardcompetencia[]"
      value="Capacidade de comunicação escrita e verbal em diferentes idiomas" />
    <label class="form-check-label" for="hardcompetencia13">Capacidade de comunicação escrita e verbal em
      diferentes idiomas</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia14" name="hardcompetencia[]"
      value="Tradução e interpretação em idiomas estrangeiros" />
    <label class="form-check-label" for="hardcompetencia14">Tradução e interpretação em idiomas
      estrangeiros</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia15" name="hardcompetencia[]"
      value="Edição de imagens e retoque fotográfico" />
    <label class="form-check-label" for="hardcompetencia15">Edição de imagens e retoque fotográfico</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia16" name="hardcompetencia[]"
      value="Experiência com softwares ou equipamentos específicos da área de atuação" />
    <label class="form-check-label" for="hardcompetencia16">Experiência com softwares ou equipamentos específicos
      da área de atuação</label>
  </div>

  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia17" name="hardcompetencia[]"
      value="Conhecimento especializado em áreas específicas (exemplo: programação, contabilidade)" />
    <label class="form-check-label" for="hardcompetencia17">Conhecimento especializado em áreas específicas
      (exemplo: programação, contabilidade)</label>
  </div>
  
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia18" name="hardcompetencia[]"
      value="Capacidade de resolver problemas técnicos e propor soluções inovadoras" />
    <label class="form-check-label" for="hardcompetencia18">Capacidade de resolver problemas técnicos e propor
      soluções inovadoras</label>
  </div>
  <div class="form-check-competencias">
    <input type="checkbox" class="form-check-input" id="hardcompetencia19" name="hardcompetencia[]"
      value="Atualização constante em relação às novas tecnologias e tendências da área" />
    <label class="form-check-label" for="hardcompetencia19">Atualização constante em relação às novas tecnologias
      e tendências da área</label>
  </div>
</div>
        <p class="form-label-top questions-titles" > Selecione até 5 atividades com as quais você prefere trabalhar</p>
        <div class="competencias">
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp1" name="atividadesp[]"
              value="Atendimento ao público externo/intero" />
            <label class="form-check-label d-block mt-2" for="atividadesp1">Atendimento ao público externo e interno</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp2" name="atividadesp[]"
              value="trabalho com recursos tecnológicos, digitais, virtuais" />
            <label class="form-check-label d-block mt-2" for="atividadesp2">Trabalho com recursos tecnológicos, digitais, virtuais</label>
          </div>
      
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp4" name="atividadesp[]"
              value="Atividades Administrativas" />
            <label class="form-check-label d-block mt-2" for="atividadesp4">Atividades Administrativas</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp5" name="atividadesp[]"
              value="Orientação de equipes de trabalho" />
            <label class="fform-check-label d-block mt-2" for="atividadesp5">Orientação de equipes de trabalho</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp6" name="atividadesp[]"
              value="Análise de números" />
            <label class="form-check-label d-block mt-2" for="atividadesp6">Análise de números</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp7" name="atividadesp[]"
              value="dados estatísticos ou financeiros" />
            <label class="form-check-label d-block mt-2" for="atividadesp7">Dados estatísticos e/ou financeiros</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp8" name="atividadesp[]"
              value="Elaboração de documentos" />
            <label class="form-check-label d-block mt-2" for="atividadesp8">Elaboração de documentos</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp9" name="atividadesp[]"
              value="projetos e relatórios" />
            <label class="form-check-label d-block mt-2" for="atividadesp9">Projetos e relatórios</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp10" name="atividadesp[]"
              value="Tarefas rotineiras" />
            <label class="form-check-label d-block mt-2" for="atividadesp10">Tarefas rotineiras</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp11" name="atividadesp[]"
              value="Simplificadas" />
            <label class="form-check-label d-block mt-2" for="atividadesp11">Simplificadas</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp12" name="atividadesp[]"
              value="Com poucas mudanças" />
            <label class="form-check-label d-block mt-2" for="atividadesp12">Com poucas mudanças</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp13" name="atividadesp[]"
              value="Atividades desafiadoras e complexas" />
            <label class="form-check-label d-block mt-2" for="atividadesp13">Atividades desafiadoras e complexas</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp14" name="atividadesp[]"
              value="Com muitas variáveis" />
            <label class="form-check-label d-block mt-2" for="atividadesp14">Com muitas variáveis</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp15" name="atividadesp[]"
              value="Acompanhamento e cumprimento de prazos e metas" />
            <label class="form-check-label d-block mt-2" for="atividadesp15">Acompanhamento e cumprimento de prazos e metas</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp16" name="atividadesp[]"
              value="Trabalho com grupos (oficinas, palestras, orientações)" />
            <label class="form-check-label d-block mt-2" for="atividadesp16">Trabalho com grupos (oficinas, palestras, orientações)</label>
          </div>
  
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp3" name="atividadesp[]"
              value="Confecção de despachos, pareceres e decisões relacionados às atividades de assessoria jurídica" />
            <label class="form-check-label d-block mt-2" for="atividadesp3">Confecção de despachos, pareceres e decisões relacionados às atividades de assessoria jurídica</label>
          </div>

                          
  </div>
        
        
        </div> <!--AQUI ACABA A PÁGINA 2-->


        <div class="form-page" id="page-3">
        <div class="note note-info mb-3" style="margin-top: 10px;">
  <strong>Info:</strong> Nesta seção, o convidamos a analisar as afirmações abaixo e responder com qual frequência você pratica estas afirmações durante o 
  desenvolvimento de suas atividades profissionais na SEAD. Por favor, avalie cada um desses comportamentos observáveis de acordo com a escala abaixo e forneça uma
   autoavaliação honesta de sua atuação em cada uma das perguntas.
   Para lhe apoiar no processo, iremos utilizar a escala a seguir, selecione a opção de acordo com o número: 
<h6 class="fw-normal" style="margin-top:10px; background-color:#F24607; "><b> 1. Raramente acontece: </b> Eu consigo observar este comportamento raramente ou ocorre apenas em situações excepcionais.</h6>
<h6 class="fw-normal" style="background-color:#EAF205; "> <b> 2. Acontece ocasionalmente: </b> Eu consigo observar este  comportamento ocasionalmente, mas não de forma consistente.</h6>
<h6 class="fw-normal" style="background-color:#49D907;"><b> 3. Acontece com frequência: </b> Eu consigo observar este comportamento regularmente, ocorrendo em muitas situações.</h6>
<h6 class="fw-normal" style="background-color: #0597F2;"> <b> 4. Acontece consistentemente: </b> Eu consigo observar este comportamento de forma constante e proeminente, sendo observado em praticamente todas as situações.</h6>
</div>

<p class="form-label-top questions-titles" >Mentalidade inclusiva</p>

<p class="fw-normal" style="margin:0;"> Eu demonstro interesse genuíno pelas necessidades, preocupações e perspectivas da minha equipe e das pessoas que se relacionam comigo </p>             
             <div class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup"cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="interesse" value="01" title="1"
                    id="input_interesse_1" />
                  <label for="input_interesse_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="interesse" value="02" title="2"
                    id="input_interesse_2" />
                  <label for="input_interesse_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion"  name="interesse" value="03" title="3"
                    id="input_interesse_3" />
                  <label for="input_interesse_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="interesse" value="04" title="4"
                    id="input_interesse_4" />
                  <label for="input_interesse_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;"> Eu valorizo a importância da empatia, da escuta ativa e da compreensão mútua para construir relacionamentos sólidos e de confiança.</p>             
             <div class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" cellpadding="4" cellspacing="0" class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion"  name="empatia" value="01" title="1" id="input_empatia_1" />
                  <label for="input_empatia_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="empatia" value="02" title="2" id="input_empatia_2" />
                  <label for="input_empatia_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="empatia" value="03" title="3" id="input_empatia_3" />
                  <label for="input_empatia_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="empatia" value="04" title="4" id="input_empatia_4" />
                  <label for="input_empatia_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;"> Eu promovo a participação de todos os membros da equipe, garantindo que suas vozes sejam ouvidas e suas contribuições sejam valorizadas.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="participacao" value="01" title="1"
                    id="input_participacao_1" />
                  <label for="input_participacao_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="participacao" value="02" title="2"
                    id="input_participacao_2" />
                  <label for="input_participacao_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="participacao" value="03" title="3"
                    id="input_participacao_3" />
                  <label for="input_participacao_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="participacao" value="04" title="4"
                    id="input_participacao_4" />
                  <label for="input_participacao_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;"> Eu atuo como um agente de sensibilização e educação sobre inclusão, compartilhando conhecimentos e informações sobre 
             a importância da inclusão, promovendo a conscientização e o entendimento entre os meus colegas de trabalho e a comunidade em geral.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="inclusao" value="01" title="1"
                    id="input_inclusao_1" />
                  <label for="input_inclusao_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="inclusao" value="02" title="2"
                    id="input_inclusao_2" />
                  <label for="input_inclusao_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="inclusao" value="03" title="3"
                    id="input_inclusao_3" />
                  <label for="input_inclusao_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="inclusao" value="04" title="4"
                    id="input_inclusao_4" />
                  <label for="input_inclusao_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="form-label-top questions-titles" >Liderança e Gestão de Pessoas</p>
             <p class="fw-normal" style="margin:0;"> Eu demonstro um profundo conhecimento e domínio da área em que atuo,
              mantendo-me atualizado com as melhores práticas, tendências e regulamentações relacionadas ao meu campo de atuação, o que me permite tomar decisões informadas e estratégicas. </p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conhecimento" value="01" title="1"
                    id="input_conhecimento_1" />
                  <label for="input_conhecimento_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conhecimento" value="02" title="2"
                    id="input_conhecimento_2" />
                  <label for="input_conhecimento_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conhecimento" value="03" title="3"
                    id="input_conhecimento_3" />
                  <label for="input_conhecimento_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conhecimento" value="04" title="4"
                    id="input_conhecimento_4" />
                  <label for="input_conhecimento_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu crio um ambiente seguro e acolhedor, onde todos se sintam confortáveis para expressar suas opiniões e ideias,
              independentemente de sua posição hierárquica. </p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ambienteseguro" value="01" title="1"
                    id="input_ambienteseguro_1" />
                  <label for="input_ambienteseguro_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ambienteseguro" value="02" title="2"
                    id="input_ambienteseguro_2" />
                  <label for="input_ambienteseguro_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ambienteseguro" value="03" title="3"
                    id="input_ambienteseguro_3" />
                  <label for="input_ambienteseguro_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ambienteseguro" value="04" title="4"
                    id="input_ambienteseguro_4" />
                  <label for="input_ambienteseguro_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu transmito claramente as metas, expectativas e direcionamentos para a minha equipe,
              garantindo que todos entendam seu papel e contribuição para o atingimento das demandas. </p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="direcionamento" value="01" title="1"
                    id="input_direcionamento_1" />
                  <label for="input_direcionamento_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="direcionamento" value="02" title="2"
                    id="input_direcionamento_2" />
                  <label for="input_direcionamento_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="direcionamento" value="03" title="3"
                    id="input_direcionamento_3" />
                  <label for="input_direcionamento_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="direcionamento" value="04" title="4"
                    id="input_direcionamento_4" />
                  <label for="input_direcionamento_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;"> Eu me envolvo ativamente no trabalho em equipe, demonstrando comprometimento e dedicação e disposição em assumir responsabilidades,
              apoiando minha equipe em momentos de desafio desenvolvendo soluções conjuntas com os membros da equipe </p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="trabalhoemequipe" value="01" title="1"
                    id="input_trabalhoemequipe_1" />
                  <label for="input_trabalhoemequipe_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="trabalhoemequipe" value="02" title="2"
                    id="input_trabalhoemequipe_2" />
                  <label for="input_trabalhoemequipe_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="trabalhoemequipe" value="03" title="3"
                    id="input_trabalhoemequipe_3" />
                  <label for="input_trabalhoemequipe_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="trabalhoemequipe" value="04" title="4"
                    id="input_trabalhoemequipe_4" />
                  <label for="input_trabalhoemequipe_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="form-label-top questions-titles" >Inteligência emocional </p>
             <p class="fw-normal" style="margin:0;">Eu reconheço e compreendo minhas próprias emoções, identificando os 
             gatilhos que podem afetar meu equilíbrio emocional e tomo medidas para gerenciá-las de forma saudável e construtiva.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="emocoes" value="01" title="1"
                    id="input_emocoes_1" />
                  <label for="input_emocoes_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="emocoes" value="02" title="2"
                    id="input_emocoes_2" />
                  <label for="input_emocoes_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" class="form-radio selectquestion" name="emocoes" value="03" title="3"
                    id="input_emocoes_3" />
                  <label for="input_emocoes_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" class="form-radio selectquestion" name="emocoes" value="04" title="4"
                    id="input_emocoes_4" />
                  <label for="input_emocoes_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;"> Eu controlo minhas emoções, mesmo em condições adversas e situações de pressão, comunicando-me de
              forma clara e eficaz, expressando minhas emoções de maneira adequada e construtiva. </p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio"class="form-radio selectquestion" name="controle" value="01" title="1"
                    id="input_controle_1" />
                  <label for="input_controle_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio" name="controle" value="02" title="2"
                    id="input_controle_2" />
                  <label for="input_controle_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="controle" value="03" title="3"
                    id="input_controle_3" />
                  <label for="input_controle_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="controle" value="04" title="4"
                    id="input_controle_4" />
                  <label for="input_controle_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;"> Eu compreendo e reconheço as emoções dos outros, colocando-me no lugar deles e mostrando compreensão e apoio, 
             visando criar um ambiente de trabalho acolhedor e respeitoso.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="reconhecimento" value="01" title="1"
                    id="input_reconhecimento_1" />
                  <label for="input_reconhecimento_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="reconhecimento" value="02" title="2"
                    id="input_reconhecimento_2" />
                  <label for="input_reconhecimento_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="reconhecimento" value="03" title="3"
                    id="input_reconhecimento_3" />
                  <label for="input_reconhecimento_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="reconhecimento" value="04" title="4"
                    id="input_reconhecimento_4" />
                  <label for="input_reconhecimento_4">4</label>
                </div>
              </div>
            </div>
             </div>
             
             <p class="fw-normal" style="margin:0;">Eu lido com conflitos de forma saudável, buscando soluções colaborativas e mantendo 
             relacionamentos positivos e produtivos com minha equipe e com as pessoas atendidas.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conflitos" value="01" title="1"
                    id="input_conflitos_1" />
                  <label for="input_conflitos_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conflitos" value="02" title="2"
                    id="input_conflitos_2" />
                  <label for="input_conflitos_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conflitos" value="03" title="3"
                    id="input_conflitos_3" />
                  <label for="input_conflitos_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="conflitos" value="04" title="4"
                    id="input_conflitos_4" />
                  <label for="input_conflitos_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="form-label-top questions-titles" >Orientação para Resultados </p>
             <p class="fw-normal" style="margin:0;">Eu defino metas claras e mensuráveis, alinhadas com os objetivos da Secretaria e do Estado, e direciono meus esforços para atingir esses resultados.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metasclaras" value="01" title="1"
                    id="input_metasclaras_1" />
                  <label for="input_metasclaras_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metasclaras" value="02" title="2"
                    id="input_metasclaras_2" />
                  <label for="input_metasclaras_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metasclaras" value="03" title="3"
                    id="input_metasclaras_3" />
                  <label for="input_metasclaras_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metasclaras" value="04" title="4"
                    id="input_metasclaras_4" />
                  <label for="input_metasclaras_4">4</label>
                </div>
              </div>
            </div>
             </div>

             <p class="fw-normal" style="margin:0;">Eu estabeleço prioridades, defino prazos e aloco recursos de maneira adequada para garantir que as tarefas 
             sejam concluídas dentro do prazo e com qualidade, utilizando ferramentas e técnicas de gestão para acompanhar o progresso e fazer ajustes quando necessário.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="prioridades" value="01" title="1"
                    id="input_prioridades_1" />
                  <label for="input_prioridades_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="prioridades" value="02" title="2"
                    id="input_prioridades_2" />
                  <label for="input_prioridades_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="prioridades" value="03" title="3"
                    id="input_prioridades_3" />
                  <label for="input_prioridades_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="prioridades" value="04" title="4"
                    id="input_prioridades_4" />
                  <label for="input_prioridades_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu analiso as opções disponíveis, considerando os impactos e as consequências de cada escolha, 
             e escolho a melhor abordagem para alcançar os resultados desejados.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="impactos" value="01" title="1"
                    id="input_impactos_1" />
                  <label for="input_impactos_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="impactos" value="02" title="2"
                    id="input_impactos_2" />
                  <label for="input_impactos_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="impactos" value="03" title="3"
                    id="input_impactos_3" />
                  <label for="input_impactos_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="impactos" value="04" title="4"
                    id="input_impactos_4" />
                  <label for="input_impactos_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu aprendo com os sucessos e fracassos, buscando constantemente melhorar meu desempenho e maximizar os resultados obtidos.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="sucessos" value="01" title="1"
                    id="input_sucessos_1" />
                  <label for="input_sucessos_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="sucessos" value="02" title="2"
                    id="input_sucessos_2" />
                  <label for="input_sucessos_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="sucessos" value="03" title="3"
                    id="input_sucessos_3" />
                  <label for="input_sucessos_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="sucessos" value="04" title="4"
                    id="input_sucessos_4" />
                  <label for="input_sucessos_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="form-label-top questions-titles" >Pensamento criativo </p>
             <p class="fw-normal " style="margin:0;">Eu procuro ativamente novos métodos e soluções para resolver problemas e melhorar processos, demonstrando uma abordagem criativa e fora da caixa.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metodos" value="01" title="1"
                    id="input_metodos_1" />
                  <label for="input_metodos_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metodos" value="02" title="2"
                    id="input_metodos_2" />
                  <label for="input_metodos_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metodos" value="03" title="3"
                    id="input_metodos_3" />
                  <label for="input_metodos_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="metodos" value="04" title="4"
                    id="input_metodos_4" />
                  <label for="input_metodos_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu demonstro interesse em explorar a experiência de outros setores, áreas e órgãos, buscando aprender com 
             suas práticas e experiências e aplicar esse conhecimento de forma inovadora em meu próprio trabalho.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="explorar" value="01" title="1"
                    id="input_explorar_1" />
                  <label for="input_explorar_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="explorar" value="02" title="2"
                    id="input_explorar_2" />
                  <label for="input_explorar_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="explorar" value="03" title="3"
                    id="input_explorar_3" />
                  <label for="input_explorar_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="explorar" value="04" title="4"
                    id="input_explorar_4" />
                  <label for="input_explorar_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu demonstro disposição para experimentar e testar novas ideias, mesmo que isso envolva riscos e incertezas,
              e estou aberto a desafiar o status quo e questionar práticas existentes em busca de melhorias.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ideias" value="01" title="1"
                    id="input_ideias_1" />
                  <label for="input_ideias_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ideias" value="02" title="2"
                    id="input_ideias_2" />
                  <label for="input_ideias_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ideias" value="03" title="3"
                    id="input_ideias_3" />
                  <label for="input_ideias_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ideias" value="04" title="4"
                    id="input_ideias_4" />
                  <label for="input_ideias_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu colaboro de forma aberta e receptiva com outros membros da equipe, valorizando diferentes pontos de vista, ideias e perspectivas</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="colaboracao" value="01" title="1"
                    id="input_colaboracao_1" />
                  <label for="input_colaboracao_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="colaboracao" value="02" title="2"
                    id="input_colaboracao_2" />
                  <label for="input_colaboracao_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="colaboracao" value="03" title="3"
                    id="input_colaboracao_3" />
                  <label for="input_colaboracao_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="colaboracao" value="04" title="4"
                    id="input_colaboracao_4" />
                  <label for="input_colaboracao_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="form-label-top questions-titles" >Articulação </p>
             <p class="fw-normal" style="margin:0;">Eu tomo a iniciativa de conversar com outros setores para construir entendimentos e engajar em torno de agendas comuns.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="receptiva" value="01" title="1"
                    id="input_receptiva_1" />
                  <label for="input_receptiva_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="receptiva" value="02" title="2"
                    id="input_receptiva_2" />
                  <label for="input_receptiva_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="receptiva" value="03" title="3"
                    id="input_receptiva_3" />
                  <label for="input_receptiva_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="receptiva" value="04" title="4"
                    id="input_receptiva_4" />
                  <label for="input_receptiva_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu crio relações de confiança e abertas, nas quais os atores se sentem seguros em expressar 
             sua opinião e realizar diálogos na busca do entendimento e consenso.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="confianca" value="01" title="1"
                    id="input_confianca_1" />
                  <label for="input_confianca_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="confianca" value="02" title="2"
                    id="input_confianca_2" />
                  <label for="input_confianca_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="confianca" value="03" title="3"
                    id="input_confianca_3" />
                  <label for="input_confianca_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="confianca" value="04" title="4"
                    id="input_confianca_4" />
                  <label for="input_confianca_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu dedico tempo para alinhar ações de diálogo e construção de consenso em torno das agendas comuns.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="dialogo" value="01" title="1"
                    id="input_dialogo_1" />
                  <label for="input_dialogo_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="dialogo" value="02" title="2"
                    id="input_dialogo_2" />
                  <label for="input_dialogo_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="dialogo" value="03" title="3"
                    id="input_dialogo_3" />
                  <label for="input_dialogo_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="dialogo" value="04" title="4"
                    id="input_dialogo_4" />
                  <label for="input_dialogo_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu estabeleço parcerias estratégicas com outros setores, fortalecendo 
             as relações e promovendo a colaboração em projetos e iniciativas conjuntas para resultados mais efetivos. </p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="parcerias" value="01" title="1"
                    id="input_parcerias_1" />
                  <label for="input_parcerias_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="parcerias" value="02" title="2"
                    id="input_parcerias_2" />
                  <label for="input_parcerias_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="parcerias" value="03" title="3"
                    id="input_parcerias_3" />
                  <label for="input_parcerias_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="parcerias" value="04" title="4"
                    id="input_parcerias_4" />
                  <label for="input_parcerias_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="form-label-top questions-titles" >Fluência Digital</p>
             <p class="fw-normal" style="margin:0;">Eu demonstro disposição para adotar e utilizar novas tecnologias em meu trabalho diário, 
             mantendo-me atualizado sobre as últimas tendências digitais.</p>             
             <div id="cid_habnat" class="form-input-wide text-center " data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="disposicao" value="01" title="1"
                    id="input_disposicao_1" />
                  <label for="input_disposicao_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="disposicao" value="02" title="2"
                    id="input_disposicao_2" />
                  <label for="input_disposicao_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="disposicao" value="03" title="3"
                    id="input_disposicao_3" />
                  <label for="input_disposicao_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="disposicao" value="04" title="4"
                    id="input_disposicao_4" />
                  <label for="input_disposicao_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu reconheço e aproveito as possibilidades oferecidas pela tecnologia para impulsionar o progresso
              e a transformação em minha área de atuação.</p>             
             <div class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="possibilidades" value="01" title="1"
                    id="input_possibilidades_1" />
                  <label for="input_possibilidades_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="possibilidades" value="02" title="2"
                    id="input_possibilidades_2" />
                  <label for="input_possibilidades_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="possibilidades" value="03" title="3"
                    id="input_possibilidades_3" />
                  <label for="input_possibilidades_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="possibilidades" value="04" title="4"
                    id="input_possibilidades_4" />
                  <label for="input_possibilidades_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu utilizo ferramentas digitais de análise de dados para coletar informações relevantes, 
             interpretar resultados e tomar ações com base neles.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" cellpadding="4" cellspacing="0" class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ferramentas" value="01" title="1"
                    id="input_ferramentas_1" />
                  <label for="input_ferramentas_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ferramentas" value="02" title="2"
                    id="input_ferramentas_2" />
                  <label for="input_ferramentas_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ferramentas" value="03" title="3"
                    id="input_ferramentas_3" />
                  <label for="input_ferramentas_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="ferramentas" value="04" title="4"
                    id="input_ferramentas_4" />
                  <label for="input_ferramentas_4">4</label>
                </div>
              </div>
            </div>
             </div>
             <p class="fw-normal" style="margin:0;">Eu exploro e experimento novas ferramentas digitais que possam melhorar a eficiência e eficácia de minhas tarefas e processos.</p>             
             <div id="cid_habnat" class="form-input-wide text-center" data-layout="full" style= "margin:0"; >
            <div role="radiogroup" cellpadding="4" cellspacing="0"
              class="form-scale-table" data-component="scale" style="white-space: nowrap;">
              <div class="rating-item-group">
                <div class="rating-item">
                  <span class="rating-item-title for-from"></span>
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion " name="eficiencia" value="01" title="1"
                    id="input_eficiencia_1" />
                  <label for="input_eficiencia_1">1</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="eficiencia" value="02" title="2"
                    id="input_eficiencia_2" />
                  <label for="input_eficiencia_2">2</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="eficiencia" value="03" title="3"
                    id="input_eficiencia_3" />
                  <label for="input_eficiencia_3">3</label>
                </div>
                <div class="rating-item">
                  <input type="radio" aria-describedby="label_7" class="form-radio selectquestion" name="eficiencia" value="04" title="4"
                    id="input_eficiencia_4" />
                  <label for="input_eficiencia_4">4</label>
                </div>
              </div>
            </div>
             </div>
                                <p class="form-label-top questions-titles" style="font-size: large;">
                                    Agradecemos sinceramente por participar da nossa pesquisa. Este espaço é reservado para suas críticas e sugestões de melhoria.
                                    Queremos ouvir o que você pensa e como podemos fazer melhor. Sua opinião é extremamente valiosa para nós, pois nos ajuda a aprimorar continuamente nossos serviços e processos.
                                </p>
                                <div class="mb-3">
                                    <textarea class="form-control" id="suggestion" name="suggestion" rows="3" style="resize: none; width: 98%; margin-left: 5px; padding: 10px;"></textarea>
                                </div>
                            </div> <!--AQUI ACABA A PÁGINA 3-->

                            <div class="d-flex justify-content-between">
                                <button type="button" class="btn btn-outline-primary btn-rounded" id="prev-button" data-mdb-ripple-color="dark">Anterior</button>
                                <button type="button" class="btn btn-outline-primary btn-rounded" id="next-button" data-mdb-ripple-color="dark">Próximo</button>
                                <button class="submit" id="submit" name="submit" style="display: none;">ENVIAR</button>
                            </div>
                        </div> <!--aqui acaba o form-container !! -->
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script type="text/javascript" src="./Form/js/mdb.min.js"></script>
    <script src="./Form/js/form.js"></script>
</body>
  <?php
if (isset($errorScript)) {
    echo "<script>$errorScript</script>";
}
?>
</html>
