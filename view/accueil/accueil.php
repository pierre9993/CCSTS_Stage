<script>
    $("#header-menu").remove();
</script>

<!-- Image d'accueil full screen -->
<div class="carousel-inner">
    <a href="#accueil-menu">
        <div class="carousel-item active">
            <div class="img-accueil "></div>
            <div class="carousel-caption carousel-acc">
                <img class="p-0" src="asset/logo.png" alt="Logo" style="width:100px;height:100px" />
                <h1>CCST</h1>
                <p>Consultant Canalisation Sans Tranchée</p>
                <span href="#accueil-menu" class="carousel-btn">Voir Plus</span>
                <i id="arrow-down" class="fas fa-arrow-circle-down"></i>
            </div>
        </div>
    </a>
</div>



<!-- Menu navbar de l'accueil -->
<nav id="accueil-menu" class="d-flex  flex-row align-items-center justify-content-center bg-logo">

    <a class="" href="index.php">
        <img class="" src="asset/logo.png" alt="Logo" style="width:50px;height:50px;padding:0  auto ;" />
    </a>
    <ul id="menu-head" class="align-items-center p-0 menu">
    <li class="dropdown list">
            <a href="javascript:void(0)" class="dropbtn">Accueil</a>
            <div class="dropdown-content">
                <a href="index.php">Version 1</a>
                <a href="index.php?v=2">Version 2</a>
                <a href="index.php?v=3">Version 3</a>
            </div>
        </li>
        <li class="list"><a class="" href="index.php?page=propos">Qui sommes-nous?</a></li>
        <li class="list"><a class="" href="index.php?page=realisations">Nos Réalisations</a></li>
        <li class="list"><a class="" href="index.php?page=services">Nos Services</a></li>
        <li class="list"><a class="" href="index.php?page=actualites">Nos Actualités</a></li>
        <li class="list"><a class="" href="index.php?page=contact">Contact</a></li>
        <li class="list"><a class="" href="index.php?page=recrutement">Recrutement</a></li>

    </ul>
    <div id="menu-btn" class="text-white"><i class="fas fa-bars  align-self-end mr-4"></i></div>
</nav>
            
            
            
<!-- div carousel content -->
<main id="start" class=" bg-a m-0">
    <!-- Carousel des éléments -->
    <div id="carouselAccueil" class="carousel slide m-0" style="height: 53rem;" data-ride="carouselAccueil" data-interval="false">
        <!-- Indicateur du carousel actif-->
        <ol class="carousel-indicators carousel-content-accueil">
            <li data-target="#carouselAccueil" data-slide-to="0" class="active"></li>
            <li data-target="#carouselAccueil" data-slide-to="1"></li>
            <li data-target="#carouselAccueil" data-slide-to="2"></li>
        </ol>
        <!-- Contenu du carousel -->
        <div class="carousel-inner">

            <!-- Part1 Carousel: A propos -->
            <div class="carousel-item active">
                <div class=" accueil-container">

                    <header id="titreSection" class="mt-4 mb-4 col-11 d-flex flex-row align-items-start justify-content-start p-0">
                        <h2>Qui sommes-nous ?</h2>
                    </header>
                    <p> Présentation de l'entreprise et de ce qu'elle fait Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quam eos sed officia, odit voluptatem cumque ea.
                        Nulla reprehenderit commodi qui fugiat. Voluptatem eum, necessitatibus maxime architecto nesciunt provident sit voluptatum odit.
                        Rem animi dolorum possimus, ab consequatur cum! Animi aut pariatur minus? Ea, aliquam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui explicabo ipsa perferendis. In maxime voluptas nisi asperiores quo dolorem corrupti.
                    </p>

                </div>
            </div>

            <!-- Part1 Carousel: réalisation -->
            <div class="carousel-item ">
                <div class="real-carou d-flex flex-column align-items-center">
                    <header id="titreSection" class="mt-4 mb-4 col-11 d-flex flex-row align-items-center justify-content-center p-0">
                        <h2>Ils nous ont fait confiance</h2>
                    </header>

                    <div class="l-100 real-cont-accueil d-flex flex-row justify-content-around flex-wrap mb-3">
                        <!-- affichage des réal 1 par 1-->
                        <?php
                        foreach ($reals as $real) {
                            echo '<a href="index.php?page=realisation&idReal=' . $real['real_id'] . '" class="d-real d-flex flex-column justify-content-center align-items-center ">
                <img src="' . $real['real_logo'] . '"  alt="' . $real['real_titre'] . '" />
                <h6 class=" t-real d-flex flex-row flex-wrap">' . $real['real_titre'] . '</h6>            </a> ';
                        }

                        ?>

                    </div>
                    <!-- Lien vers page réalisations  -->

                    <a href="index.php?page=realisations" class=" btn btn-primary ">Voir plus</a>
                </div>

            </div>

            <!-- Part1 Carousel: Actualité -->
            <div class="carousel-item">
                <div class="actu-accueil d-flex flex-column align-items-center">
                    <header id="titreSection" class="mt-4 mb-2  col-11 d-flex flex-row align-items-start justify-content-start p-0  ">
                        <h2>Dernières Actualités</h2>
                    </header>
                    <section class="l-100 d-flex flex-row flex-wrap align-items-center justify-content-around">
                        <!-- Affichage des actualités 1 par 1  -->
                        <?php
                        foreach ($actus as $actu) {
                            if (strlen($actu['actu_paragraphe_un']) > 103) {
                                $actu['actu_paragraphe_un'] = substr($actu['actu_paragraphe_un'], 0, 100) . '...';
                            }
                            echo
                            '<article class=" actu-artc article-a ">
                             <div class="img-actu">
                                    <img  src="' .  $actu['actu_img_un'] . '"  alt="" />
                             </div>
                             <div class="actu-content l-100 container d-flex flex-column  align-items-start justify-content-around">
                                  <div class="actu-content">
                                     <h3>' . $actu['actu_titre'] . '</h3>
                                     <p>'   . $actu['actu_paragraphe_un'] . '</p>
                                    </div>
                            <div class=" align-self-end">
                            <a class="btn-actu-accueil bg-light btn border text-dark border-dark d-flex align-items-center" href="index.php?page=actualite&idActu=' . $actu['actu_id'] . '">
                                  ... suite  <i style="height:13px;width:20px;" class="fas fa-arrow-right"></i>
                            </a>
                          </div>
                     </div>  
        </article>';
                        } ?>
                    </section>
                    <!-- lien page actualités -->
                    <a href="index.php?page=actualites" class=" btn btn-dark mt-5 ">Voir plus</a>
                </div>
            </div>

        </div>

        <!-- Controle du carousel  -->
        <a class="carousel-control-prev" href="#carouselAccueil" role="button" style="color: black;font-size:3rem;" data-slide="prev">
            <i class="fas fa-angle-left" aria-hidden="true"></i>
            <span class="sr-only">Previous</span>
        </a>
        <a class="carousel-control-next" href="#carouselAccueil" role="button" style="color: black;font-size:3rem;" data-slide="next">
            <i class="fas fa-angle-right" aria-hidden="true"></i>
            <span class="sr-only">Next</span>
        </a>
    </div>
</main>
<!-- Div régérences  -->
<section id="ref" class="d-flex flex-column align-items-center justify-content-around">
    <!-- Affichage références -->
    <div class="d-flex flex-row justify-content-around flex-wrap" style="width:80%;">
        <?php
        foreach ($references as $ref) {
            echo '
            <div class="d-flex flex-column align-items-center">
                <div class="ref">' . $ref['reference_image_un'] . '</div>
                <h4 class="position-relative t-real">' . $ref['reference_valeur'] . '</h4>
            </div>
            ';
        } ?>

    </div>

</section>

<!-- Div Accueil contact -->
<section id="contact-accueil" class="d-flex flex-column align-items-center justify-content-center">

    <header id="titreSection" class=" d-flex flex-row align-items-start justify-content-start ">
        <h2>Nous contacter :</h2>
    </header>


    <ul class="p-0 mt-3 d-flex flex-column justify-content-end align-items-center">
        <li><i class="fas fa-home"></i> 157 rue des blains 92220 Bagneux </li>
    </ul>
    <!-- Carte clickable vers google map  -->
    <div id="carte" class="m-0 border l-60">
        <a target="_blank" href="https://www.google.fr/maps/place/157+Rue+des+Blains,+92220+Bagneux/@48.7930944,2.3189995,18.25z/data=!4m5!3m4!1s0x47e67120ed4453e1:0x22f3cfba8b15fb6!8m2!3d48.7933457!4d2.3183759">
            <div></div>
        </a>
    </div>
    <a href="index.php?page=contact" class="btn btn-info mt-5">Cliquez pour nous envoyer un message</a>



</section>