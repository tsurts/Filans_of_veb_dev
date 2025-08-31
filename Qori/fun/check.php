<?php 
session_start();
include("db.php");

if(isset($_GET['leave'])){
 

    $_SESSION['user'] = "guest";
    $_SESSION['mire'] = "guest";

    
    header("Location: ../index.php");
    exit();
    }
    
    
if(isset($_POST['signup'])){
        $n = $_POST['n'];
        $g = $_POST['g'];
        $pas = $_POST['pas'];

        $sql = "INSERT INTO turist (name,gmail,pass) VALUES ('$n','$g','$pas')";
        mysqli_query($conn, $sql);

         $_SESSION['user'] = "active";
         $_SESSION['mire'] = $n;

           header('Location: ../index.php');
            exit();
        }
    

if(isset($_POST['login'])){
    $g = $_POST['g'];
    $pas = $_POST['pas'];
    

     $sql = "SELECT * FROM turist WHERE gmail = '$g' ";
    
    $r = mysqli_query($conn, $sql);
    if($row = mysqli_fetch_assoc($r)){
        $change_parli=md5($row['pass']);
         
         $che_pass=md5($pas);
         if( $che_pass == $row['pass']){
             $_SESSION['user'] = "active";  
             $_SESSION['mire'] = $row['name'];

            echo '1';
             header("Location: ../index.php");
 
         }else{
 
         if($pas == $row['pass']){
             $_SESSION['user'] = "active";  
             $_SESSION['mire'] = $row['name'];

              $sql = "UPDATE turist SET pass = '$change_parli'  WHERE gmail = '$g' ";
              mysqli_query($conn, $sql);
             
              echo '2';
            
         header("Location: ../index.php");
             exit();
         } else {
            echo '3';
            header("Location: ../index.php");
           
         }
       }
     } else {
        echo '4';
        header("Location: ../index.php");
         
     }      



}else{
 
    "<script>alert('Eml not found');</script>";
    header("Location: ../index.php");
}




?>