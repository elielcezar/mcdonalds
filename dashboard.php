<?php include "header.php"; ?>

<?php include "functions.php"; ?>
<!-- MEGA06MAR2018 -->
<section class="main dashboard">
	<div class="container">

		<div class="top">
            <h2>Chamados em Aberto</h2>
        </div>

	<ul class="nav nav-tabs">
        <li class="active">
            <a href="#geral" data-toggle="tab">Todos</a>
        </li>
        <li class="">
            <a href="#megamidia" data-toggle="tab">Programação Musical</a>
        </li>
        <li>
            <a href="#finesound" data-toggle="tab">Infra de Som</a>
        </li>
         
    </ul>

        <div class="tab-content">
			<div class="tab-pane active" id="geral">

				<h3>Todos</h3>
				<?php chamados_abertos(); ?>
			</div>

			<div class="tab-pane" id="megamidia">

             	<h3>Megamidia</h3>
             	<?php chamados_abertos('MegaMidia'); ?>

			</div>

			<div class="tab-pane" id="finesound">

				<h3>Finesound</h3>
				<?php chamados_abertos('FineSound'); ?>

			</div>

			<div class="tab-pane" id="mcdonalds">

				<h3>McDonalds</h3>
				<?php chamados_abertos('McDonalds'); ?>

			</div>

			<!--div class="tab-pane" id="rede">
				<h3>Status Rede</h3>
				<?php status_rede(); ?>

			</div-->
		</div>

	</div>

</section>

<?php include "footer.php"; ?>
