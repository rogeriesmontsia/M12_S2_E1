document.addEventListener('DOMContentLoaded', function (){
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event){
        event.preventDefault(); //Evita que el formulario se envie automaticamente 
        
        const email = document.getElementById('email').value;
        const pass = document.getElementById('pass').value;
        const passRegex= /^(?=.*[A-Z])(?=.*[a-z])(?=.*!@#$%^&*])[A-Za-z!@#$%^&*0-9]{12,}$/;

        if(email.length === 0){
            alert("Por favor, ingresa una dirección válida");
        }else if(!passRegex.test(pass)){
            alert("La contraseña debe tener al menos 12 caracteres, incluir una letra minuscula, una letra mayuscula y un caracter especial");
        }else{
            alert('Formulario válido. Enviar datos al servidor')
        }
    });

    function isValidEmail(email){
        expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        if ( !expr.test(email) )
		        return false;
	        return true;
    }

    function validatePasswords(pass){
	    if (haveNumbers(password) && haveLowercase(password) && haveUppercase(password) && haveSigns(password) && password.length >= 6)
		        return true;	
	        return false;
    }

    //Verifica si una cadena de texto que se pasa como parámetro contiene por lo menos un número
    function haveNumbers(text){
        var numbers="0123456789";
        for(i=0; i<text.length; i++){
            if (numbers.indexOf(text.charAt(i),0)!=-1){
                return true;
        }
    }
        return false;
    }
    //Verifica si una cadena de texto que se pasa como parámetro contiene por lo menos un caracter en Minúscula
    function haveLowercase(text){
       var letters="abcdefghyjklmnñopqrstuvwxyzáéíóú";   
        for(i=0; i<text.length; i++){
            if (letters.indexOf(text.charAt(i),0)!=-1){
                return true;
        }
    }
        return false;   
    }

    //Verifica si una cadena de texto que se pasa como parámetro contiene por lo menos un caracter en Mayúscula
    function haveUppercase(text){
        var letters="ABCDEFGHYJKLMNÑOPQRSTUVWXYZÁÉÍÓÚ";
        for(i=0; i<text.length; i++){
            if (letters.indexOf(text.charAt(i),0)!=-1){
                return true;
        }
    }
        return false;
    }

    //Verifica si una cadena de texto que se pasa como parámetro contiene por lo menos un signo
    function haveSigns(text)
    {
    //signos que se deben incluir en el texto (No contiene " , < , > , / por seguridad)
        var signs = "!\"#$%&')(*+,-_./:;>=<?@][^}{|~\\";
            for(i=0; i<text.length; i++){
                if (signs.indexOf(text.charAt(i),0)!=-1){
                    return true;
                }
            }
        return false;
    }

    function validateUserForm(){
        if ( !validateEmails(email.value) )
	    {
		    alert('El e-mail es incorrecto');
		    email.focus();
		    return false;
	    }
        if ( !validatePasswords(password.value))
	    {
		    alert('El password es demasiado debil \nIntroduzca mínimo 6 caracteres, al menos un número, una minúscula, una mayúscula y un símbolo');
		    password.focus();
		    return false;
	    }

    }

})