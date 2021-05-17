<footer id="menu-footer" class=" align-items-center justify-content-between bg-mininav l-100">

  <!-- Footer-->

  <button type="button ml-5" class="justify-self-end btn text-light" data-toggle="modal" data-target=".modal">
    Mentions légales
  </button>
  <div class="footer-2 ">


    <?php
    // Le bouton admin/déconnexion ne s'affiche que si on est connecté
    if (@$_SESSION["role"] == "admin") {

      echo '        <div ><a class="text-light mr-2" href="Admin">Admin</a></div>';
      echo '        <div ><a class="text-light mr-2" href="index.php?disconnect=true">Déconnexion</a></div>';
    } else {
      echo '
    <a class="text-white ml-1 mr-3" href="Admin"><i class="fas fa-sign-in-alt"></i></a>';
    }
    ?>
    <div>
      <a class="text-white mr-1" href="https://sg.linkedin.com/company/consultants-canalisations-sans-tranchee"><i class="fab fa-linkedin"></i></a>
      <a class="text-white mr-1 ml-1" href=""><i class="fab fa-facebook-square"></i></a>
    </div>
  </div>


</footer>
<!-- modal -->
<div class="modal fade" tabindex="-1">
  <div class="modal-dialog modal-dialog-scrollable">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">Mentions légales</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <!-- Contenue du modal -->
        <p>
          Les mentions obligatoires pour tous les sites internets Pour une
          personne physique Pour une personne morale Votre identité nom et
          prénom raison sociale forme juridique montant du capital social Vos
          coordonnées adresse du domicile adresse du siège social adresse de
          courrier électronique numéro de téléphone Les mentions obligatoires
          complémentaires selon votre activité Pour les activités commerciales
          numéro d’inscription au registre du commerce et des sociétés (RCS)
          numéro individuel d’identification (le numéro de TVA
          intracommunautaire) le cas échéant Pour les sites marchands
          conditions générales de vente (CGV) Pour les activités artisanales
          numéro d’immatriculation au répertoire des métiers (RM) Pour les
          sites d’information nom du directeur de la publication nom du
          responsable de la rédaction le cas échéant coordonnées de
          l’hébergeur du site Pour les activités soumises à régime
          d'autorisation nom et adresse de l’autorité ayant délivré votre
          autorisation d’exercer Pour les activités réglementées référence aux
          règles professionnelles applicables pour son activité réglementée
          titre professionnel État membre dans lequel a été octroyé le titre
          professionnel nom de l'ordre ou de l'organisme professionnel auprès
          duquel elle est inscrite Lire aussi : Conditions générales de vente
          : quelles mentions obligatoires ? Utilisation de données
          personnelles : quelles informations donner à l’internaute ? Le
          Règlement général sur la protection des données (RGPD) précise les
          informations que vous devez rendre disponibles. Ainsi, si un
          internaute vous en fait la demande, vous avez l’obligation de lui
          donner accès à un certains nombre d'informations. Cookies : quelles
          sont les règles ? Un cookie est un traceur permettant d’analyser le
          comportement des internautes, comme par exemple leurs navigations,
          leurs habitudes de consommation, leurs déplacements… Si vous
          utilisez des cookies sur votre site internet, vous devez
          obligatoirement informer les internautes de la finalité des cookies
          et obtenir leur consentement. La Commission nationale de
          l'informatique et des libertés (CNIL) liste les cookies concernés
          par cette obligation. Il s'agit notamment : des cookies liés aux
          opérations de publicité personnalisée ou non personnalisée des
          cookies liés à des fonctionnalités de partage sur les réseaux
          sociaux. Lire aussi : Entreprises, quelles sont vos obligations
          concernant les données personnelles ? Que risquez-vous en cas de non
          respect de vos obligations d'information ? La loi prévoit jusqu'à 1
          an d'emprisonnement en cas de manquement à l'une des obligations
          concernant les mentions obligatoires et les cookies. Le montant des
          amendes diffère selon que vous êtes une personne physique ou une
          personne morale : Pour les personnes physiques : 75 000 € d'amende.
          Pour les personnes morales : 375 000 € d'amende. D'autres sanctions
          sont prévues en cas de non respect des informations à donner pour
          l'utilisation des données personnelles d'un internaute.
        </p>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">
          Close
        </button>
      </div>
    </div>
  </div>
</div>


<script src="asset/script.js">
  alert("aa");
</script>
</body>

</html>