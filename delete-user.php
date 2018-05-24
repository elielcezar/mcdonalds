
<?php include "header.php"; ?>

<?php
// MEGA06MAR2018
if(isset($_GET["uid"])){
    $id = $_GET["uid"];
}
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){

    $id = trim($_POST["id"]);      
    
    $sql = "DELETE FROM users WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_STR);   
        $stmt->execute(); 

        $sucesso = "Informações do usuário atualizadas com sucesso";   

    header("Location:users.php?userdelete=ok&uid=$id");    
}
?>
 


<section class="main delete-user">
    <div class="container">
        

        <div class="top">
            <h3>Tem certeza que deseja excluir esse usuário? Essa operação não poderá ser desfeita.</h3>         
        </div>

        <div class="row">
            
             <div class="col-sm-6">  
                <div class="info-user">
                <?php
                    $consulta = $pdo->query("SELECT username, email, area FROM users WHERE id=$id;");
                    while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
                        echo '<p>Usuário: '.$row['username'].'</p>
                                <p>ID: '.$id.'</p>
                                <p>Email: '.$row['email'].'</p>                                
                                <p>Área: '.$row['area'].'</p>';
                    } 
                ?>
                </div>                            

                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                    
                    <input type="hidden" name="id" class="form-control" value="<?php echo $id; ?>">

                    <div class="form-group">
                        <input type="submit" class="btn btn-primary" value="Excluir">
                    </div>

                </form>
            </div>

        </div>

       
 
</div>  
</div>  



<?php include "footer.php"; ?>
