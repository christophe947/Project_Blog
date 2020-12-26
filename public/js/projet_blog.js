function alertFunc() {
    window.scrollTo({ 
        top: 330,
        left: 0,
        behavior: 'smooth'
    });
};

function myFunction() {
    myVar = setTimeout(alertFunc, 400);    //apres combien commence le scroll  louverture est gerer par le css
};

// document ready cible div content de la vue qui est verifié son existnce si oui :
if($('.scrool').length > 0) {


    $(function(){
        //alert('Le chargement du DOM est terminé');
        myFunction();
    });






}
