<?php include('consolelog.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

	<title>ABCDEPANPC - Connexion</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
	<link rel="stylesheet" href="assets/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->
</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.html'; ?>
	<!-- /.navbar -->

	<!-- Header -->
	<main class="container-fluid" style="min-height: 420px;background: #181015 url('images/bg_main.jpg') no-repeat;
    background-size: cover;position: relative;/* top: 100px; */">
		<div class="row" style="position: relative;top: 32vh;">

			<h1 class="tagline">FICHE INTERVENTION: Authentification </h1>

			<form id="loginForm" method="post">
				<!-- Email input -->
				<div class="form-outline mb-4">
					<input type="email" id="login" name="login" class="form-control" />
					<label class="form-label" for="form2Example1">Identifiant</label>
				</div>

				<!-- Password input -->
				<div class="form-outline mb-4">
					<input type="password" id="pwd" name="pwd" class="form-control" />
					<label class="form-label" for="form2Example2">Mot de passe</label>
				</div>

				<!-- 2 column grid layout for inline styling -->
				<div class="row mb-4">
					<div class="col d-flex justify-content-center">
						<!-- Checkbox -->
						<div class="form-check">
							<input class="form-check-input" type="checkbox" value="" id="form2Example31" checked />
							<label class="form-check-label" for="form2Example31"> Remember me </label>
						</div>
					</div>

					<!-- Submit button -->
					<button type="button" class="btn btn-primary btn-block mb-4" onclick="SubmitFormData();">Connexion</button>
			</form>



	</main>

	<footer id="footer" class="top-space">

		<?php include 'footer.html'; ?>
	</footer>
	<script>
		function SubmitFormData() {
			var login = $("#login").val();
			var pwd = $("#pwd").val();
			$.post("login.php", {
					login: login,
					pwd: pwd
				},
				function(data) {
					$('html').html(data);
					$('#myForm')[0].reset();
				});
		}
	</script>

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@latest/dist/jquery.min.js"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@latest/dist/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>

</html>