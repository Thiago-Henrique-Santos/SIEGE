import { asyncQuery } from '../modulos/filtros.js';

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
var block = document.getElementsByClassName('registerContainer');
var input = document.getElementById('barra_pesquisa');
input.onkeyup = () => {
    var filter = input.value.toUpperCase();
    userSearchBarFilter(filter, block);
}

function userSearchBarFilter (filter, block) {
    for (let i = 0; i < block.length; i++) {
        let ul = block[i].getElementsByTagName('ul');
        let name_li = ul.getElementsByTagName('li')[0];
        console.log(ul);
        // let nameSpan = name_li.getElementsByTagName('span');
        // let txtValue = nameSpan.innerText;
        // if (txtValue.toUpperCase().indexOf(filter) > -1) {
        //     block[i].style.display = "";
        // } else {
        //     block[i].style.display = "none";
        // }
    }
}