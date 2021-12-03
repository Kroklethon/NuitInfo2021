<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <title>Vue utilisateur</title>
        <link href="css/carte.css" rel="stylesheet">
         <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css"
   integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A=="
   crossorigin=""/>

   <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"
   integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA=="
   crossorigin=""></script>
   
    </head>
    <body>
    <div id="map-form-container">
        <div id="map" style="height: 50vh; width: 80vh;">
        </div>
        <div id="form-container">
            <form action="action" method="post">
                <p>
                    <label for="bat_sauvetage">Bateau de rescousse</label>
                    <select name="bat_sauvetage">
                        <?php 
                            foreach(Bateau::all() as $bat) {
                                echo "<option name='bat_sauvetage' value='{$bat->id}'>{$bat->nom}</option>";
                            }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="bat_sauve">Bateau naufragé</label>
                    <select name="bat_sauve">
                        <?php 
                            foreach(Bateau::all() as $bat) {
                                echo "<option name='bat_sauve' value='{$bat->id_bateau}'>{$bat->nom}</option>";
                            }
                        ?>
                    </select>
                </p>
                <p>
                    <label for="mort">Morts</label>
                    <?php 
                    foreach(Personne::all() as $pers) {
                        echo "<p><input type='checkbox' name='mort' value='{$pers->id_personne}'>{$pers->nom}</p>";   
                    }
                    ?>
                </p>
                <p>
                <label for="vivant">Morts</label>
                    <?php 
                    foreach(Personne::all() as $pers) {
                        echo "<p><input type='checkbox' name='vivant' value='{$pers->id_personne}'>{$pers->nom}</p>";   
                    }
                    ?>
                </p>
                <p>
                    <label for="id_commandant">Commandant :</label>
                    <select name="id_commadant">
                    <?php 
                        foreach(Sauveteur::all() as $sauv) {
                            $pers = Personne::one($sauv->$id_sauveteur);
                            echo "<option name='id_commandant' value='{$sauv->id_sauveteur}'>{$pers->nom}</option>";
                        }
                    ?>
                    </select>
                </p>
                <p>
                <label for="id_sous_commandant">Sous-commandant :</label>
                    <select name="id_sous_commandant">
                    <?php 
                        foreach(Sauveteur::all() as $sauv) {
                            $pers = Personne::one($sauv->$id_sauveteur);
                            echo "<option name='id_sous_commandant' value='{$sauv->id_sauveteur}'>{$pers->nom}</option>";
                        }
                    ?>
                    </select>
                </p>
                <input type="submit" value="Envoyer">
            </form>
        </div>
    </div>
    <p class="small">Cliquer pour ajouter une étape, Suppr pour supprimer une étape, Ctrl pour passer en mode "retour"</p>
</body>

    <script src="js/carte.js"></script>
</html>