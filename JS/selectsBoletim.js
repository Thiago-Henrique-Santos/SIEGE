import { startRequest } from '../modulos/ajax.js';

let httpRequest = startRequest();
let url = "CRUD/Boletim/read_selectDisciplina.php";
const selectClass = document.getElementById('turmaEscolhida');

selectClass.addEventListener("change", () => {
    let optionClassSelected = selectClass.options[selectClass.selectedIndex].value;
    let classId = optionClassSelected;
    url += `?idt=${classId}`;
    httpRequest.open('GET', url);
    httpRequest.responseType = 'json';
    httpRequest.send();
    httpRequest.onreadystatechange = () => {
        if (httpRequest.readyState === 4 && httpRequest.status === 200) {
            let response = httpRequest.response;
                console.log(response);
        }
    }
});