<?php
require_once 'init.php';
if(isset($_GET['q'])){
    $q = $_GET['q'];
    $query = $es->search([
         'body' => [
             'query' => [
                 'bool' => [
                     'should' => [
                         'match' => ['title' => $q],
                         'match' => ['body' => $q],
                         'match' => ['keywords' => $q]
                     ]
                 ]
             ]
         ]
    ]);
 
    if($query['hits']['total'] >=1){
        $results = $query['hits']['hits'];
    }
}
?>
<!DOCTYPE html>
<html>

    <head>

        <meta charset="utf-8">
        <title>search | ES</title>
        <link rel="stylesheert" href="main.css">

    </head>
    <body>
    <form action="add.php" methode="post" autocomplete="off">
        <label for="">
            Title
            <input type="text" name="title">
        </label>
        <label for="">
            Body
            <textarea name="body"  id="" c rows="8"></textarea>
        </label>
        <label for="">
            Keywords
            <input type="text" name="keywords" placeholder="comma,sperat">
        </label>
        <input type="submit" value="Add">
    </form>
        <form action="index.php" method="get" autocomplete="off">
            <label for="">
                Search for something
                <input type="text" name="q">
            </label>
            <input type="submit" value="Search">
        </form>
        <?php
        if(isset($results)){
            foreach($results as $r){
        ?>
        <div class="result">
        <a href="#<?php echo $r['_id']; ?>"><?php echo $r['_source']['title'];?></a>
        <div class="result-keywords"><?php echo $r['_source']['keywords']; ?></div>
        </div>
        <?php
        }}
        ?>
    </body>
</html>