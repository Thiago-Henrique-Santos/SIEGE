import { generatePath } from '../modulos/funcoes.js';

var httpRequest;
if (window.XMLHttpRequest) {
    httpRequest = new XMLHttpRequest();
} else if (window.ActiveXObject) {
    try {
        httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
    } catch (e) {
        try {
            httpRequest = new ActiveXObject('Microsoft.XMLHTTP');
        } catch (e) { }
    }
}
if (!httpRequest) {
    alert("Desistindo: Não é possível criar uma instância XMLHTTP.");
}

var options = document.getElementsByClassName('cargoFiltro');
var bloco_resultado = document.getElementById('busca_resultado')

var url = "CRUD/Usuario/read.php";

for (let i = 0; i < options.length; i++) {
    let checkbox = options[i];
    checkbox.addEventListener('change', function (event) {
        var checkboxStatus = event.target.checked;
        if (checkboxStatus) {
            url = generatePath(url, checkbox.id, true);
            httpRequest.open('GET', url);
            httpRequest.responseType = "json";
            httpRequest.send();
            httpRequest.addEventListener("readystatechange", function () {
                if (httpRequest.readyState === 4 && httpRequest.status === 200) {
                    var response = httpRequest.response;
                    console.log(response);
                }
            });
        } else {
            url = generatePath(url, checkbox.id, false);
        }
    });
}

window.onload = () => {
    sessionStorage.setItem('path', url);
    sessionStorage.setItem('relativeCounter', 0);
    sessionStorage.setItem('relativeStart', false);
    sessionStorage.setItem('firstRelative', "");
    httpRequest.open('GET', url);
    httpRequest.responseType = "json";
    httpRequest.send();
    httpRequest.onreadystatechange = function () {
        if (httpRequest.readyState === 4 && httpRequest.status === 200) {
            var response = httpRequest.response;
            bloco_resultado.innerHTML = response;
        }
    }
}