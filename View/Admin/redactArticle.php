<?php $this->title = "Redaction d'Article"; ?>

<div id="spaceArticleAdmmin" class="container-fluid">

    <h1 id="greenTitle">Bienvenue Jean Forteroch sur votre page de redaction d'articles</h1>


    <form action ="" method="post">

    <p>Titre : <input type="text" name="title" /></p>
    <label for="textAreaField">Ecrivez voter article dans le champ</label> 
        <textarea type="text" name="textArea"></textarea>
        <button class=" btnViewProfil" type="submit" name="admin" value="postArticle"><strong>poster</strong></button>
    </form>


    <form action ="/admin/personnalSpaceAdmin" method="post">
    <button class=" btnViewProfil" type="submit" name="admin" value=""><strong>retourner a mon espace adminisrateur</strong></button>
    </form>

</div>
