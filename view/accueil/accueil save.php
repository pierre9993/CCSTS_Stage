
    <style>
        .d-presentation {
            transition: transform 200ms ease, box-shadow 200ms ease;
            
        }

        .d-presentation:hover {
            transform: scale(1.05);
            box-shadow: 0px 4px 7px #8a8a8a;
        }
    </style>


    <div id="one"></div>

    <style>
        .carousel-item>img {
            width: 100%;
            height: 637px;
        }
    </style>

    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- Indicators -->
      

        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2F4kSiOnEstChanceux.jpg?v=1615546728835" />
                <div class="carousel-caption">
                    <h1>CCST</h1>
                    <p>Consultant Canalisation sans tranchée</p>
                </div>
            </div>
            
        </div>
    </div>

    <main class="d-flex flex-column align-items-center bg-a m-0">
        
        <header id="titreSection" class="mt-5 mb-5 col-11 d-flex flex-row align-items-start justify-content-start">
            
            <h1 style="font-size:4rem ">Qui sommes-nous ?</h1>
            
        </header>
        <article class="l-80 d-presentation article-a d-flex flex-row border mt-3 mb-4 bg-light">

            <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fentre.jpg?v=1615562260169" style="width: 200px; height: 200px;" alt="" />
            <div class="container d-flex flex-column flex-shrink flex-wrap align-items-end justify-content-around">
                <div>
                    <h3>TITRE</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum,
                        laudantium?Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Consequuntur quia neque quod natus dolores. Eos.
                    </p>
                </div>
                <div class="mb-3">
                    <a href="index.php?page=propos" class=" btn border bg-info text-light">
                        Lire la suite <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </article>

        <article class="l-80 d-presentation article-a d-flex flex-row border mb-3 mt-4 bg-light">
            <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fsalle-de-reunion.jpg?v=1615562409053" style="width: 200px; height: 200px;" alt="" />
            <div class="container d-flex flex-column flex-shrink flex-wrap align-items-end justify-content-around">
                <div>
                    <h3>TITRE</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum,
                        laudantium?Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Consequuntur quia neque quod natus dolores. Eos.
                    </p>
                </div>
                <div class="mb-3">
                <a href="index.php?page=propos" class=" btn border bg-info text-light">
                        Lire la suite <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </article>

        <article class="l-80 d-presentation  article-a d-flex flex-row border mb-5 mt-4 bg-light">
            <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fofice.jpg?v=1615562465900" style="width: 200px; height: 200px;" alt="" />
            <div class="container d-flex flex-column flex-shrink flex-wrap align-items-end justify-content-around">
                <div>
                    <h3>TITRE</h3>
                    <p>
                        Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsum,
                        laudantium?Lorem ipsum dolor sit amet consectetur adipisicing
                        elit. Consequuntur quia neque quod natus dolores. Eos.
                    </p>
                </div>
                <div class="mb-3">
                <a href="index.php?page=propos" class=" btn border bg-info text-light">
                        Lire la suite <i class="fas fa-arrow-right"></i>
                    </a>
                </div>
            </div>
        </article>
    </main>

    <section class="border l-100 d-flex flex-column p-2 align-items-center justify-content-around">
        <header class="titreSection mt-4 mb-3 col-11 d-flex flex-row align-self-center align-items-center justify-content-around">
            <span></span>
            <h1 style="font-size:3rem ">Réalisations</h1>
            <span></span>
        </header>

        <div class="d-flex flex-row justify-content-around flex-wrap mb-3" style="width:85%;">
            <?php
            foreach ($reals as $real) {
                echo '<div class="d-real d-flex flex-column align-items-center ">
                <img src="' . $real['real_logo'] . '" style="width: 200px; height: 200;" alt="' . $real['real_titre'] . '" />
                <h6 class="position-relative t-real">' . $real['real_titre'] . '</h6>
            </div>
            
            ';
            }

            ?>

        </div>
    </section>

    <section id="actu" class="l-100 d-flex m flex-column align-items-center justify-content-around">
        <header class="titreSection mt-4 mb-3 col-11 d-flex flex-row align-items-center justify-content-around">
            <span></span>
            <h1 style="font-size:3rem ">Actualités</h1>
            <span></span>
        </header>
        <?php
        $compteur = 0;
        foreach ($actus as $actu) {
            echo
            '<article class="shadow article-a d-flex flex-row border mt-4  mb-3 bg-light ">';
            if (($compteur % 2) === 0) {
                echo ' <img src="' .  $actu['actu_img_un'] . '" style="width: 200px; height: 200px;" alt="" />';
            } 
            echo ' <div class="l-100 container d-flex flex-column flex-shrink flex-wrap align-items-start justify-content-around">
                            <div>
                                     <h3>' . $actu['actu_titre'] . '</h3>
                                     <p>'   . $actu['actu_paragraphe_un'] .'</p>
                                </div>
                         <div class="mb-3 align-self-end">
                              <a class=" btn border bg-info text-light" href="index.php?page=actualite&idActu=' . $actu['actu_id'] . '">
                                    Lire la suite <i class="fas fa-arrow-right"></i>
                              </a>
                          </div>
                     </div>';
                     
            if (($compteur % 2) === 1) {
                echo ' <img src="' .  $actu['actu_img_un'] . '" style="width: 200px; height: 200px;" alt="" />';
            }
            
            echo '    
        </article>';
            $compteur++;
        } ?>
        <a href="index.php?page=actualites" class="btn btn-primary mb-5">Voir plus</a>
    </section>

    <section id="ref" class="d-flex flex-column p-2 align-items-center justify-content-around">
        <header class="titreSection mt-4 mb-3 col-11 d-flex flex-row align-items-center justify-content-around">
            <span></span>
            <h1 style="font-size:3rem ">Références</h1>
            <span></span>
        </header>
        <div class="d-flex flex-row justify-content-around flex-wrap" style="width:90%;">
        <?php 
foreach($references as $ref){
echo'
            <a class="d-flex flex-column align-items-center">
                <img src="'.$ref['reference_image_un'].'" style="width: 200px; height: 200;" alt="" />
                <h4 class="position-relative t-real">'.$ref['reference_valeur'].'</h4>
            </a>
            ';}?>
         <!--   <a class="d-flex flex-column align-items-center">
                <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fr%C3%A9f%C3%A9rence1.jpg?v=1615559106819" style="width: 200px; height: 200;" alt="" />
                <h4 class="position-relative t-real">Depuis 2004</h4>
            </a>
            <a class="d-flex flex-column align-items-center">
                <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fr%C3%A9f%C3%A9rence2.jpg?v=1615559111178" style="width: 200px; height: 200;" alt="" />
                <h4 class="position-relative t-real">X chantiers finis</h4>
            </a>
            <a class="d-flex flex-column align-items-center">
                <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fr%C3%A9f%C3%A9rence3.jpg?v=1615559115180" style="width: 200px; height: 200;" alt="" />
                <h4 class="position-relative t-real">X Colaborations</h4>
            </a>
            <a class="d-flex flex-column align-items-center">
                <img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fr%C3%A9f%C3%A9rence4.jpg?v=1615559120968" style="width: 200px; height: 200;" alt="" />
                <h4 class="position-relative t-real">X heures de travail</h4>
            </a>-->
        </div>
    </section>
    <div id="two"></div>

</body>

</html>