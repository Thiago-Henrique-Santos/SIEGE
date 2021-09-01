import { asyncQuery } from '../modulos/filtros.js';

var options = document.getElementsByClassName('serieFiltro');
var resultBlock = document.getElementById('busca_resultado');
var url = "CRUD/Turma/read.php";

for (let i = 0; i < options.length; i++) {
    let checkbox = options[i];
    checkbox.addEventListener("change", function (event) {
        var checkboxStatus = event.target.checked;
        if (checkboxStatus) {
            asyncQuery(url, resultBlock, checkbox.id, checkboxStatus, "Turma");
        } else {
            asyncQuery(url, resultBlock, checkbox.id, checkboxStatus, "Turma");
        }
    });
}

window.onload = () => {
    sessionStorage.setItem('path', url);
    sessionStorage.setItem('relativeCounter', 0);
    sessionStorage.setItem('relativeStart', false);
    sessionStorage.setItem('firstRelative', "");
    asyncQuery(url, resultBlock, null, null, "Turma");
}