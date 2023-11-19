
document.addEventListener('DOMContentLoaded', () => {
    const productsContainer = document.getElementById('products-container');
    const paginationContainer = document.getElementById('pagination-container');
    const itemsPerPage = 6;

    fetch('http://localhost:8000/controllers/jsonPostImage.php')
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
                    <img src="../imatges/${item.nom}" class="img-fluid" />
                    <a href="#!">
                        <div class="mask" style="background-color: rgba(251, 251, 251, 0.15);"></div>
                    </a>
                </div>
                <div class="card-body">
                    <h5 class="card-title">${item.title}</h5>
                    <p class="card-text">
                        ${item.description}
                    </p>
                    <a href="postCommunity.php?postId=${item.id_post}" class="boto">Read</a>
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

        for (let i = 1; i <= totalPages; i++) {
            const pageList = document.createElement('nav');
            pageList.innerHTML = `<ul class="pagination pagination-circle justify-content-center">
                                        <li class="page-item">
                                            <a class="page-link" href="#" tabindex="-1" aria-disabled="true">Previous</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">${i}</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">Next</a>
                                        </li>
                                    </ul>`

            pageButton.addEventListener('click', (function (page) {
                return function () {
                    showPage(data, page);
                };
            })(i));
            paginationContainer.appendChild(pageList);
        }
    }
});