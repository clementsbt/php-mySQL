<?php
require_once('./../../config/database.php');
require_once('./../../classes/Livre.php');

$stmt = $pdo->query("SELECT id_auteur, nom, prenom FROM auteurs");
$auteurs = $stmt->fetchAll(PDO::FETCH_ASSOC);

$livreModel = new Livre($pdo);
$errors = [];


// Traitement du formulaire
if ($_POST) {
    $id_auteur = $_POST['id_auteur'] ?? '';
    $titre = $_POST['titre'] ?? '';
    $isbn = $_POST['isbn'] ?? '';
    $date_publication = $_POST['date_publication'] ?? '';
    $nb_pages = $_POST['nb_pages'] ?? '';
    $nb_exemplaires = $_POST['nb_exemplaires'] ?? '';
    $disponible = $_POST['disponible'] ?? '';
    $resume = $_POST['resume'] ?? '';

    // Validation des donnees (A faire)

    // Gestion des erreur (A faire)
    $livreModel->create($id_auteur, $titre, $isbn, $date_publication, $nb_pages, $nb_exemplaires, $disponible, $resume);
    header('Location: http://localhost/crud?message=created'); // permet de rediriger a la page d'accueil en cas de creation reussie.
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Creation d'un livre</title>
    <link rel="stylesheet" href="../../style.css">
</head>

<body>
    <h1> Ajouter un livre</h1>
    <form method="POST" class="ajout-livre">
        <div>
            <label for="titre">Titre *</label>
            <input type="text" name="titre" id="titre" required>
        </div>
        <div>
            <label for="i d_auteur">Auteur *</label>
            <select name="id_auteur" id="id_auteur" required>
                <option value="">-- Sélectionnez un auteur --</option>
                <?php foreach ($auteurs as $auteur): ?>
                    <option value="<?= $auteur['id_auteur'] ?>">
                        <?= htmlspecialchars($auteur['prenom'] . ' ' . $auteur['nom']) ?>
                    </option>
                <?php endforeach; ?>
            </select>
        </div>
        <div>
            <label for="isbn">ISBN *</label>
            <input type="text" name="isbn" id="isbn" required>
        </div>
        <div>
            <label for="date_publication">Date de publication *</label>
            <input type="date" name="date_publication" id="date_publication" required>
        </div>
        <div>
            <label for="nb_pages">Nombre de pages *</label>
            <input type="number" name="nb_pages" id="nb_pages" required>
        </div>
        <div>
            <label for="nb_exemplaires">Nombre d'exemplaires *</label>
            <input type="text" name="nb_exemplaires" id="nb_exemplaires" required>
        </div>
        <div>
            <label for="disponible">Disponible *</label>
            <input type="checkbox" name="disponible" id="disponible" required>
        </div>
        <div>
            <label for="resume">Resume *</label>
            <input type="text" name="resume" id="resume" required>
        </div>


    <input type="submit" value="Ajouter">
    </form>
</body>

</html>