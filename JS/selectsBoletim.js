import { startRequest } from '../modulos/ajax.js';
const userType = sessionStorage.getItem('tip_usu');

if (userType != 1) {
    let httpRequest = startRequest();
    const selectClass = document.getElementById('turmaEscolhida');
    const selectSubject = document.getElementById('disciplinaEscolhida');

    selectClass.addEventListener("change", () => {
        let classId = selectClass.options[selectClass.selectedIndex].value;
        let url = "CRUD/Boletim/read_selectDisciplina.php";
        url += `?idt=${classId}`;
        httpRequest.open('GET', url);
        httpRequest.responseType = 'json';
        httpRequest.send();
        httpRequest.onreadystatechange = () => {
            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                let response = httpRequest.response;
                clearSelectSubject();
                for (let i = 0; i < response.length; i++) {
                    let subjectOption = document.createElement('option');
                    subjectOption.setAttribute('class', 'options_validos');
                    subjectOption.value = `${response[i]['id']}`;
                    subjectOption.textContent = `${response[i]['nome']}`;
                    selectSubject.appendChild(subjectOption);
                }
            }
        }
    });
}

function clearSelectSubject() {
    let optionsQuantity = selectSubject.options.length;
    for (let i = optionsQuantity - 1; i > 0; i--) {
        selectSubject.remove(i);
    }
}