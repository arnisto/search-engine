
		function update_score_like(id){
			jQuery.ajax({
				url:'update_score.php',
				type:'post',
				data:'type=like&id='+id,
				success:function(result){
					var cur_count=jQuery('#like_dislike_loop_score'+id).html();
					cur_count++;
					jQuery('#like_dislike_loop_score'+id).html(cur_count);
			
				}
			});
		}	
		
		function update_score_dislike(id){
			jQuery.ajax({
				url:'update_score.php',
				type:'post',
				data:'type=dislike&id='+id,
				success:function(result){
					var cur_count=jQuery('#like_dislike_loop_score'+id).html();
					cur_count--;
					jQuery('#like_dislike_loop_score'+id).html(cur_count);
			
				}
			});
		}	
		