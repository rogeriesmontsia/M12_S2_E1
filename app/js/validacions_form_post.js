const submit = document.getElementById("submit");

submit.addEventListener("click", validate);

function validate(e) {
  e.preventDefault();

  const titleField = document.getElementById("title");
  let valid = true;

  if (!titleField.value) {
    const titleError = document.getElementById("titleError");
    titleError.classList.add("visible");
    titleField.classList.add("invalid");
    titleError.setAttribute("aria-hidden", false);
    titleError.setAttribute("aria-invalid", true);
  }
  const descripField = document.getElementById("description");

  if (!descripField.value) {
    const descripError = document.getElementById("descripError");
    descripError.classList.add("visible");
    descripField.classList.add("invalid");
    descripError.setAttribute("aria-hidden", false);
    descripError.setAttribute("aria-invalid", true);
  }
  return valid;
}