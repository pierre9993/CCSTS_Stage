
<div id="carousel" class="carousel slide" data-ride="carousel">
  <!-- The slideshow -->
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img src="https://picsum.photos/2000/401" class="img-page" alt="Chicago" />
      <div class="carousel-caption">
        <h1>Contact</h1>
        <p>
          Nous cherchons des opportunités où nous pouvons apporter notre
          contribution..
        </p>
      </div>
    </div>
  </div>
</div>

<section id="marg" class="d-flex flex-row justify-content-around align-items-start flex-wrap mt-4">
<!-- Informations de contact + carte -->

  <div class="info-contact d-flex flex-column align-items-center text-center justify-content-center border bg-light" >

    <h3 class="mb-3"><u>Comment nous contacter </u></h3>
    <div class="l-100 d-flex flex-row align-items-center justify-content-around">

    <div class="l-33 d-flex flex-column text-center">
    <i  class="fas fa-map-marker-alt"></i>
    <p class="letter-1">157 rue des blains 92220 Bagneux</p>
    </div>

    <div class="l-33 d-flex flex-column text-center">
    <i   class="far fa-envelope"></i>
    <p class="letter-1">n.proisy@ccst.fr</p>
    </div>

    <div class="l-33 d-flex flex-column text-center">
    <i class="fas fa-phone-alt"></i>
    <p class="letter-1">01 46 48 34 23</p>
    </div>
</div>
    <div id="carte-contact" class="">
      <a target="_blank" href="https://www.google.fr/maps/place/157+Rue+des+Blains,+92220+Bagneux/@48.7930944,2.3189995,18.25z/data=!4m5!3m4!1s0x47e67120ed4453e1:0x22f3cfba8b15fb6!8m2!3d48.7933457!4d2.3183759"><img src="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fadressccst.png?v=1615213110307" id="carte1" /></a>
    </div>

  </div>

  <div class="bg-light border contact-form">
    <h3 class="mb-3"><u>Formulaire de Contact</u></h3>
<!-- Formulaire de contact -->
    <form class="form" id="form" action="" enctype="multipart/form-data" method="POST">
        <div class="d-flex flex-row justify-content-between">
          <div class="form-group l-45" >
            <label for="nom"><u>Nom :</u><span class="red">*</span></label>
            <input type="text" class="form-control" id="nom" name="nom" placeholder="Nom" required  />
            
          </div>
          <div class="form-group l-45" >
            <label for="prenom"><u>Prénom :</u><span class="red">*</span></label>
            <input type="text" class="form-control" id="prenom" name="prenom" placeholder="Prénom" required/>
            
          </div>
        </div>
        <div class="form-group ">
          <label for="email"><u>Email :</u><span class="red">*</span></label>
          <input type="email" class="form-control" id="email" name="email" placeholder="exemple@mail.com" required  />
          
        </div>

        <div class="form-group ">
          <label for="Tel"><u>Tél :</u></label>
          <input type="tel" class="form-control" id="tel" name="tel" placeholder="06 00 00 00 00"/>
          
        </div>
        <div class="form-group">
          <label for="motif-select"><u>Motif :</u><span class="red">*</span></label>
          <select class="form-control" name="motif" id="motif-select">
            <option value="">- Veuilez choisir un motif -</option>
            <option value="Demande de devis">- Demande de devis -</option>
            <option value="Postulation">- J'aimerai postuler chez vous ! -</option>
            <option value="Question">- J'ai une question ! -</option>
          </select>
        </div>

        <div class="form-group">
          <label for="qui"><u>Vous êtes :</u><span class="red">*</span></label>
          <div class="d-flex flex-row justify-content-between">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="qui" id="qui1" value="Collectivité" checked />
              <label class="form-check-label" for="exampleRadios1">
                Collectivité
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="qui" id="qui2" value="Entreprise" />
              <label class="form-check-label" for="exampleRadios2">
                Entreprise
              </label>
            </div>

            <div class="form-check">
              <input class="form-check-input" type="radio" name="qui" id="qui3" value="Particulier" />
              <label class="form-check-label" for="exampleRadios3">
                Particulier
              </label>
            </div>
          </div>
        </div>

        <div class="form-group form1">
          <label for="message"><u>Message :</u><span class="red">*</span></label>
          <textarea required  class="form-control" id="message" rows="3" name="message" placeholder="Entrer votre message:"></textarea>
          
        </div>

        <div class="form-group text-center">
          <button type="submit" class="btn btn-primary" id="submit" name="submit" >Envoyer</button>
        </div>
    </form>
  </div>
</section>
