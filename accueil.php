<?php 
session_start();
//verification que l'utilisateur est authentifié
if($_SESSION['identifiant']==null){ //redirige vers index.php, donc l'identifiant récupéré vaut null
    //sinon, redirection vers la page d'authentification (page index.php)
    header('Location: index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Accueil</title>
        <!-- Liens CSS ci-dessous-->
        <!-- Favicon-->
        <link rel="icon" type="image/x-icon" href="assets/favicon.ico" />
        <!-- Bootstrap Icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link href="https://fonts.googleapis.com/css?family=Merriweather+Sans:400,700" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css?family=Merriweather:400,300,300italic,400italic,700,700italic" rel="stylesheet" type="text/css" />
        <!-- SimpleLightbox plugin CSS-->
        <link href="https://cdnjs.cloudflare.com/ajax/libs/SimpleLightbox/2.1.0/simpleLightbox.min.css" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="css/styles.css" rel="stylesheet" />
    </head>

    <?php //ajout du menu et du header à la page accueil (réccurents sur toutes les pages)
include("layouts/navbar.html");
include("layouts/header.html");
?>

    <!-- Contenu principal de la page accueil-->
    <section class="page-section bg-primary" id="about">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 justify-content-center">
                <div class="col-lg-8 text-center">
                    <h2 class="text-white mt-0">Wiki instruments, l'encyclopédie des instruments</h2>
                    <hr class="divider divider-light" />
                    <p class="text-white-75 mb-4">Wiki instruments est une encyclopédie en ligne intéractive, dans laquelle chacun peut ajouter un instrument.
                    Nous souhaitons vous proposer un contenu informatif, librement réutilisable et vérifié.
                    Wiki instruments vous fournit tout ses contenus gratuitement, sans publicité, et en respectant la confidentialité de vos données personnelles.
                    </p>
                    <a class="btn btn-light btn-xl" href="ajouter_produit.php">Ajouter un instrument</a>
                    <!-- bouton de lien vers la page ajouter_produit.php-->
                </div>
            </div>
        </div>
    </section>

<?php
include("layouts/footer.html");
?>

</html>