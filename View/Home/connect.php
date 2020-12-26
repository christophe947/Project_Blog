<?php $this->title = "Identification-Connection"; ?>

<div class="scrool container">
<!-- Default form login -->
    <form class="text-center border border-light p-5" id="#1" action="#!">

        <p class="aqua h4 mb-4">Connexion</p>

        <!-- Email -->
        <input type="email" id="defaultLoginFormEmail" class="form-control mb-4" placeholder="E-mail">

        <!-- Password -->
        <input type="password" id="defaultLoginFormPassword" class="form-control mb-4" placeholder="Mot de passe">

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

        <!-- Sign in button -->
        <button class="btnvert btn btn-info btn-block my-4" type="submit">Se connecter</button>

        <!-- Register -->
        <p>Pas encore inscrit ?
        <a href="home/register/">S'inscrire</a>
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
