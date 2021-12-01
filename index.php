<?php
 
    include "bibliotecas/parametros.php";
    include "bibliotecas/conexao.php";
 
    if (isset($_SESSION['usuario'])) {
        include LAYOUTS.'header.php';
     
        include LAYOUTS.'menu.php';
     
        if (!isset($_GET['usuario']))
            include LAYOUTS.'home.php';
        else
            include CADASTROS.$_GET['modulo'].'/'.$_GET['pagina'].'.php';
       
        include LAYOUTS.'footer.php';
    } else {
        header('Location: login/login.php');
        include LOGIN.'login.php';
    }
