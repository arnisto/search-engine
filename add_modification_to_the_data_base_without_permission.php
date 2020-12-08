<?php


include "db.php";
$Id    = $_POST['article_id'];
$new_article = $_POST['new_data'];

$sql="UPDATE les_articles 
SET 
    article_data = '$new_article'
WHERE
     article_id=".$Id ;
if($res = $conn->query($sql)){
    echo 'seccessfully updated without permission';
}else{
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}        
?>