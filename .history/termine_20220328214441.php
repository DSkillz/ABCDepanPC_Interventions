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
      color: #a00;
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

    input {
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
        <!-- fiche Client -->
        <p class="tagline"><b style="font-size:16px">FICHE INTERVENTION: TERMINÉE</b> </p>
        <p>


          <?php
          $requete = mysqli_query($conn, "SELECT * FROM interventions WHERE inter_status ='termine' ORDER by inter_date DESC") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());

          ?>

          <input type="search" placeholder="Search..." class="form-control search-input" data-table="interv-list" />


        <table class="interv-list" width="100%" border="0">
          <thead>
          <tr>
            <th>&nbsp;</th>
            <th>Date</th>
            <th width="150px">Nom</th>
            <th width="300px">Observations</th>
            <th>Status</th>
            <th>Date commande</th>
            <th>Chez qui</th>
            <th>Matériel commandé</th>
            <th>Par qui</th>
            <th>&nbsp;</th>
          </tr>
          </thead>
          <tbody>

          </tbody>
        </table>

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
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="https://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
  <script src="assets/js/headroom.min.js"></script>
  <script src="assets/js/jQuery.headroom.min.js"></script>
  <script src="assets/js/template.js"></script>

  <!-- Table filtering -->
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
    function modifStatus(idInter) {
      var idInter;
      //alert(txtcli);
      if (window.XMLHttpRequest) {
        // code for IE7+, Firefox, Chrome, Opera, Safari
        xmlArt = new XMLHttpRequest();
      } else { // code for IE6, IE5
        xmlArt = new ActiveXObject("Microsoft.XMLHTTP");
      }
      xmlArt.onreadystatechange = function() {
        if (xmlArt.readyState == 4 && xmlArt.status == 200) {
          var texte = xmlArt.responseText;

          alert(idInter);
          window.location.reload();

          //document.formInter.client.removeChild(document.formInter.client.options[1]); 
          //document.formInter.client.options[document.formInter.client.length] = new Option(texteCliId, texteCliNom, true, true);
          //document.form_articles.artTTC.value = info[4];
        }
      }
      xmlArt.open("GET", "ajax_status_modif.php?gettxt=" + idInter, true);
      xmlArt.send();
    }
  </script>

</body>

</html>