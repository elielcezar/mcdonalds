<?php

include "header.php"; 
// MEGA06MAR2018
?>

<?php
 
// Define variables and initialize with empty values
$username = $email = $password = $confirm_password = $area = "";
$username_err = $email_err = $password_err = $confirm_password_err = $area_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor informe um nome de usuário";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE username = :username";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = trim($_POST["username"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $username_err = "Este nome já foi utilizado por outro usuário";
                } else{
                    $username = trim($_POST["username"]);
                }
            } else{
                echo "Oops! Algo deu errado [validate username], por favor, tente novamente mais tarde";
            }
        }
         
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor informe um email válido";
    } else{
        // Prepare a select statement
        $sql = "SELECT id FROM users WHERE email = :email";
        
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            
            // Set parameters
            $param_email = trim($_POST["email"]);
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                if($stmt->rowCount() == 1){
                    $email_err = "Este email já foi utilizado por outro usuário";
                } else{
                    $email = trim($_POST["email"]);
                }
            } else{
                echo "Oops! Algo deu errado [validate email], por favor, tente novamente mais tarde";
            }
        }

    }
    
    // Validate password
    if(empty(trim($_POST['password']))){
        $password_err = "Por favor, defina uma senha";     
    } elseif(strlen(trim($_POST['password'])) < 6){
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

    // Validate area
    if(empty(trim($_POST["area"]))){
        $area_err = "Por favor selecione uma opção";
    }else{
        $area = trim($_POST["area"]);
    }

    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($password_err) && empty($confirm_password_err) && empty($area_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO users (username, email, password, area) VALUES (:username, :email, :password, :area)";
         
        if($stmt = $pdo->prepare($sql)){
            // Bind variables to the prepared statement as parameters
            $stmt->bindParam(':username', $param_username, PDO::PARAM_STR);
            $stmt->bindParam(':email', $param_email, PDO::PARAM_STR);
            $stmt->bindParam(':password', $param_password, PDO::PARAM_STR);
            $stmt->bindParam(':area', $param_area, PDO::PARAM_STR);
            
            // Set parameters
            $param_username = $username;
            $param_email = $email;
            $param_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
            $param_area = $area;
            
            // Attempt to execute the prepared statement
            if($stmt->execute()){
                // Redirect to login page
                header("location: users.php?usercreate=ok");
            } else{
                echo "Oops! Algo deu errado [inserting data], por favor, tente novamente mais tarde";
            }
        }
         
    }
    
}
?>
 
<section class="main create-user">
    <div class="container">

        <div class="top">
            <h2>Cadastrar Usuário</h2>
        </div>

        <div class="row">
            
             <div class="col-sm-6">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    <div class="form-group <?php echo (!empty($username_err)) ? 'has-error' : ''; ?>">
                        <input type="text" name="username"class="form-control" placeholder="Nome" value="<?php echo $username; ?>">
                        <span class="help-block"><?php echo $username_err; ?></span>
                    </div>  
                    <div class="form-group <?php echo (!empty($email_err)) ? 'has-error' : ''; ?>">
                        <input type="text" name="email"class="form-control" placeholder="Email" value="<?php echo $email; ?>">
                        <span class="help-block"><?php echo $email_err; ?></span>
                    </div>    
                    <div class="form-group <?php echo (!empty($password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" name="password" class="form-control" placeholder="Senha" value="<?php echo $password; ?>">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>                    
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirme sua Senha" value="<?php echo $confirm_password; ?>">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>


                    <div class="form-group <?php echo (!empty($area_err)) ? 'has-error' : ''; ?>">
                        <select name="area" class="area">
                            <option value="">- Área -</option>
                            <option value="MegaMidia">MegaMidia</option>
                            <option value="Finesound">Finesound</option>
                            <option value="McDonalds">McDonalds</option>
                        </select>
                        <span class="help-block"><?php echo $area_err; ?></span>
                    </div>


                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>

                </form>
            </div>

        </div>

       
 
</div>  
</div>  



<?php include "footer.php"; ?>
