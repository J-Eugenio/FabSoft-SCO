<!doctype html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
      <meta name="description" content="">
      <meta name="author" content="">
      <link rel="logo" href="logo.png">
      <title>Login</title>
      <!-- Latest compiled and minified CSS -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
      <!-- Optional theme -->
      <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
      <!-- Latest compiled and minified JavaScript -->
      <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
      <link href="https://getbootstrap.com/docs/4.0/examples/sign-in/signin.css" rel="stylesheet">
      <link rel="stylesheet" href="../../css/estilo.css">
   </head>
   <body class="text-center background" >
      <form class="cor att" method="POST" action="../controller/usuario/usuario_controller.php">
         <div class="logo">
         </div>
         <h1 class="h3 mb-3 font-weight-normal"></h1>
         <div class="input-group input-group-sm mb-4">
            <span class="input-group-addon"><i class="glyphicon glyphicon-user" style="height: 10px; align-self: auto; "></i></span>
            <input type="text" id="cpf" name="cpf" class="form-control" placeholder="Digite seu cpf..." required autofocus>
         </div>
         <div class="input-group input-group-sm mb-3">
            <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
            <input type="password" id="Password" name="senha" class="form-control" placeholder="Digite sua senha..." required>
         </div>
         <div class="input-group input-group-sm mb-3">
            <input type="hidden" id="acao" name="acao" value="autenticar">
         </div>
         <br>
         <div>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
         </div>
      </form>
   </body>
</html>