
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
            $actu['actu_date_creation'] = explode('-', $actu['actu_date_creation']);
            $actu['actu_date_creation'] = $actu['actu_date_creation'][2] . '/' . $actu['actu_date_creation'][1] . '/' . $actu['actu_date_creation'][0];
            echo
            '<article class="shadow actu-actu border mt-4  mb-3 bg-light ">';
            if (($compteur % 2) === 0) {
                echo ' <div><img src="' .  $actu['actu_img_un'] . '" class="img-160" alt="" /></div>';
            } 
            echo ' <div class="l-100 actu-txt container ">
                            <div class="l-81">
                                     <h3>' . $actu['actu_titre'] . '</h3>
                                     <div class="text-secondary"><em>Par  ' . $actu['actu_auteur'] . ' - ' . $actu['actu_date_creation'] . '  </em>  </div>
                                     <p>'   . $actu['actu_paragraphe_un'] .'</p>
                                </div>
                         <div class="mb-3 align-self-end btn-arts mr-3">
                              <a class=" btn border bg-info text-light " href="Actualite-' . $actu['actu_id'] . '">
                                    Lire la suite <i class="fas fa-arrow-right"></i>
                              </a>
                          </div>
                     </div>';
                     
            if (($compteur % 2) === 1) {
                echo '<div> <img src="' .  $actu['actu_img_un'] . '" class="img-160" alt="" /></div>';
            }
            
            echo '    
        </article>';
            $compteur++;
        } 
        
        
                //créer la pagination
                AdminController::pagination($countactus[0],5, 'pageActu', "actualites");
              
        ?>

    </section>
