import { reportTableAsyncQuery } from "../modulos/filtros.js";
import { currentURL, resultTable } from "./filtro_boletim.js";

const userType = sessionStorage.getItem('tip_usu');

if (userType != 1) {
	let btn_edit = document.getElementById('btn_editar');
	btn_edit.addEventListener("click", () => { toggle_disabled(false); });

	let btn_cancel = document.getElementById('btn_cancelar');
	btn_cancel.addEventListener("click", () => { cancel(true); });

	let btn_clear = document.getElementById('btn_limpar');
	btn_clear.addEventListener("click", () => { clearInputs(); });

	let btn_post = document.getElementById('btn_publicar');
	btn_post.addEventListener("click", () => { postGrades() });
}

function toggle_disabled(bool) {
	let input = document.getElementsByTagName('input');
	let botao_publicar = document.getElementById('btn_publicar');

	for (let i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number')
			input[i].disabled = bool;
	}

	botao_publicar.disabled = false;
	botao_publicar.style.backgroundColor = "rgb(85, 84, 84)";
	botao_publicar.style.color = "white";
	botao_publicar.style.cursor = "pointer";
	botao_publicar.addEventListener("mouseover", function (event) {
		event.target.style.textDecoration = "underline";
		event.target.style.color = "white";
	});
	botao_publicar.addEventListener("mouseout", function (event) {
		event.target.style.textDecoration = "none";
		event.target.style.color = "white";
	});
}

function cancel(bool) {
	let input = document.getElementsByTagName('input');
	let botao_publicar = document.getElementById('btn_publicar');

	for (let i = 0; i <= (input.length - 1); i++) {
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
	let input = document.getElementsByTagName('input');
	let conf;
	let confirmacao;

	for (let i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number' && !input[i].disabled) {
			conf = true;
		}
	}

	if (conf) {
		confirmacao = confirm("Você realmente deseja limpar os dados de todos os campos?");
		if (confirmacao == true)
			for (let i = 0; i <= (input.length - 1); i++) {
				if (input[i].type == 'number') {
					input[i].value = "";
				}
			}
	}
}

function postGrades() {
	let btn_cancel = document.getElementById('btn_cancelar');
	let input = document.getElementsByTagName('input');

	for (let i = 0; i <= (input.length - 1); i++) {
		if (input[i].type == 'number') {
			if (input[i].value == '0') {
				input[i].value = '00';
			}
			input[i].disabled = true;
		}
	}

	let info = [];
	let linhas = document.querySelectorAll('#reportTable tr');
	for (let i = 2; i < linhas.length; i++) {
		let linha = linhas[i];
		let colunas = linha.getElementsByTagName('td');
		let linha_info = [];
		for (let j = 1; j < colunas.length - 3; j++) {
			let coluna = colunas[j];
			let valor = coluna.getElementsByTagName('input')[0].value;
			linha_info.push(valor);
		}
		info.push(linha_info);
	}

	let quantbole = info.length;
	let url = `CRUD/Boletim/update.php?qtd=${quantbole}`;
	for (let i = 0; i < quantbole; i++) {
		url += `&idb${i}=${info[i][0]}&f1${i}=${info[i][1]}&n1${i}=${info[i][2]}&f2${i}=${info[i][3]}&n2${i}=${info[i][4]}&f3${i}=${info[i][5]}&n3${i}=${info[i][6]}&f4${i}=${info[i][7]}&n4${i}=${info[i][8]}&rf${i}=${info[i][9]}&rn${i}=${info[i][10]}`;
	}

	let httpRequest = startRequest();
	httpRequest.open('GET', url);
	httpRequest.responseType = "json"
	httpRequest.send();
	httpRequest.onreadystatechange = () => {
		if (httpRequest.readyState === 4 && httpRequest.status === 200) {
			let response = httpRequest.response;
			if (response) {
				var modal = document.getElementById("myModal");

				var span = document.getElementsByClassName("close")[0];

				modal.style.display = "block";

				span.onclick = function () {
					modal.style.display = "none";
				}

				window.onclick = function (event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
				reportTableAsyncQuery(currentURL, resultTable);
			} else {
				var modal = document.getElementById("myModal2");

				var span = document.getElementsByClassName("close2")[0];

				modal.style.display = "block";

				span.onclick = function () {
					modal.style.display = "none";
				}

				window.onclick = function (event) {
					if (event.target == modal) {
						modal.style.display = "none";
					}
				}
			}
		}
	}
	btn_cancel.addEventListener('click', cancel(true));
}

function startRequest() {
	let httpRequest;
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
	return httpRequest;
}