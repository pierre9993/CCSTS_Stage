<!-- Formulaire de suppression d'actu -->
<div class=" d-flex flex-column align-items-center justify-content-center mt-5">
    <div class="l-80 border d-flex flex-column align-items-center justify-content-center mb-5">
    <h1 class="mb-5 mt-5">
            <?php 
                echo 'Voulez-vous vraiment supprimer l\'actualité n°'.$act["actu_id"].': '.$act["actu_titre"].'?';
            ?>
        </h1>
        <form  class="mb-5 l-60" action="" method="POST" >
            <div class="form-group">
                <label for="mdp">Veuillez entrez le mot de passe:</label>
                <input type="password" class="form-control" placeholder="Mot de passe.." name="mdp" id="mdp" >
            </div>
            <div class="form-group d-flex flex-row align-items-center justify-content-end">
            <a type="submit" href="index.php?page=admin" class="btn btn-muted">
            Annuler
            </a>
            <button type="submit" name="verification" class="btn btn-danger" value="true">
            Continuer
            </button>
            </div>
        </form>

    </div></div>