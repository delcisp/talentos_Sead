<?php
include_once('config.php');
$sql = "SELECT * FROM usuarios ORDER BY id DESC";
$result = $conn->query($sql);


?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="https://unpkg.com/tailwindcss@1.5.2/dist/tailwind.min.css" rel="stylesheet">
</head>
<style>
    .hidden {
        display: none;
    }
    </style>
<body class="h-screen overflow-hidden flex items-center justify-center" style="background: #edf2f7;">

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
                                <input type="text" class="flex-shrink flex-grow flex-auto leading-normal tracking-wide w-px flex-1 border border-none border-l-0 rounded rounded-l-none px-3 relative focus:outline-none text-xxs lg:text-xs lg:text-base text-gray-500 font-thin" placeholder="Search">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="align-middle inline-block min-w-full shadow overflow-hidden bg-white shadow-dashboard px-8 pt-3 rounded-bl-lg rounded-br-lg">
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
    $pageNumber = 1;
    $pageSize = 5;
    $startIndex = ($pageNumber - 1) * $pageSize; // índice inicial dos registros
    $endIndex = $startIndex + $pageSize; // índice final

    $query = "SELECT * FROM usuarios ORDER BY firstname ASC";
    $result = mysqli_query($conn, $query);

    $count = 0;

    while ($user_data = mysqli_fetch_assoc($result)) {
        if ($count >= $startIndex && $count < $endIndex) {
            echo "<tr>";
            echo "<td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500'>";
            echo "<div class='flex items-center'>";
            echo "<div>";
            echo "<div class='text-sm leading-5 text-gray-800'>" . $user_data['firstname'] . " " . $user_data['lastname'] . "</div>";
            echo "</div>";
            echo "</div>";
            echo "</td>";
            echo "<td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>" . $user_data['departament'] . "</td>";
            echo "<td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>" . $user_data['role'] . "</td>";
            echo "<td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>" . $user_data['firstquestion'] . "</td>";
            echo "<td class='px-6 py-4 whitespace-no-wrap border-b border-gray-500 text-sm leading-5'>" . $user_data['thirdquestion'] . "</td>";
            echo "</tr>";
        }

        $count++;

        if ($count >= $endIndex) {
            break;
        }
    }
    ?>
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
                    echo "<a href='#' class='-ml-px relative inline-flex items-center px-4 py-2 border border-gray-300 bg-white text-sm leading-5 font-medium text-blue-600 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-tertiary active:text-gray-700 transition ease-in-out duration-150 hover:bg-tertiary'>" . $i . "</a>";
                }
                ?>
            </div>
                <script>
    document.addEventListener('DOMContentLoaded', function() {
        const table = document.getElementById('userTable');
        const paginationButtons = document.querySelectorAll('.paginationButton');
        const pageSize = 5;

        // Função para exibir os registros da página especificada
        function showPage(pageNumber) {
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
        }

        // Adiciona os ouvintes de evento para os botões de paginação
        paginationButtons.forEach(function(button, index) {
            button.addEventListener('click', function() {
                showPage(index + 1);
            });
        });

        // Exibe a primeira página por padrão
        showPage(1);
    });
</script>
                <div v-if="pagination.current_page < pagination.last_page">
                    <a href="#" class="-ml-px relative inline-flex items-center px-2 py-2 rounded-r-md border border-gray-300 bg-white text-sm leading-5 font-medium text-gray-500 hover:text-gray-400 focus:z-10 focus:outline-none focus:border-blue-300 focus:shadow-outline-blue active:bg-gray-100 active:text-gray-500 transition ease-in-out duration-150" aria-label="Next">
                        <svg class="h-5 w-5" viewBox="0 0 20 20" fill="currentColor">
                            <path fill-rule="evenodd" d="M7.293 14.707a1 1 0 010-1.414L10.586 10 7.293 6.707a1 1 0 011.414-1.414l4 4a1 1 0 010 1.414l-4 4a1 1 0 01-1.414 0z" clip-rule="evenodd" />
                        </svg>
                    </a>
                </div>
            </nav>
        </div>
    </div>
                </div>
            </div>
</body>
</html>
