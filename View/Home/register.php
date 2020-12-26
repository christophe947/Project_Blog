<?php $this->title = "Identification-Inscription"; ?>

<div class="scrool container">

    <!-- Default form register -->
    <form class="text-center border border-light p-5" action="#!">

        <p class="aqua h4 mb-4">Inscription</p>

        <div class="form-row mb-4">
            <div class="col">
                <!-- First name -->
                <input type="text" id="defaultRegisterFormFirstName" class="form-control" placeholder="Prenom">
            </div>
            <div class="col">
                <!-- Last name -->
                <input type="text" id="defaultRegisterFormLastName" class="form-control" placeholder="Nom">
            </div>
        </div>

        <!-- E-mail -->
        <input type="email" id="defaultRegisterFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" id="defaultRegisterFormPassword" class="form-control" placeholder="Mot de passe" aria-describedby="defaultRegisterFormPasswordHelpBlock">
        <small id="defaultRegisterFormPasswordHelpBlock" class="form-text text-muted mb-4">
            Au moins 8 caractères et 1 chiffre
        </small>

        <!-- Newsletter -->
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="defaultRegisterFormNewsletter">
            <label class="custom-control-label" for="defaultRegisterFormNewsletter">Souscrire a la Newsletter afin d'etre averti des dernieres publication</label>
        </div>

        <!-- Sign up button -->
        <button class="btnvert btn btn-info my-4 btn-block" type="submit">Valider</button>

        <p>Deja Membre ?
            <a href="home/connect/">Se Connecter</a>
        </p>

        <!-- Social register -->
        <p>or sign up with:</p>

        <a href="#" class="mx-2" role="button"><i class="fab fa-facebook-f icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-twitter icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-linkedin-in icon"></i></a>
        <a href="#" class="mx-2" role="button"><i class="fab fa-github icon"></i></a>

        <hr>

        <!-- Terms of service -->
        <p>En cliquant sur <em>Valider</em> vous accepter les <a href="" target="_blank">Conditions Générales d'Utilisation.</a></p>

    </form>
<!-- Default form register -->
</div>
