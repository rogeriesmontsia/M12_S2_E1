<?php include('./header/header.php'); ?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Comunidad creada</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p>Disfruta con tu nueva comunidad.</p>
            </div>
            <div class="modal-footer">
                <a href="../../index.php" class="btn btn-primary">Ir a la página principal</a>
            </div>
        </div>
    </div>
</div>

<!-- Scripts de Bootstrap y Popper.js -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js"></script>

<!-- Script para abrir el modal al cargar la página -->
<script>
    document.addEventListener('DOMContentLoaded', function() {
        var myModal = new bootstrap.Modal(document.getElementById('exampleModal'));
        myModal.show();
    });
</script>


</html>


<? require('./footer/footer.php'); ?>