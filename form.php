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
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery.mask/1.14.16/jquery.mask.js"> </script>
  <link rel="stylesheet" href="./Form/form.css">
  <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
  <script src="./Form/pagination.js" defer></script>
  <script src="./Form/form.js"></script>
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
                <input type="text" id="firstname" name="firstname" class="form-textbox" data-defaultvalue=""
                  data-component="first" aria-labelledby="label_1 sublabel_1_first"
                  value="<?php echo isset($_POST['firstname']) ? htmlspecialchars($_POST['firstname']) : ''; ?>"
                  required>
                <label class="form-sub-label" for="first_1" id="sublabel_1_first" style="min-height:13px"
                  aria-hidden="false">Primeiro nome</label>
              </span>
              <span class="form-sub-label-container" style="vertical-align:top" data-input-type="last">
                <input type="text" id="lastname" name="lastname" class="form-textbox" data-defaultvalue=""
                  autoComplete="section-input_1 family-name" size="" data-component="last"
                  aria-labelledby="label_1 sublabel_1_last"
                  value="<?php echo isset($_POST['lastname']) ? htmlspecialchars($_POST['lastname']) : ''; ?>" required>
                <label class="form-sub-label" for="last_1" id="sublabel_1_last" style="min-height:13px"
                  aria-hidden="false">Último nome</label>
              </span>
            </div>
          </div>
        </li>
        <li class="form-line form-line-column form-line-column-right form-line-container" data-type="control_dropdown"
          id="id_data">
          <label class="form-label form-label-top form-label-data " id="birdhdate"> Data de Nascimento</label>
          <input type="text" id="data" name="birthdate" class="form-textbox form-date" data-component="date">
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
        <li class="form-line form-line-column " data-type="control_dropdown" id="id_4">
          <label class="form-label form-label-top" id="firstquestion" for="input_4">Você tem graduação?</label>
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
        <li class="form-line form-line-column form-col-2 form-line-column-right-two" data-type="control_dropdown"
          id="id_2">
          <label class="form-label form-label-top" id="departament" for="input_2">Departamento</label>
          <div id="cid_2" class="form-input-wide" data-layout="half">
            <select class="form-dropdown" id="input_2" name="departament" aria-label="Department">
              <option>Selecione</option>
              <option>AAA</option>
            </select>
          </div>
        </li>
        <li class="form-line form-line-column form-col-2 form-line-column-right-three" data-type="control_dropdown" id="id_2">
          <label class="form-label form-label-top" id="" for="input_2">Telefone</label>
          <div id="cid_2" class="form-input-wide" data-layout="half">
            <input type="text" id="telefone" name="telefone" class="form-textbox">
          </div>
        </li>
     
      </div>
      
</div> <!-- fechando a pagina 1 -->

<div class="form-page" id="page-2" style="display: none;">   

      <label for="competence-select" class="form-label form-label-top form-label-config">Selecione até 5 Competências
        Técnicas que
        você se identifica:</label>
      <div class="competencias">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="hardcompetencia1" name="hardcompetencia[]"
            value="Proficiências completa em Word, Excel, PowerPoint e Outlook" />
          <label class="form-check-label" for="hardcompetencia1">Proficiências completa em Word, Excel, PowerPoint e
            Outlook</label>
        </div>
      </div>
      <label for="competence-select" class="form-label form-label-top form-label-config">Selecione até 5 Competências
        Socioemocionais que
        você se identifica:</label>
      <!-- Formulário -->
      <div class="competencias">
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia1" name="competencia[]" value="Afabilidade" />
          <label class="form-check-label" for="competencia1">Afabilidade</label>
        </div>
        
        <div class="form-check">
          <input type="checkbox" class="form-check-input" id="competencia43" name="competencia[]"
            value="Visão crítica"/>
          <label class="form-check-label" for="competencia43">Visão crítica</label>
        </div>
      </div>

      </div> <!-- fechando a pagina 2 -->

      <div class="form-page" id="page-3" style="display: none;">
      <!-- Selecionar competencias -->
      
      <li class="form-line" data-type="control_scale" id="id_7">
        <label class="form-label form-label-top" id="ratingquestion" for="input_7">Quão satisfeito você está com a
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
        <label class="form-label form-label-top form-label-auto" id="label_8" for="input_8">Quão satisfeito você está
          com as
          decisões da sua vida?</label>
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
      
      

    </div>
    <div class="form-navigation">
        <button type="button" id="prev-button" >Anterior</button>
        <button type="button" id="next-button">Próximo</button>
        <button type="submit" id="submit-button" style="display: none;">Enviar</button>
      </div> 
  </form>
  </div> <!-- fechando a pagina 3 -->
</body>
</html>