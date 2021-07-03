function displayAlert(titleText, message) {
    var html = document.querySelector('html');

    var alertBox = document.createElement('div');
    alertBox.setAttribute('class', 'alertBox');
    html.appendChild(alertBox);

    var alertTitle = document.createElement('div');
    alertTitle.setAttribute('class', 'alertTitle');
    alertBox.appendChild(alertTitle);

    var title = document.createElement('p');
    title.textContent = titleText;
    alertTitle.appendChild(title);

    var alertContent = document.createElement('div');
    alertContent.setAttribute('class', 'alertContent');
    alertBox.appendChild(alertContent);

    var msg = document.createElement('p');
    msg.textContent = message;
    alertContent.appendChild(msg);

    var alertMenu = document.createElement('div');
    alertMenu.setAttribute('class', 'alertMenu');
    alertBox.appendChild(alertMenu);

    var alertButton = document.createElement('button');
    alertButton.textContent = "Entendi";
    alertMenu.appendChild(alertButton);

    alertButton.onclick = function () {
        alertBox.parentNode.removeChild(alertBox);
    }
}

export default { displayAlert };