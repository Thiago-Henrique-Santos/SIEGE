import { generatePath } from './funcoes.js';
import { startRequest } from './ajax.js';
import { dateFormatForInput } from './funcoes.js';

let tip_usu = sessionStorage.getItem('tip_usu');
let genero = sessionStorage.getItem('sx');

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
                    makeResult(response, resultBlock, type);
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
                    makeResult(response, resultBlock, type);
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
                makeResult(response, resultBlock, type);
            }
        });
    }
}

function reportTableAsyncQuery(url, resultBlock) {
    let httpRequest = startRequest();
    httpRequest.open('GET', url);
    httpRequest.responseType = "json";
    httpRequest.send();
    httpRequest.onreadystatechange = () => {
        if (httpRequest.readyState === 4 && httpRequest.status === 200) {
            let response = httpRequest.response;
            makeResult(response, resultBlock, "Boletim");
        }
    }
}

function classHTMLResult(parentBox, classIdtf, className, classGrade, subjects, teachers, studentId, studentsNames) {
    const classContainer = document.createElement('li');
    classContainer.setAttribute('class', 'registerContainer');

    const title = document.createElement('h7');
    title.setAttribute('class', 'registerTitle registerTitleClass');
    title.innerHTML = `<strong><u>Turma:</u></strong> <span class="pesquisa nomeTurmaTitle">${classGrade}º ano ${className}</span>`;
    classContainer.appendChild(title);

    //Disciplinas
    const subjectTitle = document.createElement('h7');
    subjectTitle.setAttribute('class', 'registerTitle');
    subjectTitle.innerHTML = "<br>&emsp;<strong>Disciplinas</strong><br>";
    classContainer.appendChild(subjectTitle);

    const subjectsBlock = document.createElement('ul');
    subjectsBlock.setAttribute('class', 'listBlock');
    if (subjects.length > 0) {
        for (let i = 0; i < subjects.length; i++) {
            const subjectLine = document.createElement('li');
            subjectLine.setAttribute('class', 'listItemLine');
            const namesPart = document.createElement('span');
            namesPart.setAttribute('class', 'namesPart');
            namesPart.innerHTML = `<u class="pesquisa otherSearches">${subjects[i]['nome']}</u>: `;
            if (teachers[i])
                namesPart.innerHTML += `<span class="pesquisa otherSearches">${teachers[i]['nome']}</span>`;
            else
                namesPart.innerHTML += "Nesta turma, não há professor vinculado a essa disciplina.";
            subjectLine.appendChild(namesPart);

            const buttonsPart = document.createElement('div');
            buttonsPart.setAttribute('class', 'buttonsPart');

            const unbindSubjectButton = document.createElement('button');
            unbindSubjectButton.setAttribute('class', 'buttons-queries unbindSubjectButton');
            unbindSubjectButton.innerText = "Remover";
            unbindSubjectButton.onclick = () => deleteConfirm("Disciplina", "none", subjects[i]['idtf']);
            const unbindSubjectIcon = document.createElement('i');
            unbindSubjectIcon.setAttribute('class', 'far fa-trash-alt i_btns');
            unbindSubjectButton.appendChild(unbindSubjectIcon);

            buttonsPart.appendChild(unbindSubjectButton);


            const updateSubjectButton = document.createElement('button');
            updateSubjectButton.setAttribute('class', 'buttons-queries updateSubjectButton');
            updateSubjectButton.innerText = "Atualizar";
            updateSubjectButton.onclick = () => loadSubjectModal(subjects[i]['nome'], teachers[i]['idtf'], subjects[i]['idtf']);
            const updateSubjectIcon = document.createElement('i');
            updateSubjectIcon.setAttribute('class', 'far fa-edit i_btns');
            updateSubjectButton.appendChild(updateSubjectIcon);

            buttonsPart.appendChild(updateSubjectButton);


            subjectLine.appendChild(buttonsPart);
            subjectsBlock.appendChild(subjectLine);
        }
    } else {
        subjectsBlock.innerHTML = "<p>Não foram encontradas disciplinas!</p>";
    }
    classContainer.appendChild(subjectsBlock);

    //Alunos
    const studentTitle = document.createElement('h7');
    studentTitle.setAttribute('class', 'registerTitle');
    studentTitle.innerHTML = "<br>&emsp;<strong>Alunos</strong><br>";
    classContainer.appendChild(studentTitle);

    const studentsBlock = document.createElement('ul');
    studentsBlock.setAttribute('class', 'listBlock');
    if (studentsNames.length > 0) {
        for (let i = 0; i < studentsNames.length; i++) {
            const studentLine = document.createElement('li');
            studentLine.setAttribute('class', 'listItemLine');
            const namesPart = document.createElement('span');
            namesPart.setAttribute('class', 'namesPart');
            namesPart.innerHTML = `<u class='otherSearches'>${i + 1}</u>- `;
            namesPart.innerHTML += `<span class="pesquisa otherSearches">${studentsNames[i]}</span>`;
            studentLine.appendChild(namesPart);

            const buttonsPart = document.createElement('div');
            buttonsPart.setAttribute('class', 'buttonsPart');

            const unbindStudentButton = document.createElement('button');
            unbindStudentButton.setAttribute('class', 'buttons-queries unbindStudentButton');
            unbindStudentButton.innerText = "Desvincular";
            unbindStudentButton.onclick = () => unbindStudent(studentId[i]);
            const unbindStudentIcon = document.createElement('i');
            unbindStudentIcon.setAttribute('class', 'fas fa-unlink i_btns');
            unbindStudentButton.appendChild(unbindStudentIcon);

            buttonsPart.appendChild(unbindStudentButton);

            studentLine.appendChild(buttonsPart);
            studentsBlock.appendChild(studentLine);
        }

    } else {
        studentsBlock.innerHTML = "<p>Não foram encontrados alunos!</p>";
    }
    classContainer.appendChild(studentsBlock);

    const buttonsBlock = document.createElement('div');
    buttonsBlock.setAttribute('class', 'registerButtonsBlock');

    const updateClassButton = document.createElement('button');
    updateClassButton.setAttribute('class', 'buttons-queries updateClassButton');
    updateClassButton.innerText = "Atualizar";
    updateClassButton.onclick = () => loadClassModal(className, classGrade, classIdtf);
    const updateClassIcon = document.createElement('i');
    updateClassIcon.setAttribute('class', 'fas fa-edit i_btns');
    updateClassButton.appendChild(updateClassIcon);

    buttonsBlock.appendChild(updateClassButton);

    const deleteClassButton = document.createElement('button');
    deleteClassButton.setAttribute('class', 'buttons-queries deleteClassButton');
    deleteClassButton.innerText = "Excluir";
    deleteClassButton.onclick = () => deleteConfirm("turma", "none", classIdtf);
    buttonsBlock.appendChild(deleteClassButton);
    const deleteClassIcon = document.createElement('i');
    deleteClassIcon.setAttribute('class', 'fas fa-trash-alt i_btns');
    deleteClassButton.appendChild(deleteClassIcon);

    classContainer.appendChild(buttonsBlock);
    parentBox.appendChild(classContainer);

    function unbindStudent(id) {
        var html = document.querySelector('html');

        var screen = document.createElement('div');
        screen.setAttribute('id', 'deleteScreen');
        html.appendChild(screen);

        var box = document.createElement('div');
        box.setAttribute('class', 'deleteBox');
        screen.appendChild(box);

        var title = document.createElement('h1');
        title.textContent = "Confirmação de exclusão!";
        box.appendChild(title);

        var text = document.createElement('p');
        text.innerHTML = "Tem certeza que deseja excluir este registro?";
        text.innerHTML += "<br>Todos os dados ligados a este registro serão exluídos juntos ou sofrerão alguma alteração.";
        box.appendChild(text);

        var buttonsBlock = document.createElement('div');
        buttonsBlock.setAttribute('class', 'buttonsBlock');
        box.appendChild(buttonsBlock);

        var cancel = document.createElement('button');
        cancel.setAttribute('id', 'cancel');
        cancel.textContent = "Cancelar";
        cancel.onclick = close;
        buttonsBlock.appendChild(cancel);

        var confirm = document.createElement('button');
        confirm.setAttribute('id', 'confirm');
        confirm.textContent = "Confirmar";
        confirm.addEventListener('click', () => {
            httpRequest.open('GET', `CRUD/Usuario/desvincular_aluno.php?idtf=${id}`);

            httpRequest.send();
            httpRequest.onreadystatechange = () => {
                if (httpRequest.readyState === 4) {
                    if (httpRequest.status === 200) {
                        close();
                        document.location.reload(true);
                    } else {
                        alert('Houve um problema ao realizar esta ação!');
                    }
                }
            };
        });
        buttonsBlock.appendChild(confirm);

        function close() {
            screen.parentNode.removeChild(screen);
        }
    }
    searchBarFilter();
    if (tip_usu != 3) {
        hideButtons();
    }
}

function userHTMLResult(user, resultBlock) {
    for (let i = 0; i < user.length; i++) {
        const thisUser = user[i];
        const positionAttributes = thisUser['cargo_info'];

        const userContainer = document.createElement('li');
        userContainer.setAttribute('class', 'registerContainer');

        const userInfo = document.createElement('ul');
        userInfo.setAttribute('class', 'listBlock');

        const userName = document.createElement('li');
        userName.setAttribute('class', 'listItemBlock listItemBlockName');
        userName.innerHTML = `<center><strong>Nome:&nbsp;</strong> <span class="pesquisa">${thisUser['nome']}</span></center>`;
        userInfo.appendChild(userName);

        const userEmail = document.createElement('li');
        userEmail.setAttribute('class', 'listItemBlock');
        userEmail.innerHTML = `<strong>Email:</strong> <span class="pesquisa">${thisUser['email']}</span>`;
        userInfo.appendChild(userEmail);

        const userResidentialArea = document.createElement('li');
        userResidentialArea.setAttribute('class', 'listItemBlock');
        userResidentialArea.innerHTML = `<strong>Zona de moradia:</strong> <span class="pesquisa">${thisUser['local_moradia']}</span>`;
        userInfo.appendChild(userResidentialArea);

        const userGender = document.createElement('li');
        userGender.setAttribute('class', 'listItemBlock');
        userGender.innerHTML = `<strong>Sexo:</strong> <span class="pesquisa">${thisUser['sexo']}</span>`;
        userInfo.appendChild(userGender);

        const userPosition = positionAttributes['ocupacao'];
        if (userPosition == "aluno") {
            const userBirthDate = document.createElement('li');
            userBirthDate.setAttribute('class', 'listItemBlock');
            userBirthDate.innerHTML = `<strong>Data de nascimento:</strong> <span class="pesquisa">${positionAttributes['data_nascimento']}</span>`;
            userInfo.appendChild(userBirthDate);

            const userRegistrationNumber = document.createElement('li');
            userRegistrationNumber.setAttribute('class', 'listItemBlock');
            userRegistrationNumber.innerHTML = `<strong>N.° matrícula:</strong> <span class="pesquisa">${positionAttributes['matricula']}</span>`;
            userInfo.appendChild(userRegistrationNumber);

            const userResponsible = document.createElement('li');
            userResponsible.setAttribute('class', 'listItemBlock');
            userResponsible.innerHTML = `<strong>Responsável:</strong> <span class="pesquisa">${positionAttributes['responsavel']}</span>`;
            userInfo.appendChild(userResponsible);

            if (tip_usu != 1) {
                const userPhone = document.createElement('li');
                userPhone.setAttribute('class', 'listItemBlock');
                userPhone.innerHTML = `<strong>Telefone:</strong> <span class="pesquisa">${positionAttributes['telefone']}</span>`;
                userInfo.appendChild(userPhone);
            }

            let userClassInfo = positionAttributes['turma'];
            if (userClassInfo) {
                const userClass = document.createElement('li');
                userClass.setAttribute('class', 'listItemBlock');
                userClass.innerHTML = `<strong>Turma:</strong> <span class="pesquisa">${userClassInfo['serie']}º ano ${userClassInfo['nome']}</span>`;
                userInfo.appendChild(userClass);
            } else {
                const userClass = document.createElement('li');
                userClass.setAttribute('class', 'listItemBlock');
                if (thisUser['sexo'] == "Masculino")
                    userClass.innerHTML = `<strong>Turma:</strong> Este aluno não está vinculado à nenhuma turma!`;
                else
                    userClass.innerHTML = `<strong>Turma:</strong> Esta aluna não está vinculada à nenhuma turma!`;
                userInfo.appendChild(userClass);
            }

            const userPosition = document.createElement('li');
            userPosition.setAttribute('class', 'listItemBlock');
            userPosition.innerHTML = "<strong>Ocupação:</strong> ";
            if (thisUser['sexo'] == "Masculino")
                userPosition.innerHTML += `<span class="pesquisa">Aluno</span>`;
            else
                userPosition.innerHTML += `<span class="pesquisa">Aluna</span>`;
            userInfo.appendChild(userPosition);
        } else {
            const userRegistrationNumber = document.createElement('li');
            userRegistrationNumber.setAttribute('class', 'listItemBlock');
            userRegistrationNumber.innerHTML = `<strong>MASP:</strong> <span class="pesquisa">${positionAttributes['masp']}</span>`;
            userInfo.appendChild(userRegistrationNumber);

            const userStaffType = document.createElement('li');
            userStaffType.setAttribute('class', 'listItemBlock');
            userStaffType.innerHTML = "<strong>Tipo de empregado:</strong> ";
            const userStaffInformation = positionAttributes['tipo_empregado'];
            switch (userStaffInformation) {
                case "Designado":
                    if (thisUser['sexo'] == "Masculino")
                        userStaffType.innerHTML += `<span class="pesquisa">Designado</span>`;
                    else
                        userStaffType.innerHTML += `<span class="pesquisa">Designada</span>`;
                    break;

                case "Efetivo":
                    if (thisUser['sexo'] == "Masculino")
                        userStaffType.innerHTML += `<span class="pesquisa">Efetivo</span>`;
                    else
                        userStaffType.innerHTML += `<span class="pesquisa">Efetiva</span>`;
                    break;
            }
            userInfo.appendChild(userStaffType);

            const userFunction = document.createElement('li');
            userFunction.setAttribute('class', 'listItemBlock');
            userFunction.innerHTML = `<strong>Função:</strong> <span class="pesquisa">${positionAttributes['funcao']}</span>`;
            userInfo.appendChild(userFunction);

            const userPosition = document.createElement('li');
            userPosition.setAttribute('class', 'listItemBlock');
            userPosition.innerHTML = "<strong>Ocupação:</strong> ";
            const userPositionInformation = positionAttributes['ocupacao'];
            switch (userPositionInformation) {
                case "professor":
                    if (thisUser['sexo'] == "Masculino")
                        userPosition.innerHTML += `<span class="pesquisa">Professor</span>`;
                    else
                        userPosition.innerHTML += `<span class="pesquisa">Professora</span>`;
                    break;

                case "secretario":
                    if (thisUser['sexo'] == "Masculino")
                        userPosition.innerHTML += `<span class="pesquisa">Secretário</span>`;
                    else
                        userPosition.innerHTML += `<span class="pesquisa">Secretária</span>`;
                    break;

                case "supervisor":
                    if (thisUser['sexo'] == "Masculino")
                        userPosition.innerHTML += `<span class="pesquisa">Supervisor</span>`;
                    else
                        userPosition.innerHTML += `<span class="pesquisa">Supervisora</span>`;
                    break;

                case "diretor":
                    if (thisUser['sexo'] == "Masculino")
                        userPosition.innerHTML += `<span class="pesquisa">Diretor</span>`;
                    else
                        userPosition.innerHTML += `<span class="pesquisa">Diretora</span>`;
                    break;
            }
            userInfo.appendChild(userPosition);
        }
        userContainer.appendChild(userInfo);

        const buttonsBlock = document.createElement('div');
        buttonsBlock.setAttribute('class', 'registerButtonsBlock');

        const updateUserButton = document.createElement('button');
        updateUserButton.setAttribute('class', 'buttons-queries updateUserButton');
        updateUserButton.innerText = "Atualizar";
        const gender = thisUser['sexo'] == "Masculino" ? "M" : "F";
        const residentialArea = thisUser['local_moradia'] == "Urbana" ? "U" : "R";
        if (positionAttributes['ocupacao'] == "aluno") {
            const birthDate = dateFormatForInput(positionAttributes['data_nascimento']);
            updateUserButton.onclick = () => loadStudentModal(thisUser['nome'], birthDate, positionAttributes['matricula'], positionAttributes['responsavel'], thisUser['email'], positionAttributes['telefone'], residentialArea, gender, positionAttributes['turma']['idtf'], thisUser['idtf']);
        } else {
            const staffType = positionAttributes['tipo_empregado'] == "Efetivo" ? "E" : "D";
            updateUserButton.onclick = () => loadStaffModal(positionAttributes['ocupacao'], thisUser['nome'], positionAttributes['masp'], thisUser['email'], residentialArea, staffType, gender, positionAttributes['funcao'], thisUser['idtf']);
        }
        const updateUserIcon = document.createElement('i');
        updateUserIcon.setAttribute('class', 'fas fa-edit i_btns');
        updateUserButton.appendChild(updateUserIcon);

        buttonsBlock.appendChild(updateUserButton);

        const deleteUserButton = document.createElement('button');
        deleteUserButton.setAttribute('class', 'buttons-queries deleteUserButton');
        deleteUserButton.innerText = "Excluir";
        deleteUserButton.onclick = () => deleteConfirm("Usuario", positionAttributes['ocupacao'], thisUser['idtf']);
        const deleteUserIcon = document.createElement('i');
        deleteUserIcon.setAttribute('class', 'fas fa-trash-alt i_btns');
        deleteUserButton.appendChild(deleteUserIcon);

        buttonsBlock.appendChild(deleteUserButton);

        userContainer.appendChild(buttonsBlock);

        resultBlock.appendChild(userContainer);
    }
    searchBarFilter();
    if (tip_usu != 3) {
        hideButtons();
    }
}

function printTable(studentObject, resultBlock, counter) {

    //Criação dos componentes na página boletim para funcionários
    let f = 0;
    let n = 0;
    let falta_total;
    let nota_total;
    let situacao = '';
    let soma = 0;
    const row = document.createElement('tr');
    if (counter%2==0) {
        row.setAttribute('class', 'linha_registros');
    } else {
        row.setAttribute('class', 'linha_registros2');
    }

    const alunoColoumn = document.createElement('td');
    alunoColoumn.setAttribute('class', 'registroAlunos');
    alunoColoumn.innerHTML = "&nbsp;&nbsp;";
    alunoColoumn.innerText += studentObject['aluno'];
    row.appendChild(alunoColoumn);

    const idReportColoumn = document.createElement('td');
    idReportColoumn.setAttribute('style', 'display:none');
    const inputIdBoletim = document.createElement('input');
    inputIdBoletim.setAttribute('type', 'number');
    inputIdBoletim.setAttribute('min', '0');
    inputIdBoletim.setAttribute('step', '1');
    inputIdBoletim.setAttribute('name', 'idb');
    inputIdBoletim.setAttribute('placeholder', '-');
    inputIdBoletim.setAttribute('disabled', '');
    inputIdBoletim.setAttribute('value', parseInt(studentObject['id_boletim']));
    idReportColoumn.appendChild(inputIdBoletim);
    row.appendChild(idReportColoumn);

    const falta1Coloumn = document.createElement('td');
    falta1Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimf1 = document.createElement('input');
    inputBoletimf1.setAttribute('type', 'number');
    inputBoletimf1.setAttribute('min', '0');
    inputBoletimf1.setAttribute('step', '1');
    inputBoletimf1.setAttribute('name', 'f1b');
    inputBoletimf1.setAttribute('placeholder', '-');
    inputBoletimf1.setAttribute('disabled', '');
    inputBoletimf1.setAttribute('value', parseInt(studentObject['faltas'][1]));
    if(studentObject['faltas'][1] == null)
        f++;

    falta1Coloumn.appendChild(inputBoletimf1);
    row.appendChild(falta1Coloumn);

    const nota1Coloumn = document.createElement('td');
    nota1Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimn1 = document.createElement('input');
    inputBoletimn1.setAttribute('type', 'number');
    inputBoletimn1.setAttribute('min', '0');
    inputBoletimn1.setAttribute('step', '0.5');
    inputBoletimn1.setAttribute('name', 'n1b');
    inputBoletimn1.setAttribute('placeholder', '-,-');
    inputBoletimn1.setAttribute('disabled', '');
    inputBoletimn1.setAttribute('value', parseFloat(studentObject['notas'][1]));
    if(studentObject['notas'][1] == null)
        n++;

    nota1Coloumn.appendChild(inputBoletimn1);
    row.appendChild(nota1Coloumn);

    const falta2Coloumn = document.createElement('td');
    falta2Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimf2 = document.createElement('input');
    inputBoletimf2.setAttribute('type', 'number');
    inputBoletimf2.setAttribute('min', '0');
    inputBoletimf2.setAttribute('step', '1');
    inputBoletimf2.setAttribute('name', 'f2b');
    inputBoletimf2.setAttribute('placeholder', '-');
    inputBoletimf2.setAttribute('disabled', '');
    inputBoletimf2.setAttribute('value', parseInt(studentObject['faltas'][2]));
    if(studentObject['faltas'][2] == null)
        f++;

    falta2Coloumn.appendChild(inputBoletimf2);
    row.appendChild(falta2Coloumn);

    const nota2Coloumn = document.createElement('td');
    nota2Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimn2 = document.createElement('input');
    inputBoletimn2.setAttribute('type', 'number');
    inputBoletimn2.setAttribute('min', '0');
    inputBoletimn2.setAttribute('step', '0.5');
    inputBoletimn2.setAttribute('name', 'n2b');
    inputBoletimn2.setAttribute('placeholder', '-,-');
    inputBoletimn2.setAttribute('disabled', '');
    inputBoletimn2.setAttribute('value', parseFloat(studentObject['notas'][2]));
    if(studentObject['notas'][2] == null)
        n++;

    nota2Coloumn.appendChild(inputBoletimn2);
    row.appendChild(nota2Coloumn);

    const falta3Coloumn = document.createElement('td');
    falta3Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimf3 = document.createElement('input');
    inputBoletimf3.setAttribute('type', 'number');
    inputBoletimf3.setAttribute('min', '0');
    inputBoletimf3.setAttribute('step', '1');
    inputBoletimf3.setAttribute('name', 'f3b');
    inputBoletimf3.setAttribute('placeholder', '-');
    inputBoletimf3.setAttribute('disabled', '');
    inputBoletimf3.setAttribute('value', parseInt(studentObject['faltas'][3]));
    if(studentObject['faltas'][3] == null)
        f++;

    falta3Coloumn.appendChild(inputBoletimf3);
    row.appendChild(falta3Coloumn);

    const nota3Coloumn = document.createElement('td');
    nota3Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimn3 = document.createElement('input');
    inputBoletimn3.setAttribute('type', 'number');
    inputBoletimn3.setAttribute('min', '0');
    inputBoletimn3.setAttribute('step', '0.5');
    inputBoletimn3.setAttribute('name', 'n3b');
    inputBoletimn3.setAttribute('placeholder', '-,-');
    inputBoletimn3.setAttribute('disabled', '');
    inputBoletimn3.setAttribute('value', parseFloat(studentObject['notas'][3]));
    if(studentObject['notas'][3] == null)
        n++;

    nota3Coloumn.appendChild(inputBoletimn3);
    row.appendChild(nota3Coloumn);

    const falta4Coloumn = document.createElement('td');
    falta4Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimf4 = document.createElement('input');
    inputBoletimf4.setAttribute('type', 'number');
    inputBoletimf4.setAttribute('min', '0');
    inputBoletimf4.setAttribute('step', '1');
    inputBoletimf4.setAttribute('name', 'f4b');
    inputBoletimf4.setAttribute('placeholder', '-');
    inputBoletimf4.setAttribute('disabled', '');
    inputBoletimf4.setAttribute('value', parseInt(studentObject['faltas'][4]));
    if(studentObject['faltas'][4] == null)
        f++;

    falta4Coloumn.appendChild(inputBoletimf4);
    row.appendChild(falta4Coloumn);

    const nota4Coloumn = document.createElement('td');
    nota4Coloumn.setAttribute('class', 'td_notafalta');

    const inputBoletimn4 = document.createElement('input');
    inputBoletimn4.setAttribute('type', 'number');
    inputBoletimn4.setAttribute('min', '0');
    inputBoletimn4.setAttribute('step', '0.5');
    inputBoletimn4.setAttribute('name', 'n4b');
    inputBoletimn4.setAttribute('placeholder', '-,-');
    inputBoletimn4.setAttribute('disabled', '');
    inputBoletimn4.setAttribute('value', parseFloat(studentObject['notas'][4]));
    if(studentObject['notas'][4] == null)
        n++;

    nota4Coloumn.appendChild(inputBoletimn4);
    row.appendChild(nota4Coloumn);

    const faltaRecuperacaoColoumn = document.createElement('td');
    faltaRecuperacaoColoumn.setAttribute('class', 'td_notafalta');

    const inputBoletimf5 = document.createElement('input');
    inputBoletimf5.setAttribute('type', 'number');
    inputBoletimf5.setAttribute('min', '0');
    inputBoletimf5.setAttribute('step', '1');
    inputBoletimf5.setAttribute('name', 'f5b');
    inputBoletimf5.setAttribute('placeholder', '-');
    inputBoletimf5.setAttribute('disabled', '');
    inputBoletimf5.setAttribute('value', parseInt(studentObject['faltas'][5]));

    faltaRecuperacaoColoumn.appendChild(inputBoletimf5);
    row.appendChild(faltaRecuperacaoColoumn);

    const notaRecuperacaoColoumn = document.createElement('td');
    notaRecuperacaoColoumn.setAttribute('class', 'td_notafalta');

    const inputBoletimn5 = document.createElement('input');
    inputBoletimn5.setAttribute('type', 'number');
    inputBoletimn5.setAttribute('min', '0');
    inputBoletimn5.setAttribute('step', '0.5');
    inputBoletimn5.setAttribute('name', 'n5b');
    inputBoletimn5.setAttribute('placeholder', '-,-');
    inputBoletimn5.setAttribute('disabled', '');
    inputBoletimn5.setAttribute('value', parseFloat(studentObject['notas'][5]));

    notaRecuperacaoColoumn.appendChild(inputBoletimn5);
    row.appendChild(notaRecuperacaoColoumn);

    //Condições de formatação e lógica do boletim para funcionarios

    if(f > 0){
        falta_total = '-:--';
        situacao = 'Em andamento';
    }else{
        if(studentObject['faltas'][5] == null){
            soma = parseInt(studentObject['faltas'][1]) + parseInt(studentObject['faltas'][2]) + parseInt(studentObject['faltas'][3]) + parseInt(studentObject['faltas'][4]);
        }else{
            soma = parseInt(studentObject['faltas'][1]) + parseInt(studentObject['faltas'][2]) + parseInt(studentObject['faltas'][3]) + parseInt(studentObject['faltas'][4]) + parseInt(studentObject['faltas'][5]);
        }
        falta_total = soma;
    }

    if(n > 0){
        nota_total = '-,-';
        situacao = 'Em andamento';
    }else{
        nota_total = parseFloat(studentObject['notas'][1]) + parseFloat(studentObject['notas'][2]) + parseFloat(studentObject['notas'][3]) + parseFloat(studentObject['notas'][4]);
        if((nota_total < 65) && (parseFloat(studentObject['notas'][5]) != null && parseFloat(studentObject['notas'][5]) >= nota_total)){
            nota_total = parseFloat(studentObject['notas'][5]);
        }
        if(nota_total < 65 && studentObject['notas'][5] == null && soma <= 50){
            studentObject['notas'][5] = '-,-';
            nota_total = studentObject['notas'][5];
        }
    }

    if ((soma <= 50 && nota_total >= 65) && (n == 0 && f == 0)){
        situacao = 'Aprovado';
    } else if (((soma > 50) || (nota_total < 65 && nota_total != '-,-')) && (n == 0 && f == 0)){
        situacao = 'Reprovado';
    } else if ((n > 0 || f > 0) || (nota_total == '-,-')){
        situacao = 'Em andamento';
    }


    const falta_finalColoumn = document.createElement('td');
    if ((f == 0) && (soma > 50))
        falta_finalColoumn.setAttribute('class', 'td_totais negativa');
    else if ((f == 0) && (soma <= 50))
        falta_finalColoumn.setAttribute('class', 'td_totais positiva');
    falta_finalColoumn.innerText = falta_total;
    row.appendChild(falta_finalColoumn);

    const nota_finalColoumn = document.createElement('td');
    if ((n == 0) && (nota_total < 65 && nota_total != '-,-'))
        nota_finalColoumn.setAttribute('class', 'td_totais negativa');
    else if ((n == 0) && (nota_total >= 65))
        nota_finalColoumn.setAttribute('class', 'td_totais positiva');
    else if ((n == 0) && (nota_total == '-,-'))
        nota_finalColoumn.setAttribute('class', 'td_totais neutra');
    nota_finalColoumn.innerText = nota_total;
    row.appendChild(nota_finalColoumn);

    const situacao_final = document.createElement('td');
    if (situacao == 'Em andamento')
        situacao_final.setAttribute('class', 'td_situacao neutra');
    else if (situacao == 'Reprovado')
        situacao_final.setAttribute('class', 'td_situacao negativa');
    else if (situacao == 'Aprovado')
        situacao_final.setAttribute('class', 'td_situacao positiva');    
    situacao_final.innerText = situacao;
    row.appendChild(situacao_final);

    resultBlock.appendChild(row);
}

function makeResult(response, resultBlock, type) {
    switch (type) {
        case "Turma":
            resultBlock.innerHTML = "";
            if (!response['turma']) {
                if (tip_usu == 1) {
                    if (genero == 'M') {
                        resultBlock.innerHTML = "<p style='margin-left: 10px;'>O aluno não está vinculado a uma turma!</p>";
                    } else {
                        resultBlock.innerHTML = "<p style='margin-left: 10px;'>A aluna não está vinculada a uma turma!</p>";
                    }
                }
                else {
                    resultBlock.innerHTML = "<p style='margin-left: 10px;'>Não foram encontradas turmas!</p>";
                }
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

                    let students = response['turma'][i]['aluno'];
                    let studentId = [];
                    let studentName = [];

                    if (students) {
                        for (let j = 0; j < students.length; j++) {
                            studentId.push(response['turma'][i]['aluno'][j]['id']);
                            studentName.push(response['turma'][i]['aluno'][j]['nome']);
                        }
                    }
                    classHTMLResult(resultBlock, classIdtf, className, classGrade, subjectsInfo, subjectsTeachers, studentId, studentName);
                }
            }
            break;

        case "Usuario":
            resultBlock.innerHTML = "";
            if (!response['usuario']) {
                resultBlock.innerHTML = "<p style='margin-left: 5px;'>Não há usuários registrados!</p>";
            } else {
                let user = [];
                for (let i = 0; i < response['usuario'].length; i++) {
                    user.push(response['usuario'][i]);
                }
                userHTMLResult(user, resultBlock);
            }
            break;

        case "Boletim":
            clearReportTable(resultBlock);
            if (response) {
                toggleInfoText(0);
                for (let i = 0; i < response.length; i++) {
                    printTable(response[i], resultBlock, i);
                }
            } else {
                toggleInfoText(1);
            }
            break;
    }
}

function searchBarFilter() {
    //Variáveis para elementos do filtro
    let input = document.getElementById('barra_pesquisa');
    let inputValue = input.value;
    let filter = inputValue.toUpperCase();
    let ul = document.getElementById('busca_resultado');
    let li = ul.getElementsByClassName('registerContainer');

    //Verifica se o usuário já pesquisou algum nome de usuários inexistentes
    let oldNoResults = ul.querySelector('li#noResults');
    if (oldNoResults) {
        ul.removeChild(oldNoResults);
    }

    //Variável de controle para "se achou usuários ou não", com o nome inserido
    let liGroup = false;

    //Buscando usuários
    for (let i = 0; i < li.length; i++) {
        let searchList = li[i].getElementsByClassName('pesquisa');
        for (let j = 0; j < searchList.length; j++) {
            let txtValue = searchList[j].textContent;
            if (txtValue.toUpperCase().indexOf(filter) > -1) {
                li[i].style.display = "";
                liGroup = true;
                break;
            } else {
                li[i].style.display = "none";
            }
        }
    }

    //Verifica se não encontrou usuários com o nome inserido
    if (!liGroup) {
        const noResults = document.createElement('li');
        noResults.setAttribute('id', 'noResults');
        noResults.setAttribute('style', 'margin-left: 15px;');
        noResults.textContent = `Não foram encontrados resultados para: "${inputValue}"`;

        ul.appendChild(noResults);
    }
}

function hideButtons() {
    const buttons = document.getElementsByClassName('buttons-queries');
    for (let i = 0; i < buttons.length; i++) {
        buttons[i].style.display = 'none';
    }
}

function clearReportTable(table){
    let linesQuantity = table.getElementsByTagName('tr').length;
    for (let i = linesQuantity-1; i > 1; i--) {
        table.deleteRow(i);
    }
}

function toggleInfoText(status){
    var paragraph = document.getElementById('info_text');
    if(status == 0){
        paragraph.style.display = "none";
    } else {
        paragraph.style.display = "block";
    }
}

export { asyncQuery, reportTableAsyncQuery, searchBarFilter };