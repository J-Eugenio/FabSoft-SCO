<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include_once("session.php");
        if(isAuth()){
         header('location: TelaLogin.php');
        }
    ?>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link rel="stylesheet" href="/fabsoft-sco/sys/assets/css/formularios.css">
    <link rel="stylesheet" href="/FabSoft-SCO/sys/assets/css/header.css">
    <link rel="stylesheet" href="/fabsoft-sco/sys/assets/css/main.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img class="logo" src="/FabSoft-SCO/sys/assets/img/logo.png" alt="">
        <ul class="menu">
            <p><?php //echo $_SESSION['user_type'];?></p>
            <li><a class="active" href="#">Home</a></li>
            <li><a href="#">Cadastros</a>
                <ul class="sub-menu">
                    <li><a href="/FabSoft-SCO/sys/view/paciente/Cadastrar.php">Paciente</a></li>
                    <li><a href="/FabSoft-SCO/sys/view/funcionario/Cadastrar.php">Funcionário</a></li>
                    <li><a href="/FabSoft-SCO/sys/view/services/Cadastrar.php">Serviços</a></li>
                </ul>
            </li>
        </ul>
    </nav>


