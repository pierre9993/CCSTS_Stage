
    <div id="one"></div>
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago" />
                <div class="carousel-caption">
                    <h1>Actualités</h1>
                    <p></p>
                </div>
            </div>
        </div>
    </div>

    <!-- div Actus  -->
    <section id="actu" class="l-100 d-flex flex-column align-items-center justify-content-around mf">
    <!-- Affiche les actus-->
    <?php
    // on utilise un compteur pour que les images soit a droite/gauche une fois sur deux
        $compteur = 0;
        foreach ($actus as $actu) {
            if (strlen($actu['actu_paragraphe_un']) > 203) {
                $actu['actu_paragraphe_un'] = substr($actu['actu_paragraphe_un'], 0, 200) . '...';
            }
            echo
            '<article class="shadow article-a d-flex flex-row border mt-4  mb-3 bg-light ">';
            if (($compteur % 2) === 0) {
                echo ' <img src="' .  $actu['actu_img_un'] . '" class="img-160" alt="" />';
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
                echo ' <img src="' .  $actu['actu_img_un'] . '" class="img-160" alt="" />';
            }
            
            echo '    
        </article>';
            $compteur++;
        } 
        
        
                //créer la pagination
                AdminController::pagination($countactus[0],5, 'pageActu', "actualites");
              
        ?>

    </section>
