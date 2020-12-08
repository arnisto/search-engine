<?php


include "db.php";
$Id    = $_POST['article_id'];
$permission   = $_POST['permission'];
$password    = $_POST['password'];

if($permission == 'true'){
    $sql="UPDATE les_articles SET permission_edit = 'false' WHERE article_id=".$Id." AND article_password="."'".$password."'"."" ;
}
else{
    $sql="UPDATE les_articles SET permission_edit = 'true' WHERE article_id=".$Id." AND article_password="."'".$password."'"."" ;
}
$res = $conn->query($sql);
if($permission == 'true'){
    echo '$permission=true';
}
else{
    echo '$permission=false';
}






    ?>