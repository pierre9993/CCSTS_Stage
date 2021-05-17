 <!-- Formulaire de création/modification de services-->
<div class=" d-flex flex-column align-items-center justify-content-center mt-5">
    <div  class="l-80 border d-flex flex-column align-items-center justify-content-center mb-5">
    <h1 class="mb-5 mt-5"><u>
            <?php if (@$_GET["formtype"] == 'update') {
                echo 'Formulaire de modification de le service n°' . @$_GET["idServ"] . ' ';
            } else {
                echo 'Formulaire de création de service';
            }
            ?>
        </u></h1>


        <form  class="mb-5 l-60" action="" method="POST" enctype="multipart/form-data">

            <div class="form-group">
                <label for="titre">Titre:<span class="red">*<?php if($verif["verif"]){if(!$verif["titre"]){ echo " Valeur incorrecte";}}  ?></span></label>
                <input type="text" class="form-control" placeholder="Enter Titre"  required name="titre" id="titre" 
                value="<?php if(isset($_POST["titre"])){echo $_POST['titre'];}else{ echo $serv['service_titre'];}?>">
            </div>

            <div class="form-group">
                <label for="image_un">Image 1:<span class="red">*</span></label><br/>
                <input type="file"  name="image_un" id="image_un" required  />
            </div>

            <div class="form-group">
                <label for="description">Description :<span class="red">*</span></label>
                <textarea class="form-control" placeholder="Entrer une description" required name="description" id="description"
                ><?php if(isset($_POST["description"])){echo $_POST['description'];}else{ echo $serv['service_description'];}?></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Valider</button>

        </form>
    </div>

</div>