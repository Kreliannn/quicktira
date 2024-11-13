<?php
    require_once ('Aglobal_file.php');

    session_start();
    session_unset();
    session_destroy();
?>