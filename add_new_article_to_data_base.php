<?php


include "db.php";
$Titre     = $_POST['Titre'];
$Obj       = $_POST['Obj'];
$Author    = $_POST['Author'];
$Permition = $_POST['Permition'];
$Password  = $_POST['Password'];
$Data      = $_POST['Data'];

$sql="INSERT INTO `les_articles` (`article_id`, `rang_v`, `rang_h`, `titre`, `article_obj`, `article_data`, `date_creation`, `auteur`, `permission_edit`, `article_password`)
 VALUES 
 (NULL, '0', '0', '$Titre', '$Obj', '$Data', 'current_timestamp()', '$Author', '$Permition', '$Password')";

if (mysqli_query($conn, $sql)) {
    echo "New record created successfully";
  } else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
  }
  
  mysqli_close($conn);

             
?>