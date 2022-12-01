const countedData = [];
const dates = [];

function countData () {
    let counter = 0;
    let matchId = 1;
    for (let i = 0; i < guestsData.length; i++){
        console.log(guestsData[i].meccsid)
        if (guestsData[i].meccsid === String(matchId)) {
            counter += 1;
        } else {
            countedData.push(counter);
            counter = 1;
            matchId += 1;
        }
    }
    countedData.push(counter)
}
function getDates () {
    for (let i = 0; i < matchesData.length; i++) {
        dates.push(matchesData[i].datum);
    }
}

countData();
getDates();

