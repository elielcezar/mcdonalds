
<?php

try {
    $hostname = "000.000.000.00";
    $port = 3030;
    $dbname = "db_name";
    $username = "usr_name";
    $pw = "password";
    $dbh = new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }

?>
