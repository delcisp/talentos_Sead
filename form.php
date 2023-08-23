<?php
if (isset($_POST['submit'])) {
  // Verifica se todas as perguntas foram respondidas
  $allAnswered = true;
  $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";

  $cargoSelecionado = $_POST["role"];
  $formacaoSelecionada = $_POST["firstquestion"];
  $departamentoSelecionado = $_POST["departament"];
  if ($departamentoSelecionado == "Selecione" || empty($departamentoSelecionado) || $cargoSelecionado == "Selecione" || empty($cargoSelecionado) || $formacaoSelecionada == "Selecione" || empty($formacaoSelecionada) || empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["ratingq"]) || empty($_POST["ratingq2"]) || empty($_POST["thirdquestion"]) || count($_POST["competencia"]) == 0 || count($_POST["hardcompetencia"]) == 0) {
    $allAnswered = false;
    $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";
  }

  if ($allAnswered) {
    include_once('config.php');
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $departament = $_POST['departament'];
    $role = $_POST['role'];
    $firstquestion = $_POST['firstquestion'];
    $ratingq = $_POST['ratingq'];
    $ratingq2 = $_POST['ratingq2'];
    $secondquestion = $_POST['secondquestion'];
    $thirdquestion = $_POST['thirdquestion'];
    $justification = $_POST['justification'];
    $birthdate = $_POST['birthdate'];
    $telefone = $_POST['telefone'];

    $competenciaSelecionada = isset($_POST['competencia']) ? $_POST['competencia'] : [];
    $competenciaString = implode(", ", $competenciaSelecionada);

    $competenciaHardSelecionada = isset($_POST['hardcompetencia']) ? $_POST['hardcompetencia'] : [];
    $competenciaHardString = implode("/", $competenciaHardSelecionada);

    $birthdate = $_POST['birthdate'];
    // Converta o formato da data para "XXXX-XX-XX"
    $birthdate = str_replace('/', '-', $birthdate);
    $birthdate = date('Y-m-d', strtotime($birthdate));
    
    $telefone_limpo = preg_replace("/[^0-9]/", "", $telefone);
     
    $query = "INSERT INTO usuarios (firstname, lastname, departament, role, firstquestion, ratingq, ratingq2, secondquestion, thirdquestion, competencia, hardcompetencia, justification, birthdate, telefone) VALUES
    ('$firstname', '$lastname', '$departament', '$role', '$firstquestion', '$ratingq', '$ratingq2', '$secondquestion', '$thirdquestion', '$competenciaString', '$competenciaHardString', '$justification', '$birthdate', '$telefone_limpo')";

    $result = mysqli_query($conn, $query);

    $redirectURL = 'agradecimento.php?firstname=' . urlencode($firstname);
    header('Location: ' . $redirectURL);
    exit;
  } else {
    echo "<script>alert('$errorMsg');</script>";
  }
}
?>
<!DOCTYPE html>
<html>

<head>
  <html lang="pt-br">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
  <script src="https://code.jquery.com/jquery-3.0.0.min.js"></script> <!-- bilioteca p autocomplete de endereço -->
  <script src="https://code.jquery.com/jquery-3.6.1.min.js"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.0/themes/base/jquery-ui.css" />
  <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
  <script src="http://code.jquery.com/ui/1.9.0/jquery-ui.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
 
  <link type="text/css" rel="stylesheet"
    href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.42507" />
  <link type="text/css" rel="stylesheet"
    href="https://cdn02.jotfor.ms/css/styles/payment/payment_styles.css?3.3.42507" />
  <link type="text/css" rel="stylesheet"
    href="https://cdn03.jotfor.ms/css/styles/payment/payment_feature.css?3.3.42507" />
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"> </script> <!-- biblioteca p mask de input -->
  <link rel="stylesheet" href="./Form/form.css">
  <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
  <script src="./Form/pagination.js" defer></script>
  
</head>

<body>
<form id="pagination-form" action="form.php" method="POST" novalidate>
    <div class="form-container">
    <div class="form-page" id="page-1">
      <div class="form-line-container">
      <li class="form-line form-line-column form-col-1 form-line-column-left" data-type="control_fullname" id="id_1">
  <label class="form-label form-label-top" id="name" name="name" for="firstname">Nome</label>
  <div id="cid_1" class="form-input-wide" data-layout="full">
    <div data-wrapper-react="true">
      <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
        <input type="text" id="firstname" name="firstname" class="form-textbox"
          value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>"
          required>
        <label class="form-sub-label" for="firstname" id="sublabel_1_first" style="min-height:13px"
          aria-hidden="false">Primeiro nome</label>
      </span>
      <span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
        <input type="text" id="lastname" name="lastname" class="form-textbox" data-defaultvalue=""
          autoComplete="section-input_1 family-name" size="" data-component="last"
          value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>"
          required>
        <label class="form-sub-label" for="lastname" id="sublabel_1_last" style="min-height:13px"
          aria-hidden="false">Último nome</label>
      </span>
    </div>
  </div>
</li>
        <li class="form-line form-line-column form-line-column-right form-line-container" data-type="control_dropdown"
          id="id_data">
          <label class="form-label form-label-top form-label-data " id="birdhdate" for="data"> Data de Nascimento</label>
          <input type="text" id="data" name="birthdate" class="form-textbox form-date" data-component="date">
        </li>
        <li class="form-line form-line-column form-line-container" data-type="control_dropdown"
          id="id_data">
          <form action="#" onsubmit="return false">
          <label class="form-label form-label-top" for="cep" > CEP</label>
          <input type="text" id="cep" maxlength="9" placeholder="Digite o CEP para preencher o endereço" name="cep" class="form-textbox" data-component="cep" autofocus>
        </li>
        <li class="form-line form-line-column form-line-container form-line-column-right-two" data-type="control_dropdown"
          id="id_data">
          <label class="form-label form-label-top form-label-data " for="uf"> UF</label>
          <input type="text" id="uf" name="uf" class="form-textbox" data-component="uf">
        </li>
        <li class="form-line form-line-column  form-line-container" data-type="control_dropdown"
          id="id_cidade">
          <label class="form-label form-label-top form-label-data" id="label_cidade" for="cidade">Cidade</label>
          <input type="text" id="cidade" name="cidade" class="form-textbox" data-component="cidade">
        </li>
        <li class="form-line form-line-column form-line-container form-line-column-right-three" data-type="control_dropdown"
          id="id_bairro">
          <label class="form-label form-label-top form-label-data " id="label_bairro" for="bairro" >Bairro</label>
          <input type="text" id="bairro" name="bairro" class="form-textbox" data-component="bairro">
        </li>
        <li class="form-line form-line-column form-line-container" data-type="control_dropdown"
          id="id_endereco">
          <label class="form-label form-label-top  " id="label_endereco" for="endereco" >Endereço</label>
          <input type="text" id="endereco" name="endereco" class="form-textbox" data-component="endereco">
        </li>
      
        <li class="form-line form-line-column form-line-column-right-four" data-type="control_dropdown" id="id_2">
          <label class="form-label form-label-top" for="telefone">Telefone</label>
          <div id="cid_2" class="form-input-wide" data-layout="half">
            <input type="text" id="telefone" name="telefone" class="form-textbox">
          </div>
        </li>
        <li class="form-line form-line-column form-col-2 form-line-column-left" data-type="control_dropdown" id="id_3">
          <label class="form-label form-label-top" id="cargo" for="input_3"> Cargo atual </label>
          <div id="cid_3" class="form-input-wide" data-layout="half">
            <select class="form-dropdown" id="input_3" name="role" aria-label="Role">
              <option value="Selecione">Selecione</option>
              <option>AAA</option>
            </select>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2 form-line-column-right-five" data-type="control_dropdown"
    id="department_section">
  <label class="form-label form-label-top" for="input_departament">Departamento</label>
  <div id="department_container" class="form-input-wide" data-layout="half">
    <select class="form-dropdown" id="input_departament" name="department" aria-label="Department">
      <option>Selecione</option>
      <option>AAA</option>
    </select>
  </div>
</li>
 
        <li class="form-line form-line-column " data-type="control_dropdown" id="id_4">
          <label class="form-label form-label-top" id="firstquestion" for="input_4">Qual o seu grau de escolaridade?</label>
          <div id="cid_4" class="form-input-wide" data-layout="half">
            <select class="form-dropdown" id="input_4" name="firstquestion" aria-label="Firsquestion"
              onchange="mostrarCampoPersonalizado(this)">
              <option>Selecione</option>
              <option>AAA</option>
            </select>
          </div>
          <div id="campoPersonalizado" style="display: none;">
            <label for="textoPersonalizado">Digite sua opção:</label>
            <input type="text" id="textoPersonalizado" name="textoPersonalizado"
              onblur="atualizarOpcaoPersonalizada(this.value)">
          </div>
        </li>
        <li class="form-line form-line-column form-col-2 form-line-column-right-six" data-type="control_dropdown"
    id="id_2">
  <label class="form-label form-label-top" id="bloodtype_label" for="input_2">Qual o seu tipo sanguíneo?</label>
  <div id="cid_2" class="form-input-wide" data-layout="half">
    <select class="form-dropdown" id="input_2" name="bloodtype" aria-label="bloodtype">
      <option>Selecione</option>
      <option>A+</option>
      <option>B+</option>
      <option>AB+</option>
      <option>O+</option>
      <option>A-</option>
      <option>B-</option>
      <option>AB-</option>
      <option>O-</option>
    </select>
  </div>
</li>

        
     
      </div>
      
</div> <!-- fechando a pagina 1 -->

<div class="form-page" id="page-2" style="display: none;">   


<label class="form-label form-label-top form-label-config">Qual a sua cor ou raça?</label>
<div class="checkbox-wrapper-18">
  <label for="checkbox-amarela">
    <div class="round">
    <input type="checkbox" id="checkbox-amarela" />
      <span class="checkbox-text">Amarela</span>
    </div>
<div class="round">
  <input type="checkbox" id="checkbox-branco" />
  <label for="checkbox-branco">
    <span class="checkbox-text">Branco</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-indigena" />
  <label for="checkbox-indigena">
    <span class="checkbox-text">Indígena</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-pardo" />
  <label for="checkbox-pardo">
    <span class="checkbox-text">Pardo</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-preta" />
  <label for="checkbox-preta">
    <span class="checkbox-text">Preta</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-nao-classificar" />
  <label for="checkbox-nao-classificar">
    <span class="checkbox-text">Prefiro não me classificar</span>
  </label>
</div>
      </div>
      <label class="form-label form-label-top form-label-config">Qual a sua identidade de gênero?</label>
<div class="checkbox-wrapper-18">
<div class="round">
  <input type="checkbox" id="checkbox-mulhercis" />
  <label for="checkbox-mulhercis">
    <span class="checkbox-text">Mulher cisgênera (se identifica com o gênero que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-homemcis" />
  <label for="checkbox-homemcis">
    <span class="checkbox-text">Homem cisgênero (se identifica com o gênero que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-mulhertrans" />
  <label for="checkbox-mulhertrans">
    <span class="checkbox-text">Mulher trans (se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-homemtrans" />
  <label for="checkbox-homemtrans">
    <span class="checkbox-text">(Homem Trans se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-naobinario" />
  <label for="checkbox-naobinario">
    <span class="checkbox-text">Não binário (não se sente pertencente ao gênero masculino ou ao feminino)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-nao-classificar2" />
  <label for="checkbox-nao-classificar2">
    <span class="checkbox-text">Prefiro não me classificar</span>
  </label>
</div>
      </div>
      <label class="form-label form-label-top form-label-config">Você é doador de órgãos?</label>
<div class="checkbox-wrapper-18">
<div class="round">
  <input type="checkbox" id="checkbox-sim" />
  <label for="checkbox-sim">
    <span class="checkbox-text">Sim</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-nao" />
  <label for="checkbox-nao">
    <span class="checkbox-text">Não</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-naodecidi" />
  <label for="checkbox-naodecidi">
    <span class="checkbox-text">Ainda não me decidi</span>
  </label>
</div>
      </div>
      <li class="form-line" data-type="control_scale" id="id_7">
        <label class="form-label form-label-top" id="ratingquestion">Quão satisfeito você está com a
          equipe
          que trabalha?</label>
        <div id="cid_7" class="form-input-wide" data-layout="full">
          <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0"
            class="form-scale-table" data-component="scale" style="white-space: nowrap;">
            <div class="rating-item-group">
              <div class="rating-item">
                <span class="rating-item-title for-from"></span>
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="1" title="1"
                  id="input_7_1" />
                <label for="input_7_1">1</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="2" title="2"
                  id="input_7_2" />
                <label for="input_7_2">2</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="3" title="3"
                  id="input_7_3" />
                <label for="input_7_3">3</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="4" title="4"
                  id="input_7_4" />
                <label for="input_7_4">4</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="5" title="5"
                  id="input_7_5" />
                <label for="input_7_5">5</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="6" title="6"
                  id="input_7_6" />
                <label for="input_7_6">6</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="7" title="7"
                  id="input_7_7" />
                <label for="input_7_7">7</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="8" title="8"
                  id="input_7_8" />
                <label for="input_7_8">8</label>
              </div>
              <div class="rating-item">
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="9" title="9"
                  id="input_7_9" />
                <label for="input_7_9">9</label>
              </div>
              <div class="rating-item">
                <span class="rating-item-title for-to"></span>
                <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="10" title="10"
                  id="input_7_10" />
                <label for="input_7_10">10</label>
              </div>
            </div>
          </div>
          </span>
        </div>
      </li>

     
      <li class="form-line" data-type="control_scale" id="ratingquestiontwo">
    <label class="form-label form-label-top form-label-auto" id="label_8">Quão satisfeito você está com as decisões da sua vida?</label>
    <div id="cid_8" class="form-input-wide" data-layout="full">
      <span class="form-sub-label-container" style="vertical-align:top">
        <div role="radiogroup" aria-labelledby="label_8 sublabel_input_8_description" cellpadding="4"
          cellspacing="0" class="form-scale-table" data-component="scale">
          <div class="rating-item-group">
            <div class="rating-item">
              <span class="rating-item-title for-from">
              </span>
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="1" title="1"
                id="input_8_1" />
              <label for="input_8_1">1</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="2" title="2"
                id="input_8_2" />
              <label for="input_8_2">2</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="3" title="3"
                id="input_8_3" />
              <label for="input_8_3">3</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="4" title="4"
                id="input_8_4" />
              <label for="input_8_4">4</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="5" title="5"
                id="input_8_5" />
              <label for="input_8_5">5</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="6" title="6"
                id="input_8_6" />
              <label for="input_8_6">6</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="7" title="7"
                id="input_8_7" />
              <label for="input_8_7">7</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="8" title="8"
                id="input_8_8" />
              <label for="input_8_8">8</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="9" title="9"
                id="input_8_9" />
              <label for="input_8_9">9</label>
            </div>
            <div class="rating-item">
              <span class="rating-item-title for-to">
              </span>
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="10"
                title="10" id="input_8_10" />
              <label for="input_8_10">10</label>
            </div>
          </div>
        </div>
      </span>
    </div>
  </li>

     
      </div> <!-- fechando a pagina 2 -->

      <div class="form-page" id="page-3" style="display: none;">
      <label class="form-label form-label-top form-label-config">Selecione até 5 Competências
        Técnicas que
        você se identifica:</label>
        <div class="competencias">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia1" name="hardcompetencia[]"
            value="Proficiências completa em Word, Excel, PowerPoint e Outlook" />
          <label class="form-check-label" for="hardcompetencia1">Proficiências completa em Word, Excel, PowerPoint e
            Outlook</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia2" name="hardcompetencia[]"
            value="Conhecimento em sistemas operacionais (windows, macOS, Linux)" />
          <label class="form-check-label" for="hardcompetencia2">Conhecimento em sistemas operacionais (windows, macOS,
            Linux)</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia3" name="hardcompetencia[]"
            value="Coleta de dados(pesquisa questionários entrevistas)" />
          <label class="form-check-label" for="hardcompetencia3">Coleta de dados(pesquisa, questionários,
            entrevistas)</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia4" name="hardcompetencia[]"
            value="Análise de dados quantitativos e qualitativos" />
          <label class="form-check-label" for="hardcompetencia4">Análise de dados quantitativos e qualitativos</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia5" name="hardcompetencia[]"
            value="Apresentação de dados de forma clara e atraente (gráficos, tabelas)" />
          <label class="form-check-label" for="hardcompetencia5">Apresentação de dados de forma clara e atraente
            (gráficos, tabelas)</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia6" name="hardcompetencia[]"
            value="Domínio de programas de design gráfico (Adobe Illustrator, Adobe Photoshop, CorelDRAW)" />
          <label class="form-check-label" for="hardcompetencia6">Domínio de programas de design gráfico (Adobe
            Illustrator, Adobe Photoshop, CorelDRAW)</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia7" name="hardcompetencia[]"
            value="Conhecimento de princípios de design (cores, tipografia, composição)" />
          <label class="form-check-label" for="hardcompetencia7">Conhecimento de princípios de design (cores,
            tipografia, composição)</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia8" name="hardcompetencia[]"
            value="Criação de conteúdo para mídias sociais (imagens, vídeos, infográficos)" />
          <label class="form-check-label" for="hardcompetencia8">Criação de conteúdo para mídias sociais (imagens,
            vídeos, infográficos)</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia9" name="hardcompetencia[]"
            value="Escrita clara concisa e gramaticalmente correta" />
          <label class="form-check-label" for="hardcompetencia9">Escrita clara, concisa e gramaticalmente
            correta</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia10" name="hardcompetencia[]"
            value="Habilidade em redação acadêmica, jornalística ou técnica" />
          <label class="form-check-label" for="hardcompetencia10">Habilidade em redação acadêmica, jornalística ou
            técnica</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia11" name="hardcompetencia[]"
            value="Vocabulário variado e adequado ao contexto" />
          <label class="form-check-label" for="hardcompetencia11">Vocabulário variado e adequado ao contexto</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia12" name="hardcompetencia[]"
            value="Proficiência em línguas estrangeiras" />
          <label class="form-check-label" for="hardcompetencia12">Proficiência em línguas estrangeiras</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia13" name="hardcompetencia[]"
            value="Capacidade de comunicação escrita e verbal em diferentes idiomas" />
          <label class="form-check-label" for="hardcompetencia13">Capacidade de comunicação escrita e verbal em
            diferentes idiomas</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia14" name="hardcompetencia[]"
            value="Tradução e interpretação em idiomas estrangeiros" />
          <label class="form-check-label" for="hardcompetencia14">Tradução e interpretação em idiomas
            estrangeiros</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia15" name="hardcompetencia[]"
            value="Edição de imagens e retoque fotográfico" />
          <label class="form-check-label" for="hardcompetencia15">Edição de imagens e retoque fotográfico</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia16" name="hardcompetencia[]"
            value="Experiência com softwares ou equipamentos específicos da área de atuação" />
          <label class="form-check-label" for="hardcompetencia16">Experiência com softwares ou equipamentos específicos
            da área de atuação</label>
        </div>
        <div class="form-check">
          <input type="checkbox" clas="form-check-input" id="hardcompetencia17" name="hardcompetencia[]"
            value="Conhecimento especializado em áreas específicas (exemplo: programação, contabilidade)" />
          <label class="form-check-label" for="hardcompetencia17">Conhecimento especializado em áreas específicas
            (exemplo: programação, contabilidade)</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia18" name="hardcompetencia[]"
            value="Capacidade de resolver problemas técnicos e propor soluções inovadoras" />
          <label class="form-check-label" for="hardcompetencia18">Capacidade de resolver problemas técnicos e propor
            soluções inovadoras</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia19" name="hardcompetencia[]"
            value="Atualização constante em relação às novas tecnologias e tendências da área" />
          <label class="form-check-label" for="hardcompetencia19">Atualização constante em relação às novas tecnologias
            e tendências da área</label>
        </div>
      </div>





      <label class="form-label form-label-top form-label-config">Selecione até 5 Competências
        Socioemocionais que
        você se identifica:</label>
      <!-- Formulário -->
      <div class="competencias">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia1" name="competencia[]" value="Afabilidade" />
          <label class="form-check-label" for="competencia1">Afabilidade</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia2" name="competencia[]"
            value="Assertividade" />
          <label class="form-check-label" for="competencia2">Assertividade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia3" name="competencia[]" value="Autocontrole" />
          <label class="form-check-label" for="competencia3">Autocontrole</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia4" name="competencia[]"
            value="Capacidade de agir sob pressão" />
          <label class="form-check-label" for="competencia4">Capacidade de agir sob pressão</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia6" name="competencia[]"
            value="Capacidade de análise e síntese" />
          <label class="form-check-label" for="competencia6">Capacidade de análise e síntese</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia7" name="competencia[]"
            value="Capacidade de comunicação" />
          <label class="form-check-label" for="competencia7">Capacidade de comunicação</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia8" name="competencia[]"
            value="Capacidade de concentração" />
          <label class="form-check-label" for="competencia8">Capacidade de concentração</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia9" name="competencia[]"
            value="Cooperação e trabalho em equipe" />
          <label class="form-check-label" for="competencia9">Cooperação e trabalho em equipe</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia10" name="competencia[]"
            value="Negociação e mediação" />
          <label class="form-check-label" for="competencia10">Negociação e mediação</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia11" name="competencia[]"
            value="Capacidade de observação" />
          <label class="form-check-label" for="competencia11">Capacidade de observação</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia12" name="competencia[]"
            value="Condicionamento físico" />
          <label class="form-check-label" for="competencia12">Condicionamento físico</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia13" name="competencia[]"
            value="Coordenação motora" />
          <label class="form-check-label" for="competencia13">Coordenação motora</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia14" name="competencia[]"
            value="Criatividade" />
          <label class="form-check-label" for="competencia14">Criatividade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia15" name="competencia[]" value="Deferência" />
          <label class="form-check-label" for="competencia15">Deferência</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia16" name="competencia[]" value="Destreza" />
          <label class="form-check-label" for="competencia16">Destreza</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia17" name="competencia[]" value="Discrição" />
          <label class="form-check-label" for="competencia17">Discrição</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia18" name="competencia[]" value="Empatia" />
          <label class="form-check-label" for="competencia18">Empatia</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia19" name="competencia[]"
            value="Equilíbrio emocional" />
          <label class="form-check-label" for="competencia19">Equilíbrio emocional</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia20" name="competencia[]" value="Esmero" />
          <label class="form-check-label" for="competencia20">Esmero</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia21" name="competencia[]" value="Ética" />
          <label class="form-check-label" for="competencia21">Ética</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia22" name="competencia[]"
            value="Flexibilidade" />
          <label class="form-check-label" for="competencia22">Flexibilidade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia23" name="competencia[]"
            value="Habilidade manual" />
          <label class="form-check-label" for="competencia23">Habilidade manual</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia24" name="competencia[]" value="Idoneidade" />
          <label class="form-check-label" for="competencia24">Idoneidade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia25" name="competencia[]"
            value="Imparcialidade" />
          <label class="form-check-label" for="competencia25">Imparcialidade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia27" name="competencia[]" value="Iniciativa" />
          <label class="form-check-label" for="competencia27">Iniciativa</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia28" name="competencia[]"
            value="Manter-se atualizado" />
          <label class="form-check-label" for="competencia28">Manter-se atualizado</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia29" name="competencia[]"
            value="Objetividade" />
          <label class="form-check-label" for="competencia29">Objetividade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia30" name="competencia[]" value="Organização" />
          <label class="form-check-label" for="competencia30">Organização</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia31" name="competencia[]" value="Paciência" />
          <label class="form-check-label" for="competencia31">Paciência</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia32" name="competencia[]" value="Parcimônia" />
          <label class="form-check-label" for="competencia32">Parcimônia</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia33" name="competencia[]"
            value="Percepção visual e táctil" />
          <label class="form-check-label" for="competencia33">Percepção visual e táctil</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia34" name="competencia[]"
            value="Persistência e tolerância" />
          <label class="form-check-label" for="competencia34">Persistência e tolerância</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia35" name="competencia[]" value="Prontidão" />
          <label class="form-check-label" for="competencia35">Prontidão</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia36" name="competencia[]"
            value="Raciocínio analítico e dedutivo" />
          <label class="form-check-label" for="competencia36">Raciocínio analítico e dedutivo</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia37" name="competencia[]"
            value="Raciocínio lógico" />
          <label class="form-check-label" for="competencia37">Raciocínio lógico</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia38" name="competencia[]"
            value="Respeito às diferenças" />
          <label class="form-check-label" for="competencia38">Respeito às diferenças</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia39" name="competencia[]"
            value="Responsabilidade" />
          <label class="form-check-label" for="competencia39">Responsabilidade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia40" name="competencia[]"
            value="Sociabilidade" />
          <label class="form-check-label" for="competencia40">Sociabilidade</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia41" name="competencia[]"
            value="Tomar decisões observando diretrizes institucionais" />
          <label class="form-check-label" for="competencia41">Tomar decisões observando diretrizes
            institucionais</label>
        </div>

        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia43" name="competencia[]"
            value="Visão crítica" />
          <label class="form-check-label" for="competencia43">Visão crítica</label>
        </div>
        </div>
      <li class="form-line" data-type="control_button" id="id_submit">
        <div id="cid_submit" class="form-input-wide" data-layout="full">
          <button class="submit" id="submit" name="submit">Enviar</button>
          <div class="loader">
            <div class="check">
              <spans class="check-one"></spans>
              <spans class="check-two"></spans>
            </div>
          </div>
        </div>
      </li>
    </div><!-- fechando a pagina 3 -->
    <div class="form-navigation">
        <button type="button" id="prev-button" >Anterior</button>
        <button type="button" id="next-button">Próximo</button>
        <button type="submit" id="submit-button" style="display: none;">Enviar</button>
      </div> 
    </div> <!--fecha o container-->
 
 
  <script src="./Form/form.js"></script>
</body>
</html>