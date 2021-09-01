import { generatePath } from './funcoes.js';
import { startRequest } from './ajax.js';

function asyncQuery(url, resultBlock, option, optionStatus, type) {
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
                    makeResultPrint(response, resultBlock, type);
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
                    makeResultPrint(response, resultBlock, type);
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
                makeResultPrint(response, resultBlock, type);
            }
        });
    }
}

function classHTMLResult(parentBox, classIdtf, className, classGrade, subjects, teachers) {
    const classContainer = document.createElement('div');
    classContainer.setAttribute('class', 'registerContainer');

    const title = document.createElement('div');
    title.setAttribute('class', 'registerTitle');
    title.innerHTML = `<strong>Turma:</strong> ${classGrade}º ano ${className}`;
    classContainer.appendChild(title);

    const subjectsBlock = document.createElement('div');
    subjectsBlock.setAttribute('class', 'listBlock');
    if (subjects.length > 0) {
        for (let i = 0; i < subjects.length; i++) {
            const subjectLine = document.createElement('div');
            subjectLine.setAttribute('class', 'listItemLine');

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
    buttonsBlock.setAttribute('class', 'registerButtonsBlock');

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

function userHTMLResult(user, resultBlock) {
    const userContainer
}

function makeResultPrint(response, resultBlock, type) {
    resultBlock.innerHTML = "";
    switch (type) {
        case "Turma":
            if (!response['turma']) {
                resultBlock.innerHTML = "<p style='margin-left: 10px;'>Não foram encontradas turmas!</p>";
            } else {
                for (let i = 0; i < response['turma'].length; i++) {
                    let classIdtf = response['turma'][i]['idtf'];
                    let className = response['turma'][i]['nome'];
                    let classGrade = response['turma'][i]['serie'];
                    let subjects = response['turma'][i]['disciplinas'];
                    let subjectsInfo = [];
                    let subjectsTeachers = [];
                    if (subjects) {
                        for (let j = 0; j < subjects.length; j++) {
                            subjectsInfo.push(response['turma'][i]['disciplinas'][j]['materia']);
                            subjectsTeachers.push(response['turma'][i]['disciplinas'][j]['professor']);
                        }
                    }
                    classHTMLResult(resultBlock, classIdtf, className, classGrade, subjectsInfo, subjectsTeachers);
                }
            }
            break;
        
        case "Usuario":
            if (!response['usuario']) {
                resultBlock.innerHTML = "<p style='margin-left: 5px;'>Não há usuários registrados!</p>";
            } else {
                let user = [];
                for (let i = 0; i < response['usuario'].length; i++) {
                    user.push(response['usuario'][i]);
                }
                console.log(user);
                userHTMLResult(user, resultBlock);
            }
            break;
    }
}

export { asyncQuery };