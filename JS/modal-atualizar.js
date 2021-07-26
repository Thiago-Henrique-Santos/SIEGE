var modal = window.document.getElementById('modal-screen');
var iframe = document.querySelector('#modal-block iframe');
var close = new Array();
close[0] = document.getElementById('close-button');
close[1] = document.getElementById('modal-screen');

/**************************
 *        Eventos         *
 *************************/
// for (var i = 0; i < close.length; i++) {
//     close[i].addEventListener("click", () => {
//         modal.style.display = "none";
//     });
// }

close[0].addEventListener("click", () => {
    modal.style.display = "none";
});
close[1].addEventListener("dblclick", () => {
    modal.style.display = "none";
});

/**************************
*         Funções         *
**************************/
function loadStudentModal(nm, dt, mt, rsp, eml, tlf, czn, cms, tur, idtf) {
    var path = generateStudentPath(nm, dt, mt, rsp, eml, tlf, czn, cms, tur, idtf);
    iframe.src = path;
    modal.style.display = "flex";
}

function loadStaffModal(crg, nm, mp, eml, czn, tep, cms, fnc, idtf) {
    var path = generateStaffPath(crg, nm, mp, eml, czn, tep, cms, fnc, idtf);
    iframe.src = path;
    modal.style.display = "flex";
}

function generateStudentPath(nm, dt, mt, rsp, eml, tlf, czn, cms, tur, idtf) {
    var basePath = "formularios-cadastro.php";
    var completePath = `${basePath}?id=aluno&tfm=atualizar&nm=${nm}&dt=${dt}&mt=${mt}&rsp=${rsp}&eml=${eml}&tlf=${tlf}&czn=${czn}&cms=${cms}&tur=${tur}&idtf=${idtf}`;
    return completePath;
}

function generateStaffPath(crg, nm, mp, eml, czn, tep, cms, fnc, idtf) {
    var basePath = "formularios-cadastro.php";
    var completePath = `${basePath}?id=${crg}&tfm=atualizar&nm=${nm}&mp=${mp}&eml=${eml}&czn=${czn}&tep=${tep}&cms=${cms}&fnc=${fnc}&idtf=${idtf}`;
    return completePath;
}