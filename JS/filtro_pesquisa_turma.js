import { generatePath } from '../modulos/funcoes.js';

var httpRequest;

var options = document.getElementsByClassName('serieFiltro');

var url = "CRUD/Turma/read_filtro.php";

for(let i=0;i<options.length;i++){
    let checkbox = options[i];
    checkbox.addEventListener('change', function (event) {
        if(window.XMLHttpRequest) {
            httpRequest = new XMLHttpRequest();
        } else if(window.ActiveXObject){
            try {
                httpRequest = new ActiveXObject("Msxml2.XMLHTTP");
            } catch (e) {
                try{
                    httpRequest = new ActiveXObject('Microsoft.XMLHTTP');
                } catch (e) { }
            }
        }

        if(!httpRequest){
            alert("Desistindo: Não é possível criar uma instância XMLHTTP.");
            return false;
        }

        var checkboxStatus = event.target.checked;
        if(checkboxStatus){
            url = generatePath(url, checkbox.id, true);
            console.log(url);
        }else{
            url = generatePath(url, checkbox.id, false);
            console.log(url);
        }
    });
}



/*var btn = document.getElementById("btn");

btn.addEventListener("click", function(){
    var ajax =  new XMLHttpRequest();

    ajax.open("GET", "../CRUD/Turma/read_filtro.php");

    ajax.responseType = "json";

    ajax.send();

    ajax.addEventListener("readystatechange", function (){

        if(ajax.readyState === 4 && ajax.status === 200){
            
            console.log(ajax);
            console.log(ajax.response);
            var resposta = ajax.response;
            var lista = document.querySelector(".list");

            for(var i = 0; i < resposta.length; i++){
                lista.innerHTML += "<li>" + resposta[i] + "</li>";
            }

        }

    });
})*/