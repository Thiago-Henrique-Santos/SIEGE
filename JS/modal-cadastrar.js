var options = document.getElementsByClassName('option');
var iframe = document.querySelector('#modal-screen iframe');

/**************************
*         Eventos         *
**************************/
for (var i = 0; i < options.length; i++) {
    let choice = options[i].id;
    var path = options[i].addEventListener("click", () => loadModal(choice));
    iframe.src = path;
}

/**************************
*         Funções         *
**************************/
function loadModal(registerType) {
    var modal = window.document.getElementById('modal-screen');
    var path = generatePath(registerType);
    modal.style.display = "flex";
    iframe.src = path;
}

function generatePath(ref) {
    var basePath = "formularios-cadastro.php";
    var completePath = basePath + "?id=" + ref;
    return completePath;
}