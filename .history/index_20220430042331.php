<!DOCTYPE html>
<html lang="fr">

<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta name="description" content="">
	<meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

	<title>ABCDEPANPC - Connexion</title>

	<link rel="shortcut icon" href="assets/images/gt_favicon.png">

	<link rel="stylesheet" media="screen" href="https://cdn.jsdelivr.net/npm/open_sans@1.0.1/open_sans.min.css">
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css">
	<link rel="stylesheet" href="assets/css/font-awesome.min.css">

	<!-- Custom styles for our template -->
	<link rel="stylesheet" href="assets/css/bootstrap-theme.css" media="screen">
	<link rel="stylesheet" href="assets/css/main.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!--[if lt IE 9]>
	<script src="assets/js/html5shiv.js"></script>
	<script src="assets/js/respond.min.js"></script>
	<![endif]-->

	<!-- JavaScript libs are placed at the end of the document so the pages load faster -->
	<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.0/dist/jquery.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" type="text/javascript"></script>
	<script src="https://cdn.jsdelivr.net/npm/headroom.js@0.12.0/dist/headroom.min.js" type="text/javascript"></script>

</head>

<body class="home">
	<!-- Fixed navbar -->
	<?php include 'menu.html'; ?>
	<!-- /.navbar -->

	<!-- Main -->
	<main class="container-fluid">
		<div class="row">
			<div class="col">

			</div>
			
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

		$(document).ready(function() {
			// grab an element
			var myElement = document.querySelector("nav");
			// construct an instance of Headroom, passing the element
			var headroom = new Headroom(myElement, {
				"offset": 50,
				"tolerance": 5,
				"classes": {
					"initial": "animated",
					"pinned": "slideDown",
					"unpinned": "slideUp"
				}
			});
			// initialise
			headroom.init();
		});
	</script>

</body>

</html>