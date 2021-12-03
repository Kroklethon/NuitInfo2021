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
        $cmdt = Sauveteur::one($sauvetage->id_commandant);
        $cmdt = Personne::one($cmdt->id_personne);
        $sous_cmdt = Sauveteur::one($sauvetage->id_sous_commandant);
        $sous_cmdt = Personne::one($sous_cmdt->id_personne);
        echo "<h2>Sauvetage du ".$sauvetage->date_sauvetage."</h2>";
        echo "<div style='margin:30px 0px' class='column'>";
        echo "<div class='glass slider round'></div>";
        echo "<div class='glass slider_img centered round blue'>Pas d'images :(</div>";
        echo "</div>";
        echo "<div class='column'>
          <div class='glass centered sauvetage_photo'>Pas de photo :(</div>
          <div class='sauvetage_desc'>
            <p>Le capitaine :</p>
            <a class='underlined'>en savoir +</a>
          </div>
          <h2 class='sauvetage_name'>{$cmdt->nom}, {$cmdt->prenom}</h2>
        </div>";
        echo "<div class='column'>
          <div class='glass centered sauvetage_photo'>Pas de photo :(</div>
          <div class='sauvetage_desc'>
            <p>Le sous-capitaine :</p>
            <a class='underlined'>en savoir +</a>
          </div>
          <h2 class='sauvetage_name'>{$sous_cmdt->nom}, {$sous_cmdt->prenom}</h2>
        </div>";
      }
      ?>
    </section>
  </div>
</body> 
<script src="theRescueQuest/ee.js"></script>
<script src="js/main.js"></script>
</html>

