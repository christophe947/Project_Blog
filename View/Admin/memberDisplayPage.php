<?php $this->title = "Mon-Espace-affichage-membres"; ?>
    
<div id="spaceAdmin" class='container'>
    <h1 id="greenTitle">Affichage des membres : </h3>
    <br /><br />


    <?php foreach ($members as $member): ?> 
    <div class="row text-center">
        <div class="col">
            <strong> <?= $member['pseudo'] ?> </strong>
        </div>
        <div class="col-3">
            <em> <?php $date = date_create($member['created_at']);
                       echo date_format($date,"d/m/Y H:i:s"); ?></em>
        </div>
        <div class="col-3">
            <form action ="/admin/viewProfilMembers" method="post">
                <input type="hidden" id="pseudo" name="pseudo" value="<?= $member['pseudo'] ?>" />
                <input type="hidden" id="email" name="email" value="<?= $member['email'] ?>" />
                <input type="hidden" id="status" name="status" value=" <?= $member['status'] ?>" />
                <input type="hidden" id="created_at" name="created_at" value="<?= $member['created_at'] ?>" />
                <input type="hidden" id="role" name="role" value=" <?= $member['role'] ?>" />
                <input type="hidden" id="newsletter" name="newsletter" value=" <?= $member['newsletter'] ?>" />
        
               <button class=" btnViewProfil" type="submit" name="admin" value="viewProfil"><strong>Afficher / Modifier le profil</strong></button>
            </form>
        </div>
        <div class="col-2">
            <p class="text-left">Role :
                <strong><?php 
                    if($member['role'] == 10) {  ?>   <em class="visitor"> visiteur <?php ;} ?></em>  <?php
                    if($member['role'] == 20) { ?>   <em class="member"> membre <?php ;} ?> </em>  <?php
                    if($member['role'] == 30) { ?>   <em class="admin"> administrateur <?php ;} ?> </em></strong></p>
        </div>
        <div class="col">
        <?php if($member['email'] !== $_SESSION['auth']['email'] && $member['role'] < $_SESSION['auth']['role'] ) {?>   <!--pas afficher button-->
            <form method="post">
                <input type="hidden" id="email" name="email" value="<?= $member['email'] ?>" />
                <input type="hidden" id="role" name="role" value=" <?= $member['role'] ?>" />

                <button class="cleanButton" type="submit" name="admin" value="up"><i class="fa fa-angle-double-up" ></i></button>
                    &nbsp &nbsp
                <button class="cleanButton" type="submit" name="admin" value="down"><i class="fa fa-angle-double-down"></i></button>
          </form>
          <?php } ?>
        </div>
        <div class="col">
            <?php if($member['role'] <> $_SESSION['auth']['role']) {?>     <!--pas afficher button-->
            <form action ="/admin/memberDisplayPage" method="post">
                <input type="hidden" id="email" name="email" value="<?= $member['email'] ?>" />
                <button class=" btnViewProfil" type="submit" name="admin" value="delete"><strong>Supprimer</strong></button>
            </form> 
            <?php } ?>
        </div>
        
      
    </div>
    <hr />
    <?php endforeach; ?>

    <form action ="/admin/personnalSpaceAdmin" method="post">
        <button class=" btnViewProfil" type="submit" name="admin" value="viewProfil"><strong>retourner a mon espace adminisrateur</strong></button>
    </form>
</div>
