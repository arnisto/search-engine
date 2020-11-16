<?php


include "db.php";

$Titre     = mysqli_real_escape_string($conn,$_POST['Titre']);
$Obj       = mysqli_real_escape_string($conn,$_POST['Obj']);
$Author    = mysqli_real_escape_string($conn,$_POST['Author']);
$Permition = mysqli_real_escape_string($conn,$_POST['Permition']);
$Password  = mysqli_real_escape_string($conn,$_POST['Password']);
$Data      = mysqli_real_escape_string($conn,trim($_POST['Data']));
$currentTime = $_SERVER['REQUEST_TIME'];
$test =  $_POST['Data'];
$sql="INSERT INTO `les_articles` (`article_id`, `rang_v`, `rang_h`, `titre`, `article_obj`, `article_data`, `date_creation`, `auteur`, `permission_edit`, `article_password`)
 VALUES 
 (NULL, '0', '0', '$Titre', '$Obj', '$Data', '$currentTime', '$Author', '$Permition', '$Password')";

if (mysqli_query($conn, $sql)) {
  echo $test ;
    echo "New record created successfully";

  } else {
    echo $Data ;
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);

             
?>