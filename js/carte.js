// Création de la carte au coordonée de Dunkerque
var map = L.map('map').setView([51.065522, 2.371569], 11);



// Affichage de la carte
L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
    attribution: '&copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors'
}).addTo(map);

// donnée final
var data = {"aller":{"latlngs":[], "heures":[], "texts":[]}, "retour":{"latlngs":[], "heures":[], "texts":[]}};

// Liste des coordonées des markers
var latlngs = [];

// Chemin en aller par défaut
var pathmode = "aller";

// Au départ un polyline avec aucune coordonée
var polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);

var markerSelected = undefined;

// Detecte l'utilisateur clique sur la map et créer un marker avec l'heure et le texte
function onMapClicked(e){

    var heure = prompt("Heure :", "12h30");
    var text = prompt("Histoire :", "Racontez l'histoire de cette étape");
    if(heure == null || heure == "" || text == null || text == ""){
        alert("Erreur lors de l'entrée des champs.")
    }else{
        var marker = L.marker(e.latlng).addTo(map);
        marker.bindPopup("Heure : "+ heure + "<br/>\""+ text +"\"").openPopup();
        marker.on('click', onMarkerClicked);
        markerSelected = marker;
        
        polyline.addLatLng(e.latlng);
        latlngs.push(e.latlng);

        if(pathmode == "aller"){
            updateData(e.latlng, heure, text);
        }else{
            updateData(e.latlng, heure, text);
        }
    }

    
}

// Met a jour data
function updateData(newLatlng, newHeure, newText){
    console.log(newLatlng, newHeure, newText);
    data[pathmode].latlngs.push(newLatlng);
    data[pathmode].heures.push(newHeure);
    data[pathmode].texts.push(newText);
    console.log(data);
}

// Supprime les donée à l'indice i
function deleteData(index){
    data[pathmode].latlngs.splice(index, 1);
    data[pathmode].heures.splice(index, 1);
    data[pathmode].texts.splice(index, 1);
    console.log(data);
}

// Selectione le marker cliqué
function onMarkerClicked(e){
    if(data[pathmode].latlngs.includes(this.getLatLng()) && !data[getInvPathMode()].latlngs.includes(this.getLatLng())){
        markerSelected = this;
    }else{
        markerSelected = undefined;
    }
    
}

// Supprime le marker sélectioné
function deleteMarkerSelected(e){
    if(e.code == "Delete"){
        map.removeLayer(markerSelected);
        for(var i = 0; i < latlngs.length; i++){
            if(latlngs[i].equals(markerSelected.getLatLng())){
                map.removeLayer(polyline);
                latlngs.splice(i, 1);
                deleteData(i);
                if(pathmode == "aller"){
                    polyline = L.polyline(latlngs, {color: 'red'}).addTo(map);
                }else{
                    polyline = L.polyline(latlngs, {color: 'green'}).addTo(map);
                }
                
            }
        }
    }
}

function changePathMode(e){
    
    if(e.code == "ControlLeft"){
        
        if(pathmode == "aller"){
            pathmode = "retour";
            latlngs = [];
            last_index = data["aller"].latlngs.length-1;
            latlngs.push(data["aller"].latlngs[last_index]);
            // Ajout du dernier element de aller dans retour
            updateData(data["aller"].latlngs[last_index], data["aller"].heures[last_index], data["aller"].texts[last_index])
            polyline = L.polyline(latlngs, {color: 'green'}).addTo(map);
        }
    }
}

function getInvPathMode(){
    if(pathmode == "aller"){
        return "retour";
    }else{
        return "aller";
    }
}

// Détéction de la carte cliqué
map.on('click', onMapClicked)

// Détéction de touche pressé (suppr) pour supprimer le marker selectioné
document.addEventListener('keydown', deleteMarkerSelected);
document.addEventListener('keydown', changePathMode);

// Légende
var legend = L.control({position: 'bottomleft'});


legend.onAdd = function(map) {
    var div = L.DomUtil.create("div", "legend");

    div.innerHTML += "<h4>Chemins</h4>";
    div.innerHTML += '<i style="background: red"></i><span>Aller</span><br>';
    div.innerHTML += '<i style="background: green"></i><span>Retour</span><br>';
    
    return div;
};


legend.addTo(map);