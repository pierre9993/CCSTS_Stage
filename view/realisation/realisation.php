

<body class="d-flex flex-column bg-a ">
    <div id="one"></div>


      <!-- Image Top -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago">
                <div class="carousel-caption">
                    <h1>Réalisation</h1>
                </div>
            </div>
        </div>
    </div>

    <section class="bg-light shadow d-flex flex-column align-self-center align-items-start p-0 justify-content-around border col-c" style="width:90%;margin-top: 4rem; margin-bottom: 10rem;border-radius: 0 0 20px 20px;border-bottom: unset;">
        <?php
        // Affichage des infos de la réalisation séléctionné
        
        echo
        '<article id="r-article" class="bg-light d-flex flex-column align-self-start align-items-center justify-content-around mt-4 mb-4" style="width:100%;">
            <div class="d-flex flex-column mb-3">
                <h1 class="mt-3 mb-1">' . $real['real_titre'] . '</h1>
                <header class="align-self-center mt-4 mb-4">
                    <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fresized-image-Promo.jpeg?v=1615280092029" style="width: 200px; height: 200;" alt="" />
                    <i class="fas fa-handshake"></i>
                    <img src="' . $real['real_logo'] . '" style="width: 200px; height: 200;" alt="" />
                </header>
            </div>
            <div class="ml-4 mt-3 mr-4 mb-3 d-flex flex-column justify-content-center align-items-center ">
                <p class="mt-4 mb-4 text-center l-81" >' . $real['real_paragraphe_un'] .
            '</p>
                <p class="mt-4 mb-4 text-center l-81" >' . $real['real_paragraphe_deux'] . '</p>
            </div>
            <div class="mb-4 mt-4 d-flex flex-row justify-content-around align-items-center flex-wrap l-100">
                <a class="mb-2 mt-2" href="' . $real['real_img_un'] . '" target="_blank"> <img src="' . $real['real_img_un'] . '" style="width: 200px; height: 200;" alt="" /></a>
                <a class="mb-2 mt-2" href="' . $real['real_img_deux'] . '" target="_blank"> <img src="' . $real['real_img_deux'] . '" style="width: 200px; height: 200;" alt="" /></a>
                <a class="mb-2 mt-2" href="' . $real['real_img_trois'] . '" target="_blank"> <img src="' . $real['real_img_trois'] . '" style="width: 200px; height: 200;" alt="" /></a>
                <a class="mb-2 mt-2" href="' . $real['real_img_quatre'] . '" target="_blank"> <img src="' . $real['real_img_quatre'] . '" style="width: 200px; height: 200;" alt="" /></a>
                <a class="mb-2 mt-2" href="' .  $real['real_img_cinq'] . '" target="_blank"> <img src="' . $real['real_img_cinq'] . '" style="width: 200px; height: 200;" alt="" /></a>
            </div>
        </article>
        <div id="r-section" class=" pt-3 mt-3 d-flex flex-row bg-dark text-light justify-content-around" style="width: 100%;border-radius: 0 0 10px 10px;">
            <p class=""><u><strong> Date du projet</strong></u>' . ' ' . ':    du' . ' ' . $real['real_date_debut']  . ' ' . 'au' . ' ' . $real['real_date_fin'] . '</p>
            <p class=""><u><strong> Lieu des travaux</strong></u>' . ' ' . ':' . ' ' . $real['real_lieu'] . '</p>
            <p class=""><u><strong> Nature du projet</strong></u>' . ' ' . ':' . ' ' . $real['real_theme'] . '</p>
            <p class=""><u><strong> Coût des travaux</strong></u>' . ' ' . ':' . ' ' . $real['real_cout'] . ' € </p>
        </div>';
        ?>
    </section>
    <footer>
        <div id="two"></div>
    </footer>
</body>

</html>