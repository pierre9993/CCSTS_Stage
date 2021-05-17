<div class=" d-flex flex-column align-items-center justify-content-center mt-5">
    <div class="l-80 border d-flex flex-column align-items-center justify-content-center mb-5">
        <h1 class="mb-5 mt-5"><u>
                <?php if (@$_GET["formtype"] == 'update') {
                    echo 'Formulaire de modification de la réalisation n°' . @$_GET["idReal"] . ' ';
                } else {
                    echo 'Formulaire de création de réalisation ';
                }
                ?>
            </u></h1>

        <form  class="l-60 mb-5 d-flex flex-column" action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="titre">Titre:<span class="red">*<?php if($verif["verif"]){if(!$verif["titre"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter Titre" required name="titre" id="titre"
                 value="<?php if(isset($_POST["titre"])){echo $_POST['titre'];}else{ echo $real['real_titre'];}?>">
            </div>
            <div class="form-group">
                <label for="logo">Logo<span class="red">*<?php if($verif["verif"]){if(!$verif["logo"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="file" class="form-control"  name="logo" id="logo" required  />
            </div>

            <div class="form-group">
                <label for="paragraphe_un">Paragraphe 1:<span class="red">*<?php if($verif["verif"]){if(!$verif["para1"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <textarea class="form-control" placeholder="Entrer un paragraphe" required name="paragraphe_un" id="paragraphe_un"><?php if(isset($_POST["paragraphe_un"])){echo $_POST['paragraphe_un'];}else{ echo $real['real_paragraphe_un'];}?></textarea>
            </div>

            <div class="form-group">
                <label for="paragraphe_deux">Paragraphe 2:<span class="red">*<?php if($verif["verif"]){if(!$verif["para2"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <textarea class="form-control" placeholder="Entrer un paragraphe" required name="paragraphe_deux" id="paragraphe_deux"><?php if(isset($_POST["paragraphe_deux"])){echo $_POST['paragraphe_deux'];}else{ echo $real['real_paragraphe_deux'];}?></textarea>
            </div>

            <div class="form-group">
                <label for="lieu">Lieu :<span class="red">*<?php if($verif["verif"]){if(!$verif["lieu"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter un lieu" required name="lieu" id="lieu" 
                value="<?php if(isset($_POST["lieu"])){echo $_POST['lieu'];}else{ echo $real['real_lieu'];}?>" />
            </div>

            <div class="form-group">
                <label for="cout">Coût :<span class="red">*<?php if($verif["verif"]){if(!$verif["cout"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter un cout" required name="cout" id="cout" 
                value="<?= $real['real_cout'] ?><?php if(isset($_POST["cout"])){echo $_POST['cout'];}else{ echo $real['real_cout'];}?>" />
            </div>

            <div class="form-group">
                <label for="theme">theme:<span class="red">*<?php if($verif["verif"]){if(!$verif["theme"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <select class="form-control" name="theme"  required id="theme">
                <option value="eau">Eau</option>
                <option value="environnement">Environnement</option>
                <option value="canalisation">Canalisation</option>
                </select></div>

            <div class="form-group d-flex flex-row justify-content-between ">
                <div class="l-45">
                    <label for="date_debut">Date de début :<span class="red">*<?php if($verif["verif"]){if(!$verif["date_debut"]){ echo " Valeur incorrecte";}}  ?></span></label>
                    <input type="date" class="form-control" placeholder="Enter une date de début" required name="date_debut" id="date_debut" 
                    value="<?php if(isset($_POST["date_debut"])){echo $_POST['date_debut'];}else{ echo $real['real_date_debut'];}?>" />
                </div>
                <div class="l-45">
                    <label for="date_fin">Date de fin :</label>
                    <input type="date" class="form-control" placeholder="Enter une date de fin" name="date_fin" id="date_fin"
                     value="<?php if(isset($_POST["date_fin"])){echo $_POST['date_fin'];}else{ echo $real['real_date_fin'];}?>" />
                </div>
            </div>

            <div class="form-group">
                <label for="img_un">Image 1:</label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_un" id="img_un" value="<?= $real['real_img_un'] ?>" />
            </div>
            <div class="form-group">
                <label for="img_deux">Image 2:</label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_deux" id="img_deux" value="<?= $real['real_img_deux'] ?>" />
            </div>
            <div class="form-group">
                <label for="img_trois">Image 3:</label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_trois" id="img_trois" value="<?= $real['real_img_trois'] ?>" />
            </div>
            <div class="form-group">
                <label for="img_quatre">Image 4:</label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_quatre" id="img_quatre" value="<?= $real['real_img_quatre'] ?>" />
            </div>
            <div class="form-group">
                <label for="img_cinq">Image 5:</label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_cinq" id="img_cinq" value="<?= $real['real_img_cinq'] ?>" />
            </div>
            <div class="form-group">
                <label for="service">Service(s) associé(s):</label>
                
            <?php
            foreach($services as $serv){
                
                echo '<div class="form-check">
                <input type="checkbox" ';
                foreach($servicesCheck as $sCheck){
                    if($sCheck["service_id"]===$serv['service_id']){
                        echo" checked ";
                    }
                }
                echo ' class="form-check-input" name="service[]" value="'.$serv['service_id'].'" id="service'.$serv['service_id'].'"/>
                <label class="form-check-label" for="service'.$serv['service_id'].'">'.$serv['service_titre'].'</label>
              </div>';
            }
            
            ?></div>


            <button  type="submit" class="btn btn-primary align-self-center">Valider</button>

        </form>
    </div>

</div>