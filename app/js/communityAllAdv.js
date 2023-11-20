
document.addEventListener('DOMContentLoaded', () => {
    const productsContainer = document.getElementById('products-container');
    const paginationContainer = document.getElementById('pagination-container');
    const itemsPerPage = 6;

    fetch('http://localhost:8000/controllers/jsonAdvImage.php')
        .then(response => response.json())
        .then(data => {
            // Mostrar la primera página
            showPage(data, 1);

            // Crear la paginación
            createPagination(data);
        })
        .catch(error => console.error('Error al cargar dades:', error));

    // Mostrar una página específica
    function showPage(data, page) {
        const startIndex = (page - 1) * itemsPerPage;
        const endIndex = startIndex + itemsPerPage;
        const currentPageItems = data.slice(startIndex, endIndex);
        productsContainer.innerHTML = '';

        // Crear una fila para contener los productos
        const row = document.createElement('div');
        row.classList.add('row');
        
        currentPageItems.forEach(item => {
            // Crear una columna para cada producto
            const col = document.createElement('div');
            col.classList.add('col-lg-4'); 
            col.classList.add('col-md-6'); 
            col.classList.add('col-sm-6'); 
            col.classList.add('d-flex'); 


            // Crear el elemento del producto
            const productElement = document.createElement('div');
            productElement.innerHTML += `
                <div class="bg-image hover-overlay ripple" data-mdb-ripple-color="light">
                    <img src="../imatges/${item.nom}" class="card img" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">${item.title}</h5>
                    <p class="card-text">
                        ${item.description}
                    </p>
                    <a href="post.php?postId=${item.id_post}" class="boto">Read</a>
                </div>`;

            // Agregar la columna al contenedor de la fila
            col.appendChild(productElement);
            row.appendChild(col);
        });
    // Agregar la fila al contenedor principal
    productsContainer.appendChild(row);
    }


    // Crear la paginación
    function createPagination(data) {
        const totalPages = Math.ceil(data.length / itemsPerPage);
        const paginationContainer = document.getElementById('pagination-container');

        const paginationList = document.createElement('ul');
        paginationList.className = 'pagination pagination-circle justify-content-center';

        // Botón "Previous" al principio
        const firstPageItem = document.createElement('li');
        firstPageItem.className = 'page-item';
        const firstPageLink = document.createElement('a');
        firstPageLink.className = 'page-link';
        firstPageLink.href = '#';
        firstPageLink.innerHTML = 'Previous';
        firstPageItem.appendChild(firstPageLink);

        // Agregar event listener al botón "Previous"
        firstPageLink.addEventListener('click', function () {
            showPage(data, 1);
        });

        paginationList.appendChild(firstPageItem);

        // Botones numéricos
        for (let i = 1; i <= totalPages; i++) {
            const pageItem = document.createElement('li');
            pageItem.className = 'page-item';
            const pageLink = document.createElement('a');
            pageLink.className = 'page-link';
            pageLink.href = '#';
            pageLink.innerHTML = i;
            pageItem.appendChild(pageLink);

            // Agregar event listener a los botones numéricos
            pageLink.addEventListener('click', (function (page) {
                return function () {
                    showPage(data, page);
                };
            })(i));

            paginationList.appendChild(pageItem);
        }

        // Botón "Next" al final
        const lastPageItem = document.createElement('li');
        lastPageItem.className = 'page-item';
        const lastPageLink = document.createElement('a');
        lastPageLink.className = 'page-link';
        lastPageLink.href = '#';
        lastPageLink.innerHTML = 'Next';
        lastPageItem.appendChild(lastPageLink);

        // Agregar event listener al botón "Next"
        lastPageLink.addEventListener('click', function () {
            showPage(data, totalPages);
        });

        paginationList.appendChild(lastPageItem);

        // Agregar la lista de paginación al contenedor
        paginationContainer.appendChild(paginationList);
    }
});