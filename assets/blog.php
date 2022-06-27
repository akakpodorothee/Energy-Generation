<?php require_once('connect.php') ;?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
    <title>Document</title>
</head>

<body>

<header>
    <nav class="navbar  navbar-expand-lg bg-light">
        <div class="container-fluid">
            <a class="w-30  navbar-brand" href="#"><img class="logo" src="image/Logo.webp" alt="Logo">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 offset-md-6 mb-lg-auto ">
                <li class="nav-item">
                <a class="nav-link active" aria-current="page" href="../index.php">Acceuil</a>
                
                <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                    Nos programmes
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="bhs.php">Business & HealthCare School</a></li>
                </ul>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="space.php">Energie Space</a>
                </li>
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#"><button class="btn btn-primary">Blog</button></a>
                </li>
                
                
                <li class="nav-item">
                <a class="nav-link" aria-current="page" href="#">À propos</a>
                </li>
            </ul>
            <div class="lng">
                <img src="./image/fr.jpeg" alt="" class="fr">
                <img src="./image/en.jpeg" alt="" class="en">
            </div>
            </div>
            
        </div>
        
    </nav>
</header>
    <div class="container">
        <!-- la barre de recherche -->
        <div class="container">
            <div class="row">
            <div class="col-12 col-md-6 ">
                <p>Nos articles</p>
            </div>
            <div class="col-12 col-md-6">
                <form class="d-flex" role="search">
                    <input class="form-control me-2" type="search" placeholder="Search"  name="search" aria-label="Search">
                    <button class="btn btn-outline-success" type="submit" name="searchBtn">Search</button>
                   
                </form>
            </div>
            </div>
        </div>
         <!-- Code pour Effectuer les recherches -->
         <?php
           

           if (isset($_POST['searchBt'])){
               $search= $_POST['search'];
               $reqSelect= "select * from articles where titre like '%$search%' ";
           } else {
               $reqSelect= "select * from articles";
           }
           $resultat= mysqli_query($conn, $reqSelect);
           $nbr= mysqli_num_rows($resultat);
           echo "<p><b>".$nbr."</b> Resultats de votre recherche...</p>";
           while( $ligne= mysqli_fetch_assoc($resultat)){
        ?>
        <!-- Partie dynamique pour afficher les articles -->
        <div class="container">
                    <div class="row">
                        <div class="col-12 col-md-6"><img class="w-100 " src="<?= $ligne['photo']; ?>" alt="Image du post"></div>
                        <div class="col-12 
                        my-3 col-md-6">
                            <div class="Posthead d-flex">
                                <div id="profil" class="profil mx-3">
                                    <img src="<?= $ligne['photoAd']; ?> " alt="Photo de l'admin">
                                </div>
                                <div class="info">
                                    <b><?= $ligne['admin']; ?> </b>
                                    <p><?= $ligne['date']; ?> </p>
                                </div>
                            </div>
                            <div class="post my-md-4">
                                <h2><a href="article.php?id=<?= $ligne['id']; ?>"><?= $ligne['titre']; ?></a></h2>
                                <div class="likebar">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
            <?php } ?>
                    
    </div>
    <footer>
     <section class="contenaire3">
                <h2 >Ils croient en nous</h2>
                <div class="container my-3">
                   <div class="row">
                    <div class="col-4 col-md-2"><a href="https://www.hautsdefrance.fr/la-region-relance-lappel-a-projets-acteurs-de-lenergie-pour-lafrique/"><img class="w-50" src="image/logo1.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.engie.com/"><img class="w-50" src="image/logo2.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.edf.fr/"><img class="w-50" src="image/logo3.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://francais.dggf.nl/"><img class="w-50" src="image/logo4.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.collegedeparis.fr/"><img class="w-50" src="image/logo5.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.francophonie.org/"><img class="w-50" src="image/logo6.webp" alt=""></a></div>
                   </div>
                   <div class="row my-5">
                    <div class="col-4 col-md-2"><a href="https://fondation.edf.com/"><img class="w-50" src="image/logo7.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://education.github.com/schools"><img class="w-50" src="image/logo8.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://gruene-buergerenergie.org/fr/sengager/challenge-call/"><img class="w-50" src="image/logo9.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.ifdd.francophonie.org/"><img class="w-50" src="image/logo10.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.africinnov.com/fr"><img class="w-50" src="image/logo11.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://tg.ambafrance.org/Lancement-des-projets-de-la-societe-civile-laureats-du-fonds-PISCCA-2021"><img class="w-50" src="image/logo12.webp" alt=""></a></div>
                   </div>
                   <div class="row">
                    <div class="col-4 col-md-2"><a href="http://www.saber-abrec.org/"><img class="w-50" src="image/logo14.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.initiative-france.fr/"><img class="w-50" src="image/logo15.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://numerique.gouv.tg/"><img class="w-50" src="image/logo16.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://d-lab.mit.edu/"><img class="w-50" src="image/logo17.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.boad.org/presentation/"><img class="w-50" src="image/logo18.webp" alt=""></a></div>
                    <div class="col-4 col-md-2"><a href="https://www.se.com/fr/fr/about-us/sustainability/foundation/"><img class="w-50" src="image/logo19.webp" alt=""></a></div>
                   </div>
                    
                </div>
              </section>

              <section class="contenaire4">
                <h2>Ils parlent de nous</h2>
                <div class="">
                  <div id="carouselExampleControls" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                      <div class="carousel-item active">
                        <img src="image/logos/log1.png.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="image/logos/log2.png.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="image/logos/log3.png.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item active">
                        <img src="image/logos/log.png.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="image/logos/log5.png.png" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="image/logos/log6.png.png" class="d-block w-100" alt="...">
                      </div>
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleControls" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>

                </div>

              </section>
              <section class="">
                
                <div class="container-fluid pt-3" id="footer">
                  <div class="container">
                    <div class="row gx-md-5">
                      <div class=" col-12 mt-3 mt-md-0 col-md-6">
                        <form action="traitement.php" method="post">
                          <h2>Newsletter</h2>
                          <p>Recevez nos dernières infos, podcats, conseil</p>
                          <p>Nom et prénoms:</p>
                          <input class="form-control" type="text" name="nom">
                          <P>Email:</P>
                          <input type="email" class="form-control" name="Email" id="">
                            <input type="radio" value="" name="lang" id=""> <span class="input-group">Je préfère recevoir les informations en français</span> 
                            <input type="radio" value="" name="lang" id=""> <span class="input-group">Je préfère recevoir les informations en anglais</span>
                          
                          <br>
        
                          <button type="button" name="send" class="btn btn-warning">Envoyer</button>

                      </form>
                      </div>
      
                      <div class=" col-12  col-md-6">
                        <img id="logo" src="image/Logo.webp" alt="">
                        <ul>
                          <li>Accueil</li> <br>
                          <li>Business Healthcare school</li> <br>
                          <li>Energy Space</li>
                          <li>Blog</li>
                        </ul>
      
                      </div>
                    </div>
                  </div>
                  </div>
              </section>
              <section  class="end">
                <p>2020 - Energie Generation - All rights reserved</p>
              </section>

        </section>
     </footer>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>

</body>

</html>