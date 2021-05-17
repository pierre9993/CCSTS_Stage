<!DOCTYPE html>
<html lang="fr">

<head>

  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>CCST</title>
  <link rel="icon" type="image/jpeg" href="https://cdn.glitch.com/43973070-afe2-4423-852e-d376c10473cd%2Fresized-image-Promo.jpeg?v=1615280092029" />
  
  <!--jquery -->
  <script src="/CCST/ccst_v21_FormIndicator+Unlink/asset/jquery-3.6.0.js"></script>
  <!-- Menu navbar de l'accueil -->
  <link rel="preconnect" href="https://fonts.gstatic.com" />
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.13.1/css/all.min.css" />
  
  <!-- FONT-->
  <link href="https://fonts.googleapis.com/css2?family=Shippori+Mincho+B1&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=Dancing+Script&display=swap" rel="stylesheet" />
  
  <!-- LeafLet Map -->
  <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />
  <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js"></script>
  
  <!-- bootstrap-->
  <link rel="stylesheet" href="/CCST/ccst_v21_FormIndicator+Unlink/asset/bootstrap-4.6.0-dist/css/bootstrap.css" />
  <script src="/CCST/ccst_v21_FormIndicator+Unlink/asset/bootstrap-4.6.0-dist/js/bootstrap.bundle.js"></script>
  
  <link rel="stylesheet" href="/CCST/ccst_v21_FormIndicator+Unlink/asset/style.css" />
</head>

<body>

  <!-- Menu navbar de l'accueil -->
 
  <nav id="accueilv3" class="d-flex  flex-row align-items-center justify-content-between ">

    <a class="" href="Accueil">
      <img class="logo" src="asset/logo.png" alt="Logo"  />
    </a>
    <ul id="menu-head" class="align-items-center p-0 menu">
      <li class="dropdown list">
        <a href="javascript:void(0)" class="dropbtn">Accueil</a>
        <div class="dropdown-content">
          <a href="index.php?v=1">Version 1</a>
          <a href="index.php?v=2">Version 2</a>
          <a href="Accueil">Version 3</a>
        </div>
      </li>
      <li class="list"><a class="" href="Qui_Sommes-nous">Qui sommes-nous?</a></li>
      <li class="list"><a class="" href="Realisations">Nos Réalisations</a></li>
      <li class="list"><a class="" href="Services">Nos Services</a></li>
      <li class="list"><a class="" href="Actualites">Nos Actualités</a></li>
      <li class="list"><a class="" href="Recrutement">Recrutement</a></li>
      <li class="list"><a class="" href="Contact">Contact</a></li>

    </ul>
    <div id="menu-btn" class="text-white"><i class="fas fa-bars  align-self-end mr-4"></i></div>
  </nav>

  <div class="up-arrow"><a href="#top"><i class="far fa-caret-square-up"></i></a></div>
 
  <?php
  if (isset($_GET["page"])&& @$_GET["page"] !== "accueil" ) {
    echo '
  <script>
  window.onscroll = function(e) {
        if (window.scrollY > 200) {
            $("#accueilv3").css("background-color", "#74cbdf");
            $(".up-arrow").css("opacity", "1");
        } else {
            $("#accueilv3").css("background-color", "#ffffff00");      
            $(".up-arrow").css("opacity", "0");      
        }
    };
</script>
  ';
  } else {
    echo '
  <script>
    window.onscroll = function(e) {
        if (window.scrollY > 800) {
            $("#accueilv3").css("background-color", "#74cbdf");
            $(".up-arrow").css("opacity", "1");
        } else {
            $("#accueilv3").css("background-color", "#ffffff00");
            $(".up-arrow").css("opacity", "0");
        }
    };
</script>
  ';
  }
  ?>