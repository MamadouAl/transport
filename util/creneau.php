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

    <div id="calendar"></div>

    <script>
        // Fonction pour générer le calendrier
        function generateCalendar() {
            var calendar = document.getElementById('calendar');
            var currentDate = new Date(); // Date actuelle
            var currentYear = currentDate.getFullYear();
            var currentMonth = currentDate.getMonth();
            var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate(); // Nombre de jours dans le mois actuel

            // Création de la structure du calendrier
            var calendarHTML = '<table>';
            calendarHTML += '<tr><th>Dim</th><th>Lun</th><th>Mar</th><th>Mer</th><th>Jeu</th><th>Ven</th><th>Sam</th></tr>';

            // Calcul du jour de la semaine du 1er jour du mois
            var firstDayOfMonth = new Date(currentYear, currentMonth, 1).getDay();
            if (firstDayOfMonth === 0) {
                firstDayOfMonth = 7; // Le dimanche est considéré comme le jour 7
            }

            var dayCounter = 1;
            var isCurrentMonth = false;

            for (var i = 1; i <= 6; i++) { // 6 lignes pour les semaines
                calendarHTML += '<tr>';

                for (var j = 1; j <= 7; j++) { // 7 jours dans une semaine
                    if (i === 1 && j < firstDayOfMonth) {
                        calendarHTML += '<td></td>'; // Jours du mois précédent
                    } else if (dayCounter > daysInMonth) {
                        calendarHTML += '<td></td>'; // Jours du mois suivant
                    } else {
                        isCurrentMonth = true;
                        calendarHTML += '<td><button onclick="selectDate(' + dayCounter + ')">' + dayCounter + '</button></td>'; // Jours du mois actuel
                        dayCounter++;
                    }
                }

                calendarHTML += '</tr>';

                if (!isCurrentMonth) {
                    break;
                }
            }

            calendarHTML += '</table>';

            calendar.innerHTML = calendarHTML;
        }

        // Fonction appelée lorsqu'un utilisateur sélectionne un créneau
        function selectDate(day) {
            alert('Créneau sélectionné : ' + day);
            // Ajoutez ici le code pour traiter la sélection du créneau
        }

        // Générer le calendrier au chargement de la page
        generateCalendar();
    </script>
</body>
</html>

