<?php
include_once('config.php');

$pageSize = 5;
$pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
$startIndex = ($pageNumber - 1) * $pageSize;

// Verifica se foi feita alguma pesquisa
if (isset($_GET['search']) && !empty($_GET['search'])) {
    $searchTerm = $_GET['search'];
    $query = "SELECT * FROM usuarios WHERE firstname LIKE '%$searchTerm%' OR lastname LIKE '%$searchTerm%' OR departament LIKE '%$searchTerm%' OR role LIKE '%$searchTerm%' ORDER BY firstname ASC LIMIT $startIndex, $pageSize";
} else {
    $query = "SELECT * FROM usuarios ORDER BY firstname ASC LIMIT $startIndex, $pageSize";
}

$result = mysqli_query($conn, $query);
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.5.2/dist/tailwind.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>    
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.min.js"></script>

</head>
<style>
    .hidden {
        display: none;
    }
    </style>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">
<div class="position-relative">
    <div class="-my-2 py-2 overflow-x-auto sm:-mx-6 sm:px-6 lg:-mx-8 pr-10 lg:px-8">
                <div class="align-middle rounded-tl-lg rounded-tr-lg inline-block w-full py-4 overflow-hidden bg-white shadow-lg px-12">
                    <div class="flex justify-between">
                        <div class="inline-flex border rounded w-7/12 px-2 lg:px-6 h-12 bg-transparent">
                            <div class="flex flex-wrap items-stretch w-full h-full mb-6 relative">
                                <div class="flex">
                                    <span class="flex items-center leading-normal bg-transparent rounded rounded-r-none border border-r-0 border-none lg:px-3 py-2 whitespace-no-wrap text-grey-dark text-sm">
                                        <svg width="18" height="18" class="w-4 lg:w-auto" viewBox="0 0 18 18" fill="none" xmlns="http://www.w3.org/2000/svg">
                                            <path d="M8.11086 15.2217C12.0381 15.2217 15.2217 12.0381 15.2217 8.11086C15.2217 4.18364 12.0381 1 8.11086 1C4.18364 1 1 4.18364 1 8.11086C1 12.0381 4.18364 15.2217 8.11086 15.2217Z" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                            <path d="M16.9993 16.9993L13.1328 13.1328" stroke="#455A64" stroke-linecap="round" stroke-linejoin="round" />
                                        </svg>
                                    </span>
                                </div>
                                <input type="text" id="searchInput" name="search" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Procure por servidor, cargo, departamento">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
                <div class="table-responsive">
                <table id="userTable" class="min-w-full">
    <thead>
        <tr>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left leading-4 text-blue-500 tracking-wider">Usuário</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Departamento</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-center text-sm leading-4 text-blue-500 tracking-wider">Cargo</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Formações</th>
            <th class="px-6 py-3 border-b-2 border-gray-300 text-left text-sm leading-4 text-blue-500 tracking-wider">Departamento Opcional</th>
            <th class="px-6 py-3 border-b-2 border-gray-300"></th>
        </tr>
    </thead>
    <tbody class="bg-white">

    <?php
    $pageSize = 8;
    $pageNumber = isset($_GET['page']) ? $_GET['page'] : 1;
    $startIndex = ($pageNumber - 1) * $pageSize;

    // Verifica se foi feita alguma pesquisa
    if (isset($_GET['search']) && !empty($_GET['search'])) {
        $searchTerm = $_GET['search'];
        $query = "SELECT * FROM usuarios WHERE firstname LIKE '%$searchTerm%' OR lastname LIKE '%$searchTerm%' ORDER BY firstname ASC LIMIT $startIndex, $pageSize";
    } else {
        $query = "SELECT * FROM usuarios ORDER BY firstname ASC LIMIT $startIndex, $pageSize";
    }

    $result = mysqli_query($conn, $query);
    $modalCounter = 0;

    while ($user_data = mysqli_fetch_assoc($result)) {

       $modalId = "modal" . ++$modalCounter; //cria um ID único para cada modal
       ?>

<tr>
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
                            <td class='px-6 py-4 whitespace-no-wrap text-right border-b border-gray-500 text-sm leading-5'>
                                <button class='px-5 py-2 border-blue-500 border text-blue-500 rounded transition duration-300 hover:bg-blue-700 hover:text-white focus:outline-none' data-bs-toggle='modal' data-bs-target='#<?php echo $modalId; ?>'>
                                    View Details
                                </button>
                            </td>
                        </tr>
    
                        <div class='modal fade' id='<?php echo $modalId; ?>' tabindex='-1' aria-labelledby='exampleModalLabel' aria-hidden='true'>
                            <div class='modal-dialog'>
                                <div class='modal-content'>
                                    <div class='modal-header'>
                                        <h5 class='modal-title' id='exampleModalLabel'>Detalhes do Usuário</h5>
                                        <button type='button' class='btn-close' data-bs-dismiss='modal' aria-label='Close'></button>
                                    </div>
                                    <div class='modal-body'>
                                        <p>Nome: <?php echo $user_data['firstname'] . " " . $user_data['lastname']; ?></p>
                                        <p>Departamento: <?php echo $user_data['departament']; ?></p>
                                        <p>Cargo: <?php echo $user_data['role']; ?></p>
                                        <p>Formações: <?php echo $user_data['firstquestion']; ?></p>
                                        <p>Departamento Opcional: <?php echo $user_data['thirdquestion']; ?></p>
                                    </div>
                                    <div class='modal-footer'>
                                        <button type='button' class='btn btn-secondary' data-bs-dismiss='modal'>Fechar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>
</tbody>

    </tbody>
</table>

<div class="sm:flex-1 sm:flex sm:items-center sm:justify-between mt-4 work-sans">
    <div>
        <nav class="relative z-0 inline-flex shadow-sm">
            <div id="paginationButtons" class="flex mt-4">
            <?php
                            // Obtém o número total de registros
                            $queryCount = "SELECT COUNT(*) AS total FROM usuarios";
                            $resultCount = mysqli_query($conn, $queryCount);
                            $row = mysqli_fetch_assoc($resultCount);
                            $totalCount = $row['total'];

                            // Calcula o número total de páginas com base no tamanho da página
                            $totalPages = ceil($totalCount / $pageSize);

                            // Exibe os botões de paginação
                            for ($i = 1; $i <= $totalPages; $i++) {
                                echo "<a href='?page=$i' class='paginationButton -ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary'>$i</a>";
                            }
                            ?>
            </div>
        </nav>
    </div>
</div>
</nav>
        </div>
    </div>
                </div>
            </div>
</body>
</html>
<script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('userTable');
        const paginationButtons = document.querySelectorAll('.paginationButton');
        const pageSize = 5;

        // Função para exibir os registros da página especificada
        function showPage(pageNumber, search) {
            const startIndex = (pageNumber - 1) * pageSize;
            const endIndex = startIndex + pageSize;

            const rows = table.getElementsByTagName('tbody')[0].getElementsByTagName('tr');
            for (let i = 0; i < rows.length; i++) {
                if (i >= startIndex && i < endIndex) {
                    rows[i].classList.remove('hidden');
                } else {
                    rows[i].classList.add('hidden');
                }
            }

            // Atualiza a URL dos botões de paginação com o termo de pesquisa
            paginationButtons.forEach(function(button, index) {
                const pageURL = search ? '?page=' + (index + 1) + '&search=' + search : '?page=' + (index + 1);
                button.href = pageURL;
            });
        }

        $(document).ready(function() {
            $('#searchInput').on('input', function() {
                var searchTerm = $(this).val().toLowerCase();
                $('table tbody tr').filter(function() {
                    $(this).toggle($(this).find('td').text().toLowerCase().indexOf(searchTerm) > -1);
                });
            });
        });

        // Recupera o número da página atual a partir dos parâmetros da URL
        const urlParams = new URLSearchParams(window.location.search);
        const pageParam = urlParams.get('page');
        const searchParam = urlParams.get('search');
        const currentPage = pageParam ? parseInt(pageParam) : 1;

        // Exibe a página atual com base nos parâmetros da URL
        showPage(currentPage, searchParam);
    });
</script>
           
