<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Votre Titre</title>
  <style>
    body {
      font-family: Arial, sans-serif;
      margin: 0;
      padding: 0;
      color: #333;
    }

    header {
      background-color: #007bff;
      color: #fff;
      padding: 20px;
    }

    header h1 {
      font-size: 36px;
      margin: 0;
    }

    header p {
      font-size: 18px;
      margin: 20px 0;
    }

    .cta-button {
      display: inline-block;
      padding: 15px 30px;
      background-color: #007bff;
      color: #fff;
      text-decoration: none;
      border-radius: 5px;
      transition: background-color 0.3s ease;
    }

    .cta-button:hover {
      background-color: #0056b3;
    }

    .features {
      display: flex;
      justify-content: space-around;
      padding: 40px 0;
      background-color: #f5f5f5;
    }

    .feature {
      text-align: center;
    }

    .feature img {
      width: 100px;
      height: 100px;
      margin-bottom: 10px;
    }

    .feature h2 {
      font-size: 24px;
      margin: 0;
    }

    .feature p {
      font-size: 16px;
      margin: 0;
    }

    .hero {
      background-image: url("./images/envoi final.png");
      background-size: cover;
      background-position: center;
      color: #fff;
      padding: 100px 0;
      text-align: center;
    }

    .hero-content h1 {
      font-size: 48px;
      margin: 0;
    }

    .hero-content p {
      font-size: 20px;
      margin: 20px 0;
    }

    footer {
      background-color: #333;
      color: #fff;
      padding: 20px;
      text-align: center;
    }

    footer p {
      margin: 0;
    }

    /* Add additional CSS as needed */
  </style>
</head>
<body>
  <header>
    <h1>Votre Titre</h1>
    <p> La meilleure solution pour envoyer vos colis en toute sécurité</p>
    <a href="#" class="cta-button">En savoir plus</a>
  </header>

  <main>
    <section class="hero">
      <div class="hero-content">
        <h1>Trouvez tout ce dont vous avez besoin</h1>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Nulla eu dui nec elit vestibulum fermentum.</p>
        <a href="#" class="cta-button">Commencer</a>
      </div>
    </section>

    <section class="features">
      <div class="feature">
        <img src="./images/feature1.png" alt="Feature 1">
        <h2>Feature 1</h2>
        <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
      </div>
      <div class="feature">
        <img src="./images/feature2.png" alt="Feature 2">
        <h2>Feature 2</h2>
        <p>Sed do eiusmod tempor incididunt ut labore et dolore magna aliqua.</p>
      </div>
      <div class="feature">
        <img src="./images/feature3.png" alt="Feature 3">
        <h2>Feature 3</h2>
        <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
      </div>
    </section>
  </main>

  <footer>
    <p>&copy; 2023 Votre Titre. Tous droits réservés.</p>
  </footer>
</body>
</html>

