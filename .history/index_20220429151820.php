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
	<header id="head">
		<div class="container">
			<div class="row">
				<p class="tagline">FICHE INTERVENTION: Authentification </p>
				<p>

				<form id="myForm" method="post">
					LOGIN  <input name="login" id="login" type="text" /><br />
					MOT DE PASSE  <input name="pwd" id="pwd" type="text" /><br />
					
					<input type="button" id="submitFormData" onclick="SubmitFormData();" value="Connexion" />
				</form>
				</p>
			</div>
		</div>
	</header>
	<!-- /Header -->

	<!-- Intro -->
	<div class="container text-center">

	</div>
	<!-- /Intro-->

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
					alert('données traitées !');
					$('#myForm').empty()html(data)
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