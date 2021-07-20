var options = document.getElementsByClassName('option');
var modal = window.document.getElementById('modal-screen');
var iframe = document.querySelector('#modal-block iframe');
var close = new Array();
close[0] = document.getElementById('close-button');
close[1] = document.getElementById('modal-screen');

/**************************
*         Eventos         *
**************************/
for (var i = 0; i < options.length; i++) {
    let choice = options[i].id;
    var path = options[i].addEventListener("click", () => loadModal(choice, 1));
    iframe.src = path;
}

for (var i = 0; i < close.length; i++) {
    close[i].addEventListener("click", () => {
        modal.style.display = "none";
    });
}

/**************************
*         Funções         *
**************************/
function loadModal(registerType) {
    var path = generatePath(registerType);
    iframe.src = path;
    modal.style.display = "flex";
}

function generatePath(ref) {
    var basePath = "formularios-cadastro.php";
    var completePath = `${basePath}?id=${ref}&tfm=cadastrar`;
    return completePath;
}