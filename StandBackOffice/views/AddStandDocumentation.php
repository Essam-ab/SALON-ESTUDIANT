<?php
include "config.php";
include "../../handlers/session_handlers/sessionStarter.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Documentation</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="../assets/css/style.css">
    <style>
        body {
            background: white;
            overflow-y: scroll;
        }

        .all-over {
            position: fixed;
            z-index: 1111;
            margin-top: -10px;
        }

        #cancel {
            margin-top: 10px;
            margin-left: 10px;
        }

        section {
            height: 105vh
        }
    </style>
</head>

<body>
    <div class="all-content">
        <div class="all-over">
            <input type="checkbox" class="d-none" id="check">
            <label for="check">
                <i class="fa fa-bars" aria-hidden="true" id="btn"></i>
                <i class="fa fa-times" aria-hidden="true" id="cancel"></i>
            </label>
            <div class="sidebar">
                <nav><img src="../../template/logo/Estudian_logo.png" alt="logo"></nav>
                <ul>
                    <li>
                        <a href="../index.php">
                            <i class="fa fa-home" aria-hidden="true"></i>
                            Accueil
                        </a>
                    </li>
                    <li>
                        <a href="./addVideotheque.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Védeothèque
                        </a>
                    </li>
                    <li>
                        <a href="./addUrl.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Youtube Url
                        </a>
                    </li>
                    <?php if ($_SESSION['username'] == 'admin') : ?>
                        <li>
                            <a href="./addStand.php">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Stand
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="./addLiveStreamStand.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Live-Stream
                        </a>
                    </li>
                    <li>
                        <a href="./addStandChief.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Chef stand
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <section>
            <header>
                <div class="header-wrapper">
                    <div class="container">
                        <div class="upper-nav">
                            <div class="header-search">
                                <div class="form-check-inline">
                                    <div class="topnav">
                                        <h1 class="text-dark">BACKOFFICE</h1>
                                    </div>
                                </div>
                            </div>
                            <div class="header-right-side">
                                <div class="header-container-right">
                                    <div class="right-inner-container">
                                        <div class="panier-text">
                                            <p>
                                                <i class="fas fa-map-marker-alt"></i>
                                                Accueil / Stand Documentation
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="header-right-side">
                                <div class="header-container-right">
                                    <div class="right-inner-container">
                                        <div class="panier-text">
                                            <style>
                                                .link_back a {
                                                    font-size: 15px;
                                                    text-decoration: none;
                                                }
                                            </style>
                                            <p class="link_back">
                                                <a href="../../views/home.php">
                                                    <i class="fas fa-backward"></i>
                                                    Sortie de BackOffice
                                                </a>
                                            </p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </header>
            <hr>

            <div class="main-body">
                <div class="container">
                    <style>
                        #forPhp {
                            position: fixed !important;
                            top: 80%;
                            right: 5%;
                            width: 20vw;
                        }
                    </style>
                    <form method="POST" action="./AddStandDocumentation.php" enctype="multipart/form-data">
                        <div class="form-group">
                            <label>
                                <h4>Selectionez un stand</h4>
                            </label> <br>
                            <select name="standList" class="form-control form-control-sm" id="standList">
                                <?php foreach ($stand->getAllStand()->fetchAll(PDO::FETCH_OBJ) as $val) : ?>
                                    <option value="<?= $val->sta_id ?>"><?= $val->sta_nom ?></option>
                                <?php endforeach; ?>
                            </select>
                            <a href="./addStand.php">
                                <i class="fa fa-plus" aria-hidden="true"></i>
                                Ajouter un nouvelle Stand
                            </a>
                        </div>

                        <div class="form-group">
                            <label>
                                <h4>Télécharger un ficher<span class="small">(format PDF)</span></h4>
                            </label> <br>
                            <input type="file" name="upload_file" id="upload_file">
                        </div>

                        <!-- submit button -->
                        <div class="mt-5 mb-5">
                            <center>
                                <button type="submit" class="btn btn-primary btn-lg" name="addDocumentation" id="addDocumentation">Terminer!</button>
                            </center>
                        </div>
                    </form>

                    <?php
                    if (isset($_POST["addDocumentation"])) {
                        if ($_POST['addDocumentation'] = "")
                            echo '<div class="alert alert-danger animated" role="alert" id="forPhp">
                                    <button type="button" class="close" data-dismiss="alert">&times;</button>
                                    <h4>Erreur!</h4>
                                    SVP! Choisi un fichier pdf.
                                </div>';
                        else {
                            $name = $_FILES['upload_file']['name'];
                            $tmp = $_FILES['upload_file']['tmp_name'];
                            $FileType = pathinfo("../documentations/" . $name, PATHINFO_EXTENSION);

                            if ($FileType == "pdf") {
                                move_uploaded_file($tmp, "../documentations/" . $name);
                                $result = $stand->addStandDocumentation($name, (int) $_POST['standList']);
                                if (!$result->rowCount())
                                    echo '<div class="alert alert-danger" id="forPhp">
                                            <h4>Erreur!</h4>
                                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                                            oops! Something went Wrong.
                                        </div>';
                                else {
                                    echo ' <div class="alert alert-success animated" role="alert" id="forPhp">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Succès!</h4>
                                        La documentation a été ajouté.
                                    </div>';
                                }
                            } else {
                                echo '<div class="alert alert-warning animated" role="alert" id="forPhp">
                                        <button type="button" class="close" data-dismiss="alert">&times;</button>
                                        <h4>Erreur!</h4>
                                        SVP! Le type de fichier doit être pdf.
                                   </div>';
                            }
                        }
                    }
                    ?>
                </div>
            </div>
        </section>

    </div>

    <div class="loadingio-spinner-ripple-8qkb06zpvbs" id="loader">
        <div class="ldio-s00q76hkpb">
            <div></div>
            <div></div>
        </div>
    </div>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <script>
        $('.all-content').hide();
        $('#successAdded').hide();
        $('#successMsg').hide();
        $('#errorMsg').hide();
        $('#successPassed').hide();
        $('#loader').show();
        setTimeout(() => {
            $('#loader').fadeToggle();
            $('.all-content').fadeToggle();
        }, 300);

        //margin main body
        $('#btn').on('click', function() {
            $('section').toggleClass('margeup')

        })
        $('#cancel').on('click', function() {
            $('section').toggleClass('margeup')
        })

        $(document).ready(function() {
            //
        })
    </script>
</body>

</html>