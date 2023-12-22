<?php
$usuario = $_POST['usuario'];
$entrar = $_POST['entrar'];
$senha = $_POST['senha'];
$connect = mysqli_connect("localhost", "root", "", "estoquelivros");

if (isset($entrar)) {

    $query = "SELECT * FROM usuario WHERE login = '$usuario'";
    $query_run = mysqli_query($connect, $query);

    if (!$query_run) {
        die("Erro ao selecionar: " . mysqli_error($connect));
    }

    if (mysqli_num_rows($query_run) <= 0) {
        echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='index.php';</script>";
        die();
    }

    $row = mysqli_fetch_assoc($query_run); $bdsenha = $row['senha'];

    if (hash('sha256', $senha) === $bdsenha) {
        setcookie("usuario", $usuario);
        header("Location:index_auth.php?controller=Livroscontroller&method=listar");
    } else {
        echo "<script language='javascript' type='text/javascript'>
        alert('Login e/ou senha incorretos');window.location
        .href='index.php';</script>";
        die();
    }
}
?>