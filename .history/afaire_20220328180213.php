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

    span.highlight {
        display: inline-block;
        color: red;
        font-weight: 900
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

        <!-- fiche Client -->
        <p class="tagline"><b style="font-size:16px">FICHE INTERVENTION: A FAIRE</b> </p>
        <p>

          <?php
          $requete = mysqli_query($conn, "SELECT * FROM interventions WHERE inter_status ='cours' ORDER BY inter_date DESC") or die('Erreur SQL !' . $requete . '<br>' . mysqli_error());
          ?>

          <input type="search" placeholder="Search..." class="form-control search-input" data-table="interv-list" />

        <table class="table interv-list" width="100%" border="0">
          <tr>
            <td>&nbsp;</td>
            <td>Date</td>
            <td width="150px">Nom</td>
            <td width="300px">Observations</td>
            <td>Status</td>
            <td>Date commande</td>
            <td>Chez qui</td>
            <td>Matériel commandé</td>
            <td>Par qui</td>
            <td>&nbsp;</td>
          </tr>
          <tr>
            <?php while ($donnees = mysqli_fetch_assoc($requete)) { ?>

              <form method="post" action="status_modif.php" enctype="multipart/form-data">

                <?php
                $interNom = $donnees['inter_cli_id'];
                $sqlNom = mysqli_query($conn, "SELECT cli_nom FROM clients WHERE cli_id ='$interNom' ") or die('Erreur SQL !' . $sqlNom . '<br>' . mysqli_error());
                $dataNom = mysqli_fetch_assoc($sqlNom);

                echo "<tr>";
                echo "<td align='center' ><a href='intervention_modif.php?id=" . $donnees['inter_id'] . "'>Modifier Fiche</a></td>";
                echo "<td>" . date('d/m/Y', strtotime($donnees['inter_date']));
                "</td>";
                echo "<td>" . $dataNom['cli_nom'] . "</td>";
                echo "<td align='justify'><i>" . $donnees['inter_info_obs'] . "</i></td>";
                ?>
                <td>
                  <SELECT name="status" style="width:60px">
                    <OPTION VALUE="cours">A faire</OPTION>
                    <OPTION VALUE="sav">SAV</OPTION>
                    <OPTION VALUE="commande">Pièce commandée</OPTION>
                    <OPTION VALUE="electro">Chez l'électronicien</OPTION>
                    <OPTION VALUE="termine">Terminée</OPTION>
                    <OPTION VALUE="attente">En attente</OPTION>
                    <OPTION VALUE="livre">Livrée</OPTION>
                  </SELECT>
                </td>
                <td><input type="date" name="status_date" value="<?php echo $donnees['inter_status_date'];  ?>" />
                </td>
                <td>
                  <SELECT name="status_gros" style="width:60px">
                    <OPTION VALUE="<?php echo $donnees['inter_status_gros']; ?>">
                      <?php echo $donnees['inter_status_gros']; ?></OPTION>
                    <OPTION VALUE="S2i">S2i</OPTION>
                    <OPTION VALUE="Amazon">Amazon</OPTION>
                    <OPTION VALUE="Pobix">Pobix</OPTION>
                    <OPTION VALUE="Alexi">Alexi</OPTION>
                    <OPTION VALUE="Accessoires ASUS">Accessoires ASUS</OPTION>
                    <OPTION VALUE="Dalle Express">Dalle Express</OPTION>
                  </SELECT>
                </td>
                <td>
                  <input type="text" value="<?php echo $donnees['inter_status_piece']; ?>" name="status_mat_com" placeholder="pièce commandée" size="12" />
                </td>
                <td>
                  <SELECT name="status_qui" style="width:60px">
                    <OPTION VALUE="<?php echo $donnees['inter_status_qui']; ?>">
                      <?php echo $donnees['inter_status_qui']; ?></OPTION>
                    <OPTION VALUE="Nicolas">Nicolas</OPTION>
                    <OPTION VALUE="Jeremy">Matthias</OPTION>
                    <OPTION VALUE="Sandrine">Sandrine</OPTION>
                    <OPTION VALUE="Autre">Autre</OPTION>
                  </SELECT>
                </td>
                <td><input type="submit" value="Modifier status"></td>
                <input name="interId" type="hidden" value="<?php echo $donnees['inter_id']; ?>">
              </form>
            <?php } ?>
          </tr>
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
  <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
  <script src="http://netdna.bootstrapcdn.com/bootstrap/3.0.0/js/bootstrap.min.js"></script>
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
                console.log(text_content)
                var search_val = search_input.value.toLowerCase();
                console.log(search_val);
                jQuery.fn.highlight = function(str, className) {
                  var regex = new RegExp(str, "gi");

                  return this.each(function() {
                    this.innerHTML = this.innerHTML.replace(regex, function(matched) {
                      return "<span class=\"" + className + "\">" + matched + "</span>";
                    });
                  });
                };
                
                $(text_content).highlight(search_val, "highlight");

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