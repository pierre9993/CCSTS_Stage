<!-- Image d'accueil full screen -->
<div id="top" class="carousel-inner">
    <a href="#start">
        <div class="carousel-item active bg-acc">

            <div class="img-accueil ">
                <!--     <video autoplay muted loop class="vid-accueil" id="myVideo">
                    <source src="asset/Film.mp4" type="video/mp4">
                </video>-->
            </div>
            <div class="carousel-caption carousel-acc">
                <h1>CCST</h1>
                <p>Consultant Canalisation Sans Tranchée</p>
                <div class="pre">

                    Présentation de l'entreprise et de ce qu'elle fait Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Magni quam eos sed officia, odit voluptatem cumque ea.
                    Présentation de l'entreprise et de ce qu'elle fait Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Nulla
                </div>
                <span href="#start" class="align-self-end text-center carousel-btn">Voir Plus</span>
                <div>
                    <i id="arrow-down" class="fas fa-arrow-circle-down"></i>
                </div>
            </div>
        </div>
    </a>
</div>

<div class="d-flex flex-column align-items-center l-100">
    <div class="l-100  transi trs"></div>
    <div class="l-100  transi trs2"></div>
</div>
<!-- div carousel content -->
<main id="start" class=" bg-a m-0">
    <!-- Part1: A propos -->
    <div class=" accueil-container ">

        <header id="titreSection" class="mt-4 col-11 d-flex flex-row align-items-start justify-content-start p-0">
            <h2>Qui sommes-nous ?</h2>
        </header>
        <p> Présentation de l'entreprise et de ce qu'elle fait Lorem ipsum dolor sit amet consectetur adipisicing elit. Magni quam eos sed officia, odit voluptatem cumque ea.
            Nulla reprehenderit commodi qui fugiat. Voluptatem eum, necessitatibus maxime architecto nesciunt provident sit voluptatum odit.
            Rem animi dolorum possimus, ab consequatur cum! Animi aut pariatur minus? Ea, aliquam! Lorem ipsum dolor sit amet consectetur adipisicing elit. Qui explicabo ipsa perferendis. In maxime voluptas nisi asperiores quo dolorem corrupti.
        </p>

        <a href="qui_Sommes-nous" class="align-self-end ">En savoir plus sur CCST <i class="fas fa-arrow-right"></i></a>
    </div>
    <div class="text-light accueil-container-actu l-100 d-flex flex-column align-items-center">

        <header id="titreSection" class="actu-acc mt-4 mb-4 col-11 d-flex flex-row align-items-end justify-content-end p-0">
            <h2>Actualités</h2>
        </header>
        <section class=" flex-wrap justify-self-center align-items-center justify-content-around">
            <!-- Affichage des actualités 1 par 1  -->
            <?php
            foreach ($actus as $actu) {
                $actu['actu_date_creation'] = explode('-', $actu['actu_date_creation']);
                $actu['actu_date_creation'] = $actu['actu_date_creation'][2] . '/' . $actu['actu_date_creation'][1] . '/' . $actu['actu_date_creation'][0];
                if (strlen($actu['actu_paragraphe_un']) > 103) {
                    $actu['actu_paragraphe_un'] = substr($actu['actu_paragraphe_un'], 0, 100) . '...';
                }
                echo
                '<article class=" actu-artc article-a ">
                             <div class="imgart">
                                    <img  src="' .  $actu['actu_img_un'] . '"  alt="" />
                             </div>
                             <div class=" l-100 container d-flex flex-column  align-items-start justify-content-start">
                                  <div class="actu-content d-flex flex-column align-items-start justify-content-start">
                                     <a href="actualite' . $actu['actu_id'] . '"><h3 class="m-0">' . $actu['actu_titre'] . '</h3></a>
                                     <div ><em>Par  ' . $actu['actu_auteur'] . ' - ' . $actu['actu_date_creation'] . '  </em>  </div>
                                     <p>'   . $actu['actu_paragraphe_un'] . '</p>
                                    </div>
                            <div class="btn-article align-self-end">
                            <a class="  btn-actu-accueil bg-light btn border text-dark border-dark d-flex  align-items-center" href="actualite-' . $actu['actu_id'] . '">
                                  ... suite  <i class="f-aw fas fa-arrow-right"></i>
                            </a>
                          </div>
                     </div>  
        </article>';
            } ?>
        </section>
        <a href="actualites" class="align-self-end ">Consultez toutes nos actualités <i class="f-aw fas fa-arrow-right"></i></a>
    </div>

</main>

<div class="d-flex flex-column align-items-center l-100">
    <div class="l-100  transi2 trs-2"></div>
    <div class="l-100  transi2 trs2-2"></div>
</div>
<!-- Div régérences réalisations -->
<section id="ref" class="d-flex flex-column align-items-center justify-content-around">


    <div class="l-100 real-carou d-flex flex-column align-items-center">
        <header id="titreSection" class="mt-4 mb-4 col-11 d-flex flex-row align-items-center justify-content-center align-self-start p-0">
            <h2>Réalisations</h2>
        </header>

        <div class="l-81 real-cont-accueil d-flex flex-row justify-content-around flex-wrap mb-3">
            <!-- affichage des réal 1 par 1-->
            <?php
            foreach ($reals as $real) {
                echo '<a href="realisation-' . $real['real_id'] . '" class="d-real d-flex flex-column justify-content-center align-items-center ">
                <img src="' . $real['real_logo'] . '"  alt="' . $real['real_titre'] . '" />
                <h6 class=" t-real d-flex flex-row flex-wrap">' . $real['real_titre'] . '</h6>            </a> ';
            }
            ?>

        </div>
        <!-- Lien vers page réalisations  -->
        <a href="realisations" class="align-self-end lien-accueil">Consultez toutes nos réalisations <i class="f-aw fas fa-arrow-right"></i></a>

    </div>
</section>
<!-- Div Accueil contact -->
<section id="contact-accueil" class="l-100 d-flex flex-column align-items-center justify-content-center">

    <header id="titreSection" class="l-81 d-flex flex-row align-items-start justify-content-end ">
        <h2>Contact </h2>
    </header>
    <div class="l-81  align-items-center justify-content-between align-self-center">


        <div id="mapid"></div>

        <script>
            var mymap = L.map('mapid').setView([48.793100150131615, 2.319569114759332], 17);
            var marker = L.marker([48.79307798300197, 2.318318892811493]).addTo(mymap);
            marker.bindPopup("<b class='map-popup-titre'>CCST</b><br>157 rue des blains 92220 Bagneux.").openPopup();
            L.tileLayer('https://api.mapbox.com/styles/v1/{id}/tiles/{z}/{x}/{y}?access_token={accessToken}', {
                attribution: 'Map data &copy; <a href="https://www.openstreetmap.org/copyright">OpenStreetMap</a> contributors, Imagery © <a href="https://www.mapbox.com/">Mapbox</a>',
                maxZoom: 18,
                id: 'mapbox/streets-v11',
                tileSize: 512,
                zoomOffset: -1,
                accessToken: 'pk.eyJ1IjoicGllcnJlOTQyMjciLCJhIjoiY2tudTFoYnViMDhpaDJ3cm1ycWVpNXl5diJ9.qxL85NwnsnF_ppsOpGWfPg'
            }).addTo(mymap);
        </script>


    <ul class="l-50 p-0  d-flex flex-column align-self-start justify-content-start align-items-end align-self-center ">
        <li> 157 rue des blains 92220 Bagneux <i class="fas fa-home"></i></li>
        <li>n.proisy@ccst.fr <i class="far fa-envelope"></i> </li>
        <li> 01 46 48 34 23 <i class="fas fa-phone-alt"></i></li>
    </ul>


    </div>
    <a href="contact" class="align-self-end lien-accueil">Nous envoyer un message <i class="f-aw fas fa-arrow-right"></i></a>
</section>