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
  $stmt = $dbh->prepare('SELECT * FROM vwMegaChamadosAbertosPrincipal_Mc');
  $stmt->execute();
  echo "<pre>";
  while ($row = $stmt->fetch()) {
    print_r($row);
  }
  echo "</pre>";
  unset($dbh); unset($stmt)
?>