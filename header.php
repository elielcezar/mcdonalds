<?php

session_start();
if(!isset($_SESSION['username']) || empty($_SESSION['username'])){
  header("location: login.php");
  exit;
}
require_once 'connect-logsportaltecnico.php';
$username = $_SESSION['username'];

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
<body>

<?php
$consulta = $pdo->query("SELECT email, area, password, id FROM users WHERE username='$username'");
while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
    $email = $row['email'];
    $password = $row['password'];
    $area = $row['area'];
    $id = $row['id'];
}
?>

<header>
	<div class="container">
		<a href="dashboard.php"><img src="img/logo.png" class="img-responsive logo"></a>
		<div class="user-menu">
			<ul>
				<li class="user-account"><a href="account.php">Minha Conta</a></li>
				<li class="logout"><a href="logout.php">Sair</a></li>
			</ul>
		</div>

	</div>
	<div class="main-menu">
		<div class="container">
			<ul>
				<li><a href="dashboard.php">Tickets Abertos</a></li>
				<li><a href="status-rede.php">Status da Rede</a></li>
        <?php if($area == "MegaMidia"){?>
				      <li><a href="users.php">Gerenciar Usuários</a></li>
        <?php } ?>
			</ul>

			<div class="user">
				<?php echo $username." (".$email.")"; ?></a>
			</div>
		</div>
	</div>
</header>
