
var parseTime = d3.timeParse("%d-%m-%y-%H:%M:%S");
//converti une date en chaine de texte formatée 
var dateFormater = d3.timeFormat("%d-%m-%y à %Hh%M");
var Tab =[];// tableau qui va contenir la température max, min....
var parseDate = d3.timeParse("%d-%m-%y %H:%M:%S");// format de le date à récupérer dans le csv
// les données enregistrées
var x = [], y1 = [], y2 = [];// x date , y1 temperature, y2 humidite
// tracé du graphe plotly.js
function trace_graphe(_x,_y1,_y2,id_div) {

	var trace1 = {
		type: "scatter",
		mode: "lines",
		name: 'Température',
		x: _x,
		y: _y1,
		line: {color: '#ed0c0c'}
	}

	var trace2 = {
		type: "scatter",
		mode: "lines",
		name: 'Humidité',
		x: _x,
		y: _y2,
		yaxis: 'y2',
		line: {color: '#0b69c7'}
	}

	var data = [trace1,trace2];

	var layout = {
		title: 'Graphe station météo',
		xaxis: {
			//domain: [0.2, 1],
			autorange: true,
			//range: ['2022-03-17', '2022-04-04'],
			rangeselector: {buttons: [
				{
				count: 7,
				label: '1sem',
				//step: 'month',
				step: 'day',
				stepmode: 'backward'
				},
				{
				count: 1,
				label: '1mois',
				step: 'month',
				stepmode: 'backward'
				},
				{
				count: 6,
				label: '6mois',
				step: 'month',
				stepmode: 'backward'
				},
				{
				label: 'tout',
				step: 'all',
				active: true
				}
			]},
			
			//rangeslider: {
				//range: ['2022-01-01', '2022-12-31'],
				//type: 'date',
				//bgcolor:'#b7babf',
				//thickness: 0.1}
		},	

			

		yaxis: {
			autorange: true,
			title: 'Température (°C)', 
			titlefont: {color: '#ed0c0c'}, 
			tickfont: {color: '#ed0c0c'},
			//range: [-10.0, 150.0],
			type: 'linear'
		},
		yaxis2: {
			autorange: true,
			type: 'scatter',
			title: 'humidité (%)', 
			titlefont: {color: '#0b69c7'}, 
			tickfont: {color: '#0b69c7'}, 
			name: 'Humidité', 
			//anchor: 'free', 
			anchor: 'x', 
			overlaying: 'y', 
			side: 'right', 
			//position: 0.1
		}
	};
	var config = {locale: 'fr',responsive: true,displaylogo: false};
	Plotly.newPlot('graph', data, layout,config);// important de définir le graphe
}

function readData(){
	d3.dsv(";","/../donnees.csv").then(function(data){ processData(data) } );
}

readData();

function processData(_data) {
	//console.log(_data);

	for (var i=0; i<_data.length; i++) {
		_data[i].date = parseDate(_data[i].date);
		_data[i].Temperature=+_data[i].Temperature;// converti en nombre
		_data[i].Humidite=+_data[i].Humidite;// converti en nombre
		x.push(_data[i].date);
		y1.push(_data[i].Temperature);
		y2.push(_data[i].Humidite);
	}

	Min_Max_jours(_data,10,Tab);
	console.log( 'TAB :',Tab);
	//trace_graphe(x, y1,y2,"graph");

}

function Min_Max_jours(__data,jours,Tab){  // data, nb de jours avant avant la date actuelle , nom d'un Tableau vide dans lequel sont placées les données 
	var now = new Date();
	var jourAvant = new Date();	
	jourAvant.setDate(now.getDate()- jours);
	var heureAvant = new Date();
	var dateFormat1 = d3.timeFormat("%d/%m/%y à %H:%M");
	heureAvant.setHours(heureAvant.getHours()-1);
	//console.log("heure avant ", heureAvant);
	//console.log("date ", now," jour avant ",jourAvant);
	var newTab = __data.filter(function(d) { return d.date >= jourAvant; });
	//console.log("New data ",newTab);
	//console.log("data length ",newTab.length);
	if (newTab.length != 0){ 
		var maxTemp = d3.max(newTab, function(d) { return +d.Temperature; });
		var minTemp = d3.min(newTab, function(d) { return +d.Temperature; });
		//Tab[0].maxTemp = maxTemp;
		//Tab[0].minTemp = minTemp;
		Tab[0] = maxTemp;
		Tab[2] = minTemp;
		
		var Datemin = newTab.filter(function(d) { return +d.Temperature == minTemp});
		//Tab[0].Datemin = dateFormat1(parseTime(Datemin[0].date));
		Tab[3] = dateFormat1(Datemin[0].date);
		var Datemax = newTab.filter(function(d) { return d.Temperature == maxTemp});
		//Tab[0].Datemax = dateFormat1(parseTime(Datemax[0].date)); 
		Tab[1] = dateFormat1(Datemax[0].date); 
		  //Tab[0] = maxTemp;
		 // Tab[0].maxTemp = maxTemp;
		console.log("tab ",Tab);
	
		// vitesse vent max du jour -->
		var maxRafVent = d3.max(newTab, function(d) { return +d.VitVent;});
		Tab[5] = maxRafVent;
		var DateRafMax = newTab.filter(function(d) { return +d.VitVent == maxRafVent});
		Tab[6] = dateFormat1(DateRafMax[0].date); 
		
		// température une heure avant   -->
		var newTab_1heure = newTab.filter(function(d) { return d.date >= heureAvant; });  
				if (newTab_1heure.length != 0){ 
					Tab[4] = newTab_1heure[0].temp1;
					//console.log("temp 1h : ", Tab[4]);
				}else {
					Tab[4]= NaN;
				}
	
	} else {
		console.log(" tableau vide ");
		for (let i = 0; i < 5; i++) {
			Tab[i] = NaN;
		} 

	}; 
};// fin fonction Min_Max_jours


// création du fichier csv
function download_csv() {
	
}


