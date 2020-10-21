<?php
if(isset($_POST['title']) && isset($_POST['obj']) && isset($_POST['author']) && isset($_POST['permition'])){
     $title = $_POST['title'];
     $obj = $_POST['obj'];
     $author = $_POST['author'];
     $permition = $_POST['permition'];
     
    echo '

    <input id="add_new_article_password" type="password" placeholder="password"></input> </br>
    <input id="add_new_article_confirm_password" type="password" placeholder="confirm password"></input> </br>
    <div class="form-group">
    <label for="add_new_article_is_data">Example textarea</label>
    <textarea class="form-control" id="add_new_article_is_data" rows="3"></textarea>
  </div>
  <button type="button" onclick="submit_auteur_new_article('."'$title','$obj','$author','$permition'".')"  class="btn btn-primary">Submit</button>
';
}else{
    echo 'ca ne marche pas';
}
?>