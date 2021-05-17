      <!-- Formulaire de création/modification de recrutement-->
<div class=" d-flex flex-column align-items-center justify-content-center mt-5">
    <div class="l-80 border d-flex flex-column align-items-center justify-content-center mb-5">
    <h1 class="mb-5 mt-5"><u>
            <?php if (@$_GET["formtype"] == 'update') {
                echo 'Formulaire de modification du recrutement n°' . @$_GET["idRecrut"] ;
            } else {
                echo 'Formulaire de recrutement';
            }
            ?>
        </u></h1>


        <form class="mb-5 l-60" action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="titre">Titre:<span class="red">* <?php if($verif["verif"]){if(!$verif["titre"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter Titre" required name="titre" id="titre" 
                value="<?php if(isset($_POST["titre"])){echo $_POST['titre'];}else{ echo $recrut['recrut_titre'];}?>">
            </div>

            <div class="form-group">
                <label for="img">Image <span class="red">*</span></label>
                <input type="file" class="form-control" placeholder="Upload une image" required name="img" id="img" value="<?= $recrut['recrut_image_un'] ?>" />
            </div>

            <div class="form-group">
                <label for="description">Description :<span class="red">* <?php if($verif["verif"]){if(!$verif["description"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <textarea class="form-control" placeholder="Entrer une description" required name="description" id="description"
                ><?php if(isset($_POST["description"])){echo $_POST['description'];}else{ echo $recrut['recrut_description'];}?></textarea>
            </div>

            <div class="form-group">
                <label for="competence">Compétences <span class="red">* <?php if($verif["verif"]){if(!$verif["competence"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <textarea class="form-control" placeholder="Entrer une competence" required name="competence" id="competence"
                ><?php if(isset($_POST["competence"])){echo $_POST['competence'];}else{ echo $recrut['recrut_competence'];}?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>

</div>