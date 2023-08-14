<!DOCTYPE html>
<html>
<head>
     <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmation d'envoi</title>
    <style>
        
        /* Définir les styles pour les écrans larges */
        @media screen and (min-width: 768px) {
            /* Styles spécifiques pour les écrans larges */
        }
        
        /* Définir les styles pour les écrans de taille moyenne */
        @media screen and (max-width: 767px) {
            /* Styles spécifiques pour les écrans de taille moyenne */
        }
        
        /* Définir les styles pour les petits écrans (mobiles) */
        @media screen and (max-width: 480px) {
            /* Styles spécifiques pour les petits écrans (mobiles) */
        }
    
    /* Styles CSS pour la mise en page */
        body {
            font-family: Arial, sans-serif;
            background-color: #f5f5f5;
            margin: 0;
            padding: 0;
        }

        .container {
            max-width: 800px;
            margin: 0 auto;
            padding: 20px;
            animation: fade-in 1s ease;
        }

        @keyframes fade-in {
            from { opacity: 0; }
            to { opacity: 1; }
        }

        h1 {
            font-size: 24px;
            font-weight: bold;
            margin-bottom: 20px;
            text-align: center;
        }

        p {
            margin-bottom: 10px;
        }

        table {
            width: 100%;
            border-collapse: collapse;
        }

        table td {
            padding: 10px;
            border: 1px solid #ccc;
        }

        table td:first-child {
            font-weight: bold;
        }
        
        .cta-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            text-decoration: none;
            border-radius: 4px;
            transition: background-color 0.3s ease;
        }

        .cta-button:hover {
            background-color: #ff9900;
        }

        .footer {
            background-color: #333;
            color: #fff;
            padding: 20px;
            text-align: center;
            animation: slide-up 1s ease;
        }

        @keyframes slide-up {
            from { transform: translateY(100px); opacity: 0; }
            to { transform: translateY(0); opacity: 1; }
        }
        
        footer {
            background-color: #333;
            color: #fff;
            padding: 20px 0 20 0;
            text-align: center;
            margi
        }

        .footer a {
            color: #fff;
            text-decoration: none;
        }

        .footer a:hover {
            text-decoration: underline;
        }
        
        nav {
            /*background-color: #007bff; */
            color: #fff;
            padding: 10px;
           /* text-align: center; */
        }

        nav ul {
            list-style-type: none;
            margin: 0;
            padding: 0;
        }

        

        nav ul li a {
            color: #fff;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Confirmation d'envoi</h1><hr>

        <?php
        use PHPMailer\PHPMailer\PHPMailer;
        use PHPMailer\PHPMailer\Exception;

        require './phpmailer/phpmailer/src/Exception.php';
        require './phpmailer/phpmailer/src/PHPMailer.php';
        require './phpmailer/phpmailer/src/SMTP.php';

        // Création d'une instance de PHPMailer
        $mail = new PHPMailer(true);
        $mail2 = new PHPMailer(true);

        $exp_nom = $_POST['exp_nom'];
        $exp_prenom = $_POST['exp_prenom'];
        $exp_mail = $_POST['exp_mail'];
        $exp_numero = $_POST['exp_indicatif'].' '. $_POST['exp_numero'];
        $exp_ville = $_POST['exp_ville'];
        $exp_adresse = $_POST['exp_adresse'];
        //$num_suivi = $_POST['exp_num_suivi'];
        $num_suivi = uniqid();
        $exp_date_livraison = $_POST['exp_date_livraison'];

        // Corps de l'e-mail
        $message = "<html><body>";
        $message .= "<h3>Bonjour,</h3>";
        $message .= "<p>Un nouvel envoi de colis a été effectué :</p>";
        $message .= "<table>";
        $message .= "<tr><td>Nom:</td><td>$exp_nom</td></tr>";
        $message .= "<tr><td>Prénom:</td><td>$exp_prenom</td></tr>";
        $message .= "<tr><td>E-mail:</td><td>$exp_mail</td></tr>";
        $message .= "<tr><td>Numéro de téléphone:</td><td>$exp_numero</td></tr>";
        $message .= "<tr><td>Ville:</td><td>$exp_ville</td></tr>";
        $message .= "<tr><td>Adresse:</td><td>$exp_adresse</td></tr>";
        $message .= "<tr><td>Numéro de suivi:</td><td><b>$num_suivi</b></td></tr></br>";
        $message .= "<tr><td>Date d'expédition du colis :</td><td><b>$exp_date_livraison</b></td></tr></br>";

        $message .= "<tr><td>Cordialement.</td></tr>";
        $message .= "</table>";
        $message .= "</body></html>";
        
        $message2 = "Merci, votre envoi de colis a été enregistré avec succès !
<b>Détails de l'envoi :</b>

Expéditeur : Ibra Barry <br>

Numéro de suivi : <b>64d63fc55bb22</b>

Date d'expédition du colis : 2 Janvier

<b>Merci de bien garder votre numero de suivi.</b>

Vous serez contactez par téléphone d'ici 72h pour fixer un rendez-vous pour la recupération du colis. Si vous n'avez aucune nouvelle d'ici là, veillez nous contacter sur ce numero +33 680 801 335";

        try {
            // Configuration du serveur SMTP
            $mail->isSMTP();
            $mail->Host = 'smtp.gmail.com';
            $mail->SMTPAuth = true;
            $mail->Username = 'tygaaliou@gmail.com'; // Remplacez par votre adresse Gmail
            $mail->Password = 'sqghpubtjlfpkgqu'; // Remplacez par votre mot de passe Gmail ou utilisez un mot de passe d'application
            $mail->SMTPSecure = 'tls';
            $mail->Port = 587;
           
           //Configuration de du mail de l'expediteur
           $mail2->isSMTP();
            $mail2->Host = 'smtp.gmail.com';
            $mail2->SMTPAuth = true;
            $mail2->Username = 'tygaaliou@gmail.com'; // Remplacez par votre adresse Gmail
            $mail2->Password = 'sqghpubtjlfpkgqu'; // Remplacez par votre mot de passe Gmail ou utilisez un mot de passe d'application
            $mail2->SMTPSecure = 'tls';
            $mail2->Port = 587;
            
            

            // Destinataire et expéditeur
            $mail->setFrom('pathe@pathetransport.fr', 'no-reply'); //Exepediteur du mail
            $mail->addAddress('aimy25novembre@gmail.com', 'pathe transport'); //Destinataire(PATHE TRANSPORT)
            
            //Mail reçu par l'expediteur
            $mail2->setFrom('pathe@pathetransport.fr', '[no-reply] pathe transport'); //Exepediteur du mail
            $mail2->addAddress('tygaaliou@gmail.com', $exp_prenom); //Destinataire

            // Contenu de l'e-mail
            $mail->isHTML(true);
            $mail->Subject = "Nouvel envoi de colis de $exp_prenom";
            $mail->Body = $message;
            
            // Contenu de l'e-mail
            $mail2->isHTML(true);
            $mail2->Subject = "Confirmation d'envoi";
            $mail2->Body = $message2;

            // Envoi de l'e-mail
            $mail->send();
            
            $mail2->send();

            
            $page = "<p>Merci, votre envoi de colis a été enregistré avec succès !</p>";
            $page .= "<h2>Détails de l'envoi :</h2>";
            $page .= "<p>Expéditeur : $exp_prenom $exp_nom</p>";

            $page .= "<p>Numéro de suivi : <b>".$num_suivi.'</b></br>';
            $page .= '<p>Date d\'expédition du colis : <b>'.$exp_date_livraison.'</b></br></br>
                    
                    <h4> Merci de bien garder votre numero de suivi.</h4>
                    
                    <p>Vous serez contactez par téléphone d\'ici <b>72h</b> pour fixer un rendez-vous pour la recupération du colis. Si vous n\'avez aucune nouvelle d\'ici là, veillez nous contacter sur ce numero <b> +33 680 801 335</b>';
                    
                    
            $page .='<p><a href="index.php"  target="_blank" class="cta-button">Retour à l\'accueil</a> </p>';
            echo $page;
        } catch (Exception $e) {
            echo 'Une erreur s\'est produite lors de l\'envoi de l\'e-mail : ', $mail->ErrorInfo;
        }
        ?> 
        
    </div>

    <footer class="footer">
        
        <nav>
        <ul>
            <li><a href="#">Aide</a></li>
            <li><a href="contact.php">Contact</a></li>
        </ul>
    </nav>
    
    
    <hr>
    &copy; 2023 pathe_transport. Tous droits réservés | Politique de confidentialité | Mentions légales | Politique de cookies.

    </footer>
</body>
</html>

