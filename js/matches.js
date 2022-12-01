$(document).ready(function () {
    $("#getMatches").click(function (e) {
        e.preventDefault();
        matchesWidget.initialize();
    });

    $("#filterMatches").click(function (e) {
        e.preventDefault();
        matchesWidget.filterMatches();
    });
});
