var options = document.getElementsByClassName('cargoFiltro');

var path = "localhost/siege/usuarios.php";
var relativeCounter = 0;
var relativeStart = false;
var relativePath = "";
var firstRelative = "";

for (let i = 0; i < options.length; i++) {
    let checkbox = options[i].id;
    options[i].addEventListener("click", () => {

        if (relativeCounter == 0) {
            if (!relativeStart) {
                path += "?";
                relativeStart = true;
            }
            relativePath = `${checkbox}=on`;
            firstRelative = relativePath;
        } else {
            relativePath = `&${checkbox}=on`;
        }

        if (options[i].checked) {
            path += relativePath;
            relativeCounter++;
        } else {
            var oldPath = path;
            path = path.replace(relativePath, "");
            if (oldPath == path) {
                path = path.replace(firstRelative, "");
                var relativeStartPoint = path.indexOf('?');
                if (path[relativeStartPoint + 1] == "&") {
                    path = path.slice(0, relativeStartPoint + 1) + path.slice(relativeStartPoint + 2);
                    firstRelative = "";
                    for (let j = 0; j < path.length; j++) {
                        if (j > relativeStartPoint) {
                            if (path[j] == "&") {
                                break;
                            } else {
                                firstRelative += path[j];
                            }
                        }
                    }
                }
            }
        }

        var lastPosition = path.length - 1;
        if (path[lastPosition] == '?') {
            path = path.replace('?', "");
            relativeCounter = 0;
            relativeStart = false;
        }
        console.log(path);

    });
}