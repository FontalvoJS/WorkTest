function activeSignUp() {
    const regForm = document.getElementById('reg-form');
    const loginForm = document.getElementById('login-form');
    regForm.classList.remove('d-none');
    loginForm.classList.add('d-none');
}

function activeSignIn() {
    const regForm = document.getElementById('reg-form');
    const loginForm = document.getElementById('login-form');
    regForm.classList.add('d-none');
    loginForm.classList.remove('d-none');
}
async function formValidation(onchange) {
    const form = document.getElementById('login-form');
    const formData = new FormData(form);
    if (formData) {
        const alertsAuth = document.getElementsByClassName('alertsAuth')[0];
        const alertsAuthEmail = document.getElementsByClassName('alertsAuthEmail')[0];
        const email = formData.get('email');
        const pass = formData.get('password');
        if (email.length === 0 ||
            !email.includes('@') ||
            !email.includes('.')
        ) {
            alertsAuthEmail.innerHTML = "👉 Verify your email.";
        } else {
            alertsAuthEmail.innerHTML = "";
        }
        if (pass.length > 0 &&
            pass.length < 8
        ) {
            alertsAuth.innerHTML = '👉 Your password must be at least 8 digits.';
        } else {
            alertsAuth.innerHTML = '';

        }
        if (!onchange &&
            pass.length < 8
        ) {
            alertsAuth.innerHTML = '👉 Incorrect password.';
        }
        if (pass.length >= 8 && email.includes('@') && email.includes('.')) {
            alertsAuth.innerHTML = "";
            if (!onchange) {
                const response = await sendForm(formData);
                if (response.status == 200) {
                    window.location.href = "views/home.php";
                } else {
                    alertsAuth.innerHTML = "";
                    swal({
                        icon: 'error',
                        title: 'Oops!',
                        text: 'Your credentials are incorrect!',
                    })
                    alertsAuth.innerHTML = '👉 Oops! invalid credentials or your user no exist';
                }
            }
        }
    }
}
async function formValidationReg() {
    const form = document.getElementById('reg-form');
    const alertsAuth = document.getElementsByClassName('alertsAuth')[1];
    const formData = new FormData(form);
    if (formData) {
        const email = formData.get('email');
        const pass = formData.get('password');
        const name = formData.get('name');
        const pass_verify = formData.get('password_verify');
        if (email.length === 0 ||
            pass.length === 0 ||
            name.length === 0 ||
            name.length === " " ||
            pass_verify.length === 0 ||
            pass.length < 8 ||
            pass !== pass_verify ||
            pass_verify.length < 8 ||
            !email.includes('@') ||
            !email.includes('.')
        ) {
            alertsAuth.innerHTML = '👉 Oops!, Verify all the fields before to continue';
        } else {
            const response = await sendForm(formData);
            console.log(response);
            if (response.status == 200) {
                alertsAuth.innerHTML = "";
                swal({
                    icon: 'success',
                    title: 'Hey ' + name + "!",
                    text: 'You have successfully a new account',
                    button: false,
                    timer: 1000
                })
                 activeSignIn();
                return true;
            } else {
                swal({
                    icon: 'error',
                    title: 'Oops!',
                    text: 'Internal Error',
                    button: false,
                    timer: 1000
                })
            }
        }
    }
}
async function sendForm(data) {
    const formData = data;
    try {
        const response = await fetch('http://localhost/DatafiTasks/controllers/auth.php', {
            method: 'POST',
            body: formData
        });
        const data = await response.json();
        return data;
    } catch (err) {
        console.log(err);
        return err;
    }
}