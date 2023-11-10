document.addEventListener('DOMContentLoaded', function (){
    const loginForm = document.getElementById('loginForm');

    loginForm.addEventListener('submit', function(event){
        event.preventDefault(); //Evita que el formulario se envie automaticamente 
        
        const email = document.getElementById('email').value;
        const pass = document.getElementById('pass').value;
        //const passRegex= /^(?=.*[A-Z])(?=.*[a-z])(?=.*!@#$%^&*])[A-Za-z!@#$%^&*0-9]{12,}$/;

        if(!isValidEmail(email)){
            alert("Por favor, ingresa una dirección válida");
        }else if(!validatePasswords(pass)){
            alert("La contraseña debe tener al menos 12 caracteres, incluir una letra minuscula, una letra mayuscula y un caracter especial");
        }else{
            alert('Formulario válido. Enviar datos al servidor')
        }
    });

    function isValidEmail(email){
        const mailformat = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        //const expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        return mailformat.test(email);
    }

    function validatePasswords(pass){
        const passRegex = /^(?=.*[A-Z])(?=.*[a-z])(?=.*[!@#$%^&*])[A-Za-z!@#$%^&*0-9]{12,}$/;
        return passRegex.test(password);
	    
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

    
})