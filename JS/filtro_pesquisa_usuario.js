import { asyncQuery, searchBarFilter } from '../modulos/filtros.js';

//Filtro das checkboxes
var options = document.getElementsByClassName('cargoFiltro');
var resultBlock = document.getElementById('busca_resultado');
var url = "CRUD/Usuario/read.php";

for (let i = 0; i < options.length; i++) {
    let checkbox = options[i];
    checkbox.addEventListener("change", function (event) {
        var checkboxStatus = event.target.checked;
        if (checkboxStatus) {
            asyncQuery(url, resultBlock, checkbox.id, checkboxStatus, "Usuario");
        } else {
            asyncQuery(url, resultBlock, checkbox.id, checkboxStatus, "Usuario");
        }
    });
}

window.onload = () => {
    sessionStorage.setItem('path', url);
    sessionStorage.setItem('relativeCounter', 0);
    sessionStorage.setItem('relativeStart', false);
    sessionStorage.setItem('firstRelative', "");
    asyncQuery(url, resultBlock, null, null, "Usuario");
}


//Filtro barra de pesquisa
let searchBar = document.getElementById('barra_pesquisa');
searchBar.onkeyup = searchBarFilter;