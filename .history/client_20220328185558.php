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
        <p class="tagline"><b style="font-size:16px">FICHE EN COURS</b> </p>
        <p>
          <!-- PC à faire -->
          <?php
          $requete = mysqli_query($conn, "SELECT COUNT(*) as NBafaire FROM interventions WHERE inter_status ='cours' ") or die('Erreur SQL !' . $requete . '<br>' . mysql_error());
          $data = mysqli_fetch_assoc($requete);

          $requete2 = mysqli_query($conn, "SELECT COUNT(*) as NBattente FROM interventions WHERE inter_status ='sav' OR inter_status ='electro' OR inter_status ='commande' ") or die('Erreur SQL !' . $requete2 . '<br>' . mysql_error());
          $data2 = mysqli_fetch_assoc($requete2);

          $requete3 = mysqli_query($conn, "SELECT COUNT(*) as NBtermine FROM interventions WHERE inter_status ='termine' ") or die('Erreur SQL !' . $requete . '<br>' . mysql_error());
          $data3 = mysqli_fetch_assoc($requete3);
          ?>

          <center style="color:#FFF; ">
            &nbsp;&nbsp;
            <a href="afaire.php" target="_self" style="color:#F90">A faire <?php echo $data['NBafaire']; ?></a>
            &nbsp;&nbsp;
            <a href="attente.php" target="_parent" style="color:#0CC">En attente <?php echo $data2['NBattente']; ?></a>
            &nbsp;&nbsp;
            <a href="termine.php" target="_parent" style="color:#F30">Terminé <?php echo $data3['NBtermine']; ?></a>
          </center>
        </p>
        <!-- fin -->


        <p align="center">---------------------------</p>
        <p>&nbsp;</p>

        <p class="tagline"><b style="font-size:16px">LISTE DES CLIENTS</b> </p>

        <p>
          <!-- fiche recherche -->
        <form name="formNom">
          <input type="text" name="nom" size="30">&nbsp;&nbsp;&nbsp;<input type="button" onClick="rechClient()" value="RECHERCHER PAR NOM">
        </form>
        <!-- fin fiche recherche -->

        <!-- fiche Client -->
        <!-- LISTE AJAX -->

        <div id="liste">

          <?php
          $requete = mysqli_query($conn, "SELECT * FROM clients ORDER BY cli_id DESC") or die('Erreur SQL !' . $requete . '<br>' . mysql_error());

          ?>

          <input type="search" placeholder="Search..." class="form-control search-input" data-table="interv-list" />


          <table width="70%" border="0" align="center">
            <tr>
              <td width="100">&nbsp;</td>
              <td width="40">N°</td>
              <td width="180">Nom/Prénom</td>
              <td width="80">Téléphone 1</td>
              <td width="80">Téléphone 2</td>
              <td width="100">E-mail</td>
            </tr>
            <tr>
              <?php while ($donnees = mysqli_fetch_assoc($requete)) {
                echo "<tr>";
                echo "<td align='center'>";
              ?>
                <a href="client_modif.php?id=<?php echo $donnees['cli_id']; ?>"><button>MODIFIER</button></a>
                <?php
                echo "</td>";
                echo "<td align='left'>" . $donnees['cli_id'] . "</td>";
                echo "<td align='left'>" . $donnees['cli_civ'] . "&nbsp;" . $donnees['cli_nom'] . "&nbsp;</td>";
                echo "<td>" . $donnees['cli_tel1'] . "</td>";
                echo "<td>" . $donnees['cli_tel2'] . "</td>";
                echo "<td align='left'>" . $donnees['cli_tel3'] . "</td>";
                ?>
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
  
  <!-- Clients filtering -->

  <script>
    (function(document) {
      'use strict';

      var TableFilter = (function(myArray) {
        var search_input;

        function _onInputSearch(e) {
          search_input = e.target;
          var tables = document.getElementsByClassName(search_input.getAttribute('data-table'));
          myArray.forEach.call(tables, function(table) {
            myArray.forEach.call(table.tBodies, function(tbody) {
              myArray.forEach.call(tbody.rows, function(row) {
                var text_content = row.textContent.toLowerCase();
                var search_val = search_input.value.toLowerCase();
                console.log("search_chars = " + search_val);
                row.style.display = text_content.indexOf(search_val) > -1 ? '' : 'none';
              });
            });
          });

        }

        return {
          init: function() {
            var inputs = document.getElementsByClassName('search-input');

            myArray.forEach.call(inputs, function(input) {
              input.oninput = _onInputSearch;
            });
          }
        };
      })(Array.prototype);

      document.addEventListener('readystatechange', function() {
        if (document.readyState === 'complete') {
          TableFilter.init();
        }
      });

    })(document);
  </script>


  <!-- AJAX -->
  <script>
    function rechClient() {
      var IDnom = document.formNom.nom.value;

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
      xmlhttp.open("GET", "client_rech_ajax.php?nom=" + IDnom, true);
      xmlhttp.send();
    }
  </script>

</body>

</html>