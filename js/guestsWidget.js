guestsWidget = {

    countedData: [],
    dates: [],

    initialize() {
        this.countData();
        this.getDates();
        this.drawChart();
    },

    countData() {
        let counter = 0;
        let matchId = 1;
        for (let i = 0; i < guestsData.length; i++) {
            if (guestsData[i].meccsid === String(matchId)) {
                counter += 1;
            } else {
                this.countedData.push(counter);
                counter = 1;
                matchId += 1;
            }
        }
        this.countedData.push(counter)
    },

    getDates() {
        for (let i = 0; i < matchesData.length; i++) {
            this.dates.push(matchesData[i].datum);
        }
    },

    drawChart() {
        const lineChart = document.getElementById('lineChart');
        new Chart(lineChart, {
            type: 'line',
            data: {
                labels: this.dates,
                datasets: [{
                    label: 'Nézők a meccsen',
                    data: this.countedData,
                    borderColor: '#ac3b61',
                    borderWidth: 2,
                    backgroundColor: '#ac3b61',
                }],
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'top',
                    },
                    title: {
                        display: false,
                    }
                },
                scales: {
                    y: {
                        title: {
                            color: '#123c69',
                            display: true,
                            text: 'Nézők',
                            font: {
                                size: 16,
                                weight: 'bolder',
                            },
                            padding: {
                                top: 0, right: 0, bottom: 20, left: 0
                            }
                        },
                    },
                    x: {
                        title: {
                            color: '#123c69',
                            display: true,
                            text: 'Meccs napok',
                            font: {
                                size: 16,
                                weight: 'bolder'
                            },
                            padding: {
                                top: 20, right: 0, bottom: 0, left: 0
                            }
                        }
                    }
                }
            }
        });
    }
}