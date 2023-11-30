<?php
session_start();

//verification que l'utilisateur est authentifié
/*if($_SESSION['identifiant']==null){
    //sinon, redirection vers la page d'authentification (page index.php)
    header('Location: index.php');
//error_reporting(E_ALL);
}*/
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>Ajouter un instrument</title>
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

    <!-- Contenu principal page ajouter_produit-->

    <section class="page-section bg-primary" id="about">
            <div class="container px-4 px-lg-5">
                <div class="row gx-4 gx-lg-5 justify-content-center">
                    <div class="col-lg-8 text-center">
                        <h2 class="text-white mt-0">Complétons ensemble notre encyclopédie !</h2>
                        <hr class="divider divider-light" />
                        <p class="text-white-75 mb-4">Notre encyclopédie est alimentée par nos internautes, vous avez la possibilité de nous aider à compléter notre collection en ajoutant un instrument de musique.
                            <br>Nous remercions chaleureusement nos chers contributeurs.
                        </p>
                    </div>
                </div>
            </div>
    </section>

    <section class="page-section" id="contact">
        <div class="container px-4 px-lg-5">  
            <div class="row gx-4 gx-lg-5 justify-content-center mb-5">
                <div class="col-lg-6">
                    <div class="form-floating">

                        <h2 class="h2 mb-4">Ajouter un instrument</h2>
                        <!-- réutilisation des class css du thème pour styliser la page-->
                            <form method="POST" action="#">
                                <label>Nom de l'instrument</label>
                                <input class="form-control" type="text" name="nominstrument" required>
                                <label>Famille de l'instrument</label>
                                <select class="form-control" name="famille" required> 
                                <!-- liste déroulante utilise la fonction select (Recherches sur Internet) -->
                                <option value="cordes">cordes</option>
                                <option value="vent">vent</option>
                                <option value="percussions">percussions</option>
                                <option value="bois">bois</option>
                                <option value="cuivres">cuivres</option>
                                <option value="claviers_numeriques">claviers numérique</option>
                                <option value="guitares">guitares</option>
                                <option value="guitares_basses">guitares basses</option>
                                <option value="batteries">batteries</option>
                                <option value="synthetiseurs">synthétiseurs</option>
                                <option value="vst">vst</option>
                                <option value="micros">micros</option>
                                </select>
                                <label>Description de l'instrument (100 caractères max)</label>
                                <input class="form-control" type="textarea" name="description" required>
                                <!--maximum 100 caractères-->
                                <hr>
                                <button type="submit" class="btn btn-primary">Envoyer</button>
                            </form>

                            <?php 
                            //récupérer la valeur envoyé par le formulaire en la stockant dans une variable
                            $nominstrument=$_POST['nominstrument'] ?? null;
                            $famille=$_POST['famille'] ?? null;
                            $description=$_POST['description'] ?? null;
                            if($nominstrument!=null && $famille!=null && $description!=null){
                            include("connexion.php"); // connection à la base de données pour y stocker les variables
                            if (mysqli_query($connexion,"INSERT INTO instruments(nominstrument, famille, description) 
                            VALUES ('$nominstrument','$famille','$description')")) {
                                echo"<p> Insertion en base de données reussie</p>";
                            }
                            else{
                                echo "<p> Erreur insertion en base de données</p>";
                            }
                            // la ligne ci-dessous est utile pour le déboggage
                            //echo"$nominstrument, $famille, $description";
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