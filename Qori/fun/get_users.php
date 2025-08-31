<?php
header("Content-Type: application/json");
require 'db.php';

if (isset($_GET['user_id'])) {
    $userId = intval($_GET['user_id']);

    $sql = "SELECT 
                t.name AS passenger_name,
                CONCAT(t.name, ' ', t.last_name) AS full_name,
                t.gmail,
                s.place AS seat,
                r.id AS flight_number,
                a1.name AS from_airport,
                c1.country AS from_country,
                a2.name AS to_airport,
                c2.country AS to_country,
                r.tar_a AS departure,
                r.tar_b AS gate_close
            FROM seats s
            JOIN reisebi r ON s.reisi_id = r.id
            JOIN turist t ON s.usr_id = t.id
            JOIN aeroports a1 ON r.aeroport_a = a1.id
            JOIN country c1 ON a1.country_id = c1.id
            JOIN aeroports a2 ON r.aeroport_b = a2.id
            JOIN country c2 ON a2.country_id = c2.id
            WHERE s.usr_id = $userId";

    $result = mysqli_query($conn, $sql);
    $data = mysqli_fetch_assoc($result);
    echo json_encode($data);
} else {
    // Default: Return list of all flights
    $sql = "SELECT
                c1.country AS origin_country,
                a1.name AS origin_airport,
                c2.country AS destination_country,
                a2.name AS destination_airport,
                r.id AS flight_id,
                r.price 
            FROM reisebi r
            JOIN aeroports a1 ON r.aeroport_a = a1.id
            JOIN country c1 ON a1.country_id = c1.id
            JOIN aeroports a2 ON r.aeroport_b = a2.id
            JOIN country c2 ON a2.country_id = c2.id";  

    $result = mysqli_query($conn, $sql);
    $data = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $data[] = $row;
    }

    echo json_encode($data);
}

?>
