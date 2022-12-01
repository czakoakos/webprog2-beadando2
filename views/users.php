<?php
$url = SITE_ROOT . "models/user_model.php";
$result = "";
if (isset($_POST['id'])) {
    // Felesleges szóközök eldobása
    $_POST['id'] = trim($_POST['id']);
    $_POST['csn'] = trim($_POST['csn']);
    $_POST['un'] = trim($_POST['un']);
    $_POST['bn'] = trim($_POST['bn']);
    $_POST['jel'] = trim($_POST['jel']);

    // Ha nincs id és megadtak minden adatot (családi név, utónév, bejelentkezési név, jelszó), akkor beszúrás
    if ($_POST['id'] == "" && $_POST['csn'] != "" && $_POST['un'] != "" && $_POST['bn'] != "" && $_POST['jel'] != "") {
        $data = array("csn" => $_POST["csn"], "un" => $_POST["un"], "bn" => $_POST["bn"], "jel" => sha1($_POST["jel"]));
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    } // Ha nincs id de nem adtak meg minden adatot
    elseif ($_POST['id'] == "") {
        $result = "Hiba: Hiányos adatok!";
    } // Ha van id, amely >= 1, és megadták legalább az egyik adatot (családi név, utónév, bejelentkezési név, jelszó), akkor módosítás
    elseif ($_POST['id'] >= 1 && ($_POST['csn'] != "" || $_POST['un'] != "" || $_POST['bn'] != "" || $_POST['jel'] != "")) {
        $data = array("id" => $_POST["id"], "csn" => $_POST["csn"], "un" => $_POST["un"], "bn" => $_POST["bn"], "jel" => $_POST["jel"]);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "PUT");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    } // Ha van id, amely >=1, de nem adtak meg legalább az egyik adatot
    elseif ($_POST['id'] >= 1) {
        $data = array("id" => $_POST["id"]);
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "DELETE");
        curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($data));
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($ch);
        curl_close($ch);
    } // Ha van id, de rossz az id, akkor a hiba kiírása
    else {
        echo "Hiba: Rossz azonosító (Id): " . $_POST['id'] . "<br>";
    }
}

$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$tabla = curl_exec($ch);
curl_close($ch);

?>

<div class="container">
    <div class="row justify-content-center">
        <div class="col-12 col-lg-10 text-start py-4">
            <h1 class="red-text mb-3">Módosítás / Beszúrás</h1>
            <p class="blue-text mb-3">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vivamus vulputate sem ut nunc
                dictum, non commodo sem bibendum. Morbi in accumsan leo, porttitor varius risus.
                Aenean dignissim rhoncus erat a aliquet. </p>
            <form method="post" class="mb-5">
                <div class="row mb-2">
                    <div class="col-2 align-self-center">
                        <label for="id">Id:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="id" id="id">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2 align-self-center">
                        <label for="csn">Családi név:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="csn" maxlength="45" id="csn">
                    </div>
                    <div class="col-2 align-self-center">
                        <label for="un">Utónév:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="un" maxlength="45" id="un">
                    </div>
                </div>
                <div class="row mb-2">
                    <div class="col-2 align-self-center">
                        <label for="bn">Felhasználónév:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="bn" maxlength="12" id="bn">
                    </div>
                    <div class="col-2 align-self-center">
                        <label for="jel">Jelszó:</label>
                    </div>
                    <div class="col-4">
                        <input type="text" name="jel" id="jel">
                    </div>
                </div>
                <div class="row justify-content-center">
                    <div class="col-4">
                        <input type="submit" value = "Módosít / hozzáad">
                    </div>
                </div>

                <!--                Id: <input type="text" name="id"><br><br>-->
                <!--                Családi név: <input type="text" name="csn" maxlength="45"> Utónév: <input type="text" name="un" maxlength="45"><br><br>-->
                <!--                Bejelentkezési név: <input type="text" name="bn" maxlength="12"> Jelszó: <input type="text" name="jel"><br><br>-->

            </form>
            <div class="row">
                <div class="col-12">
                    <h3 class="red-text mb-3">Felhasználók:</h3>
                    <?= $result ?>
                    <?= $tabla ?>
                </div>
            </div>
        </div>
    </div>
</div>
