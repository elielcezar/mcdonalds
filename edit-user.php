

<?php include "header.php"; ?>


<?php
// MEGA06MAR2018
if(isset($_GET["uid"])){
    $id = $_GET["uid"];
}

$consulta = $pdo->query("SELECT username, email, area, password, id FROM users WHERE id='$id';");

while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {    
    $username = $row['username'];
    $email = $row['email'];
    $password = $row['password'];
    $area = $row['area'];
}               

 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    // Validate username
    if(empty(trim($_POST["username"]))){
        $username_err = "Por favor informe um nome de usuário";
    } else{
        $username = trim($_POST["username"]);         
    }

    // Validate email
    if(empty(trim($_POST["email"]))){
        $email_err = "Por favor informe um email válido";
    } else{
       $email = trim($_POST["email"]);
    }

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


   
    // Validate area
    if(empty(trim($_POST["area"]))){
        $area_err = "Por favor selecione uma opção";
    }else{
        $area = trim($_POST["area"]);
    }

    // Validate id    
    $id = trim($_POST["id"]);
    

    // Check input errors before inserting in database
    if(empty($username_err) && empty($email_err) && empty($area_err) && empty($confirm_password_err)){
        
        $sql = "UPDATE users SET 
            username = :username, 
            email = :email,  
            area = :area 
            WHERE id = :id";
        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);       
        $stmt->bindParam(':email', $email, PDO::PARAM_STR);    
        $stmt->bindParam(':area', $area, PDO::PARAM_STR); 
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);   
        $stmt->execute(); 

        $sucesso = "Informações do usuário atualizadas com sucesso";         
    }

    // Check input errors before inserting in database
    if(!empty($password) && empty($confirm_password_err)){

        $hash_password = password_hash($password, PASSWORD_DEFAULT); // Creates a password hash
        
        $sql = "UPDATE users SET 
            password = :password
            WHERE id = :id";
        $stmt = $pdo->prepare($sql);                                  
        $stmt->bindParam(':password', $hash_password, PDO::PARAM_STR);       
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);   
        $stmt->execute();        
    }
}
?>
 



<section class="main">
    <div class="container">

        <?php if(isset($sucesso)): ?>
            <div class="message success"><?php echo $sucesso; ?></div>
            <?php endif; ?> 

        <div class="top">
            <h2>Editar Usuário</h2>            
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
                        <input type="password" name="password" class="form-control" placeholder="Senha" value="">
                        <span class="help-block"><?php echo $password_err; ?></span>
                    </div>                    
                    <div class="form-group <?php echo (!empty($confirm_password_err)) ? 'has-error' : ''; ?>">
                        <input type="password" name="confirm_password" class="form-control" placeholder="Confirme sua Senha" value="">
                        <span class="help-block"><?php echo $confirm_password_err; ?></span>
                    </div>
                    <div class="form-group <?php echo (!empty($area_err)) ? 'has-error' : ''; ?>">
                        <select name="area" class="area">
                            <option value="">- Área -</option>
                            <option <?php if ($area == 'MegaMidia' ){ echo 'selected'; }?> value="MegaMidia">MegaMidia</option>
                            <option <?php if ($area == 'Finesound' ){ echo 'selected'; }?> value="Finesound">Finesound</option>
                            <option <?php if ($area == 'McDonalds' ){ echo 'selected'; }?> value="McDonalds">McDonalds</option>
                        </select>
                        <span class="help-block"><?php echo $area_err; ?></span>
                    </div>
                   
                    <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Enviar">
                    </div>

                </form>
            </div>

        </div>

       
 
</div>  
</div>  



<?php include "footer.php"; ?>
