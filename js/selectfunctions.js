$(document).ready(function()
{
    $("#selectCountry").change(function()
    {
        var name=$(this).val();
        var post_name= 'country_name='+name;
        
        $.ajax
        ({
            type: "POST",
            url: "getGovernorate.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#selectGovernorate").html(data);
            } 
        });
       
    
    });
});
/*-----------------------------------------------------------------------2*/
$(document).ready(function()
{
    $("#selectGovernorate").change(function()
    {
        var governorate_name=$(this).val();
        var country_name = $('#selectCountry').val();
        var post_name= 'country_name='+country_name+'&governorate_name='+governorate_name;
        
        $.ajax
        ({
            type: "POST",
            url: "getUniversities.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#selectUniversities").html(data);
            } 
        });
       
    
    });
});
/*----------------------------------------------------------------------3*/
$(document).ready(function()
{
    $("#selectUniversities").change(function()
    {
        var university_name=$(this).val();
        var governorate_name=$('#selectGovernorate').val();
        var country_name = $('#selectCountry').val();
        var post_name= 'country_name='+country_name+'&governorate_name='+governorate_name+'&university_name='+university_name;
        
        $.ajax
        ({
            type: "POST",
            url: "getSpecialty.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#selectSpecialty").html(data);
            } 
        });
       
    
    });
});
/*-----------------------------------------------------------------------4*/
$(document).ready(function()
{
    $("#selectSpecialty").change(function()
    {
        var speciality_name=$(this).val();
        var university_name=$('#selectUniversities').val();
        var governorate_name=$('#selectGovernorate').val();
        var country_name = $('#selectCountry').val();
        var post_name= 'speciality_name='+speciality_name+'&country_name='+country_name+'&governorate_name='+governorate_name+'&university_name='+university_name;
        
        $.ajax
        ({
            type: "POST",
            url: "getClasses.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#selectClass").html(data);
            } 
        });
        
    
    });
});
/*-----------------------------------------------------------------------5*/
$(document).ready(function()
{
    $("#selectClass").change(function()
    {
        var class_name=$(this).val();
        var speciality_name=$('#selectSpecialty').val();
        var university_name=$('#selectUniversities').val();
        var governorate_name=$('#selectGovernorate').val();
        var country_name = $('#selectCountry').val();
        var post_name= 'class_name='+class_name+'&speciality_name='+speciality_name+'&country_name='+country_name+'&governorate_name='+governorate_name+'&university_name='+university_name;
 
        $.ajax
        ({
            type: "POST",
            url: "getBranchs.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#selectBranch").html(data);
            } 
        });
       
    
    });
});
/*-----------------------------------------------------------------------6*/
$(document).ready(function()
{
    $("#selectBranch").change(function()
    {
        var branche_name=$(this).val();
        var class_name=$('#selectClass').val();
        var speciality_name=$('#selectSpecialty').val();
        var university_name=$('#selectUniversities').val();
        var governorate_name=$('#selectGovernorate').val();
        var country_name = $('#selectCountry').val();
        var post_name= 'branche_name='+branche_name+'&class_name='+class_name+'&speciality_name='+speciality_name+'&country_name='+country_name+'&governorate_name='+governorate_name+'&university_name='+university_name;       
        $.ajax
        ({
            type: "POST",
            url: "getChapters.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#selectChapter").html(data);
            } 
        });
       
    
    });
});
/*-----------------------------------------------------------------------7*/
$(document).ready(function()
{
    $("#selectChapter").change(function()
    {
        var chapter_name=$(this).val();
        var branche_name=$('#selectBranch').val();
        var class_name=$('#selectClass').val();
        var speciality_name=$('#selectSpecialty').val();
        var university_name=$('#selectUniversities').val();
        var governorate_name=$('#selectGovernorate').val();
        var country_name = $('#selectCountry').val();
        var post_name= 'chapter_name='+chapter_name+'&branche_name='+branche_name+'&class_name='+class_name+'&speciality_name='+speciality_name+'&country_name='+country_name+'&governorate_name='+governorate_name+'&university_name='+university_name;
        
        $.ajax
        ({
            type: "POST",
            url: "getType.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#selectType").html(data);
            } 
        });
        $.ajax
        ({
            type: "POST",
            url: "getDocumentByCountry.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#listOfDocument").html(data);
            } 
        });
    
    });
});
/*-----------------------------------------------------------------------*/
$(document).ready(function()
{
    $("#selectType").change(function()
    {
        var chapter_type=$(this).val();
        var chapter_name=$('#selectChapter').val();
        var branche_name=$('#selectBranch').val();
        var class_name=$('#selectClass').val();
        var speciality_name=$('#selectSpecialty').val();
        var university_name=$('#selectUniversities').val();
        var governorate_name=$('#selectGovernorate').val();
        var country_name = $('#selectCountry').val();
        var post_name = 'branche_name='+branche_name+'&class_name='+class_name+'&speciality_name='+speciality_name+'&country_name='+country_name+'&governorate_name='+governorate_name+'&university_name='+university_name+'&chapter_type='+chapter_type+'&chapter_name='+chapter_name;
        
       
        $.ajax
        ({
            type: "POST",
            url: "getDocumentByCountry.php",
            data: post_name,
            cache: false,
            success: function(data)
            {
               $("#listOfDocument").html(data);
            } 
        });
    
    });
});
/*-----------------------------------------------------------------------*/
/*--------------------------------------------------------------------------*/
