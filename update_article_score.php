<?php


include "db.php";
$type=mysqli_real_escape_string($conn,$_POST['type']);
$id=mysqli_real_escape_string($conn,$_POST['id']);
if($type=='up'){
	$sql="update les_articles set rang_v=rang_v+1 where article_id=$id";
}else if($type=='down'){
    $sql="update les_articles set rang_v=rang_v-1 where article_id=$id";
}else if($type=='left'){
    $sql="update les_articles set rang_h=rang_h+1 where article_id=$id";
}else if($type=='right'){
    $sql="update les_articles set rang_h=rang_h-1 where article_id=$id";
}
$res=mysqli_query($conn,$sql);
             
?>