<!-- Formulaire de modification de références -->

<div class=" d-flex flex-column align-items-center justify-content-center mt-5">
    <div  class="l-80 border d-flex flex-column align-items-center justify-content-center mb-5">
    <h1 class="mb-5 mt-5"><u>
            <?php if (@$_GET["formtype"] == 'update') {
                echo 'Formulaire de modification de la référence :<br/>' .$ref['reference_titre'];
            }
            

            ?>
        </u></h1>

        <form  class="mb-5 l-60" action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="titre">Titre:<span class="red">* <?php if($verif["verif"]){if(!$verif["titre"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter Titre"  required name="titre" id="titre" 
                value="<?php if(isset($_POST["titre"])){echo $_POST['titre'];}else{ echo $ref['reference_titre'];}?>">
            </div>

            <div class="form-group">
                <label for="image_un">Image 1</label>
                <input type="text" class="form-control" placeholder="Upload une image"  required name="image_un" id="image_un" value='<?= $ref['reference_image_un'] ?>' />
            </div>

            <div class="form-group">
                <label for="valeur">Valeur:<span class="red">*<?php if($verif["verif"]){if(!$verif["valeur"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter une valeur"  required name="valeur" id="valeur"
                 value="<?php if(isset($_POST["valeur"])){echo $_POST['valeur'];}else{ echo $ref['reference_valeur'];}?>">
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>

</div>