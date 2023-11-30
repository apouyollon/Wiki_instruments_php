<?php
session_start();
session_destroy(); // détruit la session existante pour que l'utilisateur puisse se reconnecter
//error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Creative - Start Bootstrap Theme</title>
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
    <body>
        <!-- Barre de menu ne contenant que la page register accessible sans connection-->
        <nav class="navbar navbar-expand-lg navbar-light fixed-top py-3" id="mainNav">
            <div class="container px-4 px-lg-5">
                <a class="navbar-brand">Wiki instruments</a>
                <button class="navbar-toggler navbar-toggler-right" type="button" data-bs-toggle="collapse" data-bs-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarResponsive">
                    <ul class="navbar-nav ms-auto my-2 my-lg-0">
                        <li class="nav-item"><a class="nav-link" href="register.php">Inscription</a></li>
                    </ul>
                </div>
            </div>
        </nav>
    </body>
</html>

<?php
include("layouts/header.html");
?>
                    
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">  
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <div class="form-floating">

                        <form method="POST" action="authentification.php">
                            <!--redirection du résultat du formulaire vers la page d'authentification-->
                                <label for="identifiant">Identifiant</label>
                                <input class="form-control" id="identifiant" type="text" name="identifiant"
                                placeholder="Entrez votre identifiant" data-sb-validations="required" />
                                <label for="motdepasse">Mot de passe</label>
                                <input class="form-control" id="motdepasse" type="password" name="motdepasse"
                                placeholder="Entrez votre mot de passe" data-sb-validations="required" />
                                
                            <hr>
                            <button type="submit" class="btn btn-primary">Envoyer</button>
                        </form>

                    </div>
                </div>  
            </div>
        </div>
    </section>

<?php
include("layouts/footer.html");
?>