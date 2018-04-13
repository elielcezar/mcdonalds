<?php
/*session_start();
 
require('connect.php');

$username = $_POST['username'];
$password = $_POST['password'];*/

//3. If the form is submitted or not.
//3.1 If the form is submitted

//3.1.2 Checking the values are existing in the database or not
//$query = "SELECT * FROM `user` WHERE username='$username' and password='$password'";
 
//$result = mysqli_query($connection, $query) or die(mysqli_error($connection));
//$count = mysqli_num_rows($result);
//3.1.2 If the posted values are equal to the database values, then session will be created for the user.
/*if ($count == 1){
$_SESSION['username'] = $username;
}else{
//3.1.3 If the login credentials doesn't match, he will be shown with an error message.
$fmsg = "Invalid Login Credentials.";
}
}*/
/*
$_SESSION['username'] = $username;

//3.1.4 if the user is logged in Greets the user with message
if (isset($_SESSION['username'])){
	header('Location: dashboard.php');

 }else{
 	header('Location: index.php');
 }
*/


//echo "".$dbhost." <br> ".$db." <br> ".$user."";

// Dados do banco
/*$dbhost   = "131.255.239.38,3030";
$db       = "megaPortalTecnico";
$user     = "usr_portaltecSenior";
$password = "mega2017@portal";
// Dados da tabela
$tabela = "vwMegaChamadosAbertosPrincipal_Mc";
$campo1 = "Cidade";
$campo2 = "UF";

@mssql_connect($dbhost,$user,$password) or die("Não foi possível a conexão com o servidor!");
@mssql_select_db("$db") or die("Não foi possível selecionar o banco de dados!");
 
$instrucaoSQL = "select * from vwMegaChamadosAbertosPrincipal_Mc";
$consulta = mssql_query($instrucaoSQL);
$numRegistros = mssql_num_rows($consulta);
 
echo "Esta tabela contém $numRegistros registros!";

echo"<table>";

if ($numRegistros!=0) {
	while ($cadaLinha = mssql_fetch_array($consulta)) {
		echo "<tr><td>$cadaLinha[$campo1]</td><td>$cadaLinha[$campo2]</td></tr>";
	}
} 
echo"</table>";*/

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
  $stmt = $dbh->prepare('SELECT * FROM vwMegaChamadosAbertosPrincipal_Mc');
  $stmt->execute();
  echo "<pre>";
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
  echo "</pre>";


  unset($dbh); unset($stmt)



/*

$link = mssql_connect('131.255.239.38', 'usr_portaltecSenior', 'mega2017@portal');

if (!$link)
    die('Unable to connect!');

if (!mssql_select_db('megaPortalTecnico', $link))
    die('Unable to select database!');

$result = mssql_query('SELECT * FROM vwMegaChamadosAbertosPrincipal_Mc');

while ($row = mssql_fetch_array($result)) {
    var_dump($row);
}

mssql_free_result($result);
*/
/*
** Connect to database:
*/

?>