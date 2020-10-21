<?php
include "db.php";
$article_id_for_show=mysqli_real_escape_string($conn,$_POST['id']);
$sql = 'SELECT article_data,auteur FROM les_articles  WHERE article_id='.$article_id_for_show ;
$res = $conn->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
if($res->num_rows > 0){
            while($row = mysqli_fetch_assoc($res)){
                echo "
                <button type='button' class='btn btn-light' onclick='edit_article(".$article_id_for_show.")'>Edit</button>
                <h5>data:".$row['article_data']."</h5></br>
                <p></br><small><b>auteur:".$row['auteur']."</b></small></p>";

            }
        }else{
            echo 'no data found';
        }

?>