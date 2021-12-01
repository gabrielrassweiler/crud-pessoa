<?php
    define('DB_SERVER','localhost');
    define('DB_USER','root');
    define('DB_SENHA','');
    define('DB_BASE','aulawebi');
    $conn = new PDO('mysql:host='.DB_SERVER.';dbname='.DB_BASE, DB_USER, DB_SENHA);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    session_start();

    // Pega os dados enviados da tela de login
    $login = $_POST['login'];
    $senha = md5($_POST['senha']);
    $stmt = $conn->prepare("SELECT * FROM `usuarios` WHERE `login` = '$login' AND `password` = '$senha'");
    $stmt->execute();

    $resultado = $stmt->fetchAll();

    if (count($resultado)) {
        session_start();
        $_SESSION['usuario'] = $resultado[0]['nome'];
        header('Location: ../index.php');
    } else {
        echo "<script language='javascript' type='text/javascript'>alert('Login e/ou Senha Incorretos!'); window.location.href='../index.php';</script>";
    }
?>