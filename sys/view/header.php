<!DOCTYPE html>
<html lang="pt-br">
<head>
    <?php
        include_once("session.php");
        if(isAuth()){
         header('location: TelaLogin.php');
        }
    ?>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../assets/css/header.css">
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
</head>
<body>
    <nav>
        <input type="checkbox" id="check">
        <label for="check" class="checkbtn">
            <i class="fas fa-bars"></i>
        </label>
        <img class="logo" src="../assets/img/logo.png" alt="">
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
</body>
</html>

