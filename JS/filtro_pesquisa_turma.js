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

//Filtro barra de pesquisa
let searchBar = document.getElementById('barra_pesquisa');
searchBar.onkeyup = classSearchBarFilter;

function classSearchBarFilter() {
    //Variáveis para elementos do filtro
    let input = document.getElementById('barra_pesquisa');
    let filter = input.value.toUpperCase();
    let ul = document.getElementById('busca_resultado');
    let li = ul.getElementsByClassName('registerContainer');

    //Verifica se o usuário já pesquisou algum nome de professores inexistentes
    let oldNoResults = ul.querySelector('li#noResults');
    if (oldNoResults) {
        ul.removeChild(oldNoResults);
    }

    //Variável de controle para "se achou professores ou não", com o nome inserido
    let liGroup = false;

    //Buscando professor
    for (let i = 0; i < li.length; i++) {
        let searchList = [];
        let ul2 = li[i].getElementsByClassName('listBlock')[0];
        let li2 = ul2.getElementsByClassName('listItemLine');
        if (li2.length > 0) {
            for (let j = 0; j < li2.length; j++) {
                let teacherName = li2[j].querySelector('span.pesquisa').textContent;
                searchList.push(teacherName);
            }
        }
        console.log(searchList);
    }

    //Verifica se não encontrou professores com o nome inserido
    if(!liGroup){
        const noResults = document.createElement('li');
        noResults.setAttribute('id', 'noResults');
        noResults.setAttribute('style', 'margin-left: 15px;');
        noResults.textContent = `Não foram encontrados resultados para: "${filter}"`;

        ul.appendChild(noResults);
    }
}

export { classSearchBarFilter };