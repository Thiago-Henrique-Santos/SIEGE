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
    for (let i = 0; i < user.length; i++) {
        const thisUser = user[i];
        const positionAttributes = thisUser['cargo_info'];

        const userContainer = document.createElement('div');
        userContainer.setAttribute('class', 'registerContainer');

        const userInfo = document.createElement('ul');
        userInfo.setAttribute('class', 'listBlock');

        const userName = document.createElement('li');
        userName.setAttribute('class', 'listItemBlock');
        userName.innerHTML = `<strong>Nome:</strong> ${thisUser['nome']}`;
        userInfo.appendChild(userName);

        const userEmail = document.createElement('li');
        userEmail.setAttribute('class', 'listItemBlock');
        userEmail.innerHTML = `<strong>Email:</strong> ${thisUser['email']}`;
        userInfo.appendChild(userEmail);

        const userResidentialArea = document.createElement('li');
        userResidentialArea.setAttribute('class', 'listItemBlock');
        userResidentialArea.innerHTML = `<strong>Zona de moradia:</strong> ${thisUser['local_moradia']}`;
        userInfo.appendChild(userResidentialArea);

        const userGender = document.createElement('li');
        userGender.setAttribute('class', 'listItemBlock');
        userGender.innerHTML = `<strong>Sexo:</strong> ${thisUser['sexo']}`;
        userInfo.appendChild(userGender);

        const userPosition = positionAttributes['ocupacao'];
        if (userPosition == "Aluno") {
            const userBirthDate = document.createElement('li');
            userBirthDate.setAttribute('class', 'listItemBlock');
            userBirthDate.innerHTML = `<strong>Data de nascimento:</strong> ${positionAttributes['data_nascimento']}`;
            userInfo.appendChild(userBirthDate);

            const userRegistrationNumber = document.createElement('li');
            userRegistrationNumber.setAttribute('class', 'listItemBlock');
            userRegistrationNumber.innerHTML = `<strong>N.° matrícula:</strong> ${positionAttributes['matricula']}`;
            userInfo.appendChild(userRegistrationNumber);

            const userResponsible = document.createElement('li');
            userResponsible.setAttribute('class', 'listItemBlock');
            userResponsible.innerHTML = `<strong>Responsável:</strong> ${positionAttributes['responsavel']}`;
            userInfo.appendChild(userResponsible);

            const userPhone = document.createElement('li');
            userPhone.setAttribute('class', 'listItemBlock');
            userPhone.innerHTML = `<strong>Telefone:</strong> ${positionAttributes['telefone']}`;
            userInfo.appendChild(userPhone);

            let userClassInfo = positionAttributes['turma'];
            if (userClassInfo) {
                const userClass = document.createElement('li');
                userClass.setAttribute('class', 'listItemBlock');
                userClass.innerHTML = `<strong>Turma:</strong> ${userClassInfo['serie']}º ano ${userClassInfo['nome']}`;
                userInfo.appendChild(userClass);
            } else {
                const userClass = document.createElement('li');
                userClass.setAttribute('class', 'listItemBlock');
                userClass.innerHTML = `<strong>Turma:</strong> Este aluno não está vinculado à nenhuma turma!`;
                userInfo.appendChild(userClass);
            }

            const userPosition = document.createElement('li');
            userPosition.setAttribute('class', 'listItemBlock');
            userPosition.innerHTML = "<strong>Ocupação:</strong> ";
            if (thisUser['sexo'] == "Masculino")
                userPosition.innerHTML += "Aluno";
            else
                userPosition.innerHTML += "Aluna";
            userInfo.appendChild(userPosition);
        } else {
            const userRegistrationNumber = document.createElement('li');
            userRegistrationNumber.setAttribute('class', 'listItemBlock');
            userRegistrationNumber.innerHTML = `<strong>MASP:</strong> ${positionAttributes['masp']}`;
            userInfo.appendChild(userRegistrationNumber);

            const userStaffType = document.createElement('li');
            userStaffType.setAttribute('class', 'listItemBlock');
            userStaffType.innerHTML = `<strong>Tipo de empregado:</strong> ${positionAttributes['tipo_empregado']}`;
            userInfo.appendChild(userStaffType);

            const userFunction = document.createElement('li');
            userFunction.setAttribute('class', 'listItemBlock');
            userFunction.innerHTML = `<strong>Função:</strong> ${positionAttributes['funcao']}`;
            userInfo.appendChild(userFunction);

            const userPosition = document.createElement('li');
            userPosition.setAttribute('class', 'listItemBlock');
            userPosition.innerHTML = "<strong>Ocupação:</strong> ";
            const userPositionInformation = positionAttributes['ocupacao'];
            switch (userPositionInformation) {
                case "professor":
                    if (thisUser['sexo'] == "Masculino")
                        userPosition.innerHTML += "Professor";
                    else
                        userPosition.innerHTML += "Professora";
                    break;

                case "secretario":
                    if (thisUser['sexo'] == "Masculino")
                        userPosition.innerHTML += "Secretário";
                    else
                        userPosition.innerHTML += "Secretária";
                    break;

                case "diretor":
                    if (thisUser['sexo'] == "Masculino")
                        userPosition.innerHTML += "Diretor";
                    else
                        userPosition.innerHTML += "Diretora";
                    break;
            }
            userInfo.appendChild(userPosition);
        }
        userContainer.appendChild(userInfo);

        const buttonsBlock = document.createElement('div');
        buttonsBlock.setAttribute('class', 'registerButtonsBlock');

        const updateUserButton = document.createElement('button');
        updateUserButton.setAttribute('class', 'buttons-queries');
        updateUserButton.innerText = "Atualizar";
        const gender = thisUser['sexo'] == "Masculino" ? "M" : "F";
        const residentialArea = thisUser['local_moradia'] == "Urbana" ? "U" : "R";
        if (positionAttributes['ocupacao'] == "Aluno") {
            updateUserButton.onclick = () => loadStudentModal(thisUser['nome'], positionAttributes['data_nascimento'], positionAttributes['matricula'], positionAttributes['responsavel'], thisUser['email'], positionAttributes['telefone'], residentialArea, gender, positionAttributes['turma']['idtf'], thisUser['idtf']);
        } else {
            const staffType = positionAttributes['tipo_empregado'] == "Efetivo" ? "E" : "D";
            updateUserButton.onclick = () => loadStaffModal(positionAttributes['ocupacao'], thisUser['nome'], positionAttributes['masp'], thisUser['email'], residentialArea, staffType, gender, positionAttributes['funcao'], thisUser['idtf']);
        }
        buttonsBlock.appendChild(updateUserButton);

        const deleteClassButton = document.createElement('button');
        deleteClassButton.setAttribute('class', 'buttons-queries');
        deleteClassButton.innerText = "Excluir";
        deleteClassButton.onclick = () => deleteConfirm("turma", "none", classIdtf);
        buttonsBlock.appendChild(deleteClassButton);

        userContainer.appendChild(buttonsBlock);

        resultBlock.appendChild(userContainer);
    }
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