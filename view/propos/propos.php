
  <div id="carousel" class="carousel slide" data-ride="carousel">
    <!-- The slideshow -->
    <div class="carousel-inner">
     
      <div class="carousel-item active">
        <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago" />
        <div class="carousel-caption">
          <h1>Qui sommes nous ?!</h1>
          
        </div>
      </div>
    </div>
  </div>
  
      <!-- Contenue A propos Triple container Head -->
  <article >
    <div class="propos-container   ">
      <div class=" border2 bg-light">
        <h4>
          Création de l'entreprise..
        </h4>
        <br />
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum
          mollitia error aperiam dolore, ad ea odio aspernatur, magnam eum
          illo minima ut nobis maxime sint quo consequatur accusantium
          nostrum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Fuga dolorem molestiae voluptatibus impedit, reprehenderit eveniet
          ipsa quis dolorum quaerat animi sequi adipisci voluptatum.
          Dignissimos nulla sint numquam dicta ut optio reprehenderit vel fuga
          earum impedit atque voluptatem, eveniet non fugit laborum! Totam ab
          eius quod, obcaecati a nesciunt incidunt sit?eveniet ipsa quis
          dolo. Dignissimos null
        </p>
      </div>
      <div class=" border2 bg-light">
        <h4>
          Les étapes marquantes du parcours de l'entreprise..
        </h4>
        <br />
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum
          mollitia error aperiam dolore, ad ea odio aspernatur, magnam eum
          illo minima ut nobis maxime sint quo consequatur accusantium
          nostrum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Fuga dolorem molestiae voluptatibus impedit, reprehenderit eveniet
          ipsa quis dolorum quaerat animi sequi adipisci voluptatum.
          Dignissimos nulla sint numquam dicta ut optio reprehenderit vel fuga
          earum impedit atque voluptatem, eveniet non fugit laborum! Totam ab
          eius quod, obcaecati a nesciunt incidunt sit?
        </p>
      </div>
      <div class=" border2 bg-light">
        <h4>
          Petites anecdotes..
        </h4>
        <br />
        <p>
          Lorem ipsum dolor sit amet consectetur adipisicing elit. Alias illum
          mollitia error aperiam dolore, ad ea odio aspernatur, magnam eum
          illo minima ut nobis maxime sint quo consequatur accusantium
          nostrum. Lorem ipsum dolor sit amet consectetur adipisicing elit.
          Fuga dolorem molestiae voluptatibus impedit, reprehenderit eveniet
          ipsa quis dolorum quaerat animi sequi adipisci voluptatum.
          Dignissimos nulla sint numquam dicta ut optio reprehenderit vel fuga
          earum impedit atque voluptatem, eveniet non fugit laborum! Totam ab
          eius quod, obcaecati a nesciunt incidunt sit?
        </p>
      </div>
    </div>
    
      <!-- Realisation de la page A propos -->
    <section class="propos-section border l-100 d-flex flex-column p-2  justify-content-around bg-light ">
      <header  class=" mt-5 mb-5 d-flex flex-row align-items-center justify-content-around titreSection">
        <span></span>
        <h1 >Nos Réalisations</h1>
        <span></span>
      </header>
      <div class="d-flex flex-row justify-content-around flex-wrap mb-3">
      <?php
          foreach($reals as $real){
          echo '<a href="Realisation-'.$real['real_id'].' " class="d-real d-flex flex-column align-items-center ">
                <img src="'.$real['real_logo'].'" class="img-150" alt="'.$real['real_titre'].'" />
                <h6 class="position-relative t-real">'.$real['real_titre'].'</h6>
            </a>';
          }
          

        ?>
      </div>
    </section>
    
      <!-- Présentation des spécialité -->
    <section class="border l-100 d-flex flex-column p-2 align-items-center justify-content-center">
      <header class="l-100 mt-5 mb-3 d-flex flex-row align-items-center justify-content-around ">
        <span></span>
        <h1 class="titre-spe">Nos spécialitées</h1>
        <span></span>
      </header>
      <br />
    <div class=" l-80 d-flex flex-column p-2  justify-content-center">
      <div class="col-md-12 border1">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo, esse.
        Adipisci non similique voluptatibus dicta, ad tempora commodi! Facere
        labore ipsa deleniti omnis. Voluptatum dolorum id suscipit. Recusandae
        quibusdam rem nam pariatur dolore nesciunt voluptates eos aliquid
        libero autem sequi adipisci porro suscipit ea, quam similique commodi
        deleniti quo quidem. Lorem ipsum, dolor sit amet consectetur
        adipisicing elit. Quo, esse. Adipisci non similique voluptatibus
        dicta, ad tempora commodi! Facere labore ipsa deleniti omnis.
        Voluptatum dolorum id suscipit. Recusandae quibusdam rem nam pariatur
        dolore nesciunt voluptates eos aliquid libero autem sequi adipisci
        porro suscipit ea, quam similique commodi deleniti quo quidem.
      </div>
      <div class="col-md-12 border1">
        Lorem ipsum, dolor sit amet consectetur adipisicing elit. Quo, esse.
        Adipisci non similique voluptatibus dicta, ad tempora commodi! Facere
        labore ipsa deleniti omnis. Voluptatum dolorum id suscipit. Recusandae
        quibusdam rem nam pariatur dolore nesciunt voluptates eos aliquid
        libero autem sequi adipisci porro suscipit ea, quam similique commodi
        deleniti.
      </div>
      </div>
    </section>

    <main class="d-flex flex-column align-items-center  m-0">
      <!-- Affichage des employés -->
      <header  class="mt-5 mb-5 col-11 d-flex flex-row align-items-center justify-content-around titreSection">
        <span></span>
        <h1 class="titre-spe">Notre équipe</h1>
        <span></span>
      </header>
      <div class=" l-80 d-flex flex-column align-items-center  m-0">
      <?php
      foreach ($propos as $prop) {
        if ($compteur % 2 === 0) {
          echo '
            <article class="art-propos l-81 d-presentation  border mt-3 mb-4 bg-light">
                <div  class="container d-flex flex-column flex-shrink  mt-4">
                    <h3 class="mb-1">' . $prop['employe_prenom'] . ' ' . $prop['employe_nom'] . '</h3>
                    <h6 class="text-warning ">
                    ' . $prop['employe_titre'] . '
                    </h6>
                    <p class="">
                    ' . $prop['employe_description'] . '
                    </p>
                </div>
                <div class="img-actu">
                <img  src="' .  $prop['employe_image_un'] . '"  alt="" />
               </div>
            </article>
                  ';
          $compteur++;
        } else {
          echo '
            <article class="art-propos  l-81 d-presentation    border mt-3 mb-4 bg-light">
            <div class="img-actu">
            <img  src="' .  $prop['employe_image_un'] . '"  alt="" />
           </div>
                <div  class="container d-flex flex-column flex-shrink  mt-4">
                    <h3 class="mb-1 align-self-end">' . $prop['employe_prenom'] . ' ' . $prop['employe_nom'] . '</h3>
                    <h6 class="text-warning align-self-end">
                    ' . $prop['employe_titre'] . '
                    </h6>
                    <p class="align-self-end">
                    ' . $prop['employe_description'] . '
                    </p>
                </div>
            </article>
                 ';
          $compteur++;
        }
      }
      ?>
      </div>
    </main>

    </article>