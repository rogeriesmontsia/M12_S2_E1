document.addEventListener("DOMContentLoaded", function() {
    const submit = document.getElementById("submit");

  submit.addEventListener("click", validate);
  const titleField = document.getElementById("title");
  const descripField = document.getElementById("description");

  function validate(e) {
    let valid = true;

    if (!titleField.value) {
      const titleError = document.getElementById("titleError");
      titleError.classList.add("visible");
      titleField.classList.add("invalid");
      titleError.setAttribute("aria-hidden", false);
      titleError.setAttribute("aria-invalid", true);
      valid = false; // Establecer valid a false si hay un error
    }

    if (!descripField.value) {
      const descripError = document.getElementById("descripError");
      descripError.classList.add("visible");
      descripField.classList.add("invalid");
      descripError.setAttribute("aria-hidden", false);
      descripError.setAttribute("aria-invalid", true);
      valid = false; // Establecer valid a false si hay un error
    }

    const categoryError = document.getElementById("categoryError");
    const categoryInputs = document.getElementsByName("category");
    let categoriaValida = false;
    for (const categoryInput of categoryInputs) {
        if (categoryInput.checked) {
            categoriaValida = true;
            break;
        }
    }
    if (!categoriaValida) {
        categoryError.classList.add("visible");
        valid = false; // Establecer valid a false si hay un error
    } else {
        categoryError.classList.remove("visible");
    }

    if (valid) {
      return valid;
    } else {
      e.preventDefault();
    }
  }

  //quitar error cuando empieza a escribir
  titleField.addEventListener("input", function() {
      const titleError = document.getElementById("titleError");
      titleError.classList.remove("visible");
      titleField.classList.remove("invalid");
      titleError.setAttribute("aria-hidden", true);
      titleError.setAttribute("aria-invalid", false);
      
  });

  //quitar error cuando empieza a escribir
  descripField.addEventListener("input", function() {
    const descripError = document.getElementById("descripError");
    descripError.classList.remove("visible");
    descripField.classList.remove("invalid");
    descripError.setAttribute("aria-hidden", true);
    descripError.setAttribute("aria-invalid", false); 
  });

  var radios = document.getElementsByName("category");

  // Agrega un controlador de eventos a cada radio
  for (var i = 0; i < radios.length; i++) {
      radios[i].addEventListener("click", function() {
        categoryError.classList.remove("visible");
      });
  }
});