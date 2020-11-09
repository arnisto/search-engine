<?php


include "db.php";
$Id    = $_POST['article_id'];


$sql="SELECT article_id,article_data,auteur,permission_edit,article_password FROM les_articles  WHERE article_id=".$Id ;

$res = $conn->query($sql) or die('Erreur SQL !<br>'.$sql.'<br>'.mysql_error());
if($res->num_rows > 0){
    $row = mysqli_fetch_assoc($res);
    if($row['article_data']){
        $message2 = $row['article_data'];
    }else{
        $message2 = 'no data';
    }
   
        
                $message1 = '
                <div onload="enableEditMode();">
        <div >
            <button class="btn btn-light" onclick="execCmd('."'bold'".');"><i class="fa fa-bold"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'italic'".');"><i class="fa fa-italic"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'underline'".');"><i class="fa fa-underline"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'strikeThrough'".');"><i class="fa fa-strikethrough"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'justifyLeft'".');"><i class="fa fa-align-left"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'justifyCenter'".');"><i class="fa fa-align-center"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'justifyRight'".');"><i class="fa fa-align-right"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'justifyFull'".');"><i class="fa fa-align-justify"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'cut'".');"><i class="fa fa-cut"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'copy'".');"><i class="fa fa-copy"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'indent'".');"><i class="fa fa-indent"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'outdent'".');"><i class="fa fa-dedent"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'subscript'".');"><i class="fa fa-subscript"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'superscript'".');"><i class="fa fa-superscript"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'undo'".');"><i class="fa fa-undo"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'redo'".');"><i class="fa fa-repeat"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'insertUnorderedList'".');"><i class="fa fa-list-ul"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'insertOrderedList'".');"><i class="fa fa-list-ol"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'insertParagraph'".');"><i class="fa fa-paragraph"></i></button>
            <select style="padding:8px;border-radius: 5px;" onchange="execCommandWithArg('."'formatBlock'".',this.value);" >
                <option value="H1">H1</option>
                <option value="H2">H2</option>
                <option value="H3">H3</option>
                <option value="H4">H4</option>
                <option value="H5">H5</option>
                <option value="H6">H6</option>
            </select>
            <button class="btn btn-light" onclick="execCmd('."'insertHorizontalRule'".');">HR</button>
            <button class="btn btn-light" onclick="execCommandWithArg('."'createLink'".',prompt('."'Enter a URL'".','."'http://'".'));"><i class="fa fa-link"></i></button>
            <button class="btn btn-light" onclick="execCmd('."'unlink'".');"><i class="fa fa-unlink"></i></button>
            <button class="btn btn-light" onclick="toggleSource();"><i class="fa fa-code"></i></button>
            <button class="btn btn-light" onclick="toggleEdit();">Toggle Edit</button>
        
            <select style="margin:2px;padding:8px;border-radius: 5px;" onchange="execCommandWithArg('."'fontName'".',this.value);">
                <option value='."'Arial'".'>Arial</option>
                <option value="Comic Sans MS">Comic Sans MS</option>
                <option value="Courier">Courier</option>
                <option value="Georgia">Georgia</option>
                <option value="Tahoma">Tahoma</option>
                <option value="Times New Roman">Times New Roman</option>
                <option value="Verdana">Verdana</option>
            </select>
            <select style="padding:8px;border-radius: 5px;" onchange="execCommandWithArg('."'fontSize'".',this.value);">
                <option value="1">1</option>
                <option value="2">2</option>
                <option value="3">3</option>
                <option value="4">4</option>
                <option value="5">5</option>
                <option value="6">6</option>
                <option value="7">7</option>
            </select>
            Fore Color: <input type="color" onchange="execCommandWithArg('."'foreColor'".',this.value);"/>
            Background: <input type="color" onchange="execCommandWithArg('."'hiliteColor'".',this.value);"/>
            <button class="btn btn-light" onclick="execCommandWithArg('."'insertImage'".',prompt('."'Enter the image URL'".','."''".'));"><i class="far fa-file-image"></i></button>
            <button class="btn btn-light" onclick="execCmd("selectAll");">Select All</button>
        </div>
        <iframe id="edit_article_new_data_to_add_it_2" name="richTextField" rows="7" width="100%" height="350" ></iframe>
      
        
    </div>
    <p></br><small><b>auteur:'.$row['auteur'].'</b></small></p>  
               ';
                if($row['permission_edit'] == 'false' ){
                    $message1 =$message1 . ' 
                    <div class="row">
                    <button type="button" style="margin:2%;" class="btn btn-primary btn-sm" onclick="confirm_edit_and_password('.'\''.$row['article_password'].'\''.','.$row['article_id'].')">Sub</button>
                     </br>
                    </br>
                    <input id="edit_article_password_verification" class="form-control col-form-label-sm col-md-3" type="password" placeholder="password"></input>
                    </div>';
            }else{
                $message1 =$message1 . '
                <button type="button" class="btn btn-primary btn-sm" onclick="confirm_edit_without_permission('.$row['article_id'].')">Sub</button>';

            }
        }else{
            $message1 = 'no data found';
        } 
        
        echo json_encode(
            array("data1" => $message1, 
            "data2" => $message2) );
?>