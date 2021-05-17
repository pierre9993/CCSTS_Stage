  <!-- Image top -->
  <div class="carousel-inner">
          <div class="carousel-item active">
              <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago">
              <div class="carousel-caption">
                  <h1>Nos Réalisations V2</h1>
                  <p>Retrouvé nos différents réalisations ici !</p>
              </div>
          </div>
      </div>


      <!-- réalisations -->
      <section class=" d-flex flex-column align-items-center justify-content-center mf">

      <a href="index.php?page=realisations" class="mt-3 btn btn-primary">Voir v1</a>
      <div class="nav-real l-81  mb-4 mt-5 ">

<div class="l-81 d-flex flex-row align-items-center flex-wrap justify-content-start ">
    <p class="btn border mb-0">Rechercher par thême :</p>
    <!-- Bouton de séléction du theme des réals à afficher -->
    <?php
      if (isset($_GET['themeReal'])) {
          echo ' <div class="ml-4 mb-3 mt-3"> <a href="index.php?page=realisations" class="btn btn-primary">Tout</a> </div>';
      }
      ?>
    <div class="ml-4 mb-3 mt-3"> <a href="index.php?page=realisationsv2&themeReal=environnement" class="btn btn-primary">environnement</a> </div>
    <div class="ml-4 mb-3 mt-3"> <a href="index.php?page=realisationsv2&themeReal=eau" class="btn btn-primary">Eau</a> </div>
    <div class="ml-4 mb-3 mt-3"> <a href="index.php?page=realisationsv2&themeReal=canalisation" class="btn btn-primary">Canalisation</a> </div>
</div>

<div>
<?php
  //créer la pagination
  if (isset($_GET['themeReal'])) {
  AdminController::pagination($countreals[0],10, 'pageReal', "realisations&themeReal=".$_GET['themeReal']);
  }
  else{   
  AdminController::pagination($countreals[0],10, 'pageReal', "realisations");
  }
  ?>
  </div>
</div>

          <div id="real-carou" class="d-flex flex-column align-items-center justify-content-between flex-wrap l-80">
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
          </div>
          <?php
            //créer la pagination
            AdminController::pagination($countreals[0],15, 'pageReal', "realisationsv2");
            ?>
      </section>

      </body>

      </html>