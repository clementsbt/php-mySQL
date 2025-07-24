<?php

class Livre {
    // Proprietes
    private $pdo;

    // Constructeur
    public function __construct($pdo)
    {
        $this->pdo = $pdo;
    }

    // Methodes CRUD
    
    // CREATE - Ajouter un livre
     public function create($titre, $isbn, $date_publication, $nb_pages, $nb_exemplaires, $disponible, $resume) {
        $sql = "INSERT INTO `livres`(`id_livre`, `titre`, `isbn`, `id_auteur`, `id_categorie`, `date_publication`, `nombre_pages`, `nombre_exemplaires`, 
        `disponible`, `resume`, `date_ajout`) VALUES (null, ?,?, null, null , ?,?,?,?,?,NOW())";
        $stmt = $this->pdo->prepare($sql);
        return $stmt->execute([$titre, $isbn, $date_publication, $nb_pages, $nb_exemplaires, $disponible, $resume]);
     }

    // READ - Recuperer tous les livres
    public function getAll(){
        $sql = "SELECT * FROM livres ORDER BY date_publication DESC";

        $stmt = $this->pdo->query($sql);
        
        return $stmt->fetchAll();
    }
}

?>