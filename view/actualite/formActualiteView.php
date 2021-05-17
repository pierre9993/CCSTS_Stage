<!-- Formulaire de modification/création d'actu-->
<div class=" d-flex flex-column align-items-center justify-content-center mt-5">
    <div  class="l-80 border d-flex flex-column align-items-center justify-content-center mb-5">
    <h1 class="mb-5 mt-5"><u>
    
            <?php if (@$_GET["formtype"] == 'update') {
                echo 'Formulaire de modification de l\'actualité n°' . @$_GET["idActu"] . ' ';
            } else {
                echo 'Formulaire de création d\'actualité ';
            }
            ?>
        </u></h1>


        <form  class="mb-5 l-60" action="" method="POST" enctype="multipart/form-data">
            <div class="form-group">
                <label for="img_un">Image 1<span class="red">*  <?php if($verif["verif"]){if(!$verif["img1"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_un" id="img_un" 
                value="<?php if(isset($_POST["img_un"])){echo $_POST['img_un'];}else{ echo $actu['actu_img_un'];}?>" required/>
            </div>

            <div class="form-group">
                <label for="titre">Titre:<span class="red">* <?php if($verif["verif"]){if(!$verif["titre"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter Titre" name="titre" id="titre"  required
                 value="<?php if(isset($_POST["titre"])){echo $_POST['titre'];}else{ echo $actu['actu_titre'];}?>">
                
            </div>

            <div class="form-group">
                <label for="paragraphe_un">Paragraphe 1:<span class="red">*<?php if($verif["verif"]){if(!$verif["para1"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <textarea class="form-control" placeholder="Entrer un paragraphe" name="paragraphe_un"  required id="paragraphe_un"><?php if(isset($_POST["paragraphe_un"])){echo $_POST['paragraphe_un'];}else{ echo $actu['actu_paragraphe_un'];}?>?></textarea>
            </div>

            <div class="form-group">
                <label for="img_deux">Image 2</label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_deux" id="img_deux" value="<?= $actu['actu_image_deux'] ?>" />
            </div>

            <div class="form-group">
                <label for="description_image_deux">Description de l'image 2:</label>
                <input type="text" class="form-control" placeholder="Entrer une description pour l'image 2" name="description_image_deux" id="description_image_deux" value="<?php if(isset($_POST["description_image_deux"])){echo $_POST['description_image_deux'];}else{ echo $actu['actu_description_image_deux'];}?>">
            </div>

            <div class="form-group">
                <label for="paragraphe_deux">Paragraphe 2:<span class="red">*<?php if($verif["verif"]){if(!$verif["para2"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <textarea class="form-control" placeholder="Entrer paragraphe" name="paragraphe_deux"  required id="paragraphe_deux"><?php if(isset($_POST["paragraphe_deux"])){echo $_POST['paragraphe_deux'];}else{ echo $actu['actu_paragraphe_deux'];}?></textarea>
            </div>

            <div class="form-group">
                <label for="img_trois">Image 3</label>
                <input type="file" class="form-control" placeholder="Upload une image" name="img_trois"  id="img_trois" value="<?= $actu['actu_image_trois'] ?>" />
            </div>


            <div class="form-group">
                <label for="auteur">Auteur:<span class="red">*<?php if($verif["verif"]){if(!$verif["auteur"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter auteur" name="auteur"  required id="auteur"
                 value="<?php if(isset($_POST["auteur"])){echo $_POST['auteur'];}else{ echo $actu['actu_auteur'];}?>">
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>

</div>