// validate.js
function checkUser(usuario) {
    fetch('check_user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'usuario=' + encodeURIComponent(usuario)
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'usuario_exists') {
            document.getElementById('usuarioErr').innerText = 'El usuario ya existe';
        } else {
            document.getElementById('usuarioErr').innerText = '';
        }
    })
    .catch(error => console.error('Error:', error));
}

function checkEmail(mail) {
    fetch('check_user.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded',
        },
        body: 'mail=' + encodeURIComponent(mail)
    })
    .then(response => response.text())
    .then(data => {
        if (data === 'mail_exists') {
            document.getElementById('mailErr').innerText = 'El correo ya existe';
        } else {
            document.getElementById('mailErr').innerText = '';
        }
    })
    .catch(error => console.error('Error:', error));
}

function validateForm() {
    let usuarioErr = document.getElementById('usuarioErr').innerText;
    let mailErr = document.getElementById('mailErr').innerText;

    if (usuarioErr || mailErr) {
        alert('Por favor, corrija los errores antes de enviar el formulario.');
        return false;
    }
    return true;
}
