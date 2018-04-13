<?php
/*session_start();
if (!isset($_SESSION['username'])){
	header('Location: index.php');
}*/
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
				<li><a href="dashboard.php">Home</a></li>
			</ul>
		</div>
	</div>
	<div class="container">
		<div class="user">
			<h2><a href="#">Ana Maria Costa - Mcdonalds</a> (ana.mcosta@br.mcd.com)</h2>
		</div>
	</div>
</header>

<?php

try {
    $hostname = "131.255.239.38";
    $port = 3030;
    $dbname = "megaPortalTecnico";
    $username = "usr_portaltecSenior";
    $pw = "mega2017@portal";
    $dbh = new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

?>