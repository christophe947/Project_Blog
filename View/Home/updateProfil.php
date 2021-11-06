<?php $this->title = "Identification-Inscription"; ?>

<div id="registerZone" class="scrool container">

    <!-- Default form register -->
    <form method="post" class="text-center border border-light p-5" >

        <p  class="aqua h4 mb-4">Modifier mon profil</p>










      
        <!-- First-Name -->
                <input type="text" id="defaultRegisterFormFirstName" name="pseudo" value='<?= !empty($_POST['pseudo']) ? $_POST['pseudo'] :  $_SESSION['auth']['pseudo'] ?>' class="form-control mb-4 testt <?= (empty($msgErrorValidator['pseudo']) && !empty($_POST['pseudo']) ) ? 'colorBack' : 'none' ?> <?= (!empty($msgErrorValidator['pseudo'])) ? 'colorBackRed' : 'none' ?>" placeholder="Pseudo" <?php if(!empty($msgErrorValidator['pseudo']) || empty($_POST['pseudo'])) {?> autofocus <?php } ?>>
                <p class="<?= !empty($msgErrorValidator['pseudo']) ? 'dblock' : 'dnone' ?>"><?= !empty($msgErrorValidator['pseudo']) ? $msgErrorValidator['pseudo'] : '' ?></p>
                
            






        <!-- E-mail -->
        
        
            <input type="email" id="defaultRegisterFormEmail" name="email" value='<?= !empty($_POST['email']) ? $_POST['email'] : $_SESSION['auth']['email'] ?>' class="form-control mb-4 testt <?= (empty($msgErrorValidator['email']) && !empty($_POST['email']) ) ? 'colorBack' : 'none' ?> <?= (!empty($msgErrorValidator['email'])) ? 'colorBackRed' : 'none' ?>" placeholder="E-mail" <?php if(!empty($msgErrorValidator['email']) || empty($_POST['email'])) {?> autofocus <?php } ?>>
            <p class="<?= !empty($msgErrorValidator['email']) ? 'dblock' : 'dnone' ?>"><?= !empty($msgErrorValidator['email']) ? $msgErrorValidator['email'] : '' ?></p>
           
         
        <br>
        <!-- Password -->
        
        <input type="password" id="defaultRegisterFormPassword" name="pass" value='' class="form-control mb-4 testt" placeholder="Tapez votre mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock" >
        <p class="<?= !empty($msgErrorValidator['pass']) ? 'dblock' : 'dnone' ?>"><?= !empty($msgErrorValidator['pass']) ? $msgErrorValidator['pass'] : '' ?></p>
        

        <!--<input type="password" id="defaultRegisterFormPassword" name="pass2" value='' class="form-control mb-4 testt" placeholder="Confirmer votre mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">-->
        
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Obligatoire.
        </small>
        <br/>


        <input type="password" id="defaultRegisterFormPassword" name="pass3" value='' class="form-control mb-4 testt" placeholder="Nouveau mot de passe (facultatif)" aria-describedby="defaultRegisterFormPasswordHelpBlock" >
        <p class="<?= !empty($msgErrorValidator['passBis']) ? 'dblock' : 'dnone' ?>"><?= !empty($msgErrorValidator['passBis']) ? $msgErrorValidator['passBis'] : '' ?></p>
        
        

        <input type="password" id="defaultRegisterFormPassword" name="pass4" value='' class="form-control mb-4 testt" placeholder="Confirmer le nouveau mot de passe (facultatif)" aria-describedby="defaultRegisterFormPasswordHelpBlock">
       
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Facultatif, à remplir si vous souhaitez modifier votre mot de passe actuel par un nouveau.
        <br/>
        
       




       

        <!--<br>-->
        <!-- Newsletter -->
        <!--<div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter" name="newsletter">
            <label class="custom-control-label" for="defaultRegisterFormNewsletter">Souscrire a la Newsletter afin d'etre averti des dernieres publication</label>
        </div>-->

        <!-- Sign up button -->
        <button class="btnvert btn btn-info my-4 btn-block" type="submit" name="user" value="update">Valider</button>

        <p>Deja Membre ?
            <a class='delet' href="home/connect/">Se Connecter</a>
        </p>

        <!-- Social register -->
        <p>or sign up with:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-github icon"></i></a>

        <hr>


        

        <em id="errorUser">
            <?php 
           
                if($msgErrorValidator !== 0) {
                    foreach([$msgErrorValidator] as $value){
                        $trad = var_dump($msgErrorValidator);
                    echo $trad;
                }}
            ?> 
        </em>
        
        <!-- Terms of service -->
        <p>En cliquant sur <em>Valider</em> vous accepter les <a href="" target="_blank">Conditions Générales d'Utilisation.</a></p>

    </form>
            
    
            
</div>
