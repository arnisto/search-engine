<?php
//les infos d'auteur qui veut ajouter un nouveau article
echo '
<input id="add_new_article_title_name" rows="1" cols="50">titre</input></br>
<input id="add_new_article_article_obj" rows="1" cols="50">article\'s obj</input></br>
<input id="add_new_article_article_is_author_name" rows="1" cols="50">your name</input></br>
<input id="add_new_article_auther_is_permission_for_editing_it" type="checkbox" value="1" class="form-check-input" ></input></br>

<button type="button" onclick="submit_auteur_identification()"  class="btn btn-primary">Submit</button>
';
?>