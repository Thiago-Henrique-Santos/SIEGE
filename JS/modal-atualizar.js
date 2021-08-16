var modal = window.document.getElementById('modal-screen');
var iframe = document.querySelector('#modal-block iframe');
var close = new Array();
close[0] = document.getElementById('close-button');
close[1] = document.getElementById('modal-screen');

/**************************
 *        Eventos         *
 *************************/
close[0].addEventListener("click", () => {
    modal.style.display = "none";
    //document.location.reload(true);
});
close[1].addEventListener("dblclick", () => {
    modal.style.display = "none";
    //document.location.reload(true);
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

function loadClassModal(nm, sr, idtf) {
    var path = generateClassPath(nm, sr, idtf);
    iframe.src = path;
    modal.style.display = "flex";
}

function loadSubjectModal(nm, idprf, idtf) {
    var path = generateSubjectPath(nm, idprf, idtf);
    iframe.src = path;
    modal.style.display = "flex";
}

var basePath = "formularios-cadastro.php";
function generateStudentPath(nm, dt, mt, rsp, eml, tlf, czn, cms, tur, idtf) {
    var completePath = `${basePath}?id=aluno&tfm=atualizar&nm=${nm}&dt=${dt}&mt=${mt}&rsp=${rsp}&eml=${eml}&tlf=${tlf}&czn=${czn}&cms=${cms}&tur=${tur}&idtf=${idtf}`;
    return completePath;
}

function generateStaffPath(crg, nm, mp, eml, czn, tep, cms, fnc, idtf) {
    var completePath = `${basePath}?id=${crg}&tfm=atualizar&nm=${nm}&mp=${mp}&eml=${eml}&czn=${czn}&tep=${tep}&cms=${cms}&fnc=${fnc}&idtf=${idtf}`;
    return completePath;
}

function generateClassPath(nm, sr, idtf) {
    var completePath = `${basePath}?id=turma&tfm=atualizar&nm=${nm}&sr=${sr}&idtf=${idtf}`;
    return completePath;
}

function generateSubjectPath(nm, idprf, idtf) {
    var completePath = `${basePath}?id=disciplina&tfm=atualizar&nm=${nm}&sr=${idprf}&idtf=${idtf}`;
    return completePath;
}