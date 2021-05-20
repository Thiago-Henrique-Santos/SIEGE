var options = document.getElementsByClassName('option');

/**************************
*         Eventos         *
**************************/
for (var i = 0; i < options.length; i++) {
    let choice = options[i].id;
    var iframe = document.querySelector('#modal-screen iframe');
    var path = options[i].addEventListener("click", loadModal(choice));
    iframe.src = `${path}`;
}

/**************************
*         Funções         *
**************************/
function loadModal(registerType) {
    var modal = window.document.getElementById('modal-screen');
    var iframe = document.querySelector('#modal-screen iframe');
    var path = generatePath(registerType);
    modal.style.display = "flex";
    iframe.src = path;
}

function generatePath(ref) {
    var basePath = "localhost/siege/cadastrar.php";
    var completePath = basePath + "?id=" + ref;
    return completePath;
}