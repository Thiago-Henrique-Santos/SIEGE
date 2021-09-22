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
let searchBar = document.getElementById('barra_pesquisa');
searchBar.onkeyup = userSearchBarFilter;

function userSearchBarFilter() {
    //Variáveis para elementos do filtro
    let input = document.getElementById('barra_pesquisa');
    let filter = input.value.toUpperCase();
    let ul = document.getElementById("busca_resultado");
    let li = ul.getElementsByClassName('registerContainer');

    //Verifica se o usuário já pesquisou algum nome de usuários inexistentes
    let oldNoResults = ul.querySelector('li#noResults');
    if (oldNoResults) {
        ul.removeChild(oldNoResults);
    }

    //Variável de controle para "se achou usuários ou não", com o nome inserido
    let liGroup = false;

    //Buscando usuários
    for (let i = 0; i < li.length; i++) {
        let span = li[i].getElementsByTagName("span")[0];
        let txtValue = span.textContent;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
            liGroup = true;
        } else {
            li[i].style.display = "none";
        }
    }

    //Verifica se não encontrou usuários com o nome inserido
    if(!liGroup){
        const noResults = document.createElement('li');
        noResults.setAttribute('id', 'noResults');
        noResults.setAttribute('style', 'margin-left: 15px;');
        noResults.textContent = `Não foram encontrados resultados para: "${filter}"`;

        ul.appendChild(noResults);
    }
}

export { userSearchBarFilter };