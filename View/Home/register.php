<?php $this->title = "Identification-Inscription"; ?>

<div id="registerZone" class="scrool container">

    <!-- Default form register -->
    <form method="post" class="text-center border border-light p-5" >

        <p  class="aqua h4 mb-4">Inscription</p>










      
        <!-- First-Name -->
                <input type="text" id="defaultRegisterFormFirstName" name="pseudo" value='<?= !empty($_POST['pseudo']) ? $_POST['pseudo'] : '' ?>' class="form-control mb-4 testt <?= (empty($msgErrorValidator['pseudo']) && !empty($_POST['pseudo']) ) ? 'colorBack' : 'none' ?> <?= (!empty($msgErrorValidator['pseudo'])) ? 'colorBackRed' : 'none' ?>" placeholder='Pseudo' <?php if(!empty($msgErrorValidator['pseudo']) || empty($_POST['pseudo'])) {?> autofocus <?php } ?>>

                <p class="<?= !empty($msgErrorValidator['pseudo']) ? 'dblock' : 'dnone' ?>"><?= !empty($msgErrorValidator['pseudo']) ? $msgErrorValidator['pseudo'] : '' ?></p>
            






        <!-- E-mail -->
        
        
            <input type="email" id="defaultRegisterFormEmail" name="email" value='<?= !empty($_POST['email']) ? $_POST['email'] : '' ?>' class="form-control mb-4 testt <?= (empty($msgErrorValidator['email']) && !empty($_POST['email']) ) ? 'colorBack' : 'none' ?> <?= (!empty($msgErrorValidator['email'])) ? 'colorBackRed' : 'none' ?>" placeholder='E-mail' <?php if(!empty($msgErrorValidator['email']) || empty($_POST['email'])) {?> autofocus <?php } ?>>

            <p class="<?= !empty($msgErrorValidator['email']) ? 'dblock' : 'dnone' ?>"><?= !empty($msgErrorValidator['email']) ? $msgErrorValidator['email'] : '' ?></p>
           
         
        <br>
        <!-- Password -->
        
        <input type="password" id="defaultRegisterFormPassword" name="pass" value='' class="form-control mb-4 testt" placeholder='Mot de passe' aria-describedby="defaultRegisterFormPasswordHelpBlock" <?php if(!empty($msgErrorValidator['pass']) || empty($_POST['pass'])) {?> autofocus <?php } ?>>

        <p class="<?= !empty($msgErrorValidator['pass']) ? 'dblock' : 'dnone' ?>"><?= !empty($msgErrorValidator['pass']) ? $msgErrorValidator['pass'] : '' ?></p>

        <input type="password" id="defaultRegisterFormPassword" name="pass2" value='' class="form-control mb-4 testt" placeholder="Confirmer votre mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Mot de passe: Au moins 8 caractères et 1 chiffre
        </small>
        <br/>
        
       




        <em id="errorUser">
            <?php 
           
                if($msgErrorValidator !== 0) {
                    foreach([$msgErrorValidator] as $value){
                        $trad = var_dump($msgErrorValidator);
                    echo $trad;
                }}
            ?> 
        </em>
        <?php 
        //var_dump($_SESSION['linkGoogle']);
        //if(isset($_SESSION['linkGoogle'])) { echo $_SESSION['linkGoogle'];
        //} ?>
        <?php if (!empty($_SESSION['linkGoogle'])) : ?>
            <p><?= $_SESSION['linkGoogle'] ?></p>
        <?php
            unset($_SESSION['linkGoogle']);
            endif;
        ?>

       

        <!--<br>-->
        <!-- Newsletter -->
        <!--<div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter" name="newsletter">
            <label class="custom-control-label" for="defaultRegisterFormNewsletter">Souscrire a la Newsletter afin d'etre averti des dernieres publication</label>
        </div>-->

        <!-- Sign up button -->
        <button class="btnvert btn btn-info my-4 btn-block" type="submit" name="user" value="register">Valider</button>

        <p>Deja Membre ?
            <a class='delet' href="home/connect/">Se Connecter</a>
        </p>

        <!-- Social register -->
        <p>or sign up with:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-github icon"></i></a>
        <a href='" . $client->createAuthUrl() . "'>Login Google</a>
        <!--<a href="<?php //if(isset($_SESSION['linkGoogle'])) { echo $_SESSION['linkGoogle']; } ?>">--><button class="btnvert btn my-4 bt-block" type="submit" name="user" value="registerGoogle">GOOGLE</button><!--</a>-->
        <hr>

        <!-- Terms of service -->
        <p>En cliquant sur <em>Valider</em> vous accepter les <a href="" target="_blank">Conditions Générales d'Utilisation.</a></p>

    </form>
            
    
            
</div>
