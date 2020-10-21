<?php


include "db.php";
$Id    = $_POST['article_id'];


$sql="SELECT article_data,auteur,permission_edit,article_password FROM les_articles  WHERE article_id=".$Id ;

$res = $conn->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
if($res->num_rows > 0){
    $row = mysqli_fetch_assoc($res);
    if($row['permission_edit'] == 'true' ){
                echo "
                <input id='edit_article_password' type='password' placeholder='password'></input> </br>
                <input>data:".$row['article_data']."</input></br>
                <p></br><small><b>auteur:".$row['auteur']."</b></small></p>
                <button type='button' class='btn btn-primary' onclick='confirm_edit_and_password(".$row['article_password'].")'>Primary</button>";

            }else{
                echo 'on cours de construction';
            }
        }else{
            echo 'no data found';
        }            
?>