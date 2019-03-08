
<?php

try {
    $hostname = "131.255.239.38";
    $port = 3030;
    $dbname = "megaPortalTecnico";
    $username = "usr_portaltecSenior";
    $pw = "1BBB2019RADIO";
    $dbh = new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

  /*try {
      $hostname = "131.255.239.38";
      $port = 3306;
      $dbname = "db_radiomcarcos";
      $username = "user_radiomcarcos";
      $pw = "m3g4w3b#2019";
      $dbh = new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
    } catch (PDOException $e) {
      echo "Failed to get DB handle: " . $e->getMessage() . "\n";
      exit;
    }*/

?>
