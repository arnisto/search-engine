<?php
if(isset($_POST['title']) && isset($_POST['obj']) && isset($_POST['author']) && isset($_POST['permition'])){
     $title = $_POST['title'];
     $obj = $_POST['obj'];
     $author = $_POST['author'];
     $permition = $_POST['permition'];
     
    echo '

    
    <div class="form-group">
    <label for="add_new_article_is_data">Example textarea</label>
    <textarea class="form-control" id="add_new_article_is_data" rows="3"></textarea>
  </div>
';
}else{
    echo 'ca ne marche pas';
}
?>