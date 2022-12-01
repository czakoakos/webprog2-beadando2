<?php
include('../includes/database.inc.php');

$error = '';
$result = '';
try {
    $connection = Database::getConnection();
    $sql = "SELECT * FROM meccs ORDER BY meccs.id";
    $stmt = $connection->query($sql);
    $matches = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $result = $matches;
} catch (PDOException $e) {
    $error = "Hiba a lekérdezés közben.";
}
echo json_encode($result);
?>

