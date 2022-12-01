<?php
include('../includes/database.inc.php');

$result = "";
$result = "";
try {
    $connection = Database::getConnection();
    $connection->query('SET NAMES utf8 COLLATE utf8_hungarian_ci');
    switch ($_SERVER['REQUEST_METHOD']) {
        case "GET":
            $sql = "SELECT * FROM felhasznalok";
            $sth = $connection->query($sql);
            $result .= "<table><thead><tr><th>@</th><th>Családi név:</th><th>Utónév:</th><th>Login név:</th><th>Jogosultság:</th></tr></thead>";
            while ($row = $sth->fetch(PDO::FETCH_ASSOC)) {
                $result .= "<tr>";
                foreach ($row as $key => $column)
                    if($key != 'jelszo'){
                        $result .= "<td>" . $column . "</td>";
                    }
                $result .= "</tr>";
            }
            $result .= "</table>";
            break;
            
        case "POST":
            $incoming = file_get_contents("php://input");
            parse_str($incoming, $data);
            $sql = "INSERT INTO felhasznalok VALUES (0, :csn, :un, :bn, :jel, '_1_')";
            $sth = $connection->prepare($sql);
            $count = $sth->execute(array(":csn" => $data["csn"], ":un" => $data["un"], ":bn" => $data["bn"], ":jel" => $data["jel"]));
            $newid = $connection->lastInsertId();
            $result .= $count . " beszúrt sor: " . $newid;
            break;
            
        case "PUT":
            $data = array();
            $incoming = file_get_contents("php://input");
            parse_str($incoming, $data);
            $toChange = "id=id";
            $params = array(":id" => $data["id"]);
            if ($data['csn'] != "") {
                $toChange .= ", csaladi_nev = :csn";
                $params[":csn"] = $data["csn"];
            }
            if ($data['un'] != "") {
                $toChange .= ", utonev = :un";
                $params[":un"] = $data["un"];
            }
            if ($data['bn'] != "") {
                $toChange .= ", bejelentkezes = :bn";
                $params[":bn"] = $data["bn"];
            }
            if ($data['jel'] != "") {
                $toChange .= ", jelszo = :jel";
                $params[":jel"] = sha1($data["jel"]);
            }
            $sql = "UPDATE felhasznalok SET " . $toChange . " WHERE id=:id";
            $sth = $connection->prepare($sql);
            $count = $sth->execute($params);
            $result .= $count . " módositott sor. Azonosítója:" . $data["id"];
            break;

        case "DELETE":
            $data = array();
            $incoming = file_get_contents("php://input");
            parse_str($incoming, $data);
            $sql = "DELETE FROM felhasznalok WHERE id=:id";
            $sth = $connection->prepare($sql);
            $count = $sth->execute(array(":id" => $data["id"]));
            $result .= $count . " sor törölve. Azonosítója:" . $data["id"];
            break;
    }
} catch (PDOException $e) {
    $result = $e->getMessage();
}
echo $result;

?>