<?php include "header.php"; ?>

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

<section class="main">
	<div class="container">

	<ul class="nav nav-tabs">               
        <li class="">
            <a href="#geral" data-toggle="tab">Geral</a>
        </li>   
        <li class="active">
            <a href="#megamidia" data-toggle="tab">Megamidia</a>
        </li> 
        <li>
            <a href="#finesound" data-toggle="tab">Finesound</a>
        </li> 
         <li>
            <a href="#mcdonalds" data-toggle="tab">McDonalds</a>
        </li> 
         <li>
            <a href="#status" data-toggle="tab">Status Rede</a>
        </li>           
    </ul>

        <div class="tab-content">                                       
			<div class="tab-pane" id="geral">
				<h3>Chamados em Aberto</h3>

				<?php		 
				  $stmt = $dbh->prepare('SELECT * FROM vwMegaChamadosAbertosPrincipal_Mc');
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
				      echo '<tr><td>'.$row->Loja.'</td><td>'.$row->Cidade.'</td><td>'.$row->UF.'</td><td>'.$row->NroChamado.'</td><td>'.$row->DatGerUtil.'</td><td>'.$row->TipoSrv.'</td><td>'.$row->Responsavel.'</td></tr>';
				  }				  
				  echo "</tbody></table>";				  
				?>				

				<!--form>
					<select>
						<option selected>Todos</option>
						<option>Prioridade Alta</option>
						<option>Prioridade Média</option>
						<option>Prioridade Baixa</option>
					</select>

					<input type="submit" name="filtrar" id="filtrar" class="btn" value="Filtrar">
				</form-->

			</div>

			<div class="tab-pane active" id="megamidia"> 
             	<h3>Conteudo Megamidia</h3>
             	<?php

             	  $select = "SELECT * FROM vwMegaChamadosAbertosPrincipal_Mc WHERE Responsavel = 'MegaMidia'";
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
				?>	
			</div>

			<div class="tab-pane" id="finesound">  
				<h3>Conteudo Finesound</h3>
				<?php
             	  $select = "SELECT * FROM vwMegaChamadosAbertosPrincipal_Mc WHERE Responsavel = 'FineSound'";
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
				      echo '<tr><td>'.$row->Loja.'</td><td>'.$row->Cidade.'</td><td>'.$row->UF.'</td><td>'.$row->NroChamado.'</td><td>'.$row->DatGerUtil.'</td><td>'.$row->TipoSrv.'</td><td>'.$row->Responsavel.'</td></tr>';
				  }				  
				  echo "</tbody></table>";				  
				?>	
			</div>

			<div class="tab-pane" id="mcdonalds">  
				<h3>Conteúdo McDonalds</h3>
				<?php
             	  $select = "SELECT * FROM vwMegaChamadosAbertosPrincipal_Mc WHERE Responsavel = 'McDonald's'";
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
				      echo '<tr><td>'.$row->Loja.'</td><td>'.$row->Cidade.'</td><td>'.$row->UF.'</td><td>'.$row->NroChamado.'</td><td>'.$row->DatGerUtil.'</td><td>'.$row->TipoSrv.'</td><td>'.$row->Responsavel.'</td></tr>';
				  }				  
				  echo "</tbody></table>";				  
				?>	
			</div>

			<div class="tab-pane" id="mcdonalds">  
				<h3>Conteúdo Status Rede</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas mauris at convallis faucibus.</p>
			</div>
		</div>

	</div>

</section>

<?php include "footer.php"; ?>