<?php $this->title = "Mon-Espace"; ?>

<div id="spaceAdmin" class='container'>

<h1 id="greenTitle">Espace Administrateur</h1>
    <br />
    <?php// var_dump($members) ?>


    <form action ="/admin/memberDisplayPage" method="post">
    <button class=" btnViewProfil" type="submit" name="admin" value=""><strong>Afficher les membres</strong></button>
    </form>

    <form action ="/admin/redactArticle" method="post">
    <button class=" btnViewProfil" type="submit" name="admin" value=""><strong>Rediger un article</strong></button>
    </form>
    
    <!--<h3 class="text-center">Affichage des membres : </h3>
    <br /><br />



    <?php //foreach ($members as $member): ?> 
    <div class="row text-center">
   
    <div class="col">
    
    <strong> <.?=// $member['pseudo'] ?> </strong>
    </div>
    <div class="col">
    <em> <.?=// $member['created_at'] ?></em>
    </div>
    <div class="col">
        <form action ="/admin/viewProfilMembers" method="post">
        <input type="hidden" id="pseudo" name="pseudo" value="<.?= $member['pseudo'] ?>" />
        <input type="hidden" id="email" name="email" value="<.?= $member['email'] ?>" />
        <input type="hidden" id="status" name="status" value=" <.?= $member['status'] ?>" />
        <input type="hidden" id="created_at" name="created_at" value="<.?= $member['created_at'] ?>" />
        <input type="hidden" id="role" name="role" value=" <.?= $member['role'] ?>" />
        <input type="hidden" id="newsletter" name="newsletter" value=" <.?= $member['newsletter'] ?>" />
        

    <button class=" btnViewProfil" type="submit" name="admin" value="viewProfil"><strong>Afficher / Modifier le profil</strong></button>
    </form>
    </div>
    
  </div>
  <hr />
<?php //endforeach; ?>-->



    </div>




<br />

<form action ="/home/deconnection" method="post" class="text-center border border-light p-5" id="#2">



        <em>Cliquez ici afin de vous deconnecter : </em><br /><br />
        <button class="btnvert btn btn-info btn-block my-4" type="submit" name="user" value="deco">Se deconnecter</button>
    

<!--<button class="btn btn-info btn-block my-4" type="submit" name="user" value="deco">Se connecter</button>
<button id="deco" class="btnvert btn btn-info btn-block my-4"  name="deco" >Se deconnecter</button>-->

</form>

</div>