<!-- Formulaire de création/suppression d'employé -->

<div class=" d-flex flex-column align-items-center justify-content-center mt-5">
    <div  class="l-80 border d-flex flex-column align-items-center justify-content-center mb-5">
    <h1 class="mb-5 mt-5"><u>
            <?php if (@$_GET["formtype"] == 'update') {
                echo 'Formulaire de modification de l\'employé n°' . @$_GET["idEmploye"] ;
            } else {
                echo 'Formulaire de création d\'employé';
            }
            ?>
        </u></h1>


        <form class="mb-5 l-60 " action="" method="POST" enctype="multipart/form-data">

        <div class="form-group">
                <label for="nom">Nom:<span class="red">*<?php if($verif["verif"]){if(!$verif["nom"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter nom"  required name="nom" id="nom" 
                value="<?php if(isset($_POST["nom"])){echo $_POST['nom'];}else{ echo $employe['employe_nom'];}?>">
            </div>
        <div class="form-group">
                <label for="prenom">Prénom:<span class="red">*<?php if($verif["verif"]){if(!$verif["prenom"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter prenom"  required name="prenom" id="prenom" 
                value="<?php if(isset($_POST["prenom"])){echo $_POST['prenom'];}else{ echo $employe['employe_prenom'];}?>">
            </div>


            <div class="form-group">
                <label for="image_un">Image 1:<span class="red">*</span></label>
                <input type="file" class="form-control" placeholder="Upload une image"  required name="image_un" id="image_un" value="<?= $employe['employe_image_un'] ?>" />
            </div>

            <div class="form-group">
                <label for="titre">Titre:<span class="red">*<?php if($verif["verif"]){if(!$verif["titre"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter Titre"  required name="titre" id="titre" 
                value="<?php if(isset($_POST["titre"])){echo $_POST['titre'];}else{ echo $employe['employe_titre'];}?>">
            </div>

            <div class="form-group">
                <label for="description">Description :<span class="red">*<?php if($verif["verif"]){if(!$verif["description"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <textarea class="form-control" placeholder="Entrer une description" required name="description" id="description"
                ><?php if(isset($_POST["description"])){echo $_POST['description'];}else{ echo $employe['employe_description'];}?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>

</div>