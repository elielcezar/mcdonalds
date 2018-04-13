
<html>
<head>
  <title>Radio McDonalds</title>
  <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

  <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="css/geral.css?v08">

  <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
      <script src="https://oss.maxcdn.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->

</head>
<body class="login">
 
<div class="container">

  <a href="http://radiomcdonalds.megamidia.com.br/"><img src="img/topo-login.jpg" class="img-responsive topo-login"></a>

<form class="form-signin" method="POST" action="checklogin.php">

    <input type="text" name="username" class="form-control" placeholder="Login">
    
    <input type="password" name="password" id="inputPassword" class="form-control" placeholder="Senha">

    <p class="lost-password"><a href="lost-password.php">Esqueceu sua senha?</a></p>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>

</form>

</div>



<?php include "footer.php"; ?>
