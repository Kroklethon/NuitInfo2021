let sessionStage;

if (sessionStorage.getItem("rescueQuest") == null) {
	sessionStorage.setItem("rescueQuest",0)
	sessionStorage.setItem("rescueQuestStart",null)
	sessionStorage.setItem("rescueQuestCurrentAim",null)
	sessionStorage.setItem("rescueQuestTypeDistress",null)
}
if (sessionStorage.getItem("rescueQuest") == 0 && Math.random() < 1) {
	// EE not started, so insert the boat if lucky
	let eeBoat = document.createElement("div")
	document.body.appendChild(eeBoat)
	eeBoat.id = "eeBoat"
	eeBoat.setAttribute("width",0)
	eeBoat.setAttribute("height",0)

	svgBoat = getSvgBoat()
	svgPort = getSvgPort()
	eeBoat.appendChild(svgPort)
	eeBoat.appendChild(svgBoat)

	svgBoat.onclick = function () {
		sessionStorage.setItem("rescueQuestStart",window.location.href)
		sessionStorage.setItem("rescueQuest",1)
		textToPrint = document.createElement("div")
		nbP = Math.round(Math.random() * (7 - 2) + 2)
		typeDetress = Math.random() > 0.5 ? "fire" : "lamp"
		typeDetressText = typeDetress == "fire" ? "tires un feu de detresse" : "allumes une lampe de detresse"
		year = Math.round(Math.random() * (2021 - 1850) + 1850)
		textToPrint.innerText = "Bonjour sauveteur des mers, vous voici en "+ year +" et nous avons recu un appel de detresse ! Rendez vous a la destination afin de sauver les naufrages ! Dans le message recu, nous avons pu entendre " + nbP + " personnes qui ont " + typeDetressText + ".";
		eeBoat.appendChild(textToPrint)
		urlToAim = window.location.origin + "/research.php"
		sessionStorage.setItem("rescueQuestCurrentAim",urlToAim)
		sessionStorage.setItem("rescueQuestTypeDistress",typeDetress)
	}
}
else if ((sessionStorage.getItem("rescueQuest") == 1) && (window.location.href == sessionStorage.getItem("rescueQuestCurrentAim"))) {
	// EE started, must find with the search the distressed boat, and if found next part
	let eeBoat = document.createElement("div")
	document.body.appendChild(eeBoat)
	eeBoat.id = "eeBoat"
	eeBoat.setAttribute("width",0)
	eeBoat.setAttribute("height",0)

	svgBoat = getSvgBoat()
	eeBoat.appendChild(svgBoat)
	svgDistressedBoat = getSvgBoatDistressed()
	eeBoat.appendChild(svgDistressedBoat)
	svgDistressedBoat.onclick = function() {
		sessionStorage.setItem("rescueQuest",2)
		textToPrint = document.createElement("div")
		textToPrint.innerHTML = "Quelle fumee ! Le bateau que vous avez retrouve semble pourtant inoccupe. Verifiez les alentours voir si vous ne voyez pas <a href='" + window.location.origin + "/theRescueQuest/lamp.html'>une lampe de detresse</a> ou <a href='" + window.location.origin + "/theRescueQuest/fire.html'>un feu de detresse</a>.";
		eeBoat.appendChild(textToPrint)
		sessionStorage.setItem("rescueQuestCurrentAim",window.location.origin + "/theRescueQuest/"+sessionStorage.getItem("rescueQuestTypeDistress")+".html")
	}
}
else if ((sessionStorage.getItem("rescueQuest") == 2) && (window.location.href == sessionStorage.getItem("rescueQuestCurrentAim"))) {
	// if right distress signal remembered -> final unlocked
	let eeBoat = document.createElement("div")
	document.body.appendChild(eeBoat)
	eeBoat.id = "eeBoat"
	eeBoat.setAttribute("width",0)
	eeBoat.setAttribute("height",0)

	svgBoat = getSvgBoat()
	svgBoat.setAttribute("height", 400)
	svgBoat.setAttribute("width", 400)
	
	eeBoat.appendChild(svgBoat)
	svgFloatingPeople = getSvgFloatingPeople()
	eeBoat.appendChild(svgFloatingPeople)
	svgFloatingPeople.onclick = function() {
		this.setAttribute("src","theRescueQuest/savedPeople.svg")
		sessionStorage.setItem("rescueQuest",3)
		textToPrint = document.createElement("div")
		textToPrint.innerHTML = "Vous avez recuperes les naufrages ! Ramenez les maintenant au <a href='" + sessionStorage.getItem("rescueQuestStart") + "'>port</a>.";
		eeBoat.appendChild(textToPrint)
	}
}
else if ((sessionStorage.getItem("rescueQuest") == 2) && (window.location.href.match(/\/theRescueQuest/) != null)) {
	// else game over and redirect to the starting page
	let eeBoat = document.createElement("div")
	document.body.appendChild(eeBoat)
	eeBoat.id = "eeBoat"
	eeBoat.setAttribute("width",0)
	eeBoat.setAttribute("height",0)

	svgBoat = getSvgBoat()
	svgBoat.setAttribute("height", 400)
	svgBoat.setAttribute("width", 400)
	
	eeBoat.appendChild(svgBoat)
	svgFloatingPeople = getSvgWater()
	eeBoat.appendChild(svgFloatingPeople)
	svgFloatingPeople.onclick = function() {
		textToPrint = document.createElement("div")
		textToPrint.innerHTML = "Vous avez surement vu un mirage, et du coup les personnes que vous deviez sauver se sont noyes ! Ne sachant pas ou on coules ces personnes, vous decidez de retourner au <a href='" + sessionStorage.getItem("rescueQuestStart") + "'>port</a>. EASTER EGG OVER !";
		eeBoat.appendChild(textToPrint)
		sessionStorage.setItem("rescueQuest",0)
		sessionStorage.setItem("rescueQuestStart",null)
		sessionStorage.setItem("rescueQuestCurrentAim",null)
		sessionStorage.setItem("rescueQuestTypeDistress",null)
	}
}
else if ((sessionStorage.getItem("rescueQuest") < 2) && (window.location.href.match(/\/theRescueQuest/) != null)) {
	// wrong warp -> restart to the main page of the site
	sessionStorage.setItem("rescueQuest",0)
	sessionStorage.setItem("rescueQuestStart",null)
	sessionStorage.setItem("rescueQuestCurrentAim",null)
	sessionStorage.setItem("rescueQuestTypeDistress",null)
	window.location.href = window.location.origin
}
else if ((sessionStorage.getItem("rescueQuest") == 3) && (window.location.href == sessionStorage.getItem("rescueQuestStart"))) {
	// win time
	let eeBoat = document.createElement("div")
	document.body.appendChild(eeBoat)
	eeBoat.id = "eeBoat"
	eeBoat.setAttribute("width",0)
	eeBoat.setAttribute("height",0)

	svgPort = getSvgPort()
	eeBoat.appendChild(svgPort)
	svgBoat = getSvgBoat()
	eeBoat.appendChild(svgBoat)
	svgBoat.onclick = function() {
		textToPrint = document.createElement("div")
		textToPrint.innerHTML = "<div  style='float:left'>Vous avez reussi a sauver les naufrages ! Pour vous recompenser, voici votre \"</div><div id='deco' style='float:left'>decoration</div>\"<div style='float:left'> remise lors de votre \"<a href='https://www.youtube.com/watch?v=BuYf0taXoNw'>ceremonie des recompenses</a>\"</div>";
		eeBoat.appendChild(textToPrint)
		sessionStorage.setItem("rescueQuest",0)
		sessionStorage.setItem("rescueQuestStart",null)
		sessionStorage.setItem("rescueQuestCurrentAim",null)
		sessionStorage.setItem("rescueQuestTypeDistress",null)
		document.getElementById('deco').onclick = function () {
			if (sessionStorage.getItem("decoMode") == null) {
				return sessionStorage.setItem("decoMode","medalRewarded")
			}
			if (sessionStorage.getItem("decoMode") == "medalRewarded") {
				sessionStorage.setItem("decoMode","medalRetired")
			} else {
				sessionStorage.setItem("decoMode","medalRewarded")
			}
		}
	}
}

function getSvgBoat() {
	b = document.createElement("img")
	b.setAttribute("src", "theRescueQuest/boat.svg")
	b.setAttribute("height", 100)
	b.setAttribute("width", 100)
	b.style.background = '#9999FF'
	return b
}

function getSvgPort() {
	b = document.createElement("img")
	b.setAttribute("src", "theRescueQuest/port.svg")
	b.setAttribute("height", 100)
	b.setAttribute("width", 100)
	b.style.background = '#9999FF'
	return b
}

function getSvgBoatDistressed() {
	b = document.createElement("img")
	b.setAttribute("src", "theRescueQuest/distressedBoat.svg")
	b.setAttribute("height", 100)
	b.setAttribute("width", 100)
	b.style.background = '#9999FF'
	return b	
}

function getSvgFloatingPeople() {
	b = document.createElement("img")
	b.setAttribute("src", "theRescueQuest/floatingPeople.svg")
	b.setAttribute("height", 100)
	b.setAttribute("width", 100)
	b.style.background = '#9999FF'
	return b
}

function getSvgWater() {
	b = document.createElement("img")
	b.setAttribute("src", "theRescueQuest/sea.svg")
	b.setAttribute("height", 400)
	b.setAttribute("width", 400)
	b.style.background = '#9999FF'
	return b
}