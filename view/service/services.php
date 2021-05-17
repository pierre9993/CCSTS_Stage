 <!-- Image top + titre -->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago" />
                <div class="carousel-caption">
                    <h1>Nos Services</h1>
                    <p>Retrouvé nos différents services ici !</p>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-a d-flex flex-column align-items-center justify-content-center mb-5">
       
        <div id="divServices"  class="div-srv  mt-5 ">
            <div id="s-col1" class="d-flex flex-column justify-content-around align-items-center">
            <?php
            //Affichage des services 1 colonnes sur deux 
             for ($i = 0; $i<count($services); $i++){
                if (($i % 2 )=== 0) {
                      $service= new ServiceModel;
                    $service->afficheViewService($services[$i]);   
                }
            }
            ?>
            </div>
            <div id="s-col2" class="d-flex flex-column justify-content-around align-items-center">
            <?php
            for ($i = 0; $i <count($services); $i++){
                if ($i % 2 == 1) {
                    $service= new ServiceModel;
                    $service->afficheViewService($services[$i]);   
                }   
            }
            ?>
            </div>
           
        </div>
    </section>
    <script>
        
        $("#divServices>div>article").on("click", function() {
            if (
                $("#s-content", this).css("height") == "1px" ||
                $("#s-content", this).css("animation-name") == "slidein"
            ) {
                $('#fleche-serv',this).css("transform","rotate(90deg)")
                $("#s-content", this).css("animation-name", "slideout");
                $("#s-content", this).css("display", "flex");
                $("#s-content", this).css("height", "357px");
                $("#s-content", this).css("clip-path", "inset(0% 0% 0% 0%)");
                setTimeout(() => {
                $("#s-content", this).css("height", 'fit-content');

        }, 50)
            } else {
                $("#s-content", this).css("animation-name", "slidein");
                $("#s-content", this).css("clip-path", "inset(0% 0% 100% 0%)");
                $("#s-content", this).css("height", "0px");
                $('#fleche-serv',this).css("transform","rotate(0deg)")
            }
        });
    </script>

    <footer>
        <div id="two"></div>
    </footer>

    <script src="script.js"></script>

