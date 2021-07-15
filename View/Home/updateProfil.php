<?php $this->title = "Identification-Inscription"; ?>

<div id="registerZone" class="scrool container">

    <!-- Default form register -->
    <form method="post" class="text-center border border-light p-5" >

        <p  class="aqua h4 mb-4">Modifier mon profil</p>










      
        <!-- First-Name -->
                <input type="text" id="defaultRegisterFormFirstName" name="pseudo" value='<?= $_SESSION['auth']['pseudo'] ?>' class="form-control mb-4">

                
            






        <!-- E-mail -->
        
        
            <input type="email" id="defaultRegisterFormEmail" name="email" value='<?= $_SESSION['auth']['email'] ?>' class="form-control mb-4">

           
         
        <br>
        <!-- Password -->
        
        <input type="password" id="defaultRegisterFormPassword" name="pass" value='' class="form-control mb-4 testt" placeholder='Mot de passe qui sera uilisé' aria-describedby="defaultRegisterFormPasswordHelpBlock" >

        

        <input type="password" id="defaultRegisterFormPassword" name="pass2" value='' class="form-control mb-4 testt" placeholder="Confirmer votre mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Si vous desirez conservez certaine de vos informations il vous suffit de les réecrires 
        </small>
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
