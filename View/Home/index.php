<?php $this->title = "Accueil"; ?>


<div id="flashMessage" class="container-fluid no-gutter">
  
    <?php if (!empty($_SESSION['message'])) : ?>
            <p class="<?= $_SESSION['message']['class']; ?>"><?= $_SESSION['message']['content'] ?></p>
        <?php
            unset($_SESSION['message']);
            endif;
        ?>

</div>

<div id="acceuilZone" class="container-fluid">

    <h1 id="greenTitle">Bienvenue sur l'accueil de mon nouveau blog</h1>

        
    
        
        
        

    <div  class="row rowBis">

    
        <div class="art lead offset-sm-0 col-sm-12 offset-md-1 col-md-10 offset-lg-2 col-lg-8">
            <h1>Mon Blog</h1>
            <p>
            test articleLorem ipsum dolor sit amet, consectetur adipiscing elit. Nam condimentum justo nec velit bibendum, ac fermentum nunc ultricies. Vestibulum interdum, est sed sagittis tempor, risus enim dapibus purus, vel euismod risus ex nec erat. Etiam vulputate massa orci, vel faucibus nisi ullamcorper vitae. Sed hendrerit venenatis lacus vel tincidunt. In ut mauris laoreet, bibendum diam sed, lobortis erat. Cras vulputate, arcu quis egestas bibendum, arcu nisi faucibus felis, quis gravida nisi diam at nisi. Ut cursus mauris at ipsum rutrum, et imperdiet orci commodo. Maecenas dapibus dui a sem luctus, vitae fermentum ante ultricies. Fusce vel lobortis tellus. Duis ac lacus vitae diam feugiat porta eu quis justo. Proin suscipit dapibus vestibulum. Integer fringilla tincidunt nisi, ut rhoncus sapien condimentum in. Donec eget tortor lacus. Aliquam at bibendum elit, maximus tincidunt enim.
    Nulla ante risus, pretium vitae vehicula at, interdum vel est. Nunc convallis urna neque, id lacinia massa sagittis non. Praesent vehicula ex vel facilisis faucibus. Aliquam egestas leo in ultrices viverra. Donec at risus sed nulla maximus interdum ut ac tortor. Maecenas lacinia id ipsum euismod malesuada. Quisque vitae metus vitae ipsum posuere auctor. Sed ultrices vitae eros egestas rhoncus. Mauris vehicula interdum lectus ac rutrum. Duis in ex in magna cursus commodo.
    Fusce interdum massa aliquet, fringilla justo suscipit, gravida odio. Phasellus condimentum ipsum non justo tempor, nec tincidunt mi rhoncus. Etiam vitae venenatis felis. In sodales risus varius, commodo est sed, gravida nisi. Integer accumsan diam pellentesque porttitor tempor. Donec ultricies ornare eleifend. Nam consectetur quam nec efficitur eleifend. Nullam sed euismod massa, euismod egestas sapien. Cras ac nisl nisl. Duis bibendum maximus dolor. Nam facilisis mattis nisl, non ornare odio malesuada vitae. Integer fringilla arcu eget leo fermentum luctus. Fusce molestie imperdiet laoreet. Fusce vitae convallis nunc, id rutrum nibh.
    Aenean suscipit lobortis ante,sus, pretium vitae vehicula at, interdum vel est. Nunc convallis urna neque, id lacinia massa sagittis non. Praesent vehicula ex vel facilisis faucibus. Aliquam egestas leo in ultrices viverra. Donec at risus sed nulla maximus interdum ut ac tortor. Maecenas lacinia id ipsum euismod malesuada. Quisque vitae metus vitae ipsum posuere auctor. Sed ultrices vitae eros egestas rhoncus. Mauris vehicula interdum lectus ac rutrum. Duis in ex in magna cursus commodo.
    Fusce interdum massa aliquet, fringilla justo suscipit, gravida odio. Phasellus condimentum ipsum non justo tempor, nec tincidunt mi rhoncus. Etiam vitae venenatis felis. In sodales risus varius, commodo est sed, gravida nisi. Integer accumsan diam pellentesque porttitor tempor. Donec ultricies ornare eleifend. Nam consectetur quam nec efficitur eleifend. Nullam sed euismod massa, euismod egestas sapien. Cras ac nisl nisl. Duis bibendum maximus dolor. Nam facilisis mattis nisl, non ornare odio malesuada vitae. Integer fringilla arcu eget leo fermentum luctus. Fusce molestie imperdiet laoreet. Fusce vitae convallis nunc, id rutrum nibh.
    Aenean suscipit lobortis a aliquam condimentum orci. Ut et accumsan tortor, vitae ornare sem. Aenean semper nulla sem, nec scelerisque lectus posuere ut. Fusce eget odio massa. Vestibulum pretium purus dolor, id finibus massa eleifend sit amet. Donec pretium fermentum turpis vulputate viverra. Suspendisse euismod neque odio, sit amet semper libero dignissim nec. Suspendisse non tincidunt lectus. Nunc rhoncus nibh id magna porttitor convallis. Sed gravida eleifend sodales.
    Fusce id aliquet quam, eget hendrerit metus. Phasellus orci magna, facilisis in justo quis, aliquet congue velit. Sed vel dolor sit amet justo feugiat pellentesque non vitae ipsum. Sed convallis sed purus ac semper. Nunc mattis consectetur luctus. Aenean luctus ornare sem, vel feugiat turpis. Curabitur semper, lacus sagittis fermentum posuere, arcu mi vehicula velit, nec tincidunt lacus arcu non metus. Nam sit amet magna a velit volutpat fringilla et non purus. Integer et nulla ac augue eleifend dictum. Sed tortor odio, tincidunt id interdum vitae, sodales et sapien. Fusce porttitor nec ex ac posuere. 
            </p>
        </div>
    </div> 
</div>
