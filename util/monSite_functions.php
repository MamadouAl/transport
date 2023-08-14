<?php
include 'monEnv.php';

function connexion() {
    /** TODO renseigner $strConnex à l'aide de $_ENV configuré dans monEnv.php */
    
    $strConnex = "host=".$_ENV['dbHost']." user=".$_ENV['dbUser']." password=".$_ENV['dbPasswd'];
    $ptrDB = pg_connect($strConnex);
    return $ptrDB;
}


function getExpediteurById(string $id) : array {
    $ptrDB = connexion();

    $query = "SELECT * FROM expediteur WHERE exp_id = $1";

    /* TODO préparer la requête avec la fonction pg_prepare(...) ici */
    pg_prepare($ptrDB, "reqPrepSelectById", $query);
    $ptrQuery = pg_execute($ptrDB, "reqPrepSelectById", array($id));

    if (isset($ptrQuery)) {
        /* TODO récupérer le tableau associatif avec pg_fetch_assoc dans $resu */
        $resu = pg_fetch_assoc($ptrQuery);

        if (empty($resu))
            $resu = array("message" => "Identifiant d'expéditeur non valide : $id");
    }

    /* TODO libérer les ressources avec pg_free_result() ici */
    pg_free_result($ptrQuery);
    /* TODO fermer la connexion avec pg_close() ici */
    pg_close($ptrDB);
    return $resu;
}

function getAllExpediteurs() : array {
    $ptrDB = connexion();

    $query = "SELECT * FROM expediteur";
    pg_prepare($ptrDB, "reqPrepSelectAll", $query);
    $ptrQuery = pg_execute($ptrDB, "reqPrepSelectAll", array());

    $resu = array();

    if (isset($ptrQuery)) {
        // TODO traitement des lignes du résultat une à une ici
        $resu = pg_fetch_all($ptrQuery);
    }

    pg_free_result($ptrQuery);
    pg_close($ptrDB);
    return $resu;
}

function insertExpediteur(array $expediteur) : array {
    $ptrDB = connexion();

    // TODO préparation et exécution de la requête INSERT ici
    $query = "INSERT INTO expediteur (exp_nom, exp_prenom, exp_mail, exp_numero, exp_ville, exp_adresse) VALUES ($1, $2, $3, $4, $5, $6)";
    pg_prepare($ptrDB, "insert", $query);
    $exec = pg_execute($ptrDB, "insert", array_values($expediteur));

    return getExpediteurById(pg_last_oid($exec));
}

function updateExpediteur(array $expediteur) {
    $ptrDB = connexion();

    // TODO préparation et exécution de la requête UPDATE ici
    $query = "UPDATE expediteur SET exp_nom=$2, exp_prenom=$3, exp_mail=$4, exp_numero=$5, exp_ville=$6, exp_adresse=$7 WHERE exp_id=$1";
    pg_prepare($ptrDB, "req", $query);
    $exec = pg_execute($ptrDB, "req", array_values($expediteur));

    return getExpediteurById($expediteur['exp_id']);
}

function deleteExpediteur(string $id) {
    $ptrDB = connexion();

    // TODO préparation et exécution de la requête DELETE ici
    $query = "DELETE FROM expediteur WHERE exp_id=$1";
    pg_prepare($ptrDB, "delete", $query);
    $result = pg_execute($ptrDB, "delete", array($id));
}
?>
