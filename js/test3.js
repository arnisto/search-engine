function showEsport(y){
    $.ajax({
        type: "POST",
        url:"themain2.php",
        data:'classe='+y,
        success: function(result) {
        $('#themain').html(result)
        }
        });

}
/*//////////////////////////////////////////////////////////////////////////*/ 

function showForum(){
    $.ajax({
        type: "POST",
        url:"study/page2.php",
        success: function(result) {
        $('#themain').html(result)
        }
        });

}