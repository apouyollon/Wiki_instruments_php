<?php
session_start();
$id=($_GET['id']) ?? null;
?>
<!DOCTYPE html>
    <html lang="en">
        <head>
            <meta charset="utf-8" />
            <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
            <meta name="description" content="" />
            <meta name="author" content="" />
            <title>Supprimer</title>
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

        <!-- Main Content-->
            <section class="page-section bg-primary" id="about">
                <div class="container px-4 px-lg-5">
                    <div class="row gx-4 gx-lg-5 justify-content-center">
                        <div class="col-lg-8 text-center">
                            <a class="btn btn-light btn-xl" href="liste_produits.php">Retour</a>
                            <!-- bouton de lien vers la page ajouter_produit.php-->
                        </div>
                    </div>
                </div>
            </section>
                <?php
                include("connexion.php");
                $id=($_GET['id']) ?? null; 
                if($id!=null){
                    //echo"id=!null"; (déboggage)
                    if (mysqli_query($connexion,"delete FROM instruments WHERE id ='$id'")){
                        echo"<p>Suppression en base de donnéee reussie</p>";
                        // la requête sql prend la ligne du tableau possédant l'indice id et la supprime
                    }
                    else {
                        echo "<p>Erreur suppression en base de données</p>";
                    }          
                }
                else {
                    echo "<p>Erreur id == null</p>";
                } 

                ?>
            </div>
        <!-- Footer-->
        <?php
       include ("layouts/footer.html");
       ?>