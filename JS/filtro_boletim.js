import { reportTableAsyncQuery } from '../modulos/filtros.js';

const userType = sessionStorage.getItem('tip_usu');

const selectClass = document.getElementById('turmaEscolhida');
const selectSubject = document.getElementById('disciplinaEscolhida');
const resultTable = document.getElementById("reportTable");
let currentURL = "CRUD/Boletim/read.php?tur=none&dsc=none";

if (userType == 1) {
    //Requisição para mostrar as notas para o aluno
} else {
    selectClass.addEventListener("change", callRequest);
    selectSubject.addEventListener("change", callRequest);
}

function callRequest() {
    let classId = selectClass.options[selectClass.selectedIndex].value;
    let subjectId = selectSubject.options[selectSubject.selectedIndex].value;
    let url = "CRUD/Boletim/read.php";
    url += `?tur=${classId}&dsc=${subjectId}`;
    currentURL = url;
    reportTableAsyncQuery(url, resultTable);
}

export { currentURL, resultTable };