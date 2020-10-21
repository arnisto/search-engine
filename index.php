<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <meta name="description" content="This site aims to unite the power of young people around the globe to help building another amazing world">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <meta name="keywords" content="another,amazing,world,chabeb,chabet,3alim,a5ir">
        <meta name="author" content="GAIDI LAMJED"> 
        <meta name="revised" content="gaidiLamjed , 18/7/2020">
        <meta name="robots" content="index,follow,archive"> 
    <!--    <link rel="icon" href="logo/logo2.ico" type="image/x-icon">  -->
        <title >another amazing world عالم اخر</title>


        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/style_moteur_de_recherche.css" >
        <!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
	</head>
    <body >
    <!--be champ de recherche-->
   <div style="margin:5% 20%;">
        <input id="mot_de_recherche" rows="1" cols="33">search for ...</input>     
     <button  type="button" onclick="search_result_ft(document.getElementById('mot_de_recherche').value)"><i class="fas fa-search" aria-hidden="true"></i></button>
    <button onclick="add_new_article()"><i class="fas fa-plus"></i></button>
    </div>
    <div id="place_for_the_results_of_searching" style="float:left;background-color:yellow;"></div>
    <div  style="width:500px;position:fixed;top:100px;right:20px;"><h1>contenu</h1>
        <div id="contenu_article">
        ici
        </div>
    </div>
   


    </body>
    <script>
    
        
    function update_score_up(id){
			jQuery.ajax({
				url:'update_article_score.php',
				type:'post',
				data:'type=up&id='+id,
				success:function(result){
					var cur_count=jQuery('#like_dislike_loop_score_v'+id).html();
					cur_count++;
                    jQuery('#like_dislike_loop_score_v'+id).html(cur_count);
			
				}
			});
        }
        function update_score_down(id){
			jQuery.ajax({
				url:'update_article_score.php',
				type:'post',
				data:'type=down&id='+id,
				success:function(result){
					var cur_count=jQuery('#like_dislike_loop_score_v'+id).html();
					cur_count--;
                    jQuery('#like_dislike_loop_score_v'+id).html(cur_count);
			
				}
			});
        }
        function update_score_left(id){
			jQuery.ajax({
				url:'update_article_score.php',
				type:'post',
				data:'type=left&id='+id,
				success:function(result){
					var cur_count=jQuery('#like_dislike_loop_score_h'+id).html();
					cur_count++;
                    jQuery('#like_dislike_loop_score_h'+id).html(cur_count);
			
				}
			});
        }
        function update_score_right(id){
			jQuery.ajax({
				url:'update_article_score.php',
				type:'post',
				data:'type=right&id='+id,
				success:function(result){
					var cur_count=jQuery('#like_dislike_loop_score_h'+id).html();
					cur_count--;
                    jQuery('#like_dislike_loop_score_h'+id).html(cur_count);
			
				}
			});
        }
        function chow_article_data(id){
            
            $.ajax
        ({
            type: "POST",
            url: "get_main_data_article.php",
            data: 'id='+id,
            cache: false,
            success: function(data)
            {
               $("#contenu_article").html(data);
            } 
        });
        
        
        }
        function add_new_article(){
            var name = "lamjed";
            $.ajax
            ({
                type: "POST",
                url: "get_keyboard_for_adding_articles.php",
                data: 'aauteur_name='+name,
                cache: false,
                success: function(data)
                {
                $("#contenu_article").html(data);
              
                } 
            });
        
        }
        function submit_auteur_identification(){
 
           var title = $('#add_new_article_title_name').val();
           var obj = $('#add_new_article_article_obj').val();
           var author = $('#add_new_article_article_is_author_name').val();
           var permition = $('#add_new_article_auther_is_permission_for_editing_it').is(":checked");
           // $('#form_auteur_identification').hide();
            $.ajax
            ({
                type: "POST",
                url: "authentification_auteur.php",
                data: 'title='+title+'&obj='+obj+'&author='+author+'&permition='+permition,
                cache: false,
                success: function(data)
                {
                $("#contenu_article").html(data);
                } 
            });
        }
        function submit_auteur_new_article(title,obj,author,permition){
            
          var password = $('#add_new_article_password').val();
          var confirm_password = $('#add_new_article_confirm_password').val();
          var article_is_main_data = $('#add_new_article_is_data').val();
        
          var infos = 'Titre='+title+'&Obj='+obj+'&Author='+author+'&Permition='+permition+'&Password='+password+'&Data='+article_is_main_data ;
          if (password == confirm_password){
                alert(infos);
                $.ajax
                ({
                    type: "POST",
                    url: "add_new_article_to_data_base.php",
                    data: infos,
                    cache: false,
                    success: function(data)
                    {
                    $("#contenu_article").html(data);
                    } 
                });
          }
          else{
              alert('password not confirmed :(');
          }
        }
        function search_result_ft(mots_de_recherche){
          
            $.ajax
            ({
                type: "POST",
                url: "get_resultats_corresponds_to_the_search_word.php",
                data: 'mots_de_recherche='+mots_de_recherche,
                cache: false,
                success: function(data)
                {
                $("#place_for_the_results_of_searching").html(data);
                } 
            });
           
        }
       
        $("#add_new_article_auther_is_permission_for_editing_it").change(function() {
            if(this.checked) {
                $('#add_new_article_password').show();
                $('#add_new_article_confirm_password').show();
            }else{
                $('#add_new_article_password').hide();
                $('#add_new_article_confirm_password').hide();
            }
        });
        function edit_article(id){
            $.ajax
            ({
                type: "POST",
                url: "edit_article.php",
                data: 'article_id='+id,
                cache: false,
                success: function(data)
                {
                    $("#contenu_article").html(data);
                } 
            });
        }
    </script>
</html>
