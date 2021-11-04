/*
* basePath => caminho base para adicionar as chaves relativas em PhP => String
* key      => chave relativa PhP                                     => String
* add      => Se vai adicionar ou tirar chave relativa               => Boolean (true = adicionar | false = remover)
*/
function generatePath(basePath, key, add) {
    if (sessionStorage.getItem('path') == null)
        sessionStorage.setItem('path', basePath);
    if (sessionStorage.getItem('relativeCounter') == null)
        sessionStorage.setItem('relativeCounter', 0);
    if (sessionStorage.getItem('relativeStart') == null)
        sessionStorage.setItem('relativeStart', false);
    if (sessionStorage.getItem('firstRelative') == null)
        sessionStorage.setItem('firstRelative', "");
    var path = sessionStorage.getItem('path');
    var relativeCounter = Number.parseInt(sessionStorage.getItem('relativeCounter'));
    var relativeStart = sessionStorage.getItem('relativeStart');
    var firstRelative = sessionStorage.getItem('firstRelative');
    var relativePath = "";

    if (relativeCounter == 0) {
        if (relativeStart == "false") {
            path += "?";
            sessionStorage.setItem('path', path);
            sessionStorage.setItem('relativeStart', true);
            relativeStart = sessionStorage.getItem('relativeStart');
        }
        relativePath = `${key}=on`;
        sessionStorage.setItem("firstRelative", relativePath);
        firstRelative = sessionStorage.getItem('firstRelative');
    } else {
        relativePath = `&${key}=on`;
    }

    if (add) {
        path += relativePath;
        sessionStorage.setItem('path', path);
        sessionStorage.setItem('relativeCounter', relativeCounter + 1);
        relativeCounter = Number.parseInt(sessionStorage.getItem('relativeCounter'));
    } else {
        var oldPath = path;
        path = path.replace(relativePath, "");
        sessionStorage.setItem('path', path);
        if (oldPath == path) {
            path = path.replace(firstRelative, "");
            sessionStorage.setItem('path', path);
            var relativeStartPoint = path.indexOf('?');
            if (path[relativeStartPoint + 1] == "&") {
                path = path.slice(0, relativeStartPoint + 1) + path.slice(relativeStartPoint + 2);
                sessionStorage.setItem('path', path);
                firstRelative = "";
                for (let j = 0; j < path.length; j++) {
                    if (j > relativeStartPoint) {
                        if (path[j] == "&") {
                            break;
                        } else {
                            firstRelative += path[j];
                            sessionStorage.setItem("firstRelative", firstRelative);
                        }
                    }
                }
            }
        }
    }

    var lastPosition = path.length - 1;
    if (path[lastPosition] == '?') {
        path = path.replace('?', "");
        sessionStorage.setItem('path', path);
        sessionStorage.setItem('relativeCounter', 0);
        sessionStorage.setItem('relativeStart', false);
    }

    return path;

}

function dateFormatForInput(brDate){
    return date.split('/').reverse().join('-');
}

function converte_falta(aulas){
    let minutosTotais = aulas * 50;
    let horas = 0;
    let minutos = 0;
    let i = 0;
    for(i=minutosTotais; i>=60; i-=60){
        horas++;
    }
    minutos = i;
    if(minutos==0)
        minutos = '00';
    tempoTotal = horas + ":" + minutos;
    return tempoTotal;
} 

export { generatePath, converte_falta, dateFormatForInput };