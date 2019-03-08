<?php

/*
try {
    $hostname = "131.255.239.38";
    $port = 3061;
    $dbname = "logs_portaltecnico";
    $username = "usr_portaltec";
    $pw = "portal@mega2017";
    $dbh = new PDO ("mysql:host=$hostname;port=$port;dbname=$dbname","$username","$pw");
  } 
  catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage();
    exit;
  }*/
/*

  try {
    $hostname = "131.255.239.38";
    $port = 3030;
    $dbname = "logs_portaltecnico";
    $username = "usr_portaltec";
    $pw = "portal@mega2017";
    $dbh = new PDO ("dblib:host=$hostname:$port;dbname=$dbname","$username","$pw");
  } catch (PDOException $e) {
    echo "Failed to get DB handle: " . $e->getMessage() . "\n";
    exit;
  }
*/

  
function chamados(){

      try {
        $hostname = "131.255.239.38";
        $port = 3061;
        $dbname = "logs_portaltecnico";
        $username = "usr_portaltec";
        $pw = "portal@mega2017";
        $dbh = new PDO ("mysql:host=$hostname;port=$port;dbname=$dbname","$username","$pw");
      } 
      catch (PDOException $e) {
        echo "Failed to get DB handle: " . $e->getMessage();
        exit;
      }

      $stmt = $dbh->prepare('SELECT * FROM users');
      $stmt->execute();
      echo "<pre>";
      while ($row = $stmt->fetch()) {
        print_r($row);
      }
      echo "</pre>";

      return $stmt;

 }

 //chamados('vwMegaStatusRedeRadioVPN_Mc');




function chamados_abertos($area_responsavel){

  require 'connect-megaportaltecnico.php';

   $select = "SELECT Loja, Cidade, UF, NroChamado, DatGerUtil, TipoSrv, Responsavel FROM vwMegaChamadosAbertosPrincipal_Mc WHERE Responsavel = '$area_responsavel'";
    $stmt = $dbh->prepare($select);
    $stmt->execute();
    echo "
    <table>
    <thead>
      <th>Loja</th>
      <th>Cidade</th>
      <th>UF</th>
      <th>N. Chamado</th>
      <th>Data Geração</th>
      <th>Tipo Chamado</th>
      <th>Responsável</th>
    </thead>
    <tbody>
    ";
    while($row = $stmt->fetch(PDO::FETCH_OBJ)) {
        echo '<tr><td>'.$row->Loja.'</td><td>'.$row->Cidade.'</td><td>'.$row->UF.'</td><td><a href="chamado.php?cod='.$row->NroChamado.'">'.$row->NroChamado.'</a></td><td>'.$row->DatGerUtil.'</td><td>'.$row->TipoSrv.'</td><td>'.$row->Responsavel.'</td></tr>';
    }         
    echo "</tbody></table>";
}


chamados();



  unset($dbh); 
  unset($stmt);



?>