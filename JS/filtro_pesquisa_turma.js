var btn = document.getElementById("btn");

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
})