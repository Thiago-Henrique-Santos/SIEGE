function toggleReportsButton(){
	var select = document.getElementById("select_relatorios");
    var botao = document.getElementById("gr");

    if(select.options[select.selectedIndex].value == "opcoes"){
        botao.disabled = true;
    }else{
        botao.disabled = false;
    }
}