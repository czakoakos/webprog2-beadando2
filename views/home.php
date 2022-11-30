<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-5 text-center py-4">
            <h1 class="red-text mb-3">Webprogramozás II</h1>
            <h3 class="red-text mb-3">Második beadandó feladat</h3>
            <p class="blue-text mb-3"><strong>Készítette:</strong> Czakó Ákos és Kávai Konrád</p>
            <p class="blue-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate sem ut nunc
                dictum, non commodo sem bibendum. Morbi in accumsan leo, porttitor varius risus.
                Aenean dignissim rhoncus erat a aliquet. </p>
            <h3 class="red-text">Üdvözlünk az oldalon:</h3>
            <p class="blue-text">
                <strong>
                    <?php if (isset($_SESSION['userlastname']) && !empty($_SESSION['userlastname'])) {
                        echo $_SESSION['userlastname'] . " " . $_SESSION['userfirstname'];
                    } else {
                        echo 'Vendég';
                    }
                    ?>
                </strong>
            </p>
        </div>
    </div>
</div>
