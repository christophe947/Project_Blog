<?php $this->title = "Mon-Espace"; ?>

<div id="espaceZone" class="scrool container">


    <h1 id="greenTitle">Espace personnel de <?php echo ucwords($_SESSION['auth']['pseudo']) ?></h1>
    <br />
    <div class="text-center">
        <h3>Mes informations</h3>
        <hr>
        <br />
        <p>Mon Pseudo : <strong><?php echo $_SESSION['auth']['pseudo'] ?></strong><br /><br />

        Inscrit depuis : <strong><?php $date = date_create($_SESSION['auth']['created_at']);
                                       echo date_format($date,"d/m/Y H:i:s"); ?></strong><br /><br />

        Adresse E-mail utilisé : <strong><?php echo $_SESSION['auth']['email'] ?></strong><br /><br />
        <hr>
        <br /></p>
    </div>

    <a class="btnvert btn btn-info" type="" name="" value="" href="/home/updateProfil/">Modifier le profil</a>
    

    <form action ="/home/deconnection" method="post" class="text-center border border-light p-5" id="#2">
        <em>Cliquez ici afin de vous deconnecter : </em><br /><br />
        <button class="btnvert btn btn-info btn-block my-4" type="submit" name="user" value="deco">Se deconnecter</button>
    </form>
</div>