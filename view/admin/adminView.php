
<!-- View des tableaux admins -->
<section class="bg-light d-flex flex-column pt-5 admin-section">
    <header id="titreSection" class="pt-5 mb-3 col-12 d-flex flex-row align-items-center justify-content-around">
        
        <h1 class="mt-5" >Page Admin</h1>
     
    </header>

    <!-- Nav tabs -->
    <ul class="nav nav-tabs" role="tablist">
        <li class="nav-item ml-4">
            <a class="nav-link <?php if (!isset($_GET['pageReal'])) {
                                    echo ' active ';
                                } ?> " data-toggle="tab" href="#actualites">Actualités</a>
        </li>
        <li class="nav-item">
            <a class="nav-link <?php if (isset($_GET['pageReal'])) {
                                    echo ' active ';
                                } ?>" data-toggle="tab" href="#realisation">Réalisations</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#services">Services</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#references">Références</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#employe">Employé</a>
        </li>

        <li class="nav-item">
            <a class="nav-link" data-toggle="tab" href="#recrutement">Recrutement</a>
        </li>
    </ul>

    <!-- Tab panes -->

    <div class="tab-content d-flex flex-column">
        <!-- On place ici le contenu des différentes pages -->

        <!-- Chaque page à sa propre div -->
        <div id="actualites" class="tab-pane <?php if (!isset($_GET['pageReal'])) {
                                                    echo ' active ';
                                                } else {
                                                    echo ' fade ';
                                                } ?> ">
            <div class="admin-head-table d-flex flex-row justify-content-between align-items-center">
                <a href="index.php?page=actuForm&formtype=create" class="mr-4 mt-4 mb-4 border btn btn-info">
                    Créer une nouvelle actualité
                </a>
                <?php
                //créer la pagination
                Self::pagination($actucount,5, 'pageActu','admin');
                
                ?>

            </div>
            <div class="div-table">
                <!-- Table admin Actualité -->
                <table class=" table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Image 1</th>
                            <th>Titre de l'article</th>
                            <th>Paragraphe 1</th>
                            <th>Image 2</th>
                            <th>Description image 2</th>
                            <th>Paragraphe 2</th>
                            <th>Image 3</th>
                            <th>Auteur</th>
                            <th>Date de création</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($actus as $actu) {

                            echo '<tr>
                        <td>' . $actu['actu_id'] . '</td>
                        <td>
                            <img src="' . $actu['actu_img_un'] . '" class="img-100" alt="" />
                        </td>
                        <td>' . $actu['actu_titre'] . '</td>
                        <td>'
                                . $actu['actu_paragraphe_un'] .
                                '</td>
                        <td>
                            <img src="' . $actu['actu_image_deux'] . '" class="img-100" alt="" />
                        </td>
                        <td>' . $actu['actu_description_image_deux'] . '</td>
                        <td>'
                                . $actu['actu_paragraphe_deux'] .
                                '</td>
                        <td>
                            <img src=" ' . $actu['actu_image_trois'] . '" class="img-100" alt="" />
                        </td>
                        <td>' . $actu['actu_auteur'] . '</td>
                        <td>' . $actu['actu_date_creation'] . '</td>
                        <td>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <a href="index.php?page=actuForm&formtype=update&idActu=' . $actu["actu_id"] . '" class="btn-admin btn btn-primary  mb-2">
                                    Modifer
                                </a>
                                <a  href="index.php?page=actuForm&formtype=delete&idActu=' . $actu["actu_id"] . '" class="btn-admin btn btn-danger mt-2">
                                    Supprimer
                                </a>
                            </div>
                        </td>

                    </tr>';
                        } ?>


                    </tbody>
                </table>
            </div>

            <div class="admin-head-table d-flex flex-row justify-content-center align-items-center mb-4 mt-4">
                <!-- Pagination -->
                <?php
                Self::pagination($actucount, 5, 'pageActu','admin');
                ?>
            </div>

        </div>

        <div id="realisation" class=" tab-pane <?php if (isset($_GET['pageReal'])) {
                                                    echo ' active ';
                                                } else {
                                                    echo ' fade ';
                                                } ?>   ">
            <div class="admin-head-table d-flex flex-row justify-content-between align-items-center">
                <a href="index.php?page=realForm&formtype=create" class="mr-4 mt-4 mb-4 border btn btn-info">
                    Ajouter une nouvelle réalisation
                </a>
                <?php
                Self::pagination($realscount,5, 'pageReal','admin');
                ?>
            </div>
            <div class="div-table">
                <!-- Table admin Realisations -->
                <table class="table table-bordered text-center l-100">
                    <thead>
                        <tr>
                            <th scope="col">#iD</th>
                            <th scope="col">Titre réalisation</th>
                            <th scope="col">Logo collaborateur</th>
                            <th scope="col">Paragraphe 1</th>
                            <th scope="col">Paragraphe 2</th>
                            <th scope="col">Photo 1</th>
                            <th scope="col">Photo 2</th>
                            <th scope="col">Photo 3</th>
                            <th scope="col">Photo 4</th>
                            <th scope="col">Photo 5</th>
                            <th scope="col">Thême Associé</th>
                            <th scope="col">Dates</th>
                            <th scope="col">Lieu</th>
                            <th scope="col">Coût</th>
                            <th scope="col">Service(s) associé(s)</th>
                            <th scope="col">Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($realisations as $real) {
                            echo
                            '<tr>
                    <td>' . $real["real_id"] . '</td>
                    <td>' . $real["real_titre"] . '</td>
                    <td>
                        <img src="' . $real["real_logo"] . '" class="img-100" alt="" />
                    </td>
                    <td>' . $real["real_paragraphe_un"] . '</td>
                    <td>' . $real["real_paragraphe_deux"] . '</td>
                    <td>
                        <img src="' . $real["real_img_un"] . '" class="img-100" alt="" />
                    </td>
                    <td>
                        <img src="' . $real["real_img_deux"] . '" class="img-100" alt="" />
                    </td>
                    <td>
                        <img src="' . $real["real_img_trois"] . '" class="img-100" alt="" />
                    </td>
                    <td>
                    <img src="' . $real["real_img_quatre"] . '" class="img-100" alt="" />
                    </td>
                    <td>
                    <img src="' . $real["real_img_cinq"] . '" class="img-100" alt="" />
                    </td>
                    <td>
                    <p>' . $real["real_theme"] . '</p>
                    </td>
                    <td>Du :' . $real["real_date_debut"] . ' ' . 'au :' . ' ' . $real["real_date_fin"] . '</td>
                    <td>' . $real["real_lieu"] . '</td>
                    <td>' . $real["real_cout"] . '</td>
                    <td>';
                            $serv_real = new RealisationModel;
                            $serv_real = $serv_real->getServicebyReal($real["real_id"]);
                            foreach ($serv_real as $servr) {

                                echo "<div>" . $servr["service_titre"] . "</div>";
                            }
                            echo '</td>' .
                                '<td>
                        <div class="d-flex flex-column align-items-center justify-content-center">
                        <a  href="index.php?page=realForm&formtype=update&idReal=' . $real["real_id"] . '" class="btn-admin btn btn-primary  mb-2">
                        Modifer
                    </a>
                    <a  href="index.php?page=realForm&formtype=delete&idReal=' .  $real["real_id"] . '" class="btn-admin btn btn-danger mt-2">
                        Supprimer
                    </a>
                        </div>
                    </td>
                </tr>';
                        } ?>

                    </tbody>
                </table>
            </div>
            <div  class="admin-head-table d-flex flex-row justify-content-center align-items-center mb-5 mt-5">
                <!-- Pagination -->
                <?php
                Self::pagination($realscount,5, 'pageReal','admin');
                ?>
            </div>
        </div>


        <div id="services" class=" tab-pane fade">
            <div class="admin-head-table d-flex flex-row justify-content-between align-items-center">
                <a href="index.php?page=servForm&formtype=create" class="mr-4 mt-4 mb-4 border btn btn-info">
                    Ajouter un nouveau service
                </a>

            </div>
            <div class="div-table">
                <!-- Table admin Services -->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#ID</th>
                            <th>Titre métier</th>
                            <th>Image métier</th>
                            <th>Description</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tbody>
                        <?php
                        foreach ($services as $serv) {
                            echo
                            '<tr>
                        <td>' . $serv["service_id"] . '</td>
                        <td>' . $serv["service_titre"] . '</td>
                        <td>
                            <img src="' . $serv["service_image_un"] . '" class="img-100" alt="" />
                        </td>
                        <td>
                            ' . $serv["service_description"] . '
                        </td>
                        <td>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <a  href="index.php?page=servForm&formtype=update&idServ=' . $serv["service_id"] . '" class="btn-admin btn btn-primary mt-2 mb-2">
                                    Modifer
                                </a>
                                <a  href="index.php?page=servForm&formtype=delete&idServ=' . $serv["service_id"] . '" class="btn-admin btn btn-danger mt-2">
                                    Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>
                    
                    ';
                        } ?>
                    </tbody>
                </table>
            </div>
            <div  class="admin-head-table d-flex flex-row justify-content-center align-items-center">
            
            </div>
        </div>

        <div id="references" class=" tab-pane fade">
            <div class="div-table">
            <!-- Table admin des Références -->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th scope="col">Titre de la référence</th>
                            <th scope="col">Valeur</th>
                            <th scope="col">Image</th>

                            <th scope="col">Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($references as $ref) {
                            echo '
                    <tr>
                        <td scope="row">' . $ref["reference_titre"] . '</td>
                        <td>' . $ref["reference_valeur"] . '</td>
                        <td class="fs-4">' . $ref["reference_image_un"] . '</td>
                        <td>
                            <a href="index.php?page=refForm&formtype=update&idRef=' . $ref["reference_id"] . '" class="btn-admin btn btn-primary mt-2 mb-2">
                                Modifer
                            </a>
                        </td>
                    </tr>
                    ';
                        } ?>
                </table>
            </div>
        </div>

        <div id="employe" class=" tab-pane fade">
            <div class="admin-head-table d-flex flex-row justify-content-between align-items-center">
                <a href="index.php?page=employeForm&formtype=create" class="mr-4 mt-4 mb-4 border btn btn-info">
                    Ajouter un employé
                </a>
            </div>
            <div class="div-table">
<!-- Table admin des employés -->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Nom employé</th>
                            <th>Prénom employé</th>
                            <th>Image employé</th>
                            <th>Titre employé</th>
                            <th>Description employé</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($employes as $employe) {
                            echo
                            '<tr>
                        <td>' . $employe["employe_id"] . '</td>
                        <td>' . $employe["employe_nom"] . '</td>
                        <td>' . $employe["employe_prenom"] . '</td>
                        <td>
                        <img src="' . $employe["employe_image_un"] . '" class="img-100" alt="" />
                        </td>
                        <td>' . $employe["employe_titre"] . '</td>
                        <td>' . $employe["employe_description"] . '</td>
                        <td>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <a href="index.php?page=employeForm&formtype=update&idEmploye=' . $employe["employe_id"] . '"  class="btn-admin btn btn-primary mt-2 mb-2">
                                    Modifer
                                </a>
                                <a href="index.php?page=employeForm&formtype=delete&idEmploye=' . $employe["employe_id"] . '" class="btn-admin btn btn-danger mt-2">
                                    Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>';
                        } ?>
                    </tbody>
                </table>
            </div>
        </div>

        <div id="recrutement" class=" tab-pane fade">
            <div class="admin-head-table d-flex flex-row justify-content-between align-items-center">
                <a href="index.php?page=recrutForm&formtype=create" class="mr-4 mt-4 mb-4 border btn btn-info">
                    Ajouter un nouveau Recrutement
                </a>

            </div>
            <div class="div-table">
            <!-- Table admin des recrutements -->
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>#Id</th>
                            <th>Titre</th>
                            <th>Image / logo par défaut</th>
                            <th>Description du poste</th>
                            <th>Compétences demandées</th>
                            <th>Option</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($recrutements as $recrut) {
                            echo
                            '
                    <tr>
                        <th>' . $recrut["recrut_id"] . '</th>
                        <td>' . $recrut["recrut_titre"] . '</td>
                        <td><img src="' . $recrut["recrut_image_un"] . '" class="img-100" alt="" /> </td>
                        <td>' . $recrut["recrut_description"] . '</td>
                        <td>' . $recrut["recrut_competence"] . '</td>
                        <td>
                            <div class="d-flex flex-column align-items-center justify-content-center">
                                <a href="index.php?page=recrutForm&formtype=update&idRecrut=' . $recrut["recrut_id"] . '" class="btn-admin btn btn-primary mt-2 mb-2">
                                    Modifer
                                </a>
                                <a href="index.php?page=recrutForm&formtype=delete&idRecrut=' . $recrut["recrut_id"] . '" class="btn-admin btn btn-danger mt-2">
                                    Supprimer
                                </a>
                            </div>
                        </td>
                    </tr>';
                        } ?>
                    </tbody>
                </table>
            </div>

            <div class="admin-head-table d-flex flex-row justify-content-center align-items-center">
               
            </div>
        </div>
    </div>
</section>