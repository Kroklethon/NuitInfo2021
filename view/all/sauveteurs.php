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
        echo "<div class='column'>";
        foreach($data as $sauveteur) {
          echo "<div>";
          $pers = Personne::one($sauveteur->id_personne);
          echo "<p>".$pers->prenom."</p>";
          echo "<p>".$pers->nom."</p>";
          echo "<p>".$pers->date_naissance."</p>";
          echo "<p>".$sauveteur->grade."</p>";
          echo "</div>";
        }
        echo "</div>";
        ?>
    </section>
  </div>
</body> 
<script src="theRescueQuest/ee.js"></script>
<script src="js/main.js"></script>
</html>
