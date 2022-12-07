<?php

class Guests_Model
{
    public function get_data($vars)
    {
        $retData['eredmeny'] = "";
        try {
            $connection = Database::getConnection();
            $sql = "SELECT * from belepes 
                LEFT JOIN meccs ON belepes.meccsid = meccs.id 
                LEFT JOIN nezo ON belepes.nezoid = nezo.id 
                ORDER BY meccs.id";
            $sqlDates = "SELECT * FROM meccs ORDER BY meccs.id";
            $stmt = $connection->query($sql);
            $stmtDates = $connection->query($sqlDates);
            $data = $stmt->fetchAll(PDO::FETCH_ASSOC);
            $dates = $stmtDates->fetchAll(PDO::FETCH_ASSOC);
            $retData['data'] = json_encode($data);
            $retData['dates'] = json_encode($dates);
            $retData['uzenet'] = 'gyoztunk';
        } catch (PDOException $e) {
            $retData['eredmény'] = "ERROR";
            $retData['uzenet'] = "Adatbázis hiba: " . $e->getMessage() . "!";
        }
        return $retData;
    }
}

?>