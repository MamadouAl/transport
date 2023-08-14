<!DOCTYPE html>
<html>
<head>
    <title>Formulaire d'envoi de colis</title>
    <style>
        /* Styles CSS pour la mise en page */
        /* ... */
    </style>
</head>
<body>
    <h1>Confirmation d'envoi</h1>

<?php
    include './util/monEnv.php';
    include './util/monSite_functions.php';
    $page='';
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        // Récupérer les données du formulaire
        $exp_nom = $_POST['exp_nom'];
        $exp_prenom = $_POST['exp_prenom'];
        $exp_mail = $_POST['exp_mail'];
        $exp_numero = $_POST['exp_numero'];
        $exp_ville = $_POST['exp_ville'];
        $exp_adresse = $_POST['exp_adresse'];
        $num_suivi = $_POST['exp_num_suivi'];

        // Connexion à la base de données
        $conn = connexion();

        // Insertion de l'expéditeur dans la table "Expediteur"
        $expQuery = "INSERT INTO Expediteur (exp_nom, exp_prenom, exp_mail, exp_numero, exp_ville, exp_adresse, exp_num_suivi)
                     VALUES ('$exp_nom', '$exp_prenom', '$exp_mail', $exp_numero, '$exp_ville', '$exp_adresse', '$num_suivi') RETURNING exp_id";
        $expResult = pg_query($conn, $expQuery);
        $expId = pg_fetch_result($expResult, 0, 0);

 
        if ($expResult) {
            $page .= "<p>Merci, votre envoi de colis a été enregistré avec succès !</p>";
		    $page .= "<h2>Détails de l'envoi :</h2>";
		    $page .= "<p>Expéditeur : $exp_prenom $exp_nom</p>";

		    $page .= "<p>Numéro de suivi : <b>".$num_suivi.'</b><br>
		    
		    <p> Merci de bien garder votre numero de suivi.';

            
        } else {
            $page .= "Une erreur s'est produite lors de l'enregistrement de l'envoi de colis.";
        }
		echo $page;
        // Fermeture de la connexion à la base de données
        pg_close($conn);
    }
    ?>
