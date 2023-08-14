<!DOCTYPE html>
<html>
<head>
    <title>Choix de créneaux</title>
    <style>
        /* Styles CSS pour la mise en page */
        /* ... */
    </style>
</head>
<body>
    <h1>Choix de créneaux</h1>

    <?php
    // Tableau des dates disponibles
    $datesDisponibles = array(
        '2023-07-01',
        '2023-07-02',
        '2023-07-05',
        '2023-07-07',
        '2023-07-22',
        // Ajoutez les dates disponibles ici
    );

    // Vérifier si un créneau a été sélectionné
    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['creneau'])) {
        $creneau = $_POST['creneau'];
        echo "Vous avez sélectionné le créneau du $creneau";
        // Ajoutez ici le code pour traiter la sélection du créneau
        // par exemple, l'enregistrer dans la base de données, etc.
    }

    // Afficher le calendrier avec les dates disponibles
    $moisCourant = date('n');
    $anneeCourante = date('Y');

    // Générer le calendrier
    echo '<table>';
    echo '<tr>';
    echo '<th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th><th>Dim</th>';
    echo '</tr>';

    // Boucle pour les semaines
    $dateDebut = strtotime(date('Y-m-01'));
    $dateFin = strtotime(date('Y-m-t'));
    $jourCourant = $dateDebut;
    while ($jourCourant <= $dateFin) {
        echo '<tr>';

        // Boucle pour les jours de la semaine
        for ($i = 0; $i < 7; $i++) {
            echo '<td>';
            if (date('n', $jourCourant) == $moisCourant) {
                $jour = date('j', $jourCourant);
                $date = date('Y-m-d', $jourCourant);
                if (in_array($date, $datesDisponibles)) {
                    echo "<form method='POST' action=''>";
                    echo "<input type='hidden' name='creneau' value='$date'>";
                    echo "<input type='submit' value='$jour'>";
                    echo "</form>";
                } else {
                    echo $jour;
                }
            }
            echo '</td>';

            // Passage au jour suivant
            $jourCourant = strtotime('+1 day', $jourCourant);
        }

        echo '</tr>';
    }

    echo '</table>';
    ?>
</body>
</html>

