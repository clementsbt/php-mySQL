<?php
require_once('config/database.php');
require_once('classes/Livre.php');

$livreModel = new Livre($pdo);
$livres = $livreModel->getAll();

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Biblio</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <h1>Liste des livres</h1>
    <a href="pages/livres/create.php">Ajouter un livre</a>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Titre</th>
                <th>Date de publication</th>
                <th>Disponible</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($livres as $livre):  ?>
                
                <tr>
                    <td><?php echo htmlspecialchars($livre['id_livre']) ?></td>
                    <td><?php echo htmlspecialchars($livre['titre']) ?></td>
                    <td><?php echo htmlspecialchars($livre['date_publication']) ?></td>
                    <td><?php echo htmlspecialchars($livre['disponible']) ?></td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>

    <?php if (empty($livres)): ?>
        <p>Aucun livre trouve, <a href="">Ajoutez le premier livre</a>!</p>
    <?php endif; ?>
</body>

</html>