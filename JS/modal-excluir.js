var httpRequest;
if (window.XMLHttpRequest) {
    httpRequest = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            httpRequest = new ActiveXObject('Microsoft.XMLHTTP');
        } catch (e) { }
    }
}
if (!httpRequest) {
    httpRequest = alert("Desistindo: Não é possível criar uma instância XMLHTTP.");
}

function deleteConfirm(entity, user, id) {
    var html = document.querySelector('html');

    var screen = document.createElement('div');
    screen.setAttribute('id', 'deleteScreen');
    html.appendChild(screen);

    var box = document.createElement('div');
    box.setAttribute('class', 'deleteBox');
    screen.appendChild(box);

    var title = document.createElement('h1');
    title.textContent = "Confirmação de exclusão!";
    box.appendChild(title);

    var text = document.createElement('p');
    text.innerHTML = "Tem certeza que deseja excluir este registro?";
    text.innerHTML += "<br>Todos os dados ligados a este registro serão exluídos juntos ou sofrerão alguma alteração.";
    box.appendChild(text);

    var buttonsBlock = document.createElement('div');
    buttonsBlock.setAttribute('class', 'buttonsBlock');
    box.appendChild(buttonsBlock);

    var cancel = document.createElement('button');
    cancel.setAttribute('id', 'cancel');
    cancel.textContent = "Cancelar";
    cancel.onclick = close;
    buttonsBlock.appendChild(cancel);

    var confirm = document.createElement('button');
    confirm.setAttribute('id', 'confirm');
    confirm.textContent = "Confirmar";
    confirm.addEventListener('click', () => {
        if (entity == "Usuario") {
            httpRequest.open('GET', `CRUD/Usuario/delete.php?usr=${user}&id=${id}`);
        } else {
            httpRequest.open('GET', `CRUD/${entity}/delete.php?id=${id}`);
        }

        httpRequest.send();
        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === 4) {
                if (httpRequest.status === 200) {
                    close();
                    document.location.reload(true);
                } else {
                    alert('Houve um problema ao realizar esta ação!');
                }
            }
        };
    });
    buttonsBlock.appendChild(confirm);

    function close() {
        screen.parentNode.removeChild(screen);
    }
}