<?php include('consolelog.php')
console_log(" yes ! ", false);
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
				<form action="login.php" method="post">
					LOGIN &nbsp;&nbsp;<input type="text" name="login" size="10">
					&nbsp;&nbsp;&nbsp;
					MOT DE PASSE&nbsp;&nbsp; <input type="password" name="pwd" size="10">
					&nbsp;&nbsp;&nbsp;
					<input type="submit" value="Connexion">
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





	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
	<script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
	<script src="assets/js/headroom.min.js"></script>
	<script src="assets/js/jQuery.headroom.min.js"></script>
	<script src="assets/js/template.js"></script>
</body>

</html>