<?php $this->title = "Identification-Connection"; ?>

<div id="connectZone" class="scrool container">

<!-- Default form login -->
    <form method="post" class="text-center border border-light p-5" id="#1">

        <p class="aqua h4 mb-4">Connexion</p>

        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" name="email" value='' class="form-control mb-4" placeholder="E-mail" autofocus>

        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" name="mdp" value=''class="form-control mb-4" placeholder="Mot de passe">

        <div class="d-flex justify-content-around">
            <div>
                <!-- Remember me -->
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="defaultLoginFormRemember">
                    <label class="custom-control-label" for="defaultLoginFormRemember">Se souvenir de moi</label>
                </div>
            </div>
            <div>
                <!-- Forgot password -->
                <a href="">Mot de passe oublié ?</a>
            </div>
        </div>
        <em id="errorUser">
        <?php 
           
           if($msgErrorValidator !== 0) {
               foreach([$msgErrorValidator] as $value){
                   $trad = var_dump($msgErrorValidator);
              echo $trad;
           }}
?> <br/> <?php
           if($errors = false) {
               foreach ($msgError as $value){
                   echo '| &nbsp' . $value . '&nbsp |';//commandes
               } 
           }else {
                   echo '';
               }
           
       ?>
       </em>
        <!-- Sign in button -->
        <button class="btnvert btn btn-info btn-block my-4" type="submit" name="user" value="connect">Se connecter</button>
    
        <!-- Register -->
        <p>Pas encore inscrit ?
        <a class='delet' href="home/register/">S'inscrire</a>
        </p>

        <!-- Social login -->
        <p>or sign in with:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-github icon"></i></a>

    </form>
<!-- Default form login -->

</div>
