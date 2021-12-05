function startRequest() {
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
    return httpRequest;
}

export { startRequest };