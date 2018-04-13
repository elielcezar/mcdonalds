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
<?php

$codChamado = $_GET["cod"];

?>

<section class="main">
	<div class="container">


    	<div class="chamado-principal">
    		<h2>Detalhes do Chamado</h2>
            <?php
              $stmt = $dbh->prepare('execute spMegaChamadosAbertosDetalhes_Mc '.$codChamado.'');
              $stmt->execute(); 
              
                 /* echo "<pre>";
                  while ($row = $stmt->fetch()) {
                    print_r($row);
                  }
                  echo "</pre>";*/
                            
                while($row = $stmt->fetch(PDO::FETCH_OBJ)) {                    
                    $NroChamado = $row->NroChamado;
                    $DatGerUtil = $row->DatGerUtil;
                        $old_date_timestamp = strtotime($DatGerUtil);
                        $new_date = date('d/m/Y', $old_date_timestamp); 
                    $Loja = $row->Loja;
                    $Cidade = $row->Cidade;
                    $UF = $row->UF;
                    $ProbSemSom = $row->ProbSemSom;
                    $ProbCpuDesliga = $row->ProbCpuDesliga;
                    $ProbCpuNaoLiga = $row->ProbCpuNaoLiga;
                    $ProbSemComunicacao = $row->ProbSemComunicacao;
                    $ProbSistemaNaoInicia = $row->ProbSistemaNaoInicia;
                } 
            ?>  

    	</div>
    	<div class="chamado-detalhes">
            <div class="numero">
                <h4>Chamado: <?php print $NroChamado; ?></h4>
                <p><?php print $new_date; ?></p>
            </div>
    		<div class="item loja"><p>Loja: <?php print $Loja; ?></p></div>
    		<div class="item cidade"><p>Cidade: <?php print $Cidade.'/'.$UF; ?></p></div>
    		<div class="item tipo-chamado"><p>Tipo de Chamado: Suporte Campo</p></div>
    		<div class="item problema">
    			<p>Problema Reportado:</p>
    			<ul>
    				<?php if($ProbSemSom=="S") : ?><li>Sem som</li><?php endif; ?>
    				<?php if($ProbCpuDesliga=="S") : ?><li>CPU desliga sozinha</li><?php endif; ?>
    				<?php if($ProbCpuNaoLiga=="S") : ?><li>CPU não liga</li><?php endif; ?>
    				<?php if($ProbSemComunicacao=="S") : ?><li>Sem comunicação de rede</li><?php endif; ?>
    				<?php if($ProbSistemaNaoInicia=="S") : ?><li>Sistema não inicializa</li><?php endif; ?>
    			</ul>
    		</div>
    	</div>

    	<div class="tramites">
    		<h3>Trâmites</h3>
    		<table>
				<thead>
					<th>Data</th>
					<th>Hora</th>
					<th>Descrição</th>
				</thead>
				<tbody>
                    <?php
                        $stmt = $dbh->prepare('execute spMegaChamadosAbertosTramites_Mc '.$codChamado.'');
                        $stmt->execute();
                           while($row = $stmt->fetch(PDO::FETCH_OBJ)) { 
                            $old_date_timestamp = strtotime($row->DataTramite);
                            $data = date('d/m/Y', $old_date_timestamp);  
                            $hora = date('H:i:s', $old_date_timestamp); 
                            echo '<tr><td>'.$data.'</td><td>'.$hora.'</td><td>'.$row->DescricaoTramite.'</td></tr>';
                          }
                    ?>
				</tbody>
			</table>
    	</div>

    	<!--button class="btn">FECHAR</button-->

	</div>

</section>



<?php include "footer.php"; ?>