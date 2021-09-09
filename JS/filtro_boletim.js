const resultTable = document.querySelector("#report-table");
const url = "info.php";

function asyncQuery(url, resultBlock) {
    let httpRequest = startRequest();
    httpRequest.open('GET', url);
    httpRequest.responseType = "json";
    httpRequest.send();
    httpRequest.onreadystatechange = () => {
        if (httpRequest.readyState === 4 && httpRequest.status === 200) {
            let response = httpRequest.response;
            makeResult(response, resultBlock);
        }
    }
}

function makeResult(response, resultBlock) {
    for (let i = 0; i < response.length; i++) {
        printTable(response[i], resultBlock);
    }
}

function printTable(studentObject, resultBlock) {
    const row = document.createElement('tr');

    const alunoColoumn = document.createElement('td');
    alunoColoumn.innerText = studentObject['aluno'];
    row.appendChild(alunoColoumn);

    const falta1Coloumn = document.createElement('td');
    falta1Coloumn.innerText = studentObject['falta1'];
    row.appendChild(falta1Coloumn);

    const nota1Coloumn = document.createElement('td');
    nota1Coloumn.innerText = studentObject['nota1'];
    row.appendChild(nota1Coloumn);

    const falta2Coloumn = document.createElement('td');
    falta2Coloumn.innerText = studentObject['falta2'];
    row.appendChild(falta2Coloumn);

    const nota2Coloumn = document.createElement('td');
    nota2Coloumn.innerText = studentObject['nota2'];
    row.appendChild(nota2Coloumn);

    const falta3Coloumn = document.createElement('td');
    falta3Coloumn.innerText = studentObject['falta3'];
    row.appendChild(falta3Coloumn);

    const nota3Coloumn = document.createElement('td');
    nota3Coloumn.innerText = studentObject['nota3'];
    row.appendChild(nota3Coloumn);

    const falta4Coloumn = document.createElement('td');
    falta4Coloumn.innerText = studentObject['falta4'];
    row.appendChild(falta4Coloumn);

    const nota4Coloumn = document.createElement('td');
    nota4Coloumn.innerText = studentObject['nota4'];
    row.appendChild(nota4Coloumn);

    const falta_finalColoumn = document.createElement('td');
    const falta_total = studentObject['falta1'] + studentObject['falta2'] + studentObject['falta3'] + studentObject['falta4'];
    falta_finalColoumn.innerText = falta_total;
    row.appendChild(falta_finalColoumn);

    const nota_finalColoumn = document.createElement('td');
    const nota_total = studentObject['nota1'] + studentObject['nota2'] + studentObject['nota3'] + studentObject['nota3'];
    nota_finalColoumn.innerText = nota_total;
    row.appendChild(nota_finalColoumn);

    const situacao_final = document.createElement('td');
    const situacao = nota_total > 65 && falta_total < 51 ? "Aprovado" : "Reprovado";
    situacao_final.innerText = situacao;
    row.appendChild(situacao_final);

    resultBlock.appendChild(row);
}

import { startRequest } from "../modulos/ajax.js";