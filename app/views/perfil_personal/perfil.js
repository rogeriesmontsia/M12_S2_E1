// Get the modals
var imageModal = document.getElementById("changeImageModal");
var passwordModal = document.getElementById("changePasswordModal");

// Get the button that opens each modal
var imageBtn = document.getElementById("changeImageButton");
var passwordBtn = document.getElementById("changePasswordButton");

// Get the <span> element that closes the modals
var closeBtn = document.getElementsByClassName("close");

// When the user clicks on the buttons, open the corresponding modal
imageBtn.onclick = function () {
  imageModal.style.display = "block";
}

passwordBtn.onclick = function () {
  passwordModal.style.display = "block";
}

// When the user clicks on <span> (x), close the modals
for (var i = 0; i < closeBtn.length; i++) {
  closeBtn[i].onclick = function () {
    imageModal.style.display = "none";
    passwordModal.style.display = "none";
  }
}

// When the user clicks anywhere outside of the modals, close them
window.onclick = function (event) {
  if (event.target == imageModal) {
    imageModal.style.display = "none";
  } else if (event.target == passwordModal) {
    passwordModal.style.display = "none";
  }
}

// Función para mostrar/ocultar la contraseña
function togglePassword(inputId, eyeIconId) {
  var passwordInput = document.getElementById(inputId);
  var eyeIcon = document.getElementById(eyeIconId);

  if (passwordInput.type === "password") {
    passwordInput.type = "text";
    eyeIcon.innerHTML = '<i class="far fa-eye-slash"></i>';
  } else {
    passwordInput.type = "password";
    eyeIcon.innerHTML = '<i class="far fa-eye"></i>';
  }
}

document.addEventListener("DOMContentLoaded", function () {
  if (typeof deleteImage === "function") {
    console.log("deleteImage is defined.");
  } else {
    console.log("deleteImage is NOT defined.");
  }

  // Obtén todos los elementos con la clase eye-icon
  var eyeIcons = document.getElementsByClassName("eye-icon");

  // Adjunta el evento onclick a cada icono de ojo
  for (var i = 0; i < eyeIcons.length; i++) {
    eyeIcons[i].onclick = function () {
      var inputId = this.getAttribute("data-input-id");
      togglePassword(inputId, this.id);
    };
  }
});

function deleteImage() {
  // Confirmar si el usuario realmente desea eliminar la imagen
  var confirmDelete = confirm("¿Estás seguro de que deseas eliminar la imagen?");

  if (confirmDelete) {
    // Realizar la solicitud AJAX
    var xhr = new XMLHttpRequest();
    xhr.open('POST', 'actionDeleteImage.php', true);
    xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
    xhr.onreadystatechange = function () {
      if (xhr.readyState === 4 && xhr.status === 200) {
        // Manejar la respuesta del servidor
        var response = xhr.responseText;
        if (response.includes('Error')) {
          alert(response); // Mostrar mensaje de error
        } else {
          // Recargar la página o realizar cualquier otra acción necesaria
          window.location.reload();
        }
      }
    };

    // Enviar la solicitud
    xhr.send();
  }
}
