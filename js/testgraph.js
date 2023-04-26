const barCanvas = document.getElementById("barCanvas");
const barChart = new Chart(barCanvas, {
    type: "line",
    data: {
        labels: ["Madrid", "Rome", "Amsterdam"],
        datasets: [{
            label: 'Villes',
            data: [100, 210, 1],
            backgroundColor: [
                "violet"
            ]
        }]
    },
    options:{
        borderColor:"lightblue", 
        animations: {
            tension: {
                duration: 1000,
                easing: 'linear',
                from: 0.6,
                to: 0.4,
                loop: true
            }
        }
    }
})