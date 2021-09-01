import { generatePath } from './funcoes.js';
import { startRequest } from './ajax.js';

function classAsyncQuery(url, resultBlock, option, optionStatus) {
    let httpRequest = startRequest();
    if (option != null && optionStatus != null) {
        if (optionStatus) {
            url = generatePath(url, option, true);
            httpRequest.open('GET', url);
            httpRequest.responseType = "json";
            httpRequest.send();
            httpRequest.addEventListener("readystatechange", function () {
                if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                    let response = httpRequest.response;
                    console.log(response);
                    makeClassResultPrint(response, resultBlock);
                }
            });
        } else {
            url = generatePath(url, option, false);
            httpRequest.open('GET', url);
            httpRequest.responseType = "json";
            httpRequest.send();
            httpRequest.addEventListener("readystatechange", function () {
                if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                    let response = httpRequest.response;
                    console.log(response);
                    makeClassResultPrint(response, resultBlock);
                }
            });
        }
    } else {
        httpRequest.open('GET', url);
        httpRequest.responseType = "json";
        httpRequest.send();
        httpRequest.addEventListener("readystatechange", function () {
            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                let response = httpRequest.response;
                console.log(response);
                makeClassResultPrint(response, resultBlock);
            }
        });
    }
}

function classHTMLResult(parentBox, classIdtf, className, classGrade, subjects, teachers) {
    const classContainer = document.createElement('div');
    classContainer.setAttribute('class', 'classContainer');

    const title = document.createElement('div');
    title.setAttribute('class', 'classTitle');
    title.innerHTML = `<strong>Turma:</strong> ${classGrade}º ano ${className}`;
    classContainer.appendChild(title);

    const subjectsBlock = document.createElement('div');
    subjectsBlock.setAttribute('class', 'subjectsBlock');
    if (subjects.length > 0) {
        for (let i = 0; i < subjects.length; i++) {
            const subjectLine = document.createElement('div');
            subjectLine.setAttribute('class', 'subjectLine');

            const namesPart = document.createElement('div');
            namesPart.setAttribute('class', 'namesPart');
            namesPart.innerHTML = `<u>${subjects[i]['nome']}</u>: `;
            if (teachers[i])
                namesPart.innerHTML += teachers[i]['nome'];
            else
                namesPart.innerText += "Nesta turma, não há professor vinculado a essa disciplina.";
            subjectLine.appendChild(namesPart);

            const buttonsPart = document.createElement('div');
            buttonsPart.setAttribute('class', 'buttonsPart');

            if (teachers[i]) {
                const withdrawSubjectButton = document.createElement('button');
                withdrawSubjectButton.setAttribute('class', 'buttons-queries');
                withdrawSubjectButton.innerText = "Desvincular";
                withdrawSubjectButton.onclick = () => deleteConfirm("Disciplina", "none", subjects[i]['idtf']);
                buttonsPart.appendChild(withdrawSubjectButton);
            }

            const updateSubjectButton = document.createElement('button');
            updateSubjectButton.setAttribute('class', 'buttons-queries');
            updateSubjectButton.innerText = "Atualizar";
            updateSubjectButton.onclick = () => loadSubjectModal(subjects[i]['nome'], teachers[i]['idtf'], subjects[i]['idtf']);
            buttonsPart.appendChild(updateSubjectButton);

            subjectLine.appendChild(buttonsPart);
            subjectsBlock.appendChild(subjectLine);
        }
    } else {
        subjectsBlock.innerHTML = "<p>Não foram encontradas disciplinas!</p>";
    }
    classContainer.appendChild(subjectsBlock);

    const buttonsBlock = document.createElement('div');
    buttonsBlock.setAttribute('class', 'classButtonsBlock');

    const updateClassButton = document.createElement('button');
    updateClassButton.setAttribute('class', 'buttons-queries');
    updateClassButton.innerText = "Atualizar";
    updateClassButton.onclick = () => loadClassModal(className, classGrade, classIdtf);
    buttonsBlock.appendChild(updateClassButton);

    const deleteClassButton = document.createElement('button');
    deleteClassButton.setAttribute('class', 'buttons-queries');
    deleteClassButton.innerText = "Excluir";
    deleteClassButton.onclick = () => deleteConfirm("turma", "none", classIdtf);
    buttonsBlock.appendChild(deleteClassButton);

    classContainer.appendChild(buttonsBlock);

    parentBox.appendChild(classContainer);
}

function makeClassResultPrint(response, resultBlock) {
    resultBlock.innerHTML = "";
    if (!response['turma']) {
        resultBlock.innerHTML = "<p style='margin-left: 10px;'>Não foram encontradas turmas!</p>";
    } else {
        for (let j = 0; j < response['turma'].length; j++) {
            let classIdtf = response['turma'][j]['idtf'];
            let className = response['turma'][j]['nome'];
            let classGrade = response['turma'][j]['serie'];
            let subjects = response['turma'][j]['disciplinas'];
            let subjectsInfo = [];
            let subjectsTeachers = [];
            if (subjects) {
                for (let k = 0; k < subjects.length; k++) {
                    subjectsInfo.push(response['turma'][j]['disciplinas'][k]['materia']);
                    subjectsTeachers.push(response['turma'][j]['disciplinas'][k]['professor']);
                }
            }
            classHTMLResult(resultBlock, classIdtf, className, classGrade, subjectsInfo, subjectsTeachers);
        }
    }
}

function makeUserResultPrint(response, resultBlock) {
    resultBlock.innerHTML = "";
    if (!response['usuario']) {
        resultBlock.innerHTML = "<p style='margin-left: 10px;'>Não foram encontrados usuários!</p>";
    } else {
        for (let i = 0; i < response['usuario'].length; i++) {
            //comeco
        }
    }
}

export { classAsyncQuery };