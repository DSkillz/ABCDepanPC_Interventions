

<?php
$host_name = 'db5007388847.hosting-data.io';
$database = 'dbs6088556';
$user_name = 'dbu398613';
$password = '<Veuillez saisir ici votre mot de passe.>';

$link = new mysqli($host_name, $user_name, $password, $database);

if ($link->connect_error) {
    die('<p>La connexion au serveur MySQL a échoué: ' . $link->connect_error . '</p>');
} else {
    echo '<p>Connexion au serveur MySQL établie avec succès.</p>';
}
?>


