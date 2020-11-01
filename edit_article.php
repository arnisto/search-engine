<?php


include "db.php";
$Id    = $_POST['article_id'];


$sql="SELECT article_id,article_data,auteur,permission_edit,article_password FROM les_articles  WHERE article_id=".$Id ;

$res = $conn->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
if($res->num_rows > 0){
    $row = mysqli_fetch_assoc($res);
    if($row['permission_edit'] == 'false' ){
                echo "
                <input id='edit_article_password_verification' type='password' placeholder='password'></input> </br>
                <textarea id='edit_article_new_data_to_add_it_2' >data:".$row['article_data']."</textarea></br>
                <p></br><small><b>auteur:".$row['auteur']."</b></small></p>
                <button type='button' class='btn btn-primary' onclick='confirm_edit_and_password(".$row['article_password'].",".$row['article_id'].")'>Primary</button>";

            }else{
                echo "
                <textarea id='edit_article_new_data_to_add_it_without_permission' >data:".$row['article_data']."</textarea></br>
                <p></br><small><b>auteur:".$row['auteur']."</b></small></p>
                <button type='button' class='btn btn-primary' onclick='confirm_edit_without_permission(".$row['article_id'].")'>Primary</button>";

            }
        }else{
            echo 'no data found';
        }            
?>