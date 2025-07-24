<?php
// Configuration de la connexion a la base de donnees
$host = 'mysql';
$dbname = 'bibliotheque';
$username = 'root';
$password = 'root_password';

try {
    $pdo = new PDO("mysql:host=$host;dbname=$dbname;charset=utf8", $username, $password);
} catch (PDOException $error) {
    die("Erreur de connexion: " . $error->getMessage() );
}

?>
