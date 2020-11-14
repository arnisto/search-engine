<!DOCTYPE html>
<html>
	<head>
        <meta charset="utf-8">
        <link rel="icon" href="img/lm.ico" type="image/x-icon">
        <meta name="viewport" content="width=device-width , initial-scale=1">
        <meta name="author" content="GAIDI LAMJED MOHANED ABID"> 
        <meta name="revised" content="gaidiLamjed mohaned abid, 18/7/2020">
        <meta name="robots" content="index,follow,archive"> 
    <!--    <link rel="icon" href="logo/logo2.ico" type="image/x-icon">  -->
        <title >IsSearchEngine</title>


        <link rel="stylesheet" href="fontawesome/css/all.css">
        <link rel="stylesheet" href="css/bootstrap.min.css" >
        <link rel="stylesheet" href="css/style_moteur_de_recherche.css" >
        
        <!--	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script> -->
        <script src="js/jquery2.js"></script>
        <script src="js/bootstrap.min.js"></script>
	</head>
    <body style="background-image: url('img/this.jpg');background-repeat: no-repeat;
  background-attachment: fixed;
  background-size: cover;">
    <!--be champ de recherche-->
    <div id="search_lamjed_gaidi" >
     
    <img src="img/searchengine.png" alt="Simply Easy Learning" width="100"
         height="50">
            
            <input id="mot_de_recherche"  rows="1" cols="28" placeholder="Search...">    
            <button  type="button" class="search_buttons" onclick="search_result_ft(document.getElementById('mot_de_recherche').value)"><i class="fas fa-search" aria-hidden="true"></i></button>
             <button class="search_buttons" onclick="add_new_article()"><i class="fas fa-plus"></i></button>
             <img src="img/by.png" alt="Simply Easy Learning" width="120"
         height="80">
         

     </div>
   
    <div id="place_for_the_results_of_searching" class="overflow-auto messages-list" style="padding:1% 1% 1% 1%;float:left;width:25%;height:100%;"></div>
    <div class="overflow-auto messages-list" id="main_place_for_the_data"  >
        <div id="contenu_article" >
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
            $.ajax
            ({
                type: "POST",
                url: "get_keyboard_for_adding_articles.php",
                cache: false,
                success: function(data)
                {
                $("#contenu_article").html(data);
                richTextField.document.designMode = "On";
                } 
            });
        
        }
       
        function submit_auteur_new_article(title,obj,author,permition){
            
          var title = $('#add_new_article_title_name').val();
          var obj = $('#add_new_article_article_obj').val();
          var author = $('#add_new_article_article_is_author_name').val();
          var permition = $('#add_new_article_auther_is_permission_for_editing_it').is(":checked");
          var password = $('#add_new_article_password').val();
          var confirm_password = $('#add_new_article_confirm_password').val();
          var article_is_main_data = richTextField.document.body.innerHTML;
        
          var infos = 'Titre='+title+'&Obj='+obj+'&Author='+author+'&Permition='+permition+'&Password='+password+'&Data='+encodeURIComponent(article_is_main_data) ;
         //alert(article_is_main_data);
           if (password == confirm_password){
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
                    var jason = JSON.parse(data);
                   $("#contenu_article").html(jason.data1) ;
                    richTextField.document.designMode = "On";
                    richTextField.document.body.innerHTML = jason.data2 ;
                        
                  
                  
                   
                    
                    
                } 
            });
        }
        function confirm_edit_and_password(password,id){
            //alert('password= '+password);
            var password_to_confirm = $('#edit_article_password_verification').val();
            var new_data_to_edit_article = richTextField.document.body.innerHTML ;
            //alert('password2= '+password_to_confirm);
            //alert('new_data= '+new_data_to_edit_article);
            if(password == password_to_confirm){
                    alert('password verified');
                    $.ajax
                ({
                    type: "POST",
                    url: "add_modification_to_the_data_base.php",
                    data: 'article_id='+id+'&new_data='+encodeURIComponent(new_data_to_edit_article),
                    cache: false,
                    success: function(data)
                    {
                        alert(data);
                    } 
                });
            }else{
                alert('you can not edit this article; verifie your password');
            }

        }
        function confirm_edit_without_permission(id){
            var new_data_to_edit_article_wp = richTextField.document.body.innerHTML ;
            //alert(new_data_to_edit_article_wp);
            $.ajax
            ({
                type: "POST",
                url: "add_modification_to_the_data_base_without_permission.php",
                data: 'article_id='+id+'&new_data='+encodeURIComponent(new_data_to_edit_article_wp),
                cache: false,
                success: function(data)
                {
                    alert(data);
                } 
            });
        }
        function edit_article_is_permission(id,permission){
            var password = prompt("Enter your password");
            //alert(permission);
            $.ajax
            ({
                type: "POST",
                url: "edit_permission_value.php",
                data: 'permission='+permission+'&article_id='+id+'&password='+password,
                cache: false,
                success: function(data)
                {
                    alert(data);
                } 
            });
        }
       
  
        var showingSourceCode = false;
        var isInEditMode = true;
        
       function enableEditModelamjed(){
           //alert('lamjed gaidi');
            }
            function enableEditMode(){
                richTextField.document.designMode = "On";
                alert('ok');
            }
            function execCmd(command){
                richTextField.document.execCommand(command,false,null);
            }
            function execCommandWithArg(command, arg){
                richTextField.document.execCommand(command,false,arg);
            }
            function toggleSource(){
                if(showingSourceCode){
                     richTextField.document.body.innerHTML = richTextField.document.body.textContent;
                     showingSourceCode = false;
                }else{
                    richTextField.document.body.textContent = richTextField.document.body.innerHTML;
                     showingSourceCode = true;

                }
            }
            function toggleEdit(){
                if(isInEditMode){
                    richTextField.document.designMode = "Off";
                    isInEditMode = false;
                }else{
                    richTextField.document.designMode = "On";
                    isInEditMode = true;
                }
            }
            
        </script>
    
</html>
