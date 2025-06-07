<?php
session_start();

function verificaLogin() {
    if (!isset($_SESSION['admin_logado'])) {
        header("Location: login.php");
        exit();
    }
}
?>
