<?php
include('fun/db.php');

if (isset($_POST['create'])) {
    echo "First step";
    $q_a = $_POST['saidan'];
    $q_b = $_POST['sad'];
    $plane = $_POST['plane'];
    $tar_a = $_POST['time_start'];
    $tar_b = $_POST['time_finish'];
    $tanxa = $_POST['tanxa'];

    
    $sql = "SELECT rigi, adg FROM planes WHERE id='$plane'";
    $r = mysqli_query($conn, $sql);
    if ($row = mysqli_fetch_assoc($r)) {
        $a_a = $row['rigi'];
        $a_b = $row['adg'];
        $rigi = $a_a; 
        $rig_adg = $a_b; 
    }
    echo "first done";
    
    $sql = "INSERT INTO reisebi (tar_a, tar_b, q_a, q_b, aeroport_a, aeroport_b, plane) 
            VALUES ('$tar_a', '$tar_b', '$q_a', '$q_b', '$a_a', '$a_b', '$plane')";
    mysqli_query($conn, $sql);
    $reisi_id = mysqli_insert_id($conn); 

    echo "second Done";
    $alfa = array('A', 'B', 'C', 'D', 'E', 'F');
    $h = 1;

   
    for ($i = 0; $i < $rigi; $i++) {
        for ($o = 0; $o < $rig_adg; $o++) {
            $real_adg = $alfa[$o];
            $rom_rigi = $h;
            $sql = "INSERT INTO seats (plane_id, reisi_id, act, place, fasi, `row`) 
                    VALUES ('$plane', '$reisi_id', '1', '$real_adg', '$tanxa', '$rom_rigi')";
            mysqli_query($conn, $sql);
        }
        $h++;
    }  header("Location: admin.php");
}
?>
