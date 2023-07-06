<?php

include_once('config.php');

$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $conn->query($sql);

$sql = "SELECT competencia FROM usuarios";
$resultCompetencia = $conn->query($sql);

// Array para armazenar as competências mais selecionadas
$competencias = array();

// Verifica se a consulta retornou resultados
if ($resultCompetencia->num_rows > 0) {
    // Loop pelos resultados da consulta
    while ($row = $resultCompetencia->fetch_assoc()) {
        $competenciasSelecionadas = explode(", ", $row["competencia"]);
        foreach ($competenciasSelecionadas as $competencia) {
            $competencias[] = $competencia;
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
?>



<!DOCTYPE html>
<html dir="ltr" lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Dashboard Admin</title>
    
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="Imagens/user.png">
    <!-- Custom CSS -->
    <link href="DashboardT/assets/libs/chartist/dist/chartist.min.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="DashboardT/dist/css/style.min.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/index.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/percent.js"></script>
    <script src="https://cdn.amcharts.com/lib/5/themes/Animated.js"></script>
    <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">

    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>

<style>
       .search-bar {
      margin-bottom: 20px;
    }

    .search-bar input {
      padding-right: 30px;
    }

    .search-icon {
      position: relative;
      right: 37px;
      pointer-events: none;
      width: 40px;
      height: 35px;
    }
    .left-sidebar {
    padding: 3px;
}
#chartdiv {
      width: 100%;
      height: 400px;
    }
    .custom-class {
    background-color: #f0f0f0;
    color: #000;
    text-align: center;
}
.border-top-0 {
    text-align: center;
} 


#cardgrafico.card-body.text-center {
    margin-left: 50px;
    
}
h1 {
    text-align: center;
    text-size-adjust: 12px;
}
.card-container {
    height: 600px;
    width: 900px;
    padding: 20px;
    
}
.container-fluid {
    background-color: #E1EBEE;;
}
</style>

<body>
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="lds-ripple">
            <div class="lds-pos"></div>
            <div class="lds-pos"></div>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper" data-layout="vertical" data-navbarbg="skin5" data-sidebartype="full"
        data-sidebar-position="absolute" data-header-position="absolute" data-boxed-layout="full">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
     
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse collapse" id="navbarSupportedContent" data-navbarbg="skin5">
                    <!-- ============================================================== -->
        
                       
                    </ul>
                    <!-- ============================================================== -->
                    <!-- Right side toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav float-end">
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    
                        <!-- ============================================================== -->
                        <!-- User profile and search -->
                        <!-- ============================================================== -->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar" data-sidebarbg="skin6">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <!-- User Profile-->
                        <li>
                            <!-- User Profile-->
                            <div class="user-profile d-flex no-block dropdown m-t-20">
                                <div class="user-pic"><img src="Imagens/user.png" alt="users"
                                        class="rounded-circle" width="40" /></div>
                                <div class="user-content hide-menu m-l-10">
                                    <a href="#" class="" id="Userdd" role="button"
                                        data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                        <h5 class="m-b-0 user-name font-medium">Admin Admin <i
                                                class=""></i></h5>
                                        <span class="op-5 user-email">admin@gmail.com</span>
                                    </a>
                                   
                                </div>
                            </div>
                            <!-- End User Profile-->
                        </li>
                      
                        <!-- User Profile-->
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="lgpd.php" aria-expanded="false"><i class="mdi mdi-view-dashboard"></i><span
                                    class="hide-menu">Formulário</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="pages-profile.html" aria-expanded="false"><i
                                    class="mdi mdi-account-network"></i><span class="hide-menu">Funcionários</span></a></li>
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="table-basic.html" aria-expanded="false"><i class="mdi mdi-border-all"></i><span
                                    class="hide-menu">Lorem</span></a></li>
                        
                        <li class="sidebar-item"> <a class="sidebar-link waves-effect waves-dark sidebar-link"
                                href="error-404.html" aria-expanded="false"><i class="mdi mdi-alert-outline"></i><span
                                    class="hide-menu">404</span></a></li>
                        <li class="text-center p-40 upgrade-btn">
                         
                        </li>
                    </ul>

                </nav>
            </div>
        </aside>
       
        <div class="page-wrapper">
          
            <div class="container-fluid">
                <div class="row d-flex justify-content-center">
                    <div class="col-md-8">
                    <div class="card-container">
                    <div class="card">
                    <h1>COMPETENCIAS MAIS SELECIONADAS</h1>
                         <div class="card-body text-center">
                                <div class="d-md-flex align-items-center">
                                    
                                <div id="chartdiv"></div>
                                <script>
    am5.ready(function() {
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
            x: am5.percent(50),
            marginTop: 15,
            marginBottom: 15
        }));

        legend.data.setAll(series.dataItems);

        series.appear(1000, 100);
    });
</script>





                                </div>
                                </div>
                            </div>
                        </div>
                    </div>
               
                </div>
                <!-- ============================================================== -->
                <!-- Sales chart -->
                <!-- ============================================================== -->
                <!-- ============================================================== -->
                <!-- Table -->
                <!-- ============================================================== -->
                <div class="row">
                    <!-- column -->
                    <div class="col-12">
                        <div class="card">
                                        <div class="card-body">
                                            <div class="search-bar">
                                            <div class="input-group">
        <input id="searchInput" type="text" class="form-control" placeholder="Pesquisar servidor, cargo, competência">
            <div class="input-group-append">
                <button class="btn btn-outline-secondary" type="button">
                <i class="fa fa-search"></i>
                </button>
            </div>
            </div>

                                  </div>
                            </div>
                            <div class="table-responsive">
                                <table class="table v-middle">
                                    <thead>
                                        <tr class="bg-light">
                                            <th class="border-top-0">Usuário</th>
                                            <th class="border-top-0">Departamento</th>
                                            <th class="border-top-0">Cargo</th>
                                            <th class="border-top-0">Formações</th>
                                            <th class="border-top-0">Cursos extras</th>
                                            <th class="border-top-0">Departamento Opcional</th>
                                            <th class="border-top-0">Competências</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        while($user_data = mysqli_fetch_assoc($result))
                                        {   
                                            echo "<tr>";
                                            echo "<td class='custom-class'>".$user_data['firstname']." ".$user_data['lastname']."</td>";
                                            echo "<td class='custom-class'>".$user_data['departament']. "</td>";
                                            echo "<td class='custom-class'>".$user_data['role']. "</td>";
                                            echo "<td class='custom-class'>".$user_data['firstquestion']. "</td>";
                                            echo "<td class='custom-class'>".$user_data['secondquestion']. "</td>";
                                            echo "<td class='custom-class'>".$user_data['thirdquestion']. "</td>";
                                            echo "<td class='custom-class'>".$user_data['competencia']. "</td>"; 
                                            echo "</tr>";
                                        }
                                        
                                        ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
               
            </div>
            <footer class="footer text-center">
                
            </footer>
            <!-- ============================================================== -->
            <!-- End footer -->
            <!-- ============================================================== -->
        </div>

    </div>
  
    <script src="DashboardT/assets/libs/jquery/dist/jquery.min.js"></script>
    <!-- Bootstrap./../assets/libs/jquery/dist/jquery.min.js tether Core JavaScript -->
    <script src="DashboardT/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <script src="DashboardT/dist/js/app-style-switcher.js"></script>
    <!--Wave Effects -->
    <script src="DashboardT/dist/js/waves.js"></script>
    <!--Menu sidebar -->
    <script src="DashboardT/dist/js/sidebarmenu.js"></script>
    <!--Custom JavaScript -->
    <script src="DashboardT/dist/js/custom.js"></script>
    <!--This page JavaScript -->
    <!--chartis chart-->
    <script src="DashboardT/assets/libs/chartist/dist/chartist.min.js"></script>
    <script src="DashboardT/assets/libs/chartist-plugin-tooltips/dist/chartist-plugin-tooltip.min.js"></script>
    <script src="DashboardT/dist/js/pages/dashboards/dashboard1.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
  $(document).ready(function() {
    $('#searchInput').on('input', function() {
      var searchTerm = $(this).val().toLowerCase();
      $('table tbody tr').filter(function() {
        $(this).toggle($(this).find('td.custom-class').text().toLowerCase().indexOf(searchTerm) > -1);
      });
    });
  });
</script>

</body>

</html>