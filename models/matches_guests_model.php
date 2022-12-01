<?php
include('../includes/database.inc.php');

$error = '';
$result = '';
try {
    $connection = Database::getConnection();
    $sql = "SELECT * from belepes
                LEFT JOIN meccs ON belepes.meccsid = meccs.id
                LEFT JOIN nezo ON belepes.nezoid = nezo.id
                ORDER BY meccs.id";
    $stmt = $connection->query($sql);
    $guests = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $guests;
} catch (PDOException $e) {
    $error = "Hiba a lekérdezés közben.";
}
echo json_encode($result);
?>

