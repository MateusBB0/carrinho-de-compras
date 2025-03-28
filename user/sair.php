<?php

// Quebrar os dados ou sair do user
session_start();
    unset($_SESSION['id']);
    session_destroy();
    header("Location: index.php");

 ?>