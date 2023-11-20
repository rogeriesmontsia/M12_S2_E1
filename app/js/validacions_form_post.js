function cleanAndValidate(input) {
    const value = input.value.trim();
    // Limpia el valor para evitar XSS
    input.value = value;

    // Validaciones personalizadas
    const errorElement = document.getElementById(`${input.id}Error`);
    if (value === '') {
      input.classList.add('error'); // Aplica clase de error
      errorElement.textContent = `El campo ${input.name} no puede estar vacío.`;
    } else {
      input.classList.remove('error'); // Elimina clase de error
      errorElement.textContent = ''; // Borra el mensaje de error
    }
  }

  function cleanAndValidateRadio() {
    const radioOptions = document.getElementsByName('radioOption');
    const radioErrorElement = document.getElementById('radioOptionError');

    // Verifica que al menos una opción de radio esté seleccionada
    const selectedOption = Array.from(radioOptions).some(option => option.checked);
    if (!selectedOption) {
      radioErrorElement.textContent = 'Por favor, selecciona al menos una opción de radio.';
    } else {
      radioErrorElement.textContent = '';
    }
  }

  function validateForm() {
    const form = document.getElementById('myForm');

    // Realiza la validación
    cleanAndValidate(form.title);
    cleanAndValidate(form.description);
    cleanAndValidateRadio();

    // Comprueba la validez del formulario
    const hasErrors = form.querySelectorAll('.error').length > 0;
    if (hasErrors) {
      alert('Por favor, corrige los errores en el formulario antes de enviarlo.');
    } else {
      alert('¡Formulario válido!');
    }
  }