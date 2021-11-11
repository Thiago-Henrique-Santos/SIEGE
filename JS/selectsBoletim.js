import { startRequest } from '../modulos/ajax.js';

let httpRequest = startRequest();
let url = "CRUD/Boletim/read_selectDisciplina.php";
const selectClass = document.getElementById('turmaEscolhida');

selectClass.addEventListener("change", () => {
    let classId = selectClass.value;
    url += `?idt=${classId}`;
    httpRequest.open('GET', url);
    httpRequest.send();
});