<?php

require_once 'connect-logsportaltecnico.php';
// MEGA06MAR2018
if($_SERVER["REQUEST_METHOD"] == "POST"){


  // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor informe um email válido";
    } else{

        // Prepare a select statement
        $sql = "SELECT username, email FROM users WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){

                  while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
                      $username = $row->username;
                  }

                  if($stmt->rowCount() == 1){     

                  $param_key = md5(uniqid(rand(), true));

                  $sql = "UPDATE users SET 
                      forgot_pass_identity = :key
                      WHERE email = :email";
                  $stmt = $pdo->prepare($sql);                                  
                  $stmt->bindParam(':key', $param_key, PDO::PARAM_STR);
                  $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
                  $stmt->execute();                  

                  require_once("forgot-password-recovery-mail.php");
                   
                } else{
                    $msg_error = "Email não encontrado";
                }
            } else{
                echo "Oops! Algo deu errado [validate email], por favor, tente novamente mais tarde";
            }
        }
      
    }

}


?>

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
<body class="login lost-password">


<div class="container">

  <a href="http://radiomcdonalds.megamidia.com.br/"><img src="img/topo-login.jpg" class="img-responsive topo-login"></a>

  <?php if(isset($msg_success)){ ?>
    <div class="message success"><?php echo $msg_success; ?></div>
  <?php } ?>

  <?php if(isset($msg_error)){ ?>
    <div class="message error"><?php echo $msg_error; ?></div>
  <?php } ?>

  <h2>Esqueceu sua senha?</h2>
  <p>Informe seu e-mail. Nós enviaremos um link para criar uma nova senha.</p>

  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">

    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
      <input type="text" name="email" class="form-control" placeholder="email">
      <span class="help-block"><?php echo $email_err; ?></span>
    </div>
    
    <button class="btn btn-lg btn-primary btn-block" type="submit">Enviar</button>

</form>

</div>



<?php include "footer.php"; ?>
