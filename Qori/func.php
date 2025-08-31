<?php   
 $j=0;

if(isset($_SESSION['user'])){
    
}else{
    $_SESSION['user'] = "guest";
}


if (isset($_GET['washla'])) {
    unset($_SESSION['second_county'], $_SESSION['first_county']);
} else {
    $washla = '0';
}

if(isset($_GET['first_county'])){
    $first_county=$_GET['first_county'];
    $_SESSION['first_county'] = $_GET['first_county'];
 

}else if(isset( $_SESSION['first_county'])){
    $first_county= $_SESSION['first_county'];
}else{
    $first_county=0;
}
if(isset($_GET['seat'])){
        $seat = $_GET['seat'];
        $_SESSION['adf'][$seat]=$seat;
        $adgili[$j]=$seat;
        $j++;
        $sql = "SELECT * FROM seats WHERE id='$seat'";
        $r = mysqli_query($conn, $sql);
        while ($row = mysqli_fetch_assoc($r)) { 
            if($row['act'] == "1"){
                    $v=0;
            }else{
                    $v=1;
            }   

        }

        $sql = "UPDATE seats SET act = '$v' WHERE id='$seat'";
        mysqli_query($conn, $sql);


        }

if(isset($_GET['second_county'])){
    $second_county=$_GET['second_county'];
    $_SESSION['second_county'] = $_GET['second_county'];

}else if(isset( $_SESSION['second_county'])){
    $second_county= $_SESSION['second_county'];
}else{
    $second_county=0;
}



if(isset($_GET['page_reloader'])){
    $page_reloader=$_GET['page_reloader'];
    $_SESSION['page_reloader'] = $_GET['page_reloader'];

}else if(isset( $_SESSION['page_reloader'])){
    $page_reloader= $_SESSION['page_reloader'];
}else{
    $page_reloader=1;
}

if(isset($_GET['yidva'])){
        $sql = "UPDATE seats SET act = '2', usr_id = '1' WHERE act='3'";
        mysqli_query($conn, $sql);
}


?>