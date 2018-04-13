<?php include "header.php"; ?>

<section class="main">
	<div class="container">

	

	<ul class="nav nav-tabs">               
        <li class="active">
            <a href="#geral" data-toggle="tab">Geral</a>
        </li>   
        <li class="">
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
			<div class="tab-pane active" id="geral">
				<h3>Chamados em Aberto</h3>

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
						<tr>
							<td>Loja 1</td>
							<td>Curitiba</td>
							<td>PR</td>
							<td>#0001</td>
							<td>16/09/2017</td>
							<td>Manutenção</td>
							<td>João Antônio</td>
						</tr>
						<tr>
							<td>Loja 1</td>
							<td>Curitiba</td>
							<td>PR</td>
							<td>#0001</td>
							<td>16/09/2017</td>
							<td>Manutenção</td>
							<td>João Antônio</td>
						</tr>
						<tr>
							<td>Loja 1</td>
							<td>Curitiba</td>
							<td>PR</td>
							<td>#0001</td>
							<td>16/09/2017</td>
							<td>Manutenção</td>
							<td>João Antônio</td>
						</tr>
						<tr>
							<td>Loja 1</td>
							<td>Curitiba</td>
							<td>PR</td>
							<td>#0001</td>
							<td>16/09/2017</td>
							<td>Manutenção</td>
							<td>João Antônio</td>
						</tr>
						<tr>
							<td>Loja 1</td>
							<td>Curitiba</td>
							<td>PR</td>
							<td>#0001</td>
							<td>16/09/2017</td>
							<td>Manutenção</td>
							<td>João Antônio</td>
						</tr>
					</tbody>
				</table>

				<form>
					<select>
						<option selected>Todos</option>
						<option>Prioridade Alta</option>
						<option>Prioridade Média</option>
						<option>Prioridade Baixa</option>
					</select>

					<input type="submit" name="filtrar" id="filtrar" class="btn" value="Filtrar">
				</form>

			</div>

			<div class="tab-pane" id="megamidia"> 
             	<h3>Conteudo Megamidia</h3>
             	<p>Proin in nisi tempus, ornare mauris id, malesuada risus.</p>
			</div>

			<div class="tab-pane" id="finesound">  
				<h3>Conteudo Finesound</h3>
				<p>Morbi ut mattis elit. Morbi orci arcu, interdum a rutrum ac, mollis eget dolor.</p>
			</div>

			<div class="tab-pane" id="mcdonalds">  
				<h3>Conteúdo McDonalds</h3>
				<p>Aliquam dapibus nulla porta nibh euismod tristique.</p>
			</div>

			<div class="tab-pane" id="mcdonalds">  
				<h3>Conteúdo Status Rede</h3>
				<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Pellentesque egestas mauris at convallis faucibus.</p>
			</div>
		</div>

	</div>

</section>



<?php include "footer.php"; ?>