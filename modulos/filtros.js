import { generatePath } from '../modulos/funcoes.js';
import { startRequest } from './ajax.js';

function classAsyncQuery(url, resultBlock, option, optionStatus) {
    var httpRequest = startRequest();
    if (option != null && optionStatus != null) {
        if (optionStatus) {
            url = generatePath(url, option, true);
            httpRequest.open('GET', url);
            httpRequest.responseType = "json";
            httpRequest.send();
            httpRequest.addEventListener("readystatechange", function () {
                if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                    var response = httpRequest.response;
                    console.log(response);
                    makeResultPrint(response, resultBlock);
                }
            });
        } else {
            url = generatePath(url, checkbox.id, false);
            httpRequest.open('GET', url);
            httpRequest.responseType = "json";
            httpRequest.send();
            httpRequest.addEventListener("readystatechange", function () {
                if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                    var response = httpRequest.response;
                    console.log(response);
                    makeResultPrint(response, resultBlock);
                }
            });
        }
    } else {
        httpRequest.open('GET', url);
        httpRequest.responseType = "json";
        httpRequest.send();
        httpRequest.addEventListener("readystatechange", function () {
            if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                var response = httpRequest.response;
                console.log(response);
                makeResultPrint(response, resultBlock);
            }
        });
    }
}

function classHTMLResult(parentBox, className, subjects, teachers) {
    const classContainer = document.createElement('div');
    classContainer.setAttribute('class', 'classContainer');
    parentBox.appendChild(classContainer);

    const title = document.createElement('div');
    title.setAttribute('class', 'classTitle');
    title.innerHTML = `<strong>Turma:</strong> ${className}`;
    classContainer.appendChild(title);

    const subjectsBlock = document.createElement('div');
    subjectsBlock.setAttribute('class', 'subjectsBlock');
    classContainer.appendChild(subjectsBlock);

    if (subjects != false) {
        for (var i = 0; i < subjects.length; i++) {
            const subjectLine = document.createElement('div');
            subjectLine.setAttribute('class', 'subjectLine');
            subjectsBlock.appendChild(subjectLine);

            const namesPart = document.createElement('div');
            namesPart.setAttribute('class', 'namesPart');
            namesPart.innerHTML = `<u>${subjects[i]}</u>: `;
            if (teachers[i] != false)
                namesPart.innerHTML += teachers[i];
            else
                namesPart.innerText += "Não há professor disponível nesta disciplina, nesta turma.";
            subjectLine.appendChild(namesPart);

            const buttonsPart = document.createElement('div');
            buttonsPart.setAttribute('class', 'buttonsPart');
            subjectLine.appendChild(buttonsPart);

            if (teachers[i] != false) {
                const withdrawSubjectButton = document.createElement('button');
                withdrawSubjectButton.setAttribute('class', 'button');
                withdrawSubjectButton.innerText = "Desvincular";
                buttonsPart.appendChild(withdrawSubjectButton);
            }

            const updateSubjectButton = document.createElement('button');
            updateSubjectButton.setAttribute('class', 'button');
            updateSubjectButton.innerText = "Atualizar";
            buttonsPart.appendChild(updateSubjectButton);
        }
    } else {
        subjectsBlock.innerHTML = "<p>Não foram encontradas disciplinas!</p>";
    }

    const buttonsBlock = document.createElement('div');
    buttonsBlock.setAttribute('class', 'classButtonsBlock');
    classContainer.appendChild(buttonsBlock);

    const updateClassButton = document.createElement('button');
    updateClassButton.setAttribute('class', 'button');
    updateClassButton.innerText = "Atualizar";
    buttonsBlock.appendChild(updateClassButton);

    const deleteClassButton = document.createElement('button');
    deleteClassButton.setAttribute('class', 'button');
    deleteClassButton.innerText = "Excluir";
    buttonsBlock.appendChild(deleteClassButton);
}

function makeResultPrint(response, resultBlock) {
    for (let j = 0; j < response['turma'].length; j++) {
        const className = response['turma'][j]['nome'];
        var subjects = response['turma'][j]['disciplinas'];
        var subjectsNames = [];
        var subjectsTeachers = [];
        for (let k = 0; k < subjects.length; k++) {
            subjectsNames[k] = response['turma'][j]['disciplinas'][k]['disciplina'];
            subjectsTeachers[k] = response['turma'][j]['disciplinas'][k]['professor'];
        }
        classHTMLResult(resultBlock, className, subjectsNames, subjectsTeachers);
    }
}

export { classAsyncQuery };