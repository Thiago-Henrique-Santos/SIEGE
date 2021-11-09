let form = document.getElementById('form_relatorio');
let selectInput = form.getElementsByTagName('select')[0];
let options = selectInput.getElementsByTagName('option');

function entityAddress(entidade){
    var select = document.getElementById("select_relatorios");
    var botao = document.getElementById("gr");

    if(select.options[select.selectedIndex].value == ""){
        botao.disabled = true;
        botao.style.cursor = "not-allowed";
    }else{
        botao.disabled = false;
        botao.style.cursor = "pointer";
    }

    selectInput.addEventListener('change', () => {
        for (let i = 0; i < options.length; i++) {
            if (options[i].selected) {
                const optionValue = options[i].value;
                form.action = `Relatorios/${entidade}/gerarPDF.php?opvl=${optionValue}`;
            }
        }
    });
}