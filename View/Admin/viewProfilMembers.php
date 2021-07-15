<?php $this->title = "profile-membres"; ?>


<div id="spaceProfilAdmmin" class="container-fluid">

    <h1 id="greenTitle">Profil de <?= $arrayProfil['pseudo'] ?></h1>

    <p>le pseudo du membres est <?= $arrayProfil['pseudo'] ?></p>
    <p>l'email du membres est <?= $arrayProfil['email'] ?></p>
    <p>le status du membres est <?= $arrayProfil['status'] ?></p>
    <p>le profil du membres a été cree le <?= $arrayProfil['created_at'] ?></p>
    <p>le role du membres est <?= $arrayProfil['role'] ?></p>

</div>
