<?php

    session_start();
    if (!isset($_GET['idt'])) {
        unset($_SESSION['id_selectTurma'];
    } else {
        $_SESSION['id_selectTurma'] = $_GET['idt'];
    }

?>