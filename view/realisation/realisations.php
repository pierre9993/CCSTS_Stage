      <!-- Image top -->
      <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago">
              <div class="carousel-caption">
                  <h1>Nos Réalisations </h1>
                  <p>Retrouvé nos différents réalisations ici !</p>
              </div>
          </div>
      </div>


      <!-- réalisations -->
      <section class=" d-flex flex-column align-items-center justify-content-center mf">
      <a href="index.php?page=realisationsv2" class="mt-3 btn btn-primary">Voir v2</a>
          <div class="nav-real l-81  mb-4 mt-5 ">

              <div class="l-81 d-flex flex-row align-items-center flex-wrap justify-content-start ">
                  <p class="btn border mb-0">Rechercher par thême :</p>
                  <!-- Bouton de séléction du theme des réals à afficher -->
                  <?php
                    if (isset($_GET['themeReal'])) {
                        echo ' <div class="ml-4 mb-3 mt-3"> <a href="Realisations" class="btn btn-primary">Tout</a> </div>';
                    }
                    ?>
                  <div class="ml-4 mb-3 mt-3"> <a href="Realisations-environnement" class="btn btn-primary">environnement</a> </div>
                  <div class="ml-4 mb-3 mt-3"> <a href="Realisations-eau" class="btn btn-primary">Eau</a> </div>
                  <div class="ml-4 mb-3 mt-3"> <a href="Realisations-canalisation" class="btn btn-primary">Canalisation</a> </div>
              </div>
              
              <div>
              <?php
                //créer la pagination
                if (isset($_GET['themeReal'])) {
                AdminController::pagination($countreals[0],10, 'pageReal', "realisations".$_GET['themeReal']);
                }
                else{   
                AdminController::pagination($countreals[0],10, 'pageReal', "realisations");
                }
                ?>
                </div>
          </div>

          <div id="real-div" class="d-flex flex-row align-items-start justify-content-center flex-wrap l-81">
              <?php
                //Affiche toutes les réalisations avec quelques informations correspondantes
                foreach ($reals as $real) {
                    echo '<div class="card real-card p-0">
                <img class="card-real-img card-real-img" src="' . $real['real_logo'] . '" alt="Card image">
                <div class="card-body">
                <h4 class="card-title">' . $real['real_titre'] . '</h4>
                <p class="card-text">' . strlen($real['real_titre']) . ' ' . $real['real_paragraphe_un'] . '</p>
                <a href="Realisation-' . $real['real_id'] . '" class="btn btn-primary">Voir Plus</a>
                </div></div>
            ';
                }
                ?>
          </div>
          <?php
            //créer la pagination
            AdminController::pagination($countreals[0],10, 'pageReal', "realisations");
            ?>
      </section>

      </body>

      </html>