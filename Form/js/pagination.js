document.addEventListener('DOMContentLoaded', function() {
    const prevButton = document.getElementById('prev-button');
    const nextButton = document.getElementById('next-button');
    const submitButton = document.getElementById('submit');
    const page1 = document.getElementById('page-1');
    const page2 = document.getElementById('page-2');
    const page3 = document.getElementById('page-3');

    // Inicialmente, exibe apenas a página 1
    page1.style.display = 'block';
    page2.style.display = 'none';
    page3.style.display = 'none';

    // Variável para controlar a página atual
    let currentPage = page1;

    nextButton.addEventListener('click', function() {
        currentPage.style.display = 'none';
        if (currentPage === page1) {
            currentPage = page2;
        } else if (currentPage === page2) {
            currentPage = page3;
        }
        currentPage.style.display = 'block';

        // Role para o topo da página
        window.scrollTo(0, 0);

        updateButtonVisibility();
    });

    prevButton.addEventListener('click', function() {
        currentPage.style.display = 'none';    
        if (currentPage === page1) {
            window.location.href = 'lgpd.php';
        } 
       else if (currentPage === page2) {
            currentPage = page1;
        }
        else if (currentPage === page3) {
            currentPage = page2;
        }
        currentPage.style.display = 'block';

        // Role para o topo da página
        window.scrollTo(0, 0);

        updateButtonVisibility();
    });

    function updateButtonVisibility() {
        if (currentPage === page3) {
            nextButton.style.display = 'none';
            submitButton.style.display = 'block';

        } else {
            nextButton.style.display = 'block';
            submitButton.style.display = 'none';
        }
    }
});






  