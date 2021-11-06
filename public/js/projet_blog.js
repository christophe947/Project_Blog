variable = {
    monEspace: document.querySelector("#monEspaceMenu"),
    monEspaceBis: document.querySelector("#monEspaceMenuBis"),
    spaceAdmin: document.querySelector("#personnalSpaceAdmin"),
    article: document.querySelector("#articleMenu"),
    acceuil: document.querySelector("#acceuilMenu"),
    contact: document.querySelector("#contactMenu"),
    linkGoogle: document.querySelector("#clickJsGoogle a") 
    //content: document.querySelector(".rowBis"),
    //title: document.querySelector("#bienvenue")
};

if ($("#clickJsGoogle").length > 0) {
    $(function () { 
        document.getElementById("clickJsGoogle").click();
    });
}

function littleScroll() {
    window.scrollTo({
        top: 330,
        left: 0,
        behavior: "smooth",
    });
}

function myFunction() {
    myVar = setTimeout(littleScroll, 400); //apres combien commence le scroll  louverture est gerer par le css
}

// document ready cible div content de la vue qui est verifié son existnce si oui :
if ($(".scrool").length > 0) {          //decend a la vue de scrool
    $(function () {
        //alert('Le chargement du DOM est terminé');
        myFunction();
    });
}

if ($("#registerZone").length > 0) {            //action au dectage de la div
    $(function () {
        variable.monEspace.style.opacity = "0.6";
    });
}
if ($("#articleZone").length > 0) {
    $(function () {
        variable.article.style.opacity = "0.6";
    });
}
if ($("#acceuilZone").length > 0) {
    $(function () {
        variable.acceuil.style.opacity = "0.6";
    });
}
if ($("#connectZone").length > 0) {
    $(function () {
        variable.monEspace.style.opacity = "0.6";
    });
}
if ($("#contactZone").length > 0) {
    $(function () {
        variable.contact.style.opacity = "0.6";
    });
}
if ($("#espaceZone").length > 0) {
    $(function () {
        variable.monEspaceBis.style.opacity = "0.6";
    });
}
if ($("#spaceAdmin").length > 0) {
    $(function () {
        variable.spaceAdmin.style.opacity = "0.6";
    });
}

if ($("#spaceArticleAdmmin").length > 0) {
    $(function () {
        variable.spaceAdmin.style.opacity = "0.6";
    });
}

$("#deco").click(function(){
    
    alert("The paragraph was clicked.");
    session_destroy();
    //unset($_SESSION);
     header('Location: http://blog/index.php');  
  }); 

/*if ($("#deco").onclick) {
    $(function() {
        alert("moot!");
    
  });
}*/
/*
if ($(".success").length <= 0 && $(".denied").length <= 0) {            //action au non detectage dune div
    $(function () {
        variable.title.style.display = "block";
        variable.content.style.display = "block";
    });
}
*/
/*

if ($(".denied").length <= 0 ) {            //action au non detectage dune div
    $(function () {
        variable.title.style.display = "block";
        variable.content.style.display = "block";
    });
}*/