<?php
if(isset($_POST['submit'])) {

  // Verifica se todas as perguntas foram respondidas
  $allAnswered = true;
  $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";

  if (empty($_POST["firstname"]) || empty($_POST["lastname"]) || empty($_POST["departament"]) || empty($_POST["role"]) || empty($_POST["firstquestion"]) || empty($_POST["ratingq"]) || empty($_POST["ratingq2"]) || empty($_POST["thirdquestion"]) || count($_POST["competencia"]) == 0 || count($_POST["hardcompetencia"]) == 0) {
    $allAnswered = false;
    $errorMsg = "Por favor, responda todas as perguntas antes de prosseguir.";
  }

  if ($allAnswered) {
    // Se todas as perguntas foram respondidas, você pode prosseguir com a inserção no banco de dados

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
    
    $competenciaSelecionada = isset($_POST['competencia']) ? $_POST['competencia'] : [];
    $competenciaString = implode(", ", $competenciaSelecionada);

    $competenciaHardSelecionada = isset($_POST['hardcompetencia']) ? $_POST['hardcompetencia'] : [];
    $competenciaHardString = implode("/", $competenciaHardSelecionada);
   
    $query = "INSERT INTO usuarios (firstname, lastname, departament, role, firstquestion, ratingq, ratingq2, secondquestion, thirdquestion, competencia, hardcompetencia) VALUES
    ('$firstname', '$lastname', '$departament', '$role', '$firstquestion', '$ratingq', '$ratingq2', '$secondquestion', '$thirdquestion', '$competenciaString', '$competenciaHardString')";

    $result = mysqli_query($conn, $query);
  
    $redirectURL = 'agradecimento.php?firstname=' . urlencode($firstname);
    header('Location: ' . $redirectURL);
    exit;
  }
  else {
    echo "<script>alert('$errorMsg');</script>";
  }
}//
?>
<!DOCTYPE html>
<html>
<head>
  <html lang="pt-br">
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Formulário</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css" integrity="sha512-x4RR/yiGvQzBpPqkIdK6ZAXIM4Bnl6ooHohb3ofsvBaO7HMsmV6/D3ZSXsAIrlnGeq6y2lpie75i4J8q5SDi0A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.42507"/>
  <link type="text/css" rel="stylesheet" href="https://cdn02.jotfor.ms/css/styles/payment/payment_styles.css?3.3.42507" />
  <link type="text/css" rel="stylesheet" href="https://cdn03.jotfor.ms/css/styles/payment/payment_feature.css?3.3.42507" />
  <link rel="stylesheet" href="./Form/form.css">
  <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
</head>

<body>
  <form action="form.php" method="POST">
  <div class="form-container">
      <div class="form-line-container">
      <li class="form-line form-line-column form-col-1 form-line-column-left" data-type="control_fullname" id="id_1">
          <label class="form-label form-label-top" id="name" name="name" for="firstname">Nome</label>
          <div id="cid_1" class="form-input-wide" data-layout="full">
            <div data-wrapper-react="true">
              <span class="form-sub-label-container" style="vertical-align:top" data-input-type="first">
                <input type="text" id="firstname" name="firstname" class="form-textbox" data-defaultvalue=""  value="" data-component="first" aria-labelledby="label_1 sublabel_1_first">
                <label class="form-sub-label" for="first_1" id="sublabel_1_first" style="min-height:13px" aria-hidden="false">Primeiro nome</label>
              </span>
              <span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                <input type="text" id="last_1" name="lastname" class="form-textbox" data-defaultvalue="" autoComplete="section-input_1 family-name" size="" value="" data-component="last" aria-labelledby="label_1 sublabel_1_last" />
                <label class="form-sub-label" for="last_1" id="sublabel_1_last" style="min-height:13px" aria-hidden="false">Último nome</label>
              </span>
            </div>
          </div>
        </li>
        <li class="form-line form-line-column form-line-column-right form-col-2" data-type="control_dropdown" id="id_2">
          <label class="form-label form-label-top" id="departament" for="input_2">Departamento</label>
          <div id="cid_2" class="form-input-wide" data-layout="half">
            <select class="form-dropdown" id="input_2" name="departament" aria-label="Department">
              <option value="">Selecione</option>
              <option value="APEAM">APEAM</option>
              <option value="APOIO AO GAB">APOIO AO GABINETE</option>
              <option value="ARQUIVO ADM">ARQUIVO ADM</option>
              <option value="ASCOM">ASCOM</option>
              <option value="ATA">ASSESSORIA TÉCNICA</option>
              <option value="AUDIT-EXT">AUDITORIA EXTERNA</option>
              <option value="CI">CONTROLADORIA INTERNA</option>
              <option value="CPAT">CPAT</option>
              <option value="CRD">CRD</option>
              <option value="CRD-DEF">CRD-DEFENSORIA</option>
              <option value="CRI-SEAD">CRI-SEAD</option>
              <option value="CTA">CTA</option>
              <option value="DAFI">DAFI</option>
              <option value="DETI">DETI</option>
              <option value="DGFC">GESTÃO DE FROTA E COMBUSTÍVEL</option>
              <option value="ESASP">ESASP</option>
              <option value="GCP">GERÊNCIA DE CONTAS PÚBLICAS</option>
              <option value="GDP">GERÊNCIA DE DIÁRIAS E PASSAGENS</option>
              <option value="GELOG">GELOG</option>
              <option value="GEOF">GEOF</option>
              <option value="GEPES">GEPES</option>
              <option value="GIPIAP">GIPIAP</option>
              <option value="GT-CTA">GT CTA</option>
              <option value="GT-MD">GT MD</option>
              <option value="JUNTA-MED">JUNTA MÉDICA</option>
              <option value="OUVIDORIA">OUVIDORIA</option>
              <option value="PROTOCOLO">PROTOCOLO</option>
              <option value="SCI">SCI</option>
              <option value="SEAG">SEAG</option>
              <option value="SEPAGAP">SEPAGAP</option>
              <option value="SGPGP">SGPGP</option>
              <option value="SGRH">SGRH</option>
              <option value="SGRH-GRD">SGRH-GRD</option>
              <option value="SGRH-ASS">SGRH-ASS</option>
              <option value="SGRH-FP">SGRH-FP</option>
              <option value="SGRH-GB">SGRH-GB</option>
              <option value="SGRH-GV">SGRH-GV</option>
              <option value="TRANSPORTE">TRANSPORTE</option>
                   </select>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2 form-line-column-left" data-type="control_dropdown" id="id_3">
          <label class="form-label form-label-top" id="cargo"  for="input_3"> Cargo atual </label>
          <div id="cid_3" class="form-input-wide" data-layout="half">
          <select class="form-dropdown" id="input_3" name="role" aria-label="Role">
            <option value="Selecione">Selecione</option>
            <option value="A">Arqui</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>
            <option value="Ipsum">Ipsum</option>

          </select>
          </div>
        </li>
        <li class="form-line form-line-column form-line-column-input-four" data-type="control_dropdown" id="id_4">
  <label class="form-label form-label-top" id="firstquestion" for="input_4">Você tem formação?</label>
  <div id="cid_4" class="form-input-wide" data-layout="half">
    <select class="form-dropdown" id="input_4" name="firstquestion" aria-label="Firsquestion" onchange="mostrarCampoPersonalizado(this)">
      <option value="Selecione">Selecione</option>
      <option value="Não tenho formação">Não tenho formação</option>
      <option value="Administração">Administração</option>
      <option value="Agronomia">Agronomia</option>
      <option value="Agronegócio">Agronegócio</option>
      <option value="Análise e desenvolvimento de sistemas">Análise e desenvolvimento de sistemas</option>
      <option value="Arquitetura e Urbanismo">Arquitetura e Urbanismo</option>
      <option value="Arquivologia">Arquivologia</option>
      <option value="Artes">Artes</option>
      <option value="Artes Cênicas">Artes cênicas</option>
      <option value="Artes e mídias digitais">Artes e mídias digitais</option>
      <option value="Automação industrial">Automação industrial</option>
      <option value="Biologia">Biologia</option>
      <option value="Biomedicina">Biomedicina</option>
      <option value="Bioquímica">Bioquímica</option>
      <option value="Ciências contábeis">Ciências contábeis</option>
      <option value="Ciências econômicas">Ciências econômicas</option>
      <option value="Ciências sociais">Ciências sociais</option>
      <option value="Cibersegurança">Cibersegurança</option>
      <option value="Comunicação social">Comunicação social</option>
      <option value="Desenho industrial">Desenho industrial</option>
      <option value="Design Gráfico">Design gráfico</option>
      <option value="Design de interiores">Design de interiores</option>
      <option value="Direito">Direito</option>
      <option value="Economia">Economia</option>
      <option value="Enfermagem">Enfermagem</option>
      <option value="Educação física">Educação física</option>
      <option value="Engenharia ambiental">Engenharia ambiental</option>
      <option value="Engenharia Civil">Engenharia civil</option>
      <option value="Engenharia da computação">Engenharia da computação</option>
      <option value="Engenharia elétrica">Engenharia elétrica</option>
      <option value="Engenharia mecânica">Engenharia mecânica</option>
      <option value="Engenharia química">Engenharia química</option>
      <option value="Engenharia de alimentos">Engenharia de alimentos</option>
      <option value="Engenharia de gestão">Engenharia de gestão</option>
      <option value="Engenharia industrial">Engenharia industrial</option>
      <option value="Engenharia de Transporte e Logística">Engenharia de Transporte e Logística</option>
      <option value="Farmácia">Farmácia</option>
      <option value="Filosofia">Filosofia</option>
      <option value="Fisioterapia">Fisioterapia</option>
      <option value="Fonoaudiologia">Fonoaudiologia</option>
      <option value="Gatronomia">Gastronomia</option>
      <option value="Gestão da qualidade">Gestão da qualidade</option>
      <option value="Gestão de tecnologia da informação">Gestão de tecnologia da informação</option>
      <option value="Gestão ambiental">Gestão ambiental</option>
      <option value="Gestão de políticas públicas">Gestão de políticas públicas</option>
      <option value="Gestão de agronegócio">Gestão de agronegócio</option>
      <option value="Gestão pública">Gestão pública</option>
      <option value="Geografia">Geografia</option>
      <option value="História">História</option>
      <option value="Hotelaria">Hotelaria</option>
      <option value="Jornalismo">Jornalismo</option>
      <option value="Letras">Letras</option>
      <option value="Marketing">Marketing</option>
      <option value="Matemática">Matemática</option>
      <option value="Medicina">Medicina</option>
      <option value="Nutrição">Nutrição</option>
      <option value="Odontologia">Odontologia</option>
      <option value="Pedagogia">Pedagogia</option>
      <option value="Psicologia">Psicologia</option>
      <option value="Publicidade e propaganda">Publicidade e propaganda</option>
      <option value="Relações internacionais">Relações internacionais</option>
      <option value="Recursos Humanos">Recursos Humanos</option>
      <option value="Relações públicas">Relações públicas</option>
      <option value="Serviço social">Serviço social</option>
      <option value="Sistemas de informação">Sistemas de informação</option>
      <option value="Tecnologias digitais">Tecnologias digitais</option>
      <option value="Teologia">Teologia</option>
      <option value="Turismo">Turismo</option>
      <option value="Medicina"> Medicina veterinária</option>
      <option value="outros">Outros</option>
    </select>
  </div>
  <div id="campoPersonalizado" style="display: none;">
    <label for="textoPersonalizado">Digite sua opção:</label>
    <input type="text" id="textoPersonalizado" name="textoPersonalizado" onblur="atualizarOpcaoPersonalizada(this.value)">
  </div>
</li>
        </div>
      <li class="form-line" data-type="control_textarea" id="id_5">
        <label class="form-label form-label-top form-label-auto" id="textquestion" for="input_5"> Você tem outros tipos de formação? Se sim, quais?</label>
    <div id="cid_5" class="form-input-wide" data-layout=""> 
      <textarea id="input_5" class="form-textarea" name="secondquestion" style="width:648px;height:80px;margin-top: 15px;" data-component="textarea" aria-labelledby="label_5" placeholder="Exemplo: Cursos livres, cursos técnicos, atualização profissional"></textarea> </div>
  </li>
  <li class="form-line" data-type="control_textarea" id="id_6"><label class="form-label form-label-top form-label-auto" id="textquestiontwo" for="input_6">De acordo com seus conhecimentos, existe outro departamento em que gostaria de atuar? Se sim, qual?</label>
    <div id="cid_6" class="form-input-wide" data-layout=""> 
      <textarea id="input_6" class="form-textarea" name="thirdquestion" style="width:648px;height:80px;margin-top: 15px;margin-bottom:30px;" data-component="textarea" aria-labelledby="label_6" placeholder="Exemplo: Ouvidoria, Comunicação, ESASP, Administração, Finanças etc"></textarea> </div>
  </li>

  <label for="competence-select" class="form-label form-label-top form-label-config">Selecione até 5 Hard Skills que você se identifica:</label>
   <div class="competencias">
    <div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia1" name="hardcompetencia[]" value="Proficiências completa em Word, Excel, PowerPoint e Outlook"/>
      <label class="form-check-label" for="hardcompetencia1">Proficiências completa em Word, Excel, PowerPoint e Outlook</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia2" name="hardcompetencia[]" value="Conhecimento em sistemas operacionais (windows, macOS, Linux)"/>
      <label class="form-check-label" for="hardcompetencia2">Conhecimento em sistemas operacionais (windows, macOS, Linux)</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia3" name="hardcompetencia[]" value="Coleta de dados(pesquisa questionários entrevistas)"/>
      <label class="form-check-label" for="hardcompetencia3">Coleta de dados(pesquisa, questionários, entrevistas)</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia4" name="hardcompetencia[]" value="Análise de dados quantitativos e qualitativos"/>
      <label class="form-check-label" for="hardcompetencia4">Análise de dados quantitativos e qualitativos</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia5" name="hardcompetencia[]" value="Apresentação de dados de forma clara e atraente (gráficos, tabelas)"/>
      <label class="form-check-label" for="hardcompetencia5">Apresentação de dados de forma clara e atraente (gráficos, tabelas)</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia6" name="hardcompetencia[]" value="Domínio de programas de design gráfico (Adobe Illustrator, Adobe Photoshop, CorelDRAW)"/>
      <label class="form-check-label" for="hardcompetencia6">Domínio de programas de design gráfico (Adobe Illustrator, Adobe Photoshop, CorelDRAW)</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia7" name="hardcompetencia[]" value="Conhecimento de princípios de design (cores, tipografia, composição)"/>
      <label class="form-check-label" for="hardcompetencia7">Conhecimento de princípios de design (cores, tipografia, composição)</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia8" name="hardcompetencia[]" value="Criação de conteúdo para mídias sociais (imagens, vídeos, infográficos)"/>
      <label class="form-check-label" for="hardcompetencia8">Criação de conteúdo para mídias sociais (imagens, vídeos, infográficos)</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia9" name="hardcompetencia[]" value="Escrita clara concisa e gramaticalmente correta"/>
      <label class="form-check-label" for="hardcompetencia9">Escrita clara, concisa e gramaticalmente correta</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia10" name="hardcompetencia[]" value="Habilidade em redação acadêmica, jornalística ou técnica"/>
      <label class="form-check-label" for="hardcompetencia10">Habilidade em redação acadêmica, jornalística ou técnica</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia11" name="hardcompetencia[]" value="Vocabulário variado e adequado ao contexto"/>
      <label class="form-check-label" for="hardcompetencia11">Vocabulário variado e adequado ao contexto</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia12" name="hardcompetencia[]" value="Proficiência em línguas estrangeiras"/>
      <label class="form-check-label" for="hardcompetencia12">Proficiência em línguas estrangeiras</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia13" name="hardcompetencia[]" value="Capacidade de comunicação escrita e verbal em diferentes idiomas"/>
      <label class="form-check-label" for="hardcompetencia13">Capacidade de comunicação escrita e verbal em diferentes idiomas</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia14" name="hardcompetencia[]" value="Tradução e interpretação em idiomas estrangeiros"/>
      <label class="form-check-label" for="hardcompetencia14">Tradução e interpretação em idiomas estrangeiros</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia15" name="hardcompetencia[]" value="Edição de imagens e retoque fotográfico"/>
      <label class="form-check-label" for="hardcompetencia15">Edição de imagens e retoque fotográfico</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia16" name="hardcompetencia[]" value="Experiência com softwares ou equipamentos específicos da área de atuação"/>
      <label class="form-check-label" for="hardcompetencia16">Experiência com softwares ou equipamentos específicos da área de atuação</label> 
</div>
<div class="form-check">
      <input type="checkbox" clas="form-check-input" id="hardcompetencia17" name="hardcompetencia[]" value="Conhecimento especializado em áreas específicas (exemplo: programação, contabilidade)"/>
      <label class="form-check-label" for="hardcompetencia17">Conhecimento especializado em áreas específicas (exemplo: programação, contabilidade)</label>
</div> 
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia18" name="hardcompetencia[]" value="Capacidade de resolver problemas técnicos e propor soluções inovadoras"/>
      <label class="form-check-label" for="hardcompetencia18">Capacidade de resolver problemas técnicos e propor soluções inovadoras</label> 
</div>
<div class="form-check">
      <input type="checkbox" class="form-check-input" id="hardcompetencia19" name="hardcompetencia[]" value="Atualização constante em relação às novas tecnologias e tendências da área"/>
      <label class="form-check-label" for="hardcompetencia19">Atualização constante em relação às novas tecnologias e tendências da área</label> 
</div>
   </div>
      <!-- Selecionar competencias -->
      <label for="competence-select" class="form-label form-label-top form-label-config">Selecione até 5 Soft Skills que você se identifica:</label>
      <!-- Formulário -->
      <div class="competencias">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia1" name="competencia[]" value="Afabilidade" />
          <label class="form-check-label" for="competencia1">Afabilidade</label>
        </div>
        <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia2" name="competencia[]" value="Assertividade" />
          <label class="form-check-label" for="competencia2">Assertividade</label>  
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia3" name="competencia[]" value="Autocontrole" />
             <label class="form-check-label" for="competencia3">Autocontrole</label> 
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia4" name="competencia[]" value="Capacidade de agir sob pressão" />
          <label class="form-check-label" for="competencia4">Capacidade de agir sob pressão</label> 
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia6" name="competencia[]" value="Capacidade de análise e síntese" />
          <label class="form-check-label" for="competencia6">Capacidade de análise e síntese</label>
          </div>
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia7" name="competencia[]" value="Capacidade de comunicação" />
          <label class="form-check-label" for="competencia7">Capacidade de comunicação</label> 
          </div>
          
           <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia8" name="competencia[]" value="Capacidade de concentração" />
         <label class="form-check-label" for="competencia8">Capacidade de concentração</label> 
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia9" name="competencia[]" value="Cooperação e trabalho em equipe" />
         <label class="form-check-label" for="competencia9">Cooperação e trabalho em equipe</label>
          </div>
    
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia10" name="competencia[]" value="Negociação e mediação" />
          <label class="form-check-label" for="competencia10">Negociação e mediação</label>
          </div>  
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia11" name="competencia[]" value="Capacidade de observação" />
            <label class="form-check-label" for="competencia11">Capacidade de observação</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia12" name="competencia[]" value="Condicionamento físico" />
            <label class="form-check-label" for="competencia12">Condicionamento físico</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia13" name="competencia[]" value="Coordenação motora" />
            <label class="form-check-label" for="competencia13">Coordenação motora</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia14" name="competencia[]" value="Criatividade" />
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
            <input type="checkbox" class="form-check-input" id="competencia19" name="competencia[]" value="Equilíbrio emocional" />
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
            <input type="checkbox" class="form-check-input" id="competencia22" name="competencia[]" value="Flexibilidade" />
            <label class="form-check-label" for="competencia22">Flexibilidade</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia23" name="competencia[]" value="Habilidade manual" />
            <label class="form-check-label" for="competencia23">Habilidade manual</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia24" name="competencia[]" value="Idoneidade"/>
            <label class="form-check-label" for="competencia24">Idoneidade</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia25" name="competencia[]" value="Imparcialidade"/>
            <label class="form-check-label" for="competencia25">Imparcialidade</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia27" name="competencia[]" value="Iniciativa" />
            <label class="form-check-label" for="competencia27">Iniciativa</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia28" name="competencia[]" value="Manter-se atualizado"/>
            <label class="form-check-label" for="competencia28">Manter-se atualizado</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia29" name="competencia[]" value="Objetividade" />
            <label class="form-check-label" for="competencia29">Objetividade</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia30" name="competencia[]" value="Organização" />
            <label class="form-check-label" for="competencia30">Organização</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia31" name="competencia[]" value="Paciência"/>
            <label class="form-check-label" for="competencia31">Paciência</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia32" name="competencia[]" value="Parcimônia" />
            <label class="form-check-label" for="competencia32">Parcimônia</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia33" name="competencia[]" value="Percepção visual e táctil" />
            <label class="form-check-label" for="competencia33">Percepção visual e táctil</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia34" name="competencia[]" value="Persistência e tolerância" />
            <label class="form-check-label" for="competencia34">Persistência e tolerância</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia35" name="competencia[]" value="Prontidão"/>
            <label class="form-check-label" for="competencia35">Prontidão</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia36" name="competencia[]" value="Raciocínio analítico e dedutivo" />
            <label class="form-check-label" for="competencia36">Raciocínio analítico e dedutivo</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia37" name="competencia[]" value="Raciocínio lógico" />
            <label class="form-check-label" for="competencia37">Raciocínio lógico</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia38" name="competencia[]" value="Respeito às diferenças" />
            <label class="form-check-label" for="competencia38">Respeito às diferenças</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia39" name="competencia[]" value="Responsabilidade" />
            <label class="form-check-label" for="competencia39">Responsabilidade</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia40" name="competencia[]" value="Sociabilidade" />
            <label class="form-check-label" for="competencia40">Sociabilidade</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia41" name="competencia[]" value="Tomar decisões observando diretrizes institucionais" />
            <label class="form-check-label" for="competencia41">Tomar decisões observando diretrizes institucionais</label>
          </div>
          
          <div class="form-check">
            <input type="checkbox" class="form-check-input" id="competencia43" name="competencia[]" value="Visão crítica" />
            <label class="form-check-label" for="competencia43">Visão crítica</label>
          </div>
          </div>
        </form>
        <li class="form-line" data-type="control_scale" id="id_7">
  <label class="form-label form-label-top" id="ratingquestion" for="input_7">Quão satisfeito você está com a equipe que trabalha?</label>
  <div id="cid_7" class="form-input-wide" data-layout="full">
      <div role="radiogroup" aria-labelledby="label_7 sublabel_input_7_description" cellpadding="4" cellspacing="0" class="form-scale-table" data-component="scale" style="white-space: nowrap;">
        <div class="rating-item-group">
          <div class="rating-item">
            <span class="rating-item-title for-from"></span>
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="1" title="1" id="input_7_1" />
            <label for="input_7_1">1</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="2" title="2" id="input_7_2" />
            <label for="input_7_2">2</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="3" title="3" id="input_7_3" />
            <label for="input_7_3">3</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="4" title="4" id="input_7_4" />
            <label for="input_7_4">4</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="5" title="5" id="input_7_5" />
            <label for="input_7_5">5</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="6" title="6" id="input_7_6" />
            <label for="input_7_6">6</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="7" title="7" id="input_7_7" />
            <label for="input_7_7">7</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="8" title="8" id="input_7_8" />
            <label for="input_7_8">8</label>
          </div>
          <div class="rating-item">
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="9" title="9" id="input_7_9" />
            <label for="input_7_9">9</label>
          </div>
          <div class="rating-item">
            <span class="rating-item-title for-to"></span>
            <input type="radio" aria-describedby="label_7" class="form-radio" name="ratingq" value="10" title="10" id="input_7_10" />
            <label for="input_7_10">10</label>
          </div>
        </div>
      </div>
    </span>
  </div>
</li>
<li class="form-line" data-type="control_scale" id="ratingquestiontwo">
    <label class="form-label form-label-top form-label-auto" id="label_8" for="input_8">Quão satisfeito você está com as decisões da sua vida?</label>
    <div id="cid_8" class="form-input-wide" data-layout="full">
      <span class="form-sub-label-container" style="vertical-align:top">
        <div role="radiogroup" aria-labelledby="label_8 sublabel_input_8_description" cellpadding="4" cellspacing="0" class="form-scale-table" data-component="scale">
          <div class="rating-item-group">
            <div class="rating-item">
              <span class="rating-item-title for-from">
                 </span>
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="1" title="1" id="input_8_1" />
              <label for="input_8_1">1</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="2" title="2" id="input_8_2" />
              <label for="input_8_2">2</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="3" title="3" id="input_8_3" />
              <label for="input_8_3">3</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="4" title="4" id="input_8_4" />
              <label for="input_8_4">4</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="5" title="5" id="input_8_5" />
              <label for="input_8_5">5</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="6" title="6" id="input_8_6" />
              <label for="input_8_6">6</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="7" title="7" id="input_8_7" />
              <label for="input_8_7">7</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="8" title="8" id="input_8_8" />
              <label for="input_8_8">8</label>
            </div>
            <div class="rating-item">
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="9" title="9" id="input_8_9" />
              <label for="input_8_9">9</label>
            </div>
            <div class="rating-item">
              <span class="rating-item-title for-to">
              </span>
              <input type="radio" aria-describedby="label_8" class="form-radio" name="ratingq2" value="10" title="10" id="input_8_10" />
              <label for="input_8_10">10</label>
            </div>
          </div>
        </div>
      </span>
    </div>
  </li>
  <li class="form-line" data-type="control_button" id="id_submit">
    <div id="cid_submit" class="form-input-wide" data-layout="full">
      <button class="submit" id="submit" name="submit" >Enviar</button>
      <div class="loader">
        <div class="check">
          <spans class="check-one"></spans>
          <spans class="check-two"></spans>
        </div>
      </div>
    </div>
  </li>
  </div>
</body>
<script src="./Form/form.js"></script>

</html>



