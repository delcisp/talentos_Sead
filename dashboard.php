<?php
include_once('config.php');

$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $conn->query($sql);

$sql = "SELECT competencia FROM usuarios";
$resultCompetencia = $conn->query($sql);

$query = "SELECT id FROM usuarios ORDER BY id DESC LIMIT 1";
$resultId = mysqli_query($conn, $query);

if ($resultId) {
    // Verifique quantas linhas foram retornadas (deve ser 1 ou 0)
    $numRows = mysqli_num_rows($resultId);

    if ($numRows > 0) {
        // O último ID registrado é igual ao número de registros
        $row = mysqli_fetch_assoc($resultId);
        $ultimoID = $row['id'];

        // Defina uma variável JavaScript com o valor
        echo "<script>var numeroServidores = {$ultimoID};</script>";
    } else {
        // Não há registros na tabela
        echo "<script>var numeroServidores = 0;</script>";
    }

    // Lembre-se de liberar o resultado da consulta
    mysqli_free_result($resultId);
} else {
    // Lida com erros de consulta, se houver algum
    echo "Erro na consulta: " . mysqli_error($conn);
}


// Array para armazenar as competências mais selecionadas
$competencias = array();

// Verifica se a consulta retornou resultados
if ($resultCompetencia->num_rows > 0) {
    // Loop pelos resultados da consulta
    while ($row = $resultCompetencia->fetch_assoc()) {
        if (!is_null($row["competencia"])) {
            $competenciasSelecionadas = explode(", ", $row["competencia"]);
            foreach ($competenciasSelecionadas as $competencia) {
                $competencias[] = $competencia;
            }
        }
    }
}
// Conta as ocorrências de cada competência
$competenciasContagem = array_count_values($competencias);

// Ordena as competências por contagem em ordem decrescente
arsort($competenciasContagem);

// Pega as 5 competências mais selecionadas
$competenciasSelecionadas = array_keys(array_slice($competenciasContagem, 0, 5));

$competenciasData = array();
foreach ($competenciasSelecionadas as $competencia) {
    $competenciasData[] = array(
        "category" => $competencia,
        "value" => $competenciasContagem[$competencia]
    );
}

$competenciasPHP = json_encode($competenciasData);

$sql = "SELECT hardcompetencia FROM usuarios";
$resultHardCompetencia = $conn->query($sql);

$hardcompetencias = array();

if ($resultHardCompetencia->num_rows > 0) {
    while ($row = $resultHardCompetencia->fetch_assoc()) {
        if(!is_null($row["hardcompetencia"])) {
        $hardCompetenciasSelecionadas = explode("/", $row["hardcompetencia"]); // Use a unique delimiter
        foreach ($hardCompetenciasSelecionadas as $hardcompetencia) {
            // Exclude empty or undefined hardcompetencias
            if (!empty(trim($hardcompetencia))) {
                $hardcompetencias[] = $hardcompetencia;
            }
        }
        }
    }
}

$hardCompetenciasContagem = array_count_values($hardcompetencias);
arsort($hardCompetenciasContagem);
$hardCompetenciasSelecionadas = array_keys(array_slice($hardCompetenciasContagem, 0, 5)); // Slice the first 5 elements

$hardCompetenciasData = array();
foreach ($hardCompetenciasSelecionadas as $hardcompetencia) {
    $hardCompetenciasData[] = array(
        "category" => $hardcompetencia,
        "value" => $hardCompetenciasContagem[$hardcompetencia]
    );
}

$hardCompetenciasPHP = json_encode($hardCompetenciasData);

$sql = "SELECT firstquestion FROM usuarios ORDER BY id DESC";
$resultFirstquestion = $conn->query($sql);

$firstquestion = array();

while ($row = $resultFirstquestion->fetch_assoc()) {
    $firstquestion[] = $row['firstquestion'];
}

$firstquestionContagem = array_count_values($firstquestion);
arsort($firstquestionContagem);

$firstquestionSelecionadas = array_keys(array_slice($firstquestionContagem, 0, 5));

$firstquestionData = array();
foreach ($firstquestionSelecionadas as $firstquestion) {
    $firstquestionData[] = array(
        "category" => $firstquestion,
        "value" => $firstquestionContagem[$firstquestion]
    );
}

$firstquestionPHP = json_encode($firstquestionData);
mysqli_close($conn);
?>

<!DOCTYPE html>

<html lang="pt-br">

<head>
    <meta charset="utf-8">
    <link rel="apple-touch-icon" sizes="76x76" href="../assets/img/apple-icon.png">
    <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
    <title>Dashboard</title>
    <meta content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0, shrink-to-fit=no'
        name='viewport' />
    <!--     Fonts and icons     -->
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700,200" rel="stylesheet" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/latest/css/font-awesome.min.css" />
    <!-- CSS Files -->
    <link href="dashboard/css/bootstrap.min.css" rel="stylesheet" />
    <link href="dashboard/css/light-bootstrap-dashboard.css?v=2.0.0 " rel="stylesheet" />

    <link href="dashboard/css/demo.css" rel="stylesheet" />
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
</head>
<style>
    #chartdiv {
        width: 100%;
        height: 700px;
        align-items: center;
    }

    #chartdivtwo {
        width: 100%;
        height: 700px;
        align-items: center;
    }

    #chartdivthird {
        width: 100%;
        height: 700px;
        align-items: center;
    }

    .content {
        background-color: #FBFFFF;
        /* #E1EBEE; */
    }

    .main-panel {
        background-color: #FBFFFF;
    }
</style>

<body>
    <div class="wrapper">
        <div class="sidebar">

            <div class="sidebar-wrapper">
                <div class="logo">
                    <a href="#" class="simple-text">
                        Gestão de Competências
                    </a>
                </div>
                <ul class="nav">
                    <li class="nav-item active">
                        <a class="nav-link" href="#">
                            <img width="40" height="40" src="https://img.icons8.com/ios/50/laptop-metrics--v2.png"
                                alt="laptop-metrics--v2" />
                            <p>Dashboard</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../../dashtable.php">
                            <img width="40" height="40"
                                src="https://img.icons8.com/ios/50/commercial-development-management.png"
                                alt="commercial-development-management" />
                            <p>Quadro de servidores</p>
                        </a>
                    </li>
                    <li>
                        <a class="nav-link" href="../../lgpd.php">
                            <img width="40" height="40"
                                src="https://img.icons8.com/external-smashingstocks-mixed-smashing-stocks/68/external-Form-audit-smashingstocks-mixed-smashing-stocks.png"
                                alt="external-Form-audit-smashingstocks-mixed-smashing-stocks" />
                            <p>Formulário</p>
                        </a>
                    </li>

                </ul>
            </div> <!--fecha o sidebar-wrapper-->
        </div> <!--fecha a class sidebar -->
        <div class="main-panel">
            <!-- Navbar -->
            <nav class="navbar navbar-expand-lg " color-on-scroll="500">
                <div class="container-fluid">
                    <a class="navbar-brand" href="#"></a>
                    <button href="" class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse"
                        aria-controls="navigation-index" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                        <span class="navbar-toggler-bar burger-lines"></span>
                    </button>
                    <div class="collapse navbar-collapse justify-content-end" id="navigation">
                    <h1 style="font-size: 35px; margin-left: auto; font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif " ><script>document.write(numeroServidores);</script> SERVIDORES PARTICIPARAM DA PESQUISA</h1>
                        <ul class="nav navbar-nav mr-auto">
                            <li class="nav-item">
                                <a href="#" class="nav-link" data-toggle="dropdown">

                                    <span class="d-lg-none">Dashboard</span>
                                </a>
                            </li>
                        </ul>
                        <ul class="navbar-nav ml-auto">
                            <li class="nav-item">
                                <a class="nav-link" href="../../index.php">
                                    <img width="28" height="28" src="https://img.icons8.com/metro/26/exit.png"
                                        alt="exit" />
                                    <span class="no-icon">Sair</span>
                                </a>
                            </li>
                        </ul>
                    </div>
                </div>
            </nav>
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Soft Skills</h4>
                                    <p class="card-category">Mais selecionadas pelos servidores</p>
                                </div>
                                <div class="card-body">
                                    <div id="chartdiv"></div>

                                    <script>
                                        am5.ready(function () {
                                            var root = am5.Root.new("chartdiv");
                                            root.setThemes([am5themes_Animated.new(root)]);

                                            var chart = root.container.children.push(am5percent.PieChart.new(root, {
                                                layout: root.verticalLayout
                                            }));

                                            var series = chart.series.push(am5percent.PieSeries.new(root, {
                                                valueField: "value",
                                                categoryField: "category"
                                            }));

                                            var competenciasData = <?php echo $competenciasPHP; ?>;
                                            series.data.setAll(competenciasData);

                                            var legend = chart.children.push(am5.Legend.new(root, {
                                                centerX: am5.percent(50),
                                                x: am5.percent(30),
                                                marginTop: 15,
                                                marginBottom: 15
                                            }));

                                            legend.data.setAll(series.dataItems);

                                            series.appear(1000, 100);
                                        });
                                    </script>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Atualizado agora
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Hard Skills</h4>
                                    <p class="card-category">Mais selecionadas pelos servidores</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartdivtwo"></div>
                                    <script>
                                        am5.ready(function () {
                                            var root = am5.Root.new("chartdivtwo");
                                            root.setThemes([am5themes_Animated.new(root)]);

                                            var chart = root.container.children.push(am5percent.PieChart.new(root, {
                                                layout: root.verticalLayout
                                            }));

                                            var series = chart.series.push(am5percent.PieSeries.new(root, {
                                                valueField: "value",
                                                categoryField: "category"
                                            }));

                                            var hardCompetenciasData = <?php echo $hardCompetenciasPHP; ?>;
                                            series.data.setAll(hardCompetenciasData);

                                            var legend = chart.children.push(am5.Legend.new(root, {
                                                centerX: am5.percent(48),
                                                x: am5.percent(80),
                                                marginTop: 15,
                                                marginBottom: 15
                                        
                                            }));

                                            legend.data.setAll(series.dataItems);

                                            series.appear(1000, 100);
                                        });
                                    </script>

                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Atualizado agora
                                    </div>
                                </div>
                            </div>
                        </div>
                        <hr>
                        <div class="col-md-4">
                            <div class="card ">
                                <div class="card-header ">
                                    <h4 class="card-title">Formações Superior</h4>
                                    <p class="card-category">Mais selecionadas pelos servidores</p>
                                </div>
                                <div class="card-body ">
                                    <div id="chartdivthird"></div>
                                    <script>
                                        am5.ready(function () {

                                            var root = am5.Root.new("chartdivthird");

                                            root.setThemes([
                                                am5themes_Animated.new(root)]);
                                            var chart = root.container.children.push(am5percent.PieChart.new(root, {
                                                layout: root.verticalLayout
                                            }));
                                            var series = chart.series.push(am5percent.PieSeries.new(root, {
                                                valueField: "value",
                                                categoryField: "category"
                                            }));

                                            var firstquestionData = <?php echo $firstquestionPHP; ?>;
                                            series.data.setAll(firstquestionData);

                                            var legend = chart.children.push(am5.Legend.new(root, {
                                                centerX: am5.percent(50),
                                                x: am5.percent(50),
                                                marginTop: 15,
                                                marginBottom: 15
                                            }));
                                            legend.data.setAll(series.dataItems);
                                            series.appear(1000, 100);

                                        }); 
                                    </script>
                                    <hr>
                                    <div class="stats">
                                        <i class="fa fa-clock-o"></i> Atualizado agora
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div> <!--fecha o primeiro row -->
                </div>
            </div> <!-- fecha o segundo row -->
        </div> <!--fecha o container fluid -->
    </div> <!--fecha o content -->
    </div> <!--fecha a class main panel-->
    </div> <!--fecha a class wrapper -->
</body>
<script src="dashboard/js/jquery.3.2.1.min.js" type="text/javascript"></script>
<script src="dashboard/js/popper.min.js" type="text/javascript"></script>
<script src="dashboard/js/bootstrap.min.js" type="text/javascript"></script>
<script src="dashboard/plugins/bootstrap-switch.js"></script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=YOUR_KEY_HERE"></script>
<script src="dashboard/plugins/chartist.min.js"></script>
<script src="dashboard/plugins/bootstrap-notify.js"></script>
<script src="dashboard/plugins/light-bootstrap-dashboard.js?v=2.0.0 " type="text/javascript"></script>
<script src="dashboard/plugins/demo.js"></script>
<script type="text/javascript">

</script>

</html>