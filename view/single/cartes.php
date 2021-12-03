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
        <div id="map" style="height: 50vh; width: 80vh;"></div>

        <div id="form-container">
                <form action="action" method="post">
                    <p>
                        <label for="lat">Latitude</label>
                        <input type="text" name="lat" id="lat" value="{{$lat}}">
                    </p>
                    <p>
                        <label for="lng">Longitude</label>
                        <input type="text" name="lng" id="lng" value="{{$lng}}">
                    </p>
                    <p>
                        <label for="zoom">Zoom</label>
                        <input type="text" name="zoom" id="zoom" value="{{$zoom}}">
                    </p>
                    <p>
                        <label for="nom">Nom</label>
                        <input type="text" name="nom" id="nom" value="{{$nom}}">
                    </p>
                    <p>
                        <label for="description">Description</label>
                        <input type="text" name="description" id="description" value="{{$description}}">
                    </p>
                    <p>
                        <label for="adresse">Adresse</label>
                        <input type="text" name="adresse" id="adresse" value="{{$adresse}}">
                    </p>
                    <input type="submit" value="Envoyer">
                </form>
            </div>
    </div>
    </body>

    <script src="js/carte.js"></script>
</html>