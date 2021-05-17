
   
          <!--Image top + titre-->
    <div id="carousel" class="carousel slide" data-ride="carousel">
        <!-- The slideshow -->
        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago" />
                <div class="carousel-caption">
                    <h1>Recrutement</h1>
                    <p>CDD, CDI, Stage, Alternance !</p>
                </div>
            </div>
        </div>
    </div>
    <section class="bg-a d-flex flex-column align-items-center justify-content-center ">
        <header id="titreSection" class="mt-4 mb-3 col-11 d-flex flex-row align-items-center justify-content-around">
            <span></span>
            <h1 class="recrut-titre" >Annonces</h1>
            <span></span>
        </header>
        <div id="divServices" class="recrut-div d-flex flex-row justify-content-around align-items-start ">
            <div id="s-col1" class="d-flex flex-column justify-content-around align-items-center col-8">
            <?php
            //affichage des recrutements 1 par 1
            foreach($recruts as $recrut){
                $divrecru=new RecrutementModel;
                $divrecru->showRecrutementDiv($recrut);
            }
            ?>

            </div>
            
            
        </div>
    </section>
    <script>
        $("#divServices>div>article").on("click", function() {
            if (
                $("#s-content", this).css("display") == "none" ||
                $("#s-content", this).css("animation-name") == "slidein"
            ) {
                $("#s-content", this).css("display", "flex");
                $('#fleche-serv',this).css("transform","rotate(90deg)")
                $("#s-content", this).css("animation-name", "slideout");
                $("#s-content", this).css("height", "fit-content");
                $("#s-content", this).css("clip-path", "inset(0% 0% 0% 0%)");
            } else {
                $("#s-content", this).css("animation-name", "slidein");
                $("#s-content", this).css("clip-path", "inset(0% 0% 100% 0%)");
                $("#s-content", this).css("height", "00px");
                $('#fleche-serv',this).css("transform","rotate(0deg)")
            }
        });
    </script>

    <footer>
        <div id="two"></div>
    </footer>

</body>

</html>