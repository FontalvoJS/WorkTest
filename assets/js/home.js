
async function setIdToFormForModifyContent(event) {
    const id = event.target.getAttribute('post-id');
    const post_id = document.getElementsByClassName('post_id');
    for (let i = 0; i < post_id.length; i++) {
        post_id[i].value = id;
    }
    return true;
}
async function formRequest() {
    const form = document.getElementById('request-form');
    const alertsAuth = document.getElementsByClassName('alertsAuth')[0];
    const formData = new FormData(form);
    if (formData) {
        const title = formData.get('title');
        const by = formData.get('user');
        const description = formData.get('description');
        if (title.length === 0 ||
            description.length === 0 ||
            by.length === 0
        ) {
            alertsAuth.innerHTML = '👉 Oops!, Verify all the fields before to save request';
        } else {
            const response = await sendFormRequest(formData);
            if (response.status == 200) {
                alertsAuth.innerHTML = "";
                swal({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Request saved!',
                    button: false,
                    timer: 1000
                })
                window.location.reload();
                return true;
            } else {
                alertsAuth.innerHTML = '👉 Oops!, Verify all the fields before to save request';
            }
        }
    }
}
async function sendFormRequest(data) {
    const formData = data;
    try {
        const response = await fetch('http://localhost/WorkTest/controllers/saveTask.php', {
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
async function deleteTask(id) {
    const response = await sendDeleteTask(id);
    if (response.status == 200) {
        swal({
            icon: 'success',
            title: 'Success!',
            text: 'Task deleted!',
            button: false,
            timer: 1000
        })
        setTimeout(() => {
            window.location.reload();
        }, 1000)
    } else {
        swal({
            icon: 'error',
            title: 'Oops!',
            text: 'Something went wrong!',
            button: false,
            timer: 1000
        })
    }
}
async function sendDeleteTask(id) {
    try {
        const response = await fetch('http://localhost/WorkTest/controllers/deleteTask.php', {
            method: 'POST',
            body: JSON.stringify({
                id: id
            })
        })
        const data = await response.json();
        return data;
    } catch (err) {
        console.log(err);
        return err;
    }
}
async function formEditRequest(val) {
    const form = document.getElementById(`${val}-form`);
    const alertsAuth = document.getElementsByClassName('alertsAuth')[1];
    const formData = new FormData(form);
    if (formData) {
        const title = formData.get('title');
        const description = formData.get('description');
        console.log(title, description);
        if (
            description.length === 0 ||
            title.length === 0
        ) {
            alertsAuth.innerHTML = '👉 Oops!, You cant save empty data.';
        } else {
            const response = await sendFormEditRequest(formData);
            if (response.status == 200) {
                alertsAuth.innerHTML = "";
                swal({
                    icon: 'success',
                    title: 'Success!',
                    text: 'Request saved!',
                    button: false,
                    timer: 1000
                })
                setTimeout(() => {
                    window.location.reload();
                }, 1000);
                return true;
            } else {
                alertsAuth.innerHTML = '👉 Oops!, it looks like an internal error';
            }
        }
    }
}
async function sendFormEditRequest(data) {
    const formData = data;
    try {
        const response = await fetch('http://localhost/WorkTest/controllers/modifyTask.php', {
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
async function moveTo(id, moveTo) {
    const response = await sendMoveTo(id, moveTo);
    if (response.status == 200) {
        setTimeout(() => {
            window.location.reload();
        }, 1000)
    } else {
        swal({
            icon: 'error',
            title: 'Oops!',
            text: 'Something went wrong!',
            button: false,
            timer: 1000
        })
    }
}
async function sendMoveTo(id, moveTo) {
    try {
        const response = await fetch('http://localhost/WorkTest/controllers/moveTo.php', {
            method: 'POST',
            body: JSON.stringify({
                id: id,
                moveTo: moveTo
            })
        })
        const data = await response.json();
        return data;
    } catch (err) {
        console.log(err);
        return err;
    }
}