<?php
//les infos d'auteur qui veut ajouter un nouveau article

echo '
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
            Fore Color: <input type="color" value="#ffffff" onchange="execCommandWithArg('."'foreColor'".',this.value);"/>
            Background: <input type="color" onchange="execCommandWithArg('."'hiliteColor'".',this.value);"/>
            <button class="btn btn-light" onclick="execCommandWithArg('."'insertImage'".',prompt('."'Enter the image URL'".','."''".'));"><i class="far fa-file-image"></i></button>
            <button class="btn btn-light" onclick="execCmd("selectAll");">Select All</button>
        </div>
        <iframe name="richTextField" rows="7" width="100%" height="350"></iframe>

        
    </div>
    <div class="form-row align-items-center">
    <div class="col-sm-3 my-1"> 
        <input id="add_new_article_title_name" class="form-control col-form-label-sm" rows="1" cols="50" placeholder="titre"></input>
    </div>
    <div class="col-sm-3 my-1"> 
        <input id="add_new_article_article_obj" class="form-control col-form-label-sm" rows="1" cols="50" placeholder="article\'s obj"></input>
    </div>
    <div class="col-sm-3 my-1"> 
        <input id="add_new_article_article_is_author_name" class="form-control col-form-label-sm" rows="1" cols="50" placeholder="your name"></input>
    </div>
    <div class="col-sm-3 my-1"> 
        <input id="add_new_article_password" type="password" class="form-control col-form-label-sm" placeholder="password"></input> 
    </div>
    <div class="col-sm-3 my-1"> 
        <input id="add_new_article_confirm_password" type="password" class="form-control col-form-label-sm" placeholder="confirm password"></input>
    </div>
    <div class="col-sm-3 my-1"> 
        <input id="add_new_article_auther_is_permission_for_editing_it" class="form-check" type="checkbox" value="1" class="form-check-input" >Permission for edit</input>
    </div>
</div>
<button type="button" onclick="submit_auteur_new_article()"  class="btn btn-primary">Submit</button>
';
?>