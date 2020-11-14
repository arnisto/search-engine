<?php
        //connection au base de donne locale
        include "db.php";
   
        // afichage des donnees
        if(isset( $_POST['mots_de_recherche'])){
        $mots_de_recherche = $_POST['mots_de_recherche'];
        $sql = 'SELECT titre,article_id,rang_v,rang_h,article_obj FROM les_articles  WHERE  concat(titre,article_data)  LIKE "%'.$mots_de_recherche.'%" order by rang_v DESC,rang_h DESC' ;
        //$sql = 'SELECT * FROM les_articles order by rang_v DESC';
        $res = $conn->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
        if($res->num_rows > 0){
            
            while($row = mysqli_fetch_assoc($res)){
            echo "<div id='results_of_the_search_id'  class='border-left' ><h3>".$row['titre']."</h3><small>".$row['article_obj']."</small>
            </br>
            <button class='boutton_search_results' onclick='update_score_up(".$row["article_id"].")'><i class='fas fa-angle-up'></i></button>
            <small  id='like_dislike_loop_score_v".$row["article_id"]."'>".$row['rang_v']."</small>
            <button class='boutton_search_results' onclick='update_score_down(".$row["article_id"].")'><i class='fas fa-angle-down'></i></button>
            <button class='boutton_search_results' onclick='update_score_left(".$row["article_id"].")'><i class='fas fa-angle-left'></i></button>
            <small id='like_dislike_loop_score_h".$row["article_id"]."'>".$row['rang_h']."</small>
            <button class='boutton_search_results' onclick='update_score_right(".$row["article_id"].")'><i class='fas fa-angle-right'></i></button>
            <button class='boutton_search_results' id='boutton_search_results_click'  onclick='chow_article_data(".$row['article_id'].")'>click</button>
            </div>";
            }
            
        } else 
        {
            echo "no data found :(" ;
        }
    }else{
            echo "what you think ?";
        }
        //$sql = 'SELECT * FROM les_articles';
        //$res = $conn->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
       

    ?>