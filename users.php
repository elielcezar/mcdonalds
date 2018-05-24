<?php 

include "header.php"; 

include "functions.php"; 
// MEGA06MAR2018
?>


<section class="main gerenciar-usuarios">
    <div class="container">

        <?php if(isset($_GET["userdelete"])){ ?>
            <div class="message success">O usuário foi excluído com sucesso.</div>
        <?php } elseif (isset($_GET["usercreate"])) { ?>
          <div class="message success">Usuário criado com sucesso.</div>
        <?php }?>

        <div class="top">
            <h2>Gerenciar Usuários</h2>
            <p><a href="create-user.php" class="btn novo">Criar Novo Usuário</a></p>
        </div>

        <?php usuarios_ativos(); ?>

</div>  
</div>  



<?php include "footer.php"; ?>
