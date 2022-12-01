matchesWidget = {

    matches: [],
    guestList: [],

    initialize() {
        $.get(
            "../models/matches_model.php",
            function (data) {
                let dataJSON = JSON.parse(data)
                for(let i = 0; i < dataJSON.length; i++) {
                    matchesWidget.matches.push(dataJSON[i]);
                }
                matchesWidget.createMatchesList(dataJSON);
            }
        )
        $.get(
            "../models/matches_guests_model.php",
            function (data) {
                let dataJSON = JSON.parse(data);
                for(let i = 0; i < dataJSON.length; i++) {
                    matchesWidget.guestList.push(dataJSON[i]);
                }
                console.log(JSON.parse(data));
            }
        )
    },

    createMatchesList(data) {
        const matchSelect = document.getElementById('nezoMatch');
        for (let i = 0; i < data.length; i++) {
            let option = document.createElement("option");
            option.value = data[i].id;
            option.text = data[i].datum;
            matchSelect.appendChild(option);
        }
    },

    filterMatches() {
        const match = document.getElementById('nezoMatch').value;
        const viewer = document.getElementById('nezoDetails').value;
        const time = document.getElementById('nezoArrival').value;
        const list = document.getElementById('filteredList');
        console.log(match)

        const matchDiv = document.createElement('div');
        matchDiv.classList.add('random-1');

        const viewerDiv = document.createElement('div');
        viewerDiv.classList.add('random-1');

        const timeDiv = document.createElement('div');
        timeDiv.classList.add('random-1');

        if (viewer === 0 && time === 0) {
            matchDiv.innerText = 'random';
        } else if (viewer !== 0 && time === 0) {
            do {
                let i = i + 1;
                matchDiv.innerText = 'random' + [i];
                list.appendChild(matchDiv);
            } while (i === match);
        }



        list.appendChild(matchDiv);
        console.log(this.guestList)
    },
}