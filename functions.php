<?php

function logged_user($usuario){
	require_once 'connect-logsportaltecnico.php';	
	$consulta = $pdo->query("SELECT email, area, password, id FROM users WHERE username='$usuario'");

	while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {    
	    $email = $row['email'];
	    $password = $row['password'];
	    $area = $row['area'];
	    $id = $row['id'];
	} 	
}

/* 
retorna os chamados em aberto no dashboard 
*/
function chamados_abertos($area_responsavel){

	require 'connect-megaportaltecnico.php';
	if(!isset($area_responsavel)){
		$select = "SELECT Loja, Cidade, UF, NroChamado, DatGerUtil, TipoSrv, Responsavel FROM vwMegaChamadosAbertosPrincipal_Mc";
	}else{
		$select = "SELECT Loja, Cidade, UF, NroChamado, DatGerUtil, TipoSrv, Responsavel FROM vwMegaChamadosAbertosPrincipal_Mc WHERE Responsavel = '$area_responsavel'";  	
	}   
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


/* 
retorna os status de rede no dashboard
*/
function status_rede(){

	require 'connect-logsportaltecnico.php';
	$consulta = $pdo->query("SELECT loja, status, cidade, uf, data FROM vwMegaStatusRedeRadioVPN_Mc;");
    echo "
          <table>
          <thead>
            <th>Loja</th>
            <th>Cidade</th>
            <th>UF</th>
            <th>Data</th>
            <th>Status</th>
          </thead>
          <tbody>
          ";
        while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
            echo '<tr><td>'.$row['loja'].'</td><td>'.$row['cidade'].'</td><td>'.$row['uf'].'</td><td>'.$row['data'].'</td><td class="flag-'.$row['status'].'">'.$row['status'].'</td></tr>';
        }               
    echo "</tbody></table>";
}

function usuarios_ativos(){

	require 'connect-logsportaltecnico.php';
	$consulta = $pdo->query("SELECT username, email, area, created_at, id FROM users;");
	echo "
	  <table>
	  <thead>
	    <th>Usuário</th>
	    <th>Email</th>
	    <th>Área</th>
	    <th>Criado em</th>
	    <th>Operações</th>
	  </thead>
	  <tbody>
	  ";
	while($row = $consulta->fetch(PDO::FETCH_ASSOC)) {
	    echo '<tr><td>'.$row['username'].'</td><td>'.$row['email'].'</td><td>'.$row['area'].'</td><td>'.$row['created_at'].'</td><td><a href="edit-user.php?uid='.$row['id'].'">Editar</a> | <a href="delete-user.php?uid='.$row['id'].'">Excluir</a></td></tr>';
	}               
	echo "</tbody></table>";

}

?>