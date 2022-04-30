<?php require("auth.php");
require("connect.php"); ?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="">
  <meta name="author" content="Sergey Pozhilov (GetTemplate.com)">

  <title>Fiche Intervention</title>

  <link rel="shortcut icon" href="assets/images/gt_favicon.png">

  <link rel="stylesheet" media="screen" href="http://fonts.googleapis.com/css?family=Open+Sans:300,400,700">
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
  <style>
    tbody tr:nth-child(odd) {
      background-color: #85776b;
    }

    tbody tr:nth-child(even) {
      background-color: #ae9d90;
    }

    tbody tr {
      background-image: url(noise.png);
    }

    table {
      background-color: #ff33cc;
    }

    caption {
      font-family: 'Rock Salt', cursive;
      padding: 20px;
      font-style: italic;
      caption-side: bottom;
      color: #666;
      text-align: right;
      letter-spacing: 1px;
    }

    a {
      text-decoration: underline;
      color: #FC0;
    }

    a:visited {
      color: #844;
    }

    a:hover,
    a:focus,
    a:active {
      text-decoration: none;
      color: white;
      background: #800;
    }

    .search-input {
      width: 70%;
      margin: 20px auto;
      color: blue;
      font-weight: 900;
    }
  </style>
</head>

<body class="home">
  <!-- Fixed navbar -->
  <?php include 'menu.html'; ?>
  <!-- /.navbar -->

  <!-- Header -->
  <header id="head">
    <div class="container">
      <div class="row">
        <?php
        require('encours.php')
        ?>

        <p class="tagline"><b style="font-size:16px">LISTE DES INTERVENTIONS</b> </p>

        <p>
          <!-- fiche recherche -->


        <form name="formInter">

          <input type="text" name="nom" size="30">&nbsp;&nbsp;&nbsp;<input type="button" onClick="rechInter()" value="RECHERCHER PAR NOM">

        </form>
        <br>
        <form name="formInterPeriode">

          Du :<input type="date" name="date1" size="30">&nbsp;&nbsp;au <input type="date" name="date2" size="30">&nbsp;&nbsp;&nbsp;<input type="button" onClick="rechInterPeriode()" value="RECHERCHER PAR PERIODE">

        </form>
        <br>
        <!-- fin fiche recherche -->

        <!-- fiche Client -->

        <!-- LISTE AJAX -->

        <div id="liste">

          <?php
          $requete = mysqli_query($conn, "SELECT * FROM interventions ORDER BY inter_id DESC LIMIT 30 ") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());

          ?>

          <input type="search" placeholder="Search..." class="form-control search-input" data-table="interv-list" />


          <table class="o" width="80%" border="0" align="center">
            <tr>
              <td width="100">&nbsp;</td>
              <td width="40">N°</td>
              <td width="100">Date</td>
              <td width="180">Nom/Prénom</td>
              <td width="340">Observations</td>
              <td width="80">Etats</td>
              <td width="100">&nbsp;</td>
            </tr>
            <tr>
              <?php while ($donnees = mysqli_fetch_assoc($requete)) {

                $interNom = $donnees['inter_cli_id'];
                $sqlNom = mysqli_query($conn, "SELECT cli_nom, cli_civ FROM clients WHERE cli_id ='$interNom' ") or die('Erreur SQL !' . $sqlNom . '<br>' . mysqli_error());
                $dataNom = mysqli_fetch_assoc($sqlNom);

                echo "<tr>";
                echo "<td align='center'>";
              ?>
                <a href="intervention_liste_modif.php?id=<?php echo $donnees['inter_id']; ?>&num=1"><button>MODIFIER</button></a>
                <?php
                echo "</td>";
                echo "<td>" . $donnees['inter_id'] . "</td>";
                echo "<td>" . date('d/m/Y', strtotime($donnees['inter_date']));
                "</td>";
                echo "<td align='left'>" . $dataNom['cli_civ'] . "&nbsp;" . $dataNom['cli_nom'] . "&nbsp;</td>";
                echo "<td align='justify'>" . $donnees['inter_info_obs'] . "</td>";
                echo "<td>" . $donnees['inter_status'] . "</td>";
                ?>
                <td align="center"><a href="intervention_imprim2.php?id=<?php echo $donnees['inter_id']; ?>&num=1"><button>Imprimer</button></a></td>
            </tr>
          <?php } ?>

          </table>

        </div>
        <!-- FIN LISTE AJAX -->

        </p>
        <!-- fin fiche client -->

        <p>&nbsp;</p>
        <p align="center">---------------------------</p>
        <p>&nbsp;</p>


        </p>
        <!-- fin fiche client -->

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
  <script src="assets/js/jquery.js"></script>
  <script src="assets/js/jquery-ui.js"></script>
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="assets/js/headroom.min.js"></script>
  <script src="assets/js/jQuery.headroom.min.js"></script>
  <script src="assets/js/template.js"></script>

  <!-- AJAX -->
  <script>
    function rechInter() {
      var IDnom = document.formInter.nom.value;

      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 1) {
          document.getElementById("liste").innerHTML = "<center><img src='images/loading.gif' width='50px'  /></center>";
        } else
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("liste").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "inter_rech_nom.php?nom=" + IDnom, true);
      xmlhttp.send();
    }

    function rechInterPeriode() {
      var Date1 = document.formInterPeriode.date1.value;
      var Date2 = document.formInterPeriode.date2.value;

      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlhttp = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlhttp.onreadystatechange = function() {
        if (xmlhttp.readyState == 1) {
          document.getElementById("liste").innerHTML = "<center><img src='images/loading.gif' width='50px'  /></center>";
        } else
        if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
          document.getElementById("liste").innerHTML = xmlhttp.responseText;
        }
      }
      xmlhttp.open("GET", "inter_rech_periode.php?date1=" + Date1 + "&date2=" + Date2, true);
      xmlhttp.send();
    }
  </script>

</body>

</html>