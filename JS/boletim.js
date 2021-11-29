function toogle_disabled(bool) {
	var input = document.getElementsByTagName('input');
	var botao_publicar = document.getElementById('btn_publicar');

	for (var i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number')
			input[i].disabled = bool;
	}

	botao_publicar.disabled = false;
	botao_publicar.style.backgroundColor = "rgb(85, 84, 84)";
	botao_publicar.style.color = "white";
	botao_publicar.style.cursor = "pointer";
	botao_publicar.addEventListener("mouseover", function(event){
		event.target.style.textDecoration = "underline";
		event.target.style.color = "white";
	});
	botao_publicar.addEventListener("mouseout", function(event){
		event.target.style.textDecoration = "none";
		event.target.style.color = "white";
	});
}

function cancel(bool) {
	var input = document.getElementsByTagName('input');
	var botao_publicar = document.getElementById('btn_publicar');

	for (var i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number') {
			input[i].disabled = bool;
		}
	}

	botao_publicar.disabled = true;
	botao_publicar.style.backgroundColor = "rgb(157, 157, 157)";
	botao_publicar.style.color = "rgb(177, 177, 177)";
	botao_publicar.style.cursor = "not-allowed";

}

function clearInputs() {
	var input = document.getElementsByTagName('input');
	var conf;
	var confirmacao;

	for (var i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number' && !input[i].disabled) {
				conf = true;
		}
	}

	if(conf){
		confirmacao = confirm ("Você realmente deseja limpar os dados de todos os campos?");
		if(confirmacao == true)
			for (var i = 0; i <= (input.length - 1); i++) {
				if (input[i].type == 'number') {
					input[i].value = "";
				}
			}	
	}
}

function postGrades(){
	var input = document.getElementsByTagName('input');

	for (var i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number') {
			input[i].disabled = true;
		}
	}

	var info = [];
	var linhas = document.querySelectorAll('#boletim tr');
	for(let i = 2; i < linhas.length; i++){
		var linha = linhas[i];
		var colunas = linha.getElementsByTagName('td');
		var linha_info = [];
		for(let j = 1; j < colunas.length-3; j++){
			var coluna = colunas[j];
			var valor = coluna.getElementsByTagName('input')[0].value;
			linha_info.push(valor);
		}
		info.push(linha_info);
	}
	console.log(info);

	var quantbole = info.length;
	var url = `CRUD/Boletim/read.php?qtd=${quantbole}`;
	for(let i = 0; i < quantbole; i++){
		for(let j = 0; j < info[i].length; j++){
			url+=`&idb${i}=${info[i][j]}&n1${i}=`;
		}
	} 
}