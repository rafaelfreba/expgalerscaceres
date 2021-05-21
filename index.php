<?php
	
	require_once "Conexao.php";
	require_once "ExportadorModel.php";
	require_once "ExportadorService.php";

	$conn = new Conexao();

	$em = new ExportadorModel();

	$es = new ExportadorService($conn,$em);

	$ultimaImportacao = $es->getUltimaImportacao();

	unset($conn,$em,$es);

?>
<!DOCTYPE html>
<html>
<head>
	<title>Exportador GAL</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<!--SweetAlert2-->
	<script src="//cdn.jsdelivr.net/npm/sweetalert2@10"></script>
	<!--JS Bootstrap-->
	<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js" integrity="sha384-B4gt1jrGC7Jh4AgTPSdUtOBvfO8shuf57BaghqFfPlYxofvL8/KUEfYiJOMMV+rV" crossorigin="anonymous"></script>
	<!--CSS Bootstrap-->
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" integrity="sha384-JcKb8q3iqJ61gNV9KGb8thSsNjpSL0n8PARn9HuZOnIxN0hoP+VmmDGMN5t9UJ0Z" crossorigin="anonymous">
	<!-- Fontawesome -->
	<script src="https://kit.fontawesome.com/51a22785be.js" crossorigin="anonymous"></script>
	<!--Google Fonts-->
	<link rel="preconnect" href="https://fonts.gstatic.com">
	<link href="https://fonts.googleapis.com/css2?family=Exo+2:wght@600&display=swap" rel="stylesheet">
	<!--Favicon-->
	<link  rel = "ícone de atalho"  href = "mticon.ico"  type = "image / x-icon" >
	<link  rel = "icon"  href = "mticon.ico"  type = "image / x-icon" >
	<!--CSS Customizado-->
	<link rel="stylesheet" type="text/css" href="estilo.css">
	<!--CSV Export-->
	<script charset="utf-8" src="CSVExport.js"></script>
	<!--JS Customizado-->
	<script charset="utf-8" src='gal.js'></script>

</head>
<header>
	<main>
		<nav class="navbar navbar-expand-sm navbar-dark bg-padrao" style="border-bottom: 5px solid #ccc">
		<!--Logo-->
		<a href="index.php" class="navbar-brand"><img src="logo.png" class="img-fluid" width="50%"></a>

		<div class="container">
			<h1 class="text-white p-2 display-4">EXPORTADOR GAL</h1>
		</div>
	</nav>
	</main>
</header>

	<!--loading-->
	<div class="modal-loading"></div>

<body>

	<section class="wrap">
		
		<div class="card" style="width: 100%">
			<div class="card-header">
				<h4 class="cor-padrao-texto">Dados da Macrorregião Oeste Mato-Grossense</h4>
			</div>

			<div class="card-body">
				<div class="">
				<p class="lead">
					<i class="far fa-hand-point-right mr-1"></i>Preencha as datas "inicial" e "final" inerentes ao intervalo de tempo desejado, por fim clique no botão "Baixar". O download com o resultado da pesquisa será realizado automaticamente e dispobibilizado na pasta downloads. O preenchimento das datas é obrigatório, caso o intervalo exceda 31 dias ou nenhum registro seja encontrado o sistema retornará uma mensagem de erro.
				</p>	
				</div>

				<form method="POST" action="ExportadorController.php">
					<div class="form-group">
						<div class="row">
							<div class="col-md-6">
								<label>Data inicial:<small class="text-danger"> *</small></label>
								<input type="date" name="data_inicial" class="form-control">
							</div>

							<div class="col-md-6">
								<label>Data final:<small class="text-danger"> *</small></label>
								<input type="date" name="data_final" class="form-control">
							</div>
						</div>
					</div>

					<div class="form-group">
						<div class="row">
							<div class="col">
								<small class="text-danger">* campo obrigatório</small>
							</div>
						</div>
					</div>
			</div>

			<div class="card-footer">
				<div class="form-group">
						<div class="row">
							<div class="col">
								<button type="submit" class="btn cor-padrao"><i class="fas fa-download mr-1"></i>Baixar</button>
							</div>
						</div>
					</div>
				</form>
			</div>

		</div>

		<div class="row m-1">
			<div class="col">
				<h3>Dados disponíveis até: <span class="badge badge-danger"><?= $ultimaImportacao->dt_cadastro ?></span></h3>
			</div>
		</div>
	</section>

	<!--rodapé-->
	<footer class="p-3 bg-padrao text-white" style="border-top: 5px solid #ccc">
		
		<div class="row">
			
			<div class="col-8">
				
				<small><span class="p-2">EXPGAL V1.0 - &copy; <?= date('Y') ?> | CODMSIS/STI/SES-MT</span></small>
			</div>

		</div><!--//row-->
		
	</footer>

</body>
</html>