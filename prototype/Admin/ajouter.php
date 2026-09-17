<?php

require "Connexion.php";


/* Récupérer les formateurs */

$formateurs = $pdo->query("ù
    SELECT *
    FROM FORMATEUR
")->fetchAll(PDO::FETCH_ASSOC);


/* Récupérer les matières */

$matieres = $pdo->query("
    SELECT *
    FROM MATIERE
")->fetchAll(PDO::FETCH_ASSOC);


/* Ajouter le cours */

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $titre = $_POST["titre"];
    $description = $_POST["description"];
    $duree = $_POST["duree"];

    $id_formateur = $_POST["id_formateur"];
    $id_matiere = $_POST["id_matiere"];


    $sql = "
    INSERT INTO COURS
    (
        titre,
        description,
        duree,
        id_formateur,
        id_matiere
    )

    VALUES (?, ?, ?, ?, ?)
    ";


    $stmt = $pdo->prepare($sql);


    $stmt->execute([
        $titre,
        $description,
        $duree,
        $id_formateur,
        $id_matiere
    ]);


    header("Location: index.php");

    exit;
}

?>

<!DOCTYPE html>

<html lang="fr">

<head>

    <meta charset="UTF-8">

    <title>Ajouter un cours</title>

    <link rel="stylesheet" href="style.css">

</head>

<body>


<header>

    <h1>Ajouter un cours</h1>

    <nav>

        <a href="index.php">Accueil</a>

        <a href="Admin/admin.php">Admin</a>

    </nav>

</header>


<main>

    <h2>Nouveau cours</h2>


    <form method="POST">


        <label>Titre</label>

        <input
            type="text"
            name="titre"
            required
        >


        <label>Description</label>

        <textarea
            name="description"
        ></textarea>


        <label>Durée en minutes</label>

        <input
            type="number"
            name="duree"
            required
        >


        <label>Formateur</label>

        <select
            name="id_formateur"
            required
        >

            <option value="">
                Choisir un formateur
            </option>


            <?php foreach ($formateurs as $formateur) { ?>

                <option
                    value="<?= $formateur["id_formateur"] ?>"
                >

                    <?= htmlspecialchars(
                        $formateur["prenom"]
                        . " "
                        . $formateur["nom"]
                    ) ?>

                </option>

            <?php } ?>

        </select>


        <label>Matière</label>

        <select
            name="id_matiere"
            required
        >

            <option value="">
                Choisir une matière
            </option>


            <?php foreach ($matieres as $matiere) { ?>

                <option
                    value="<?= $matiere["id_matiere"] ?>"
                >

                    <?= htmlspecialchars(
                        $matiere["nom_matiere"]
                    ) ?>

                </option>

            <?php } ?>

        </select>


        <button type="submit">
            Ajouter le cours
        </button>


    </form>

</main>

</body>

</html>