<?php
// MEGA06MAR2018
require_once 'connect-logsportaltecnico.php';

if($_SERVER["REQUEST_METHOD"] == "GET"){

  $name = $_GET["name"];
  $consulta = "SELECT id FROM users WHERE forgot_pass_identity='$name'";
  $stmt = $pdo->prepare($consulta);
  $stmt->execute();

  if($stmt->rowCount() == 1){
    $continue_recover = "ok";
    while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        $id = $row->id;
    }  
  } else{
    $msg_error = "Não foi possível recuperar sua senha.";
  }

}
 

// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
   
    $continue_recover = "ok";

    if(!empty(trim($_POST['password']))){

        if(strlen(trim($_POST['password'])) < 6){
            $password_err = "A senha precisa ter pelo menos 6 caracteres";
        } else{
            $password = trim($_POST['password']);
        }        
        // Validate confirm password
        if(empty(trim($_POST["confirm_password"]))){
            $confirm_password_err = 'Por favor, confirme sua senha';     
        } else{
            $confirm_password = trim($_POST['confirm_password']);
            if($password != $confirm_password){
                $confirm_password_err = 'As senhas não coincidem';
            }
        }       
    } 

    // Check input errors before inserting in database
    if(!empty($password) && empty($confirm_password_err)){

        $id = $_POST['id'];
        $forgot_pass_identity = "";

        $hash_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        
        $sql = "UPDATE users SET 
            password = :password,
            forgot_pass_identity = :forgot_pass_identity
            WHERE id = :id";
        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':password', $hash_password, PDO::PARAM_STR);       
        $stmt->bindParam(':forgot_pass_identity', $forgot_pass_identity, PDO::PARAM_STR);   
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);   
        $stmt->execute(); 

        $msg_success = 'Sua senha foi atualizada com sucesso. Você já pode <strong><a href="login.php">acessar sua conta</a></strong>.';       
        $continue_recover = "";
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

  <?php if($continue_recover=="ok"){ ?>

    <h2>Informe a nova senha</h2>

    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">      
        <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="password" class="form-control" placeholder="Senha" value="">
            <span class="help-block"><?php echo $password_err; ?></span>
        </div>                    
        <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
            <input type="password" name="confirm_password" class="form-control" placeholder="Confirme sua Senha" value="">
            <span class="help-block"><?php echo $confirm_password_err; ?></span>
        </div>
        <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">
        <div class="form-group">
            <input type="submit" class="btn btn-primary" value="Enviar">
        </div>
    </form>

  <?php } ?>

</div>



<?php include "footer.php"; ?>
