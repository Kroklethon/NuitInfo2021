<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/style.css">
  <script src="https://kit.fontawesome.com/6701183f30.js" crossorigin="anonymous"></script>
  <title>Sauveteur dunkerquois</title>
</head>
<body>
  <div class="main">
    <section>
      <?php
      foreach($data as $sauvetage) {
        echo "<p>".$sauvetage->id_sauvetage."</p>";
      }
      ?>
    </section>
  </div>
</body> 
<script src="js/main.js"></script>
</html>