<!DOCTYPE html>
<html>
<head>
  <title>Slideshow Grid</title>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:wght@300;400;500;700&display=swap" rel="stylesheet">
  <style>
    body {
      font-family: "Roboto", sans-serif;
      margin: 0;
      padding: 0;
    }

    #slider {
      width: 100%;
      display: grid;
      grid-template-columns: repeat(3, 1fr); /* 3 columns, adjust as needed */
      gap: 10px; /* Adjust the gap between images as needed */
    }

    .slide {
      width: 100%;
      overflow: hidden;
      border: 1px solid #ccc;
      box-sizing: border-box;
      cursor: pointer;
    }

    .slide img {
      width: 100%;
      height: auto;
    }

  </style>
</head>
<body>

  <div id="slider">
    <div class="slide" onclick="toggleFullScreen(this)">
      <img src="./images/form_pathe.png" alt="Image 1">
    </div>
    <div class="slide" onclick="toggleFullScreen(this)">
      <img src="./images/preparation de colis.png" alt="Image 2">
    </div>
    <div class="slide" onclick="toggleFullScreen(this)">
      <img src="./images/rendement-3d-vehicule-livraison(1).jpg" alt="Image 3">
    </div>
    <!-- Add more images here -->
  </div>

  <script>
    function toggleFullScreen(element) {
      if (!document.fullscreenElement) {
        if (element.requestFullscreen) {
          element.requestFullscreen();
        } else if (element.mozRequestFullScreen) { /* Firefox */
          element.mozRequestFullScreen();
        } else if (element.webkitRequestFullscreen) { /* Chrome, Safari and Opera */
          element.webkitRequestFullscreen();
        } else if (element.msRequestFullscreen) { /* IE/Edge */
          element.msRequestFullscreen();
        }
      } else {
        if (document.exitFullscreen) {
          document.exitFullscreen();
        } else if (document.mozCancelFullScreen) { /* Firefox */
          document.mozCancelFullScreen();
        } else if (document.webkitExitFullscreen) { /* Chrome, Safari and Opera */
          document.webkitExitFullscreen();
        } else if (document.msExitFullscreen) { /* IE/Edge */
          document.msExitFullscreen();
        }
      }
    }
  </script>

</body>
</html>

