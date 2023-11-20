 const email = document.getElementById("email")
 const password= document.getElementById("pass")

 const form = document.getElementById("loginForm")
 const parrafo = document.getElementById("warnings")

 form.addEventListener("submit", e=>{
    e.preventDefault()
    let warnings = ""
    let entrar= false
    let regexEmail= /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/

    parrafo.innerHTML = ""

    const isValidEmail = validateEmail(email.value);
    const isValidPassword = validatePassword(password.value);

    if (!isValidEmail){
            warnings += "El email no es válido. ";
    }

    if (!isValidPassword){
            warnings += "La contraseña no es válida. ";
    }

    if(isValidEmail && isValidPassword){
        form.submit()
    }else{
        parrafo.innerHTML = warnings
    }

    function validateEmail(email) {
        const emailRegex = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return emailRegex.test(email);
    }

    function validatePassword(password) {
        return password.length >= 8;
    }
   
 })