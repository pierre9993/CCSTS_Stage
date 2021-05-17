<div id="carousel" class="carousel slide" data-ride="carousel">
    <!-- The slideshow -->
    <div class="carousel-inner">
        <div class="carousel-item active">
            <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago" />
            <div class="carousel-caption">
                <h1>Actualité</h1>
                <p></p>
            </div>
        </div>
    </div>
</div>
<!--  Div actualité -->
<section  class="l-100 d-flex flex-column align-items-center justify-content-around ">

    <article class=" shadow  d-flex flex-row border bg-light pb-4 mb-5 mt-5">
        <div class="actu-container container d-flex flex-column flex-shrink align-items-center justify-content-around ">
            <div class="l-100 d-flex flex-column align-items-center mb-4">
                <h3> <?= $actu['actu_titre'] ?> </h3>
                <small>Créer le <?= $actu['actu_date_creation'] ?> par <?= $actu['actu_auteur'] ?></small>
            </div>
            <div class="l-100 d-flex flex-row align-self-start justify-content-start">
                <!-- Si il y a une image 1 affiche là  -->
                    <?php
                    if ($verif->isImage($actu['actu_img_un'])) {
                        echo '<div><img src="' . $actu['actu_img_un'] . '" class="actualite-img" /></div>';
                    }    
                     ?>
                <p class="ml-4"> <?= $actu['actu_paragraphe_un'] ?></p>
                
            </div>
            <div class="d-flex flex-column align-items-center justify-content-center mt-4">
            <!-- Si il y a une image 2 affiche là avec sa description -->
                <?php
                if ($verif->isImage($actu['actu_image_deux'])) {
                    echo '<div><img class="actualite-img mb-3" src="' . $actu['actu_image_deux'] . '" id="" /></div>
                                <p>' . $actu['actu_description_image_deux'] . '</p>';
                }     ?>

            </div>
            <div class="l-100 d-flex flex-row align-items-start justify-content-between">

                <p><?= $actu['actu_paragraphe_deux'] ?></p>
                <!-- Si il y a une image 3 affiche là  -->
                <?php
                if ($verif->isImage($actu['actu_image_trois'])) {
                    echo '<div><img class="actualite-img" src="' . $actu['actu_image_trois'] . '" id="" /></div>';
                }     ?>

            </div>
        </div>
    </article>
</section>