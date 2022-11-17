var Temperature = 0; // valeur de l'éclairement reçu
var Eclairement =0;
var temps=0;
var data,layout; // variables globales pour le tracé du graphe plotly.js
var tempsDepart = 0;
var depart = true;//pour trouver le premier point du tracé
var LignePoints = true; // pour changer le type de tracé
var AffichePoints = true; // affiche les points sur la courbe

var dataJson;// les données reçues au format json

var status1 = 0; // status LEDRouge 0 Eteinte 255 Allumée
var status2 = 0; // status LEDVerte 0 Eteinte 255 Allumée
var gauge1;// Jauge luxmètre

var connected_flag= 0 // indicateur de connexion au serveur mqtt
var mqtt; // objet pour connexion au serveur mqtt
var reconnectTimeout = 2000;// reconnexion automatique si erreur
var host=""; // url du serveur (laisser vide ici)
var port=443;// 443 uns ou 8083 wp  port du serveur mqtt
var row=0; // ligne pour affichage des données reçues dans l'onglet paramètre
var clientId; // identification client pour le mqtt (ce n'est pas le login)
var out_msg=""; // message reçu
var mcount=0; // variable de comptage pour afficher un certain nombre de lignes des données reçues

var topicPub1 = "FABLAB_21_22/STATION_METEO/PC/in/";
var topicSub1 = "FABLAB_21_22/STATION_METEO/PC/out/";


$(document).ready(function() {// attend que la page soit chargée avant de lancer le script javascript
                //$(function() { // autre écriture de la ligne précédente
			
			// cadran pour afficher l'éclairement : bibliothèque et documentation disponibles sur le site https://canvas-gauges.com/ 
						gauge1 = new RadialGauge({
					renderTo: 'CADRAN1',
					width: 800,
					height: 800,
					units: "°C",
					minValue: -10,
					startAngle: 30,
					ticksAngle: 300,
					valueBox: false,
					maxValue: 80,
					value: -12,
					title: "Température",
					majorTicks: [
						"-10",
						"0",
						"10",
						"20",
						"30",
						"40",
						"50",
						"60",
						"70",
						"80"
					],
					minorTicks: 10,
					strokeTicks: true,
					highlights: [
						{
							"from": 40,
							"to": 80,
							"color": "rgba(200, 50, 50, .75)"
						}
					],
					colorPlate: "#ffffff00",
					colorMajorTicks: "#000",
					colorMinorTicks: "#000",
					colorTitle: "#000",
					colorUnits: "#000",
					colorNumbers: "#000",
					colorNeedleShadowDown: "#333",
					colorNeedleCircleOuter: "#F00",
					colorNeedleCircleOuterEnd: "#F00",
					colorNeedleCircleInner: "#F00",
					colorNeedleCircleInnerEnd: "#F00",
					colorNeedle: "rgba(255, 0, 0, 1)",
					colorNeedleEnd: "rgba(255, 50, 50, .75)",
					borderShadowWidth: 0,
					borders: false,
					needleType: "arrow",
					needleWidth: 2,
					needleEnd: 93,
					needleCircleSize: 1,
					needleCircleOuter: true,
					needleCircleInner: false,
					animationDuration: 1500,
					animationRule: "linear"
				}).draw();
					

// Pour Bootstrap : quand le menu 1 est affiché on redessine la courbe 
	$('#monTab li:eq(2) a').on('shown.bs.tab', function(){ // quand le menu 2 est affiché on dessine le graphe pour l'ajuster correctement 
				//Plotly.newPlot('graph', data, layout,{responsive: true,displaylogo: false});
				trace_graphe(x, y1,y2,"graph");
				//console.log("OK menu 1");
	});
});// fin doc ready					


//autre fonctions
// initialisation de la jauge du luxmètre
function initGauge1(){
	Temperature = "---";
	$('#VAL1').html(Temperature);
	gauge1.value = -12;
	gauge1.update();
	//console.log("init gauge1 ok !");
}


