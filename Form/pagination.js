document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const submitButton = document.getElementById('submit-button');
    const page1 = document.getElementById('page-1');
    const page2 = document.getElementById('page-2');
    const page3 = document.getElementById('page-3');

    // Inicialmente, exibe apenas a página 1
    page1.style.display = 'block';
    page2.style.display = 'none';
    page3.style.display = 'none';

    // Variável para controlar a página atual
    let currentPage = page1;

    // Evento de clique no botão "Próximo"
    nextButton.addEventListener('click', function() {
        currentPage.style.display = 'none';
        if (currentPage === page1) {
            currentPage = page2;
        } else if (currentPage === page2) {
            currentPage = page3;
            nextButton.style.display = 'none'; // Oculta o botão "Próximo" na página 3
        }
        currentPage.style.display = 'block';

        if (currentPage === page1) {
            prevButton.style.display = 'none'; // Oculta o botão "Anterior" na página 1
        } else {
            prevButton.style.display = 'block'; // Torna o botão "Anterior" visível nas outras páginas
        }
    });

    // Evento de clique no botão "Anterior"
    prevButton.addEventListener('click', function() {
        currentPage.style.display = 'none';
        if (currentPage === page3) {
            currentPage = page2;
            nextButton.style.display = 'block'; // Torna o botão "Próximo" visível novamente na página 2
        } else if (currentPage === page2) {
            currentPage = page1;
        }
        currentPage.style.display = 'block';

        if (currentPage === page1) {
            prevButton.style.display = 'none'; // Oculta o botão "Anterior" na página 1
        } else {
            prevButton.style.display = 'block'; // Torna o botão "Anterior" visível nas outras páginas
        }
    });
});





  