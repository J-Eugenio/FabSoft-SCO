<!doctype html>
<html lang="pt-br">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

      <link href="https://fonts.googleapis.com/css2?family=Roboto&family=Ubuntu:wght@700&display=swap" rel="stylesheet">

      <link rel="stylesheet" href="../assets/css/login.css">
      <link rel="stylesheet" href="../assets/css/main.css">

      <title>Login</title>
   </head>
   <body class="page-login">
         <span class="logo"></span>
         <div id="login-form">
            <form method="POST" action="../controller/auth/auth_controller.php">
               <h1>LOGIN</h1>
               <div class="field">
                  <label for="cpf">CPF</label>
                  <input type="text" id="cpf" name="cpf"placeholder="Digite seu cpf..." required autofocus>
               </div>
               <div class="field">
               <label for="senha">SENHA</label>
                  <input type="password" id="Password" name="senha" placeholder="Digite sua senha..." >
               </div>
               <div>
                  <input type="hidden" id="acao" name="acao" value="autenticar">
               </div>  
               <div>
                  <button type="submit">Entrar</button>
               </div>
            </form>
         </div>
   </body>
</html>