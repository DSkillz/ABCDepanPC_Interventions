<?php
include('delElement.php');
$login_valide = "admin";
$pwd_valide = '0510800f28088e2f9c2e6df7239a9987';

// on teste si nos variables sont définies
if (isset($_POST['login']) && isset($_POST['pwd'])) {

// on vérifie les informations du formulaire, à savoir si le pseudo saisi est bien un pseudo autorisé, de même pour le mot de passe
    if ($login_valide == $_POST['login'] && $pwd_valide == md5($_POST['pwd'])) {
    // dans ce cas, tout est ok, on peut démarrer notre session

    // on la démarre :)
    session_start ();
    // on enregistre les paramètres de notre visiteur comme variables de session ($login et $pwd) (notez bien que l'on utilise pas le $ pour enregistrer ces variables)
    $_SESSION['login'] = $_POST['login'];
    $_SESSION['pwd'] = $_POST['pwd'];
    // $file = file_get_contents('intervention.php');
    // echo $file;
    // sleep(5);
    // on redirige notre visiteur vers une page decl notre section membre
    // header ('location: intervention.php');
    delElement('html');
    anykey()
    include('intervention.php');
    console_log("Connected to session, redirection to intervention.php !");
    }
    else {
    // Le visiteur n'a pas été reconnu comme étant membre de notre site. On utilise alors un petit javascript lui signalant ce fait
    echo '<body onLoad="alert(\'Le login ou le mot de passe est incorrect...\')">';
    // puis on le redirige vers la page d'accueil
    echo '<meta http-equiv="refresh" content="0;URL=index.php">';
    }
}
else {
echo '<body onLoad="alert(\Les variables du formulaire ne sont pas déclarées.\')">';
}
?>