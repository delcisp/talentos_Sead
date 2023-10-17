<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Formulário</title>
    @vite([ 'resources/sass/app.scss','resources/js/app.js', 'resources/css/mdb.min.css'])
    @vite(['public/js/form.js', 'public/js/pagination.js'])
    @vite(['public/css/form.css'])
    <link type="text/css" rel="stylesheet" href="https://cdn01.jotfor.ms/themes/CSS/5e6b428acc8c4e222d1beb91.css?v=3.3.42507" /> 
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700;900&display=swap" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css"/>
</head>
<style>
  body {
  background-image: url('{{ asset('images/timbrado_Sead.png') }}');
  background-size: cover;
  background-repeat: no-repeat;
  background-attachment: fixed;
  background-color:#fff;
}
.form-label-top {
    margin-left: 10px;
 }
.form-label-top-right {
    margin-right: 10px;
}
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


@media screen and (max-width: 569px) { 
  .competencias {
      grid-template-columns: repeat(2, 2fr);
      gap: 5px;
   
    }
}
</style>
<body>
    <form id="pagination-form" action="{{ url('/save-this') }}" method="POST" novalidate>
        @csrf

      <div class="form-container mx-auto mt-5">
        <div class="form-page" id="page-1">
        <div class="row">

          <div class="col-md-6"> 
            <label class="form-label-top" for="nome">Nome</label>
            <div class="form-outline-left">
              <input type="text" id="nome" name="name" class="form-control input-style" autocomplete="username" />
          
            </div>
          </div>


          <div class="col-md-6">
            <label class="form-label-top-right" for="sobrenome"  >Sobrenome</label>
            <div class="form-outline-right">
              <input type="text" id="sobrenome" name="lastname" class="form-control input-style" />
              
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
             <input type="text" id="telefone" class="form-control input-style" /> 
             </div>
           </div>

           <div class="col-md-6">
            <label class="form-label-top" for="cep">CEP</label>
            <div class="form-outline-left">
             <input type="text" id="cep" class="form-control input-style" placeholder="Insira o CEP para preenchimento automático de endereço"  /> 
             </div>
           </div>

             <div class="col-md-6">
              <label class="form-label-top-right" for="bairro">Bairro</label>
              <div class="form-outline-right">
               <input type="text" id="bairro" class="form-control input-style" /> 
               </div>
             </div>

             <div class="col-md-6">
              <label class="form-label-top" for="endereco">Endereço</label>
              <div class="form-outline-left">
               <input type="text" id="endereco" class="form-control input-style" /> 
               </div>
             </div>

             <div class="col-md-6"> 
              <label class="form-label-top-right" for="uf">Estado</label>
              <div class="form-outline-right">
                <input type="text" id="uf" class="form-control input-style" /> 
                </div>
              </div>

              <div class="col-md-6">
                <label class="form-label-top" for="cidade">Cidade</label>
                <div class="form-outline-left">
                 <input type="text" id="cidade" class="form-control input-style" /> 
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
              <label class="form-label-top-right" for="raca">Qual a sua cor ou raça?</label>
              <div class="form-outline-right">
              <select class="select form-control input-style" id="raca" name="raca" aria-placeholder="Selecione" >
                <option value="" disabled selected>Selecione</option>
                <option value="Amarela">Amarela</option>
                <option value="Branca">Branca</option>
                <option value="Parda">Parda</option>
                <option value="Preta">Preta</option>
                <option value="Indígena">Indígena</option>
                <option value="Prefiro não me classificar">Prefiro não me classificar</option>
              </select>
              </div>
             </div>

             <div class="col-md-6">
              <label class="form-label-top" for="firstquestion">Qual o seu grau de escolaridade?</label>
              <div class="form-outline-left">
              <select class="select form-control input-style" id="firstquestion" name="firstquestion" aria-placeholder="Selecione" >
                <option value="" disabled selected>Selecione</option>
                <option value="Ensino fundamental">Ensino fundamental</option>
                <option value="Ensino médio">Ensino médio</option>
                <option value="Ensino médio técnico">Ensino médio técnico</option>
                <option value="Graduação">Graduação</option>
                <option value="Pós-graduação">Pós-graduação</option>
                <option value="Especialização">Especialização</option>
                <option value="Mestrado">Mestrado</option>
                <option value="Doutorado">Doutorado</option>
              </select>
              <div class="mb-3" id="degreeTextareaDiv" style="display: none;" >
                <textarea class="form-control" id="degreeTextarea" name="degreetextarea" rows="2" placeholder="Informe aqui a sua formação" style="resize: none;" ></textarea>
            </div>
            <div class="mb-3" id="secondDegreeTextareaDiv" style="display: none;" >
              <textarea class="form-control" id="secondDegreeTextarea" name="seconddegreetextarea" rows="2" placeholder="Informe aqui a sua outra formação" style="resize: none;" ></textarea>
          </div>
              </div>
             </div>
             
             <div class="col-md-6">
              <label class="form-label-top-right" for="atuanaarea">Você já atua na sua área de formação?</label>
              <div class="form-outline-right">
              <select class="select form-control input-style" id="atuanaarea" name="atuanaarea" aria-placeholder="Selecione" >
                <option value="" disabled selected>Selecione</option>
                <option value="Sim">Sim</option>
                <option value="Não">Não</option>
              </select>
              </div>
             </div>
        </div> <!--AQUI FECHA O ROW-->
        
         <p class="text-center questions-titles">Qual a sua identidade de gênero?</p>
         <div class="form-check gender ">
          <input class="form-check-input" type="checkbox" value="Homem cisgênero" id="Homemcis" />
          <label class="form-check-label" for="Homemcis"><b>Homem cisgênero</b> (se identifica com o gênero que lhe foi atribuído ao nascer)</label>    
        </div>
        <div class="form-check gender ">
          <input class="form-check-input" type="checkbox" value="Mulher cisgênera" id="Mulhercis" />
          <label class="form-check-label" for="Mulhercis"><b>Mulher cisgênera</b> (se identifica com o gênero que lhe foi atribuído ao nascer)</label> 
        </div>
        <div class="form-check gender ">
          <input class="form-check-input" type="checkbox" value="Homem Trans" id="Homemtrans" />
          <label class="form-check-label" for="Homemtrans"><b>Homem Trans</b> (se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</label>
        </div>
        <div class="form-check gender ">
          <input class="form-check-input" type="checkbox" value="Mulher Trans" id="Mulhertrans" />
          <label class="form-check-label" for="Mulhertrans"><b>Mulher Trans</b> (se identifica com um gênero diferente daquele que lhe foi atribuído ao nascer)</label>
        </div>
        <div class="form-check gender ">
          <input class="form-check-input" type="checkbox" value="Não binário" id="Naobinario" />
          <label class="form-check-label" for="Naobinario"><b>Não binário</b> (não se sente pertencente ao gênero masculino ou ao feminino)</label>
        </div>
        <div class="form-check gender ">
          <input class="form-check-input" type="checkbox" value="Prefiro não me classificar" id="naoclassifica" />
          <label class="form-check-label" for="naoclassifica"><b>Prefiro não me classificar</b></label>
        </div>

        <div class="d-flex align-items-center">
          <!--ESSA DIV FAZ d-block (display block) para o <label> e mt-2 (margin top) para dar um espaçamento entre o <input> e o <label> -->
          </div>

        <p class="text-center questions-titles">Relacione abaixo até 3 cursos de curta duração que você considere importantes dentro da sua formação: </p>
        <div class="mb-3">
          <textarea class="form-control" id="sugestao" rows="4" placeholder="Digite aqui os seus cursos" style="resize: none;" ></textarea>
      </div>
      
        </div> <!--AQUI ACABA A PÁGINA 1-->


        <div class="form-page" id="page-2">
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
            <label class="form-label-top-right" for="temposervico">Quanto tempo está na instituição?</label>
            <div class="form-outline-right">
            <select class="select form-control input-style" id="temposervico" name="timeofservice" aria-placeholder="Selecione" >
              <option value="" disabled selected>Selecione</option>
              <option value="Menos de 1 ano">Menos de 1 ano</option>
              <option value="De 1 a 3 anos">De 1 a 3 anos</option>
              <option value="De 5 a 10 anos">De 5 a 10 anos</option>
              <option value="Mais de 10 anos">Mais de 10 anos</option>
            </select>
            </div>
           </div>

           <div class="col-md-6">
            <label class="form-label-top" for="cargo">Cargo atual</label>
            <div class="form-outline-left">
            <select class="select form-control input-style" id="cargo" name="role" aria-placeholder="Selecione" >
              <option value="" disabled selected>Selecione</option>
              <option value="A">A</option>
              <option value="B">B</option>
              <option value="C">C</option>
              <option value="D">D</option>
            </select>
            </div>
           </div>

           <div class="col-md-6">
            <label class="form-label-top-right" for="permuta">Você tem interesse em </label>
            <a href="#" data-mdb-toggle="permuta?" title="Interesse em trocar de setor com outro servidor" style="font-size: 20px;">permuta?</a>
            <div class="form-outline-right">
            <select class="select form-control input-style" id="permuta" name="permuta" aria-placeholder="Selecione" >
              <option value="" disabled selected>Selecione</option>
              <option value="Sim">Sim</option>
              <option value="Não">Não</option>
            </select>
            </div>
           </div>

</div> <!--AQUI ACABA O ROW-->

<p class="text-center questions-titles">Qual a forma de realização de trabalho você prefere?</p> 
<div class="form-check realizacaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Prefiro trabalhar sozinho" name="formadetrabalho" id="trabalharsozinho" />
  <label class="form-check-label" for="trabalharsozinho">Prefiro trabalhar sozinho</label>    
</div>
<div class="form-check realizacaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Prefiro trabalhar em grupo" name="formadetrabalho" id="trabalharemgrupo" />
  <label class="form-check-label" for="trabalharemgrupo">Prefiro trablhar em grupo</label>    
</div>
<div class="form-check realizacaodetrabalho ">
  <input class="form-check-input" type="checkbox" value="Não tenho preferências" name="formadetrabalho" id="naoseimporta" />
  <label class="form-check-label" for="naoseimporta">Não tenho preferências</label>    
</div>

<p class="text-center questions-titles">Você tem interesse em entrar para o programa de Teletrabalho?</p> 
<div class="form-check teletrabalho ">
  <input class="form-check-input" type="checkbox" value="Sim" name="teletrabalho" id="teletrabalhosim" />
  <label class="form-check-label" for="teletrabalhosim">Sim</label>    
</div>
<div class="form-check teletrabalho ">
  <input class="form-check-input" type="checkbox" value="Não" name="teletrabalho" id="teletrabalhonao" />
  <label class="form-check-label" for="teletrabalhonao">Não</label>    
</div>
<div class="form-check teletrabalho ">
  <input class="form-check-input" type="checkbox" value="Não se aplica" name="formadetrabalho" id="naoseaplica" />
  <label class="form-check-label" for="naoseaplica">Não se aplica</label>    
</div>

<p class="text-center questions-titles">Como você costuma agir quando participa de reuniões de trabalho?</p> 
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

<p class="text-center questions-titles">Como você costuma agir diante de prazos e metas?</p> 
<div class="form-check deadlines ">
  <input class="form-check-input" type="checkbox" value="Organizo minhas atividades para realizá-las dentro do prazo determinado" name="deadlines" id="deadlineorganizo" />
  <label class="form-check-label" for="deadlineorganizo">Organizo minhas atividades para realizá-las dentro do prazo determinado</label>    
</div>
<div class="form-check deadlines ">
  <input class="form-check-input" type="checkbox" value="Priorizo, a partir da indicação do(a) gestor(a), as atividades com prazos específicos" name="deadlines" id="deadlinepriorizo" />
  <label class="form-check-label" for="deadlinepriorizo">Priorizo, a partir da indicação do(a) gestor(a), as atividades com prazos específicos</label>    
</div>
<div class="form-check deadlines ">
  <input class="form-check-input" type="checkbox" value="Priorizo, de forma autônoma, as atividades com prazos específicos" name="deadlines" id="deadlineespecificos" />
  <label class="form-check-label" for="deadlineespecificos">Priorizo, de forma autônoma, as atividades com prazos específicos</label>    
</div>
<div class="form-check deadlines ">
  <input class="form-check-input" type="checkbox" value="Tenho dificuldade quanto ao atendimento de prazos mas busco realizar as atividades de forma satisfatória e atingir a meta." name="deadlines" id="deadlinedifuc" />
  <label class="form-check-label" for="deadlinedifuc">Tenho dificuldade quanto ao atendimento de prazos mas busco realizar as atividades de forma satisfatória e atingir a meta.</label>    
</div>

<p class="text-center questions-titles">Selecione até 5 competências socioemocionais que você se identifica: </p>
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

<p class="text-center questions-titles">Selecione 5 competências técnicas que você se identifica: </p> 
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

        </div> <!--AQUI ACABA A PÁGINA 2-->


        <div class="form-page" id="page-3">
      
          <p class="text-center questions-titles">Habilidade espacial</p>
          <p class="small text-center ">Compreendo e elaboro facilmente quadros, desenhos, esquemas, gráficos e tabelas.  </p>
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

          <p class="text-center questions-titles"> Habilidade corporal </p>
          <p class="small text-center ">Tenho capacidade de equilíbrio flexibilidade, velocidade e coordenação motora.  </p>
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

          <p class="text-center questions-titles">Habilidade musical </p>
          <p class="small text-center ">Possuo afinidade com instrumentos musicais, ritmo e harmonia. </p>
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
    
           <p class="text-center questions-titles">Habilidade linguística</p>
           <p class="small text-center ">Possuo facilidade em aprender novos idiomas bem como para me expressar oralmente ou através da escrita. </p>
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

          <p class="text-center questions-titles">Habilidade Lógico-Matemática </p>

          <p class="small text-center ">Tenho boa capacidade de raciocínio lógico, compreensão de cálculos,
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
   
        <p class="text-center questions-titles"> Habilidade interpessoal </p>
        
        <p class="small text-center ">Possuo afinidade com instrumentos musicais, ritmo e harmonia. </p>

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

           <p class="text-center questions-titles"> Habilidade naturalista</p>
           <p class="small text-center ">Possuo sensibilidade para reconhecer a importância dos elementos da natureza e sua relação com a vida humana. </p>             
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
 
             <p class="text-center questions-titles">Habilidade emocional</p>
             <p class="small text-center ">Possuo afinidade com instrumentos musicais, ritmo e harmonia. </p>
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
        <p class="text-center questions-titles">Se você pudesse trabalhar em outros setores, quais seriam? </p>
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
  <p class="text-center questions-titles" >Selecione até 3 habilidades sociais, artísticas, culturais e esportivas que gostaria de conduzir/participar na SEAD. </p>
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
            <input type="checkbox" class="form-check-input" id="habsace9" name="habsace[]"
              value="Fotografia" />
            <label class="form-check-label d-block mt-2" for="habsace9">Fotografia</label>
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

        <p class="text-center questions-titles" > Selecione até 5 atividades com as quais você prefere trabalhar</p>
        <div class="competencias">
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp1" name="atividadesp[]"
              value="Atendimento ao público externo/intero" />
            <label class="form-check-label d-block mt-2" for="atividadesp1">Atendimento ao público externo e interno</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp2" name="atividadesp[]"
              value="trabalho com recursos tecnológicos, digitais, virtuais" />
            <label class="form-check-label d-block mt-2" for="atividadesp2">trabalho com recursos tecnológicos, digitais, virtuais</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp3" name="atividadesp[]"
              value="Confecção de despachos, pareceres e decisões relacionados às atividades de assessoria jurídica" />
            <label class="form-check-label d-block mt-2" for="atividadesp3">Confecção de despachos, pareceres e decisões relacionados às atividades de assessoria jurídica</label>
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
            <label class="form-check-label d-block mt-2" for="atividadesp7">dados estatísticos e/ou financeiros</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp8" name="atividadesp[]"
              value="Elaboração de documentos" />
            <label class="form-check-label d-block mt-2" for="atividadesp8">Elaboração de documentos</label>
          </div>
          <div class="form-check-competencias">
            <input type="checkbox" class="form-check-input" id="atividadesp9" name="atividadesp[]"
              value="projetos e relatórios" />
            <label class="form-check-label d-block mt-2" for="atividadesp9">projetos e relatórios</label>
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
        </form>
  
          
  </div>
        </div> <!--AQUI ACABA A PÁGINA 3-->
        <div class="d-flex justify-content-between">
          <button type="button" class="btn btn-outline-primary btn-rounded" id="prev-button" data-mdb-ripple-color="dark">Anterior</button>
          <button type="button" class="btn btn-outline-primary btn-rounded" id="next-button" data-mdb-ripple-color="dark">Próximo</button>
          <button type="submit" class="btn btn-outline-primary btn-rounded" id="submit" data-mdb-ripple-color="dark" style="display: none;">Enviar</button>
      </div>
        </div> <!--aqui acaba o form-container !! -->
</body>
</html>