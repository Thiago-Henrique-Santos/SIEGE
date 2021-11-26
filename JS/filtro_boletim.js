import { reportTableAsyncQuery } from '../modulos/filtros.js';

const selectClass = document.getElementById('turmaEscolhida');
const selectSubject = document.getElementById('disciplinaEscolhida');
const resultTable = document.querySelector("#reportTable");

selectClass.addEventListener("change", callRequest);
selectSubject.addEventListener("change", showReportTable);

function showReportTable() {
    deleteInfoText();
    callRequest();
}

function callRequest () {
    let classId = selectClass.options[selectClass.selectedIndex].value;
    let subjectId = selectSubject.options[selectSubject.selectedIndex].value;
    let url = "CRUD/Boletim/read.php";
    url += `?tur=${classId}&dsc=${subjectId}`;
    reportTableAsyncQuery(url, resultTable);
}

function deleteInfoText(){
    var paragraph = document.getElementById('info_text');
    paragraph.parentNode.removeChild(paragraph);
}