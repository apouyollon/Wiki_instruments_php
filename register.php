<?php
session_start();
$identifiant=$_SESSION['identifiant'] ?? null;
//$_SESSION est la variable qui permet l'ouverture de la session (non renommable)
//error_reporting(E_ALL);
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Inscription</title>
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

    <?php
include("layouts/navbar.html");
include("layouts/header.html");
?>

    <!-- Contenu principal de la page register-->
    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">  
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <div class="form-floating">

                        <p class="text-body mb-4">Complétez le formulaire ci-dessous pour pouvoir enregistrer vos identifiants et vous identifier sur Wiki instruments</p>
                        <!-- réutilisation des class css du thème pour styliser la page-->
                            <form method="POST" action="#">
                                <label>Nom</label>
                                <input class="form-control" type="text" name="nom" required>
                                <label>Prénom</label>
                                <input class="form-control" type="text" name="prenom" required>
                                <label>Email</label>
                                <input class="form-control" type="email" name="email" required>
                                <label>Identifiant</label>
                                <input class="form-control" type="text" name="identifiant" required>
                                <label>Mot de passe</label>
                                <input class="form-control" type="password" name="motdepasse" required>
                                <hr>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>

                            <?php 
                            //récupérer la valeur envoyé par le formulaire en la stockant dans une variable
                            $nom=$_POST['nom'] ?? null;
                            $prenom=$_POST['prenom'] ?? null;
                            $email=$_POST['email'] ?? null;
                            $identifiant=$_POST['identifiant'] ?? null;
                            $motdepasse=$_POST['motdepasse'] ?? '';

                            //cryptage du mot de passe en md5
                            $mdpcrypt=md5($motdepasse);
                            if($nom!=null && $prenom!=null && $email!=null && $identifiant!=null && $mdpcrypt!=null){
                            include("connexion.php");
                            if (mysqli_query($connexion,"INSERT INTO utilisateur(nom, prenom, email, identifiant, motdepasse) VALUES ('$nom','$prenom','$email','$identifiant','$mdpcrypt')")) {
                                // création de la requête sql
                                echo"<p> Insertion en base de données reussie</p>";
                            }
                            else{
                                echo "<p> Erreur insertion en base de données</p>";
                            }
                            // la ligne ci-dessous permet de vérifier les informations envoyées en base de données 
                            //echo"$nom, $prenom, $email, $identifiant, $mdpcrypt";
                            }
                            
                            ?>
                        
                    </div>
                </div>  
            </div>
        </div>
    </section>

    <?php
include("layouts/footer.html");
?>

</html>