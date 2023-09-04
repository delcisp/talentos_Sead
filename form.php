<?php
if (isset($_POST['submit'])) {
  // Verifica se todas as perguntas foram respondidas
  $allAnswered = true;
  $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";

  $cargoSelecionado = $_POST["role"];
  $formacaoSelecionada = $_POST["firstquestion"];
  $departamentoSelecionado = $_POST["departament"];
  if ($departamentoSelecionado == "Selecione" || empty($departamentoSelecionado) || $cargoSelecionado == "Selecione" || empty($cargoSelecionado) || 
  $formacaoSelecionada == "Selecione" || empty($formacaoSelecionada) || empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["birthdate"]) || empty($_POST["cep"]) || empty($_POST["uf"])
|| empty($_POST["cidade"])  || empty($_POST["bloodtype"]) || empty($_POST["bairro"]) || empty($_POST["endereco"])  || empty($_POST["raca"])
  || empty($_POST["genero"])  || empty($_POST["doador"])  || empty($_POST["telefone"]) || empty($_POST["ratingq"]) || empty($_POST["ratingq2"]) || empty(($_POST["situacaofunc"])) || empty($_POST["timeofservice"]) || empty($_POST["funcaogratificada"]) || empty($_POST["formadetrabalho"]) 
  || empty($_POST["reuniaotrabalho"]) ||  empty($_POST["deadlines"])  || count($_POST["competencia"]) == 0 || count($_POST["hardcompetencia"]) == 0) {
    $allAnswered = false;
    $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";
  }
//timeofservice funcaogratificada formadetrabalho reuniaotrabalho deadlines suggestion
  if ($allAnswered) {
    include_once('config.php');
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $departament = $_POST['departament'];
    $role = $_POST['role'];
    $firstquestion = $_POST['firstquestion'];
    $ratingq = $_POST['ratingq'];
    $ratingq2 = $_POST['ratingq2'];
    $justification = $_POST['justification'];
    $birthdate = $_POST['birthdate'];
    $telefone = $_POST['telefone'];
    $cep = $_POST['cep'];
    $cidade = $_POST['cidade'];
    $uf = $_POST['uf'];
    $bairro = $_POST['bairro'];
    $endereco = $_POST['endereco'];
    $bloodtype = $_POST['bloodtype'];
    $genero = $_POST['genero'];
    $raca = $_POST['raca'];
    $doador = $_POST['doador'];
    $situacaofunc = $_POST['situacaofunc'];
    $timeofservice = $_POST['timeofservice'];
    $funcaogratificada = $_POST['funcaogratificada'];
    $formadetrabalho = $_POST['formadetrabalho'];
    $reuniaotrabalho = $_POST['reuniaotrabalho'];
    $deadlines = $_POST['deadlines'];
    $suggestion = $_POST['suggestion'];
    $habespacial = $_POST['habespacial'];
    $habcorporal = $_POST['habcorporal'];
    $habmusical = $_POST['habmusical'];
    $hablinguistica = $_POST['hablinguistica'];
    $habmath = $_POST['habmath'];
    $habinterpessoal = $_POST['habinterpessoal'];
    $habnatureba = $_POST['habnatureba'];
    $habemocional = $_POST['habemocional'];
    $competenciaSelecionada = isset($_POST['competencia']) ? $_POST['competencia'] : [];
    $competenciaString = implode(", ", $competenciaSelecionada);
    $competenciaHardSelecionada = isset($_POST['hardcompetencia']) ? $_POST['hardcompetencia'] : [];
    $competenciaHardString = implode("/", $competenciaHardSelecionada);
    $birthdate = $_POST['birthdate'];
    // Converta o formato da data para "XXXX-XX-XX"
    $birthdate = str_replace('/', '-', $birthdate);
    $birthdate = date('Y-m-d', strtotime($birthdate));
    $telefone_limpo = preg_replace("/[^0-9]/", "", $telefone);
     
    $query = "INSERT INTO usuarios (firstname, lastname, departament, role, firstquestion, ratingq, ratingq2, competencia,
     hardcompetencia, justification, birthdate, telefone, cep, cidade, uf, bairro, endereco, bloodtype, genero, raca, doador, situacaofunc, 
     timeofservice, funcaogratificada, formadetrabalho, reuniaotrabalho, deadlines, suggestion, habespacial, habcorporal, habmusical, hablinguistica, habmath, habinterpessoal, habnatureba, habemocional) VALUES
    ('$firstname', '$lastname', '$departament', '$role', '$firstquestion', '$ratingq', '$ratingq2', '$competenciaString',
     '$competenciaHardString', '$justification', '$birthdate', '$telefone_limpo', '$cep', '$cidade', '$uf', '$bairro', '$endereco', '$bloodtype', 
     '$genero', '$raca', '$doador', '$situacaofunc', '$timeofservice', '$funcaogratificada', '$formadetrabalho', '$reuniaotrabalho', '$deadlines', '$suggestion', '$habespacial', '$habcorporal', '$habmusical', 
     '$hablinguistica', '$habmath', '$habinterpessoal', '$habnatureba', '$habemocional')";

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
          aria-hidden="false">Sobrenome</label>
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
        <li class="form-line form-line-column form-col-2 form-line-column-right-five" data-type="control_dropdown" id="department_section">
  <label class="form-label form-label-top" for="input_departament">Departamento</label>
  <div id="department_container" class="form-input-wide" data-layout="half">
    <select class="form-dropdown" id="input_departament" name="departament" aria-label="Departament">
      <option>Selecione</option>
      <option value="Arquivo público do Amazonas" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Arquivo público do Amazonas')
                echo 'selected'; ?>>Arquivo público do Amazonas
              </option>
              <option value="Apoio ao Gabinete" <?php if (isset($_POST['departament']) && $_POST['departament'] == 'Apoio ao Gabinete')
                echo 'selected'; ?>>Apoio ao Gabinete</option>
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
</li>
 
        <li class="form-line form-line-column " data-type="control_dropdown" id="id_4">
          <label class="form-label form-label-top" id="firstquestion" for="input_4">Qual o seu grau de escolaridade?</label>
          <div id="cid_4" class="form-input-wide" data-layout="half">
            <select class="form-dropdown" id="input_4" name="firstquestion" aria-label="Firsquestion">
              <option>Selecione</option>
              <option>Ensino fundamental</option>
              <option>Ensino médio</option>
              <option>Ensino médio técnico</option> <!-- Aparecer um select pra selecionar qual -->
              <option>Graduação</option> <!-- Aparecer um select pra selecionar qual -->
              <option>Especialização</option> <!-- Aparecer um select pra selecionar qual -->
              <option>Mestrado</option> <!-- Aparecer um select pra selecionar qual -->
              <option>Doutorado</option> <!-- Aparecer um select pra selecionar qual -->
            </select>
            <div id="degreeTextareaDiv" style="display: none;">
  <textarea id="degreeTextarea" name="degreeTextarea" placeholder="Informe sua graduação/especialização/mestrado/doutorado"></textarea>
</div>         
          </div>
          </li>
          <li class="form-line form-line-column " data-type="control_dropdown" id="id_5">
          <label class="form-label form-label-top" id="situacaofunc" for="input_5">Qual a sua situação funcional atual?</label>
          <div id="cid_5" class="form-input-wide" data-layout="half">
          <select class="form-dropdown" id="input_5" name="situacaofunc" aria-label="situacaofunc">
          <option>Selecione</option>
          <option>Estatutário</option>
          <option>Comissionado</option>
          <option>Licenciado</option>
          <option>À disposição de outro órgão</option>
          <option>Temporário</option>
          <option>CLT</option>
          <option>De outras esferas</option>
          </select>
          </div>
          </li>
          <!-- Textarea de grau de escolaridade (inicialmente oculta) -->
<!-- textarea pra falar qual a area -->
         


         <!-- <div id="campoPersonalizado" style="display: none;">
            <label for="textoPersonalizado">Digite sua opção:</label>
            <input type="text" id="textoPersonalizado" name="textoPersonalizado"
              onblur="atualizarOpcaoPersonalizada(this.value)">
          </div> -->
        
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
<li class="form-line form-line-column form-col-2 form-line-column-right-seven" data-type="control_dropdown"
    id="id_2">
    
  <label class="form-label form-label-top"  for="input_6">Quanto tempo está na instituição?</label>
  <div id="cid_2" class="form-input-wide" data-layout="half">
    
    <select class="form-dropdown" id="input_6" name="timeofservice" aria-label="timeofservice">
      <option>Selecione</option>
      <option>Menos de 1 ano</option>
      <option>De 1 a 3 anos</option>
      <option>De 3 a 5 anos</option>
      <option>De 5 a 10 anos</option>
      <option>Mais de 10 anos</option>
     
    </select>
    
  </div>
</li>
<li class="form-line form-line-column " data-type="control_dropdown" id="id_7">
<div id="anim">
    <span class="tooltip" data-tooltip="Exemplo: Gerente, Secretário(a), Coordenador(a)">?</span>
    </div>
          <label class="form-label form-label-top" id="funcaogratificada" for="input_7">Você tem função gratificada?</label>
          <div id="cid_5" class="form-input-wide" data-layout="half"> 
          <select class="form-dropdown" id="input_7" name="funcaogratificada" aria-label="funcaogratificada">
          <option>Selecione</option>
          <option>Sim</option>
          <option>Não</option>
          </select>
          <div id="gratificationTextareaDiv" style="display: none;">
  <textarea id="gratificationTextarea" name="gratificationTextarea" placeholder="Informe a sua função gratificada e há quanto tempo você atua nela"></textarea>
</div>      
          </div>
          </li>    
          <li class="form-line form-line-column form-col-2 form-line-column-right-eight" data-type="control_dropdown">
          <div id="anim">
    <span class="tooltip" data-tooltip="interesse em trocar de setor com outro servidor">?</span>
    </div>
  <label class="form-label form-label-top"  for="input_8">Você tem interesse permuta?</label>
  <div id="cid_2" class="form-input-wide" data-layout="half">
    
    <select class="form-dropdown" id="input_8" name="permuta" aria-label="permuta">
      <option>Selecione</option>
      <option>Sim</option>
      <option>Não</option>    
    </select>  
  </div>
</li>
      </div> <!-- fim do form-line-container -->
      
</div> <!-- fechando a pagina 1 -->

<div class="form-page" id="page-2" style="display: none;">   

<label class="form-label form-label-top form-label-config">Qual a sua cor ou raça?</label>
<div class="checkbox-wrapper-18" id="checkone" >
    <div class="round">
    <input type="checkbox" id="checkbox-amarela" name="raca" value="amarela" />
    <label for="checkbox-amarela">
      <span class="checkbox-text">Amarela</span>
    </div>
<div class="round">
  <input type="checkbox" id="checkbox-branca" name="raca" value="branca" />
  <label for="checkbox-branca">
    <span class="checkbox-text">Branca</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-indigena" name="raca" value="indigena" />
  <label for="checkbox-indigena">
    <span class="checkbox-text">Indígena</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-parda" name="raca" value="parda" />
  <label for="checkbox-parda">
    <span class="checkbox-text">Parda</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-preta" name="raca" value="preta" />
  <label for="checkbox-preta">
    <span class="checkbox-text">Preta</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-nao-classificar" name="raca" value="prefiro nao me classificar" />
  <label for="checkbox-nao-classificar">
    <span class="checkbox-text">Prefiro não me classificar</span>
  </label>
</div>
</div>



<label class="form-label-habilities ">Habilidade espacial</label>
<label class="form-sub-label-habilities">Compreendo e elaboro facilmente quadros, desenhos, esquemas, gráficos e tabelas.</label>
<div class="checkbox-wrapper-18" id="checkseven" >
    <div class="round">
    <input type="checkbox" id="checkbox-sim" name="habespacial" value="Sim" />
    <label for="checkbox-sim">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-nao" name="habespacial" value="Não" />
    <label for="checkbox-nao">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-parcialmente" name="habespacial" value="Parcialmente" />
    <label for="checkbox-parcialmente">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>

<label class="form-label-habilities ">Habilidade Corporal</label>
<label class="form-sub-label-habilities">Tenho capacidade de equilíbrio flexibilidade, velocidade e coordenação motora.</label>
<div class="checkbox-wrapper-18" id="checkeight">
    <div class="round">
    <input type="checkbox" id="checkbox-yes" name="habcorporal" value="Sim" />
    <label for="checkbox-yes">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-no" name="habcorporal" value="Não" />
    <label for="checkbox-no">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-partially" name="habcorporal" value="Parcialmente" />
    <label for="checkbox-partially">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>

<label class="form-label-habilities">Habilidade Musical</label>
<label class="form-sub-label-habilities">Possuo afinidade com instrumentos musicais, ritmo e harmonia.</label>
<div class="checkbox-wrapper-18" id="checknine">
    <div class="round">
    <input type="checkbox" id="checkbox-si" name="habmusical" value="Sim" />
    <label for="checkbox-si">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-nah" name="habmusical" value="Não" />
    <label for="checkbox-nah">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-poquito" name="habmusical" value="Parcialmente" />
    <label for="checkbox-poquito">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>

<label class="form-label-habilities ">Habilidade Linguística</label>
<label class="form-sub-label-habilities">Possuo facilidade em aprender novos idiomas bem como para me expressar oralmente ou através da escrita.</label>
<div class="checkbox-wrapper-18" id="checkten">
    <div class="round">
    <input type="checkbox" id="checkbox-oui" name="hablinguistica" value="Sim" />
    <label for="checkbox-oui">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-non" name="hablinguistica" value="Não" />
    <label for="checkbox-non">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-partiellement" name="hablinguistica" value="Parcialmente" />
    <label for="checkbox-partiellement">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>

<label class="form-label-habilities ">Habilidade Lógico-Matemática</label>
<label class="form-sub-label-habilities">Tenho boa capacidade de raciocínio lógico, compreensão de cálculos, utilização de fórmulas, interpretação de números e resolução de problemas.</label>
<div class="checkbox-wrapper-18" id="checkeleven">
    <div class="round">
    <input type="checkbox" id="checkbox-ja" name="habmath" value="Sim" />
    <label for="checkbox-ja">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-nein" name="habmath" value="Não" />
    <label for="checkbox-nein">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-teilweise" name="habmath" value="Parcialmente" />
    <label for="checkbox-teilweise">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>

<label class="form-label-habilities ">Habilidade Interpessoal</label>
<label class="form-sub-label-habilities">Tenho facilidade para me relacionar, escutar e compreender pessoas, para dar e receber feedbacks.</label>
<div class="checkbox-wrapper-18" id="checktwelve">
    <div class="round">
    <input type="checkbox" id="checkbox-ae" name="habinterpessoal" value="Sim" />
    <label for="checkbox-ae">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-kahore" name="habinterpessoal" value="Não" />
    <label for="checkbox-kahore">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-wāhanga" name="habinterpessoal" value="Parcialmente" />
    <label for="checkbox-wāhanga">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>

<label class="form-label-habilities ">Habilidade naturalista</label>
<label class="form-sub-label-habilities">Possuo sensibilidade para reconhecer a importância dos elementos da natureza e sua relação com a vida humana.</label>
<div class="checkbox-wrapper-18" id="checkthirteen">
    <div class="round">
    <input type="checkbox" id="checkbox-sicuro" name="habnatureba" value="Sim" />
    <label for="checkbox-sicuro">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-noi" name="habnatureba" value="Não" />
    <label for="checkbox-noi">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-parzialmente" name="habnatureba" value="Parcialmente" />
    <label for="checkbox-parzialmente">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>

<label class="form-label-habilities ">Habilidade Emocional</label>
<label class="form-sub-label-habilities">Possuo capacidade de conhecer e lidar com as minhas emoções, de reconhecer emoções em outras pessoas e de gerenciar conflitos.</label>
<div class="checkbox-wrapper-18" id="checkfourteen">
    <div class="round">
    <input type="checkbox" id="checkbox-hee" name="habemocional" value="Sim" />
    <label for="checkbox-heẽ">
      <span class="checkbox-text">Sim</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-nahaniri" name="habemocional" value="Não" />
    <label for="checkbox-nahániri">
      <span class="checkbox-text">Não</span>
    </div>
    <div class="round">
    <input type="checkbox" id="checkbox-parcialmentee" name="habemocional" value="Parcialmente" />
    <label for="checkbox-parcialmentee">
      <span class="checkbox-text">Parcialmente</span>
    </div>
</div>


<label class="form-label form-label-top form-label-config">Qual a sua identidade de gênero?</label>
<div class="checkbox-wrapper-18" id="checktwo" >
<div class="round">
  <input type="checkbox" id="checkbox-mulhercis" name="genero" value="mulher cisgênera" />
  <label for="checkbox-mulhercis">
    <span class="checkbox-text">Mulher cisgênera (se identifica com o gênero que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-homemcis" name="genero" value="homem cisgênero" />
  <label for="checkbox-homemcis">
    <span class="checkbox-text">Homem cisgênero (se identifica com o gênero que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-mulhertrans" name="genero" value="mulher trans" />
  <label for="checkbox-mulhertrans">
    <span class="checkbox-text">Mulher trans (se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-homemtrans" name="genero" value="homem trans" />
  <label for="checkbox-homemtrans">
    <span class="checkbox-text">(Homem Trans se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-naobinario" name="genero" value="não binário" />
  <label for="checkbox-naobinario">
    <span class="checkbox-text">Não binário (não se sente pertencente ao gênero masculino ou ao feminino)</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-nao-classificar2" name="genero" value="prefiro não me classificar" />
  <label for="checkbox-nao-classificar2">
    <span class="checkbox-text">Prefiro não me classificar</span>
  </label>
</div>
</div>
<label class="form-label form-label-top form-label-config">Você é doador de órgãos?</label>
<div class="checkbox-wrapper-18" id="checkthree" >
<div class="round">
  <input type="checkbox" id="checkbox-simm" name="doador" value="sim" />
  <label for="checkbox-simm">
    <span class="checkbox-text">Sim</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-naoo" name="doador" value="não" />
  <label for="checkbox-naoo">
    <span class="checkbox-text">Não</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-naodecidi" name="doador" value="ainda não me decidi" />
  <label for="checkbox-naodecidi">
    <span class="checkbox-text">Ainda não me decidi</span>
  </label>
</div>
</div>

<label class="form-label form-label-top form-label-config">Qual a forma de realização de trabalho você prefere?</label>
<div class="checkbox-wrapper-18" id="checkfour">
    <div class="round">
    <input type="checkbox" id="checkbox-trabalharsozinho" name="formadetrabalho" value="Prefiro trabalhar sozinho" />
    <label for="checkbox-trabalharsozinho">
      <span class="checkbox-text">Prefiro trabalhar sozinho</span>
    </div>
<div class="round">
  <input type="checkbox" id="checkbox-trabalharemgrupo" name="formadetrabalho" value="Prefiro trabalhar em grupo" />
  <label for="checkbox-trabalharemgrupo">
    <span class="checkbox-text">Prefiro trabalhar em grupo</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-sempreferencia" name="formadetrabalho" value="não tenho preferências" />
  <label for="checkbox-sempreferencia">
    <span class="checkbox-text">não tenho preferências</span>
  </label>
</div>
</div>



<label class="form-label form-label-top form-label-config">Como você costuma agir quando participa de reuniões de trabalho?</label>
<div class="checkbox-wrapper-18" id="checkfive">
    <div class="round">
    <input type="checkbox" id="checkbox-exporideias" name="reuniaotrabalho" value="Gosto de expor minhas ideias mostrando claramente os pontos com os quais discordo ou concordo" />
    <label for="checkbox-exporideias">
      <span class="checkbox-text">Gosto de expor minhas ideias mostrando claramente os pontos com os quais discordo ou concordo</span>
    </div>
<div class="round">
  <input type="checkbox" id="checkbox-naodaopiniao" name="reuniaotrabalho" value="Prefiro não emitir opinião durante a reunião, mas converso com meu gestor posteriormente para discutir pontos relevantes" />
  <label for="checkbox-naodaopiniao">
    <span class="checkbox-text">Prefiro não emitir opinião durante a reunião, mas converso com meu gestor após para discutir pontos relevantes</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-semopiniao" name="reuniaotrabalho" value="Não exponho a minha opinião em momento algum." />
  <label for="checkbox-semopiniao">
    <span class="checkbox-text">Não exponho a minha opinião em momento algum</span>
  </label>
</div>
</div>


<label class="form-label form-label-top form-label-config">Como você costuma agir diante de prazos e metas?</label>
<div class="checkbox-wrapper-18" id="checksix">
    <div class="round">
    <input type="checkbox" id="checkbox-seorganiza" name="deadlines" value="Organizo minhas atividades para realizá-las dentro do prazo determinado" />
    <label for="checkbox-seorganiza">
      <span class="checkbox-text">Organizo minhas atividades para realizá-las dentro do prazo determinado</span>
    </div>
<div class="round">
  <input type="checkbox" id="checkbox-salva" name="deadlines" value="salvo quando acontecem situações fora do planejado" />
  <label for="checkbox-salva">
    <span class="checkbox-text">salvo quando acontecem situações fora do planejado</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-prioridade" name="deadlines" value="Priorizo, a partir da indicação do(a) gestor(a), as atividades com prazos específicos" />
  <label for="checkbox-prioridade">
    <span class="checkbox-text">Priorizo, a partir da indicação do(a) gestor(a), as atividades com prazos específicos</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-autonoma" name="deadlines" value="Prioriza, de forma autônoma, as atividades com prazos específicos" />
  <label for="checkbox-autonoma">
    <span class="checkbox-text">Prioriza, de forma autônoma, as atividades com prazos específicos</span>
  </label>
</div>
<div class="round">
  <input type="checkbox" id="checkbox-dificuldade" name="deadlines" value="Tenho dificuldade quanto ao atendimento de prazos, no entanto, busco realizar as atividades de forma satisfatória e atingir a meta estabelecida." />
  <label for="checkbox-dificuldade">
    <span class="checkbox-text">Tenho dificuldade quanto ao atendimento de prazos mas busco realizar as atividades de forma satisfatória e atingir a meta.</span>
  </label>
</div>
</div>




<label class="form-label form-label-top form-label-config">Se quiser, escreva em poucas palavras sobre alguma idéia de mudança/melhoria no seu local de trabalho: </label>
<textarea placeholder="aqui sua sugestão" name="suggestion" style="resize:none; width: 95%; height: 100px; margin-left: 10px;" ></textarea>

<label class="form-label form-label-top form-label-config">Relacione abaixo até 3 cursosde curta duração (Congressos, Treinamentos, Palestras, Capacitações etc) que você considere
  importantes dentro da sua formação: </label>
  <textarea name="freecourses"style="resize:none; width: 95%; height: 100px; margin-left: 10px;" ></textarea>




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
      <label class="form-label form-label-top form-label-config">Se você pudesse trabalhar em outros setores, quais seriam?</label>
        <div class="competencias">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor1" name="setorop[]"
            value="DAFI" />
          <label class="form-check-label" for="setor1">DAFI</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor2" name="setorop[]"
            value="Gabinete" />
          <label class="form-check-label" for="setor2">GABINETE</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor3" name="setorop[]"
            value="ESASP" />
          <label class="form-check-label" for="setor3">ESASP</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor4" name="setorop[]"
            value="Atualização constante em relação às novas tecnologias e tendências da área" />
          <label class="form-check-label" for="setor4">ASSESSORIA TÉCNICA ADMINISTRATIVA</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor5" name="setorop[]"
            value="ASCOM" />
          <label class="form-check-label" for="setor5">ASCOM</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor6" name="setorop[]"
            value="OUVIDORIA" />
          <label class="form-check-label" for="setor3">OUVIDORIA</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor7" name="setorop[]"
            value="CRD" />
          <label class="form-check-label" for="setor7">CRD</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor8" name="setorop[]"
            value="JUNTA MÉDICA" />
          <label class="form-check-label" for="setor8">JUNTA MÉDICA</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor9" name="setorop[]"
            value="SGRH" />
          <label class="form-check-label" for="setor9">SGRH</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor10" name="setorop[]"
            value="CTA" />
          <label class="form-check-label" for="setor10">CTA</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor11" name="setorop[]"
            value="APEAM" />
          <label class="form-check-label" for="setor11">APEAM</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor12" name="setorop[]"
            value="GESTÃO DE BENS MÓVEIS" />
          <label class="form-check-label" for="setor12">GESTÃO DE BENS MÓVEIS</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor13" name="setorop[]"
            value="DETI" />
          <label class="form-check-label" for="setor13">DETI</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="setor14" name="setorop[]"
            value="GESTÃO DE GASTOS PÚBLICOS E COMBUSTÍVEIS" />
          <label class="form-check-label" for="setor14">GESTÃO DE GASTOS PÚBLICOS E COMBUSTÍVEIS</label>
        </div>
       
      </div>
      <label class="form-label form-label-top form-label-config">Selecione até 5 atividades com as quais você prefere trabalhar</label>
        <div class="competencias">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp1" name="atividadesp[]"
            value="Atendimento ao público externo/intero" />
          <label class="form-check-label" for="atividadesp1">Atendimento ao público externo/intero</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp2" name="atividadesp[]"
            value="trabalho com recursos tecnológicos/digitais/virtuais" />
          <label class="form-check-label" for="atividadesp2">trabalho com recursos tecnológicos/digitais/virtuais</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp3" name="atividadesp[]"
            value="Confecção de despachos/pareceres e decisões relacionados às atividades de assessoria jurídica" />
          <label class="form-check-label" for="atividadesp3">Confecção de despachos/pareceres e decisões relacionados às atividades de assessoria jurídica</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp4" name="atividadesp[]"
            value="Atividades Administrativas" />
          <label class="form-check-label" for="atividadesp4">Atividades Administrativas</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp5" name="atividadesp[]"
            value="Orientação de equipes de trabalho" />
          <label class="form-check-label" for="atividadesp5">Orientação de equipes de trabalho</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp6" name="atividadesp[]"
            value="Análise de números" />
          <label class="form-check-label" for="atividadesp6">Análise de números</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp7" name="atividadesp[]"
            value="dados estatísticos e/ou financeiros" />
          <label class="form-check-label" for="atividadesp7">dados estatísticos e/ou financeiros</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp8" name="atividadesp[]"
            value="Elaboração de documentos" />
          <label class="form-check-label" for="atividadesp8">Elaboração de documentos</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp9" name="atividadesp[]"
            value="projetos e relatórios" />
          <label class="form-check-label" for="atividadesp9">projetos e relatórios</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp10" name="atividadesp[]"
            value="Tarefas rotineiras" />
          <label class="form-check-label" for="atividadesp10">Tarefas rotineiras</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp11" name="atividadesp[]"
            value="Simplificadas" />
          <label class="form-check-label" for="atividadesp11">Simplificadas</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp12" name="atividadesp[]"
            value="Com poucas mudanças" />
          <label class="form-check-label" for="atividadesp12">Com poucas mudanças</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp13" name="atividadesp[]"
            value="Atividades desafiadoras e complexas" />
          <label class="form-check-label" for="atividadesp13">Atividades desafiadoras e complexas</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp14" name="atividadesp[]"
            value="Com muitas variáveis" />
          <label class="form-check-label" for="atividadesp14">Com muitas variáveis</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp15" name="atividadesp[]"
            value="Acompanhamento e cumprimento de prazos e metas" />
          <label class="form-check-label" for="atividadesp15">Acompanhamento e cumprimento de prazos e metas</label>
        </div>
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="atividadesp16" name="atividadesp[]"
            value="Trabalho com grupos (oficinas, palestras, orientações)" />
          <label class="form-check-label" for="atividadesp16">Trabalho com grupos (oficinas, palestras, orientações)</label>
        </div>


        
</div>
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
    <div id="page-4" style="display: none;">
   <h1>oi</h1>
</div> <!--fechando a pagina 4 -->

    <div class="form-navigation">
        <button type="button" id="prev-button" >Anterior</button>
        <div class="button-container">
        <button type="button" id="next-button">Próximo</button>
        </div>
        <button type="submit" id="submit-button" style="display: none;">Enviar</button>
      </div> 
    </div> <!--fecha o container-->
 
 
  <script src="./Form/form.js"></script>
</body>
</html>