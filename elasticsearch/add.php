<?php
require_once 'init.php';
if(!empty($_POST)){
    if(isset($_POST['title'],$_POST['body'],$_POST['keywords'])){
        $title = $_POST['title'];
        $body = $_POST['body'];
        $keywords = $_POST['keywords'];
       print_r( $title );
        $indexed = $es->index([
             'index'=> 'articles',
             'type' => 'article',
             'body' => [
                 'title' => $title,
                 'body' => $body,
                 'keywords' => $keywords
             ]
        ]);
        if($indexed){
            echo $indexed ;
        }else{
            echo '<h1>lamjed</h1>';
        }
    }else{
        print_r("not an isset");
    }
}else{
    print_r("not a post");
}
?>
