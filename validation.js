function validateEmail() {
    var email = document.getElementById("email").value;
    var regex = /^([\w-]+(?:\.[\w-]+)*)@((?:[\w-]+\.)*\w[\w-]{0,66})\.([a-z]{2,6}(?:\.[a-z]{2})?)$/i;
    if (regex.test(email)) { //true - validates
        document.getElementById("emailprompt").style.color = "#009ee0";
        document.getElementById("emailprompt").innerHTML = "Email correcto";
        return true;
    } else { //false - not valid input
        document.getElementById("emailprompt").style.color = "red";
        document.getElementById("emailprompt").innerHTML = "El formato de email debe ser email@dominio.com";
        return false;
    }
} // endfunction validateEmail()

function validateName() {
    var name = document.getElementById("name").value;
    var regex = /^[a-zA-Z\ ]{2,30}$/;
    if (regex.test(name)) { //true - validates
        document.getElementById("nameprompt").style.color = "#009ee0";
        document.getElementById("nameprompt").innerHTML = "Nombre correcto";
        return true;
    } else { //false - not valid input
        document.getElementById("nameprompt").style.color = "red";
        document.getElementById("nameprompt").innerHTML = "El nombre debe contener entre 2 y 30 letras.";
        return false;
    }
}

function validatePhone() {
    var phone = document.getElementById("phone").value;
    var regex = /^\d{4}\d{4}$/;
    if (regex.test(phone)) { //true - validates
        document.getElementById("phoneprompt").style.color = "#009ee0";
        document.getElementById("phoneprompt").innerHTML = "Teléfono correcto";
        return true;
    } else { //false - not valid input
        document.getElementById("phoneprompt").style.color = "red";
        document.getElementById("phoneprompt").innerHTML = "El formato de teléfono debe poseer 8 números.";
        return false;
    }
} // end function validatePhone()

// Fetch data
function fetchUsers() {
    $.ajax({
        url: 'users-list.php',
        type: 'GET',
        success: function (response) {
            const users = JSON.parse(response);
            let template = '';
            users.forEach(user => {
                template += `
                  <div class="fade-in">
                  
                  <p><strong>Nombre:&nbsp;&nbsp;</strong> ${user.name}</p> 
                  <p><strong>Email:&nbsp;&nbsp;</strong> ${user.email}</p>
                  
                  
                  <p><strong>Teléfono:&nbsp;&nbsp;</strong> ${user.phone}</p> 
                  <p><strong>Ingresado:&nbsp;&nbsp;</strong> ${user.date}</p>
                  
                  </div>
                  
                `
            });

            $('#users').html(template);
        }
    })
}
// Validate and post data
function validateForm() {
    var email = document.getElementById("email").value;
    var name = document.getElementById("name").value;
    var phone = document.getElementById("phone").value;
    if (validateEmail() && validateName() && validatePhone()) {
        $.ajax({
            type: "POST",  //type of method
            url: "index.php",  //your page
            data: { name: name, email: email, phone: phone },// passing the values
            success: function () {
                document.getElementById("register-form").reset()
                console.log("Usuario:",email, "creado correctamente!")
                fetchUsers()
            }
        });
    }
}