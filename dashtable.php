<?php
include_once('config.php');
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Quadro de funcionários</title>
    <link href="https://unpkg.com/tailwindcss@1.5.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="icon" href="Imagens/icon_sead.ico" type="image/ico">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</head>
<style>
    .hidden {
        display: none;
    }

    @media (min-width: 768px) and (max-width: 1024px) {
        .table-container {
            max-height: 400px;
            width: 900px;
            align-items: center;
            overflow-y: scroll;
            overflow-x: scroll;

        }

        .input-container {
            width: 20%;
            /* Ou qualquer outro valor que você preferir */
        }

        /* Outros estilos para telas grandes */
        body {
            width: 400px;
            align-items: center;
            flex-direction: center;
            margin-left: 300px;
            background-color: #E1EBEE;
        }

    }

    /* Estilos para tela média (maior que 568px) */
    @media (min-width: 375px) and (max-width: 667px) {
        .table-container {
            height: 500px;
            width: 350px;
            align-items: center;
            overflow-y: scroll;
            overflow-x: scroll;

        }

        /* Outros estilos para telas grandes */
        body {
            width: 500px;
            align-items: center;
            flex-direction: center;

        }

    }
</style>

<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #E1EBEE;">
    <div class="position-relative">
        <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
            <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12"
                id="headerr">
                <div class="flex justify-between">
                    <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                        <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                            <div class="flex">
                                <span
                                    class="flex items-center leading-normal bg-transparent rounded rounded-r-none  lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                    <svg width="12" height="12" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none"
                                        xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z"
                                            stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                        <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64"
                                            stroke-linecap="round" stroke-linejoin="round" />
                                    </svg>
                                </span>
                            </div>
                            <input type="text" id="searchInput" name="search"
                                class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 rounded rounded-l-none px-3 relative focus:outline-none text-xs lg:text-base text-gray-500 font-thin sm:w-full md:w-1/2 lg:w-7/12"
                                placeholder="Procure por servidor, cargo, departamento">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div
            class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
            <div class="table-container" style="max-height: 600px; overflow-y: scroll;">
                <div class="table-responsive">
                    <table id="userTable" class="min-w-full">
                        <thead>
                            <tr>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">
                                    Usuário</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                    Departamento</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">
                                    Cargo</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                    Formações</th>
                                <th
                                    class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">
                                    Departamento Opcional</th>
                                <th class="px-6 py-3 border-b-2 border-gray-300"></th>
                            </tr>
                        </thead>
                        <tbody class="bg-white">
                            <?php
                            $query = "SELECT * FROM usuarios ORDER BY firstname ASC";
                            $result = mysqli_query($conn, $query);
                            $modalCounter = 0;
                            while ($user_data = mysqli_fetch_assoc($result)) {

                                $modalId = "modal" . ++$modalCounter;
                                ?>

                                <tr data-bs-target="#<?php echo $modalId; ?>">
                                    <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500'>
                                        <div class='flex items-center'>
                                            <div>
                                                <div class='text-sm leading-5 text-gray-800'>
                                                    <?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                    <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>
                                        <?php echo $user_data['departament']; ?>
                                    </td>
                                    <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>
                                        <?php echo $user_data['role']; ?>
                                    </td>
                                    <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>
                                        <?php echo $user_data['firstquestion']; ?>
                                    </td>
                                    <td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>
                                        <?php echo $user_data['thirdquestion']; ?>
                                    </td>
                                    <td
                                        class='px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5'>
                                        <button
                                            class='px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none'
                                            data-bs-toggle='modal' data-bs-target='#<?php echo $modalId; ?>'>
                                            Ver Detalhes
                                        </button>
                                    </td>
                                </tr>

                                <div class='modal fade' id='<?php echo $modalId; ?>' tabindex='-1'
                                    aria-labelledby='exampleModalLabel' aria-hidden='true'>
                                    <div class='modal-dialog'>
                                        <div class='modal-content'>
                                            <div class='modal-header'>
                                                <h5 class='modal-title' id='exampleModalLabel'>Detalhes do Servidor</h5>
                                                <button type='button' class='btn-close' data-bs-dismiss='modal'
                                                    aria-label='Close'></button>
                                            </div>
                                            <div class='modal-body'>
                                                <p>Nome:
                                                    <?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?>
                                                </p>
                                                <p>Departamento:
                                                    <?php echo $user_data['departament']; ?>
                                                </p>
                                                <p>Cargo:
                                                    <?php echo $user_data['role']; ?>
                                                </p>
                                                <p>Formações:
                                                    <?php echo $user_data['firstquestion']; ?>
                                                </p>
                                                <p>Cursos:
                                                    <?php echo $user_data['secondquestion']; ?>
                                                </p>
                                                <p>Departamento Opcional:
                                                    <?php echo $user_data['thirdquestion']; ?>
                                                </p>
                                                <p class="hard-competencia">Hard Skills:
                                                    <?php echo $user_data['hardcompetencia']; ?>
                                                </p>
                                                <p class="competencia">Soft Skills:
                                                    <?php echo $user_data['competencia']; ?>
                                                </p>
                                                <p>Satisfação com a equipe:
                                                    <?php echo $user_data['ratingq']; ?>
                                                </p>

                                            </div>
                                            <div class='modal-footer'>
                                                <button type='button' class='btn btn-secondary'
                                                    data-bs-dismiss='modal'>Fechar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            <?php } ?>
                    </table>
                </div>
                <div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">

                </div>
            </div>
        </div>
</body>

</html>
<script>
    $(document).ready(function () {
        $('#searchInput').on('input', function () {
            var searchTerm = $(this).val().toLowerCase();

            // Oculta todas as linhas da tabela
            $('table tbody tr').hide();

            // Exibe somente as linhas que correspondem ao termo de pesquisa
            $('table tbody tr').filter(function () {
                // Verifica se o termo de pesquisa está presente em qualquer célula da linha
                return $(this).find('td').text().toLowerCase().indexOf(searchTerm) > -1;
            }).show();

            // Verifica se o termo de pesquisa está presente nas hardcompetencias ou competencias do modal
            var modals = $('.modal.fade');
            modals.each(function () {
                var modalContent = $(this).find('.modal-content').text().toLowerCase();
                if (modalContent.indexOf(searchTerm) > -1) {
                    // Se o termo de pesquisa estiver presente no modal, exibe a linha correspondente na tabela
                    var modalId = $(this).attr('id');
                    $('table tbody tr[data-bs-target="#' + modalId + '"]').show();
                }
            });
        });
    });
</script>