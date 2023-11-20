<?php include('./header/header.php');?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Usuario registrado con éxito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <p>Gracias por unirte a k0munitat</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a href="../../index.php" class="btn btn-primary">Ir a la página principal</a>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts de Bootstrap y Popper.js -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

    <!-- Script para abrir el modal al cargar la página -->
    <script>
        document.addEventListener('DOMContentLoaded', function () {
            var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
            myModal.show();
        });
    </script>


</html>

<?require('./footer/footer.php');?>