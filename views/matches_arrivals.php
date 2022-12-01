
<button id="getMatches">Meccs adatok keresése</button>
<div id="matchDetails">
    <select id="nezoMatch">
        <option value="0" disabled selected>Meccs időpont...</option>
    </select>
    <select id="nezoDetails">
        <option value="0" disabled selected>Nézők...</option>
        <option value="1">Név</option>
        <option value="2">Név + nem</option>
        <option value="3">Név + nem + bérletes</option>
    </select>
    <select id="nezoArrival">
        <option value="0" disabled selected>Érkezés...</option>
        <option value="1">Érkezési idő</option>
    </select>
</div>

<button id="filterMatches">Adatok szűrése / listázása</button>
<div id="filteredMatches">
    <div>Meccs dátuma -- Néző adatok -- Érkezési idő</div>
    <div id="filteredList">

    </div>
</div>


<script src="<?php echo SITE_ROOT ?>js/matches.js"></script>
<script src="<?php echo SITE_ROOT ?>js/matchesWidget.js"></script>