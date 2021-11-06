<?php $this->title = "profile-membres"; ?>


<div id="spaceProfilAdmmin" class="container-fluid">

    <h1 id="greenTitle">Profil de <?= $arrayProfil['pseudo'] ?></h1>

    <p>le pseudo du membres est <?= $arrayProfil['pseudo'] ?></p>
    <p>l'email du membres est <?= $arrayProfil['email'] ?></p>
    <p>le status du membres est <?= $arrayProfil['status'] ?></p>
    <p>le profil du membres a été cree le <?php $date = date_create($arrayProfil['created_at']);
                                                echo date_format($date,"d/m/Y H:i:s"); ?></p>
    <p>le role du membres est <?= $arrayProfil['role'] ?> pour le modifier entré une valeur /////apres checkbox a metre en place

    <<!--form action ="/admin/viewProfilMembers" method="post">
    <input type="text" id="" name="role" value='<?= $arrayProfil['role'] ?>' class="form-control mb-4" placeholder='' autofocus >
    <input type="hidden" id="email" name="email" value="<?= $arrayProfil['email'] ?>" />
    <button class=" btnViewProfil" type="submit" name="admin" value="updateRole"><strong>modifier Role</strong></button>
    </form>-->
</p>

</div>




<form action ="/admin/memberDisplayPAge" method="post">
    <button class=" btnViewProfil" type="submit" name="admin" value="viewProfil"><strong>Retourner a l'afichage des membres</strong></button>
    </form>
