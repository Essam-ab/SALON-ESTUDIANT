<?php
include "config.php";
include "../../handlers/session_handlers/sessionStarter.php";
$result = $stand->getStandChief($_SESSION['username']);
if ($result->rowCount()) {
    $stand_id = 0;
    $url_name = "";
    $url_path = "";
    $url_id = 0;
    $url_sta_id = 0;
    foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $val)
        $stand_id = $val['sta_id'];
    $url_info = $videotheque->getYoutubeUrls((int) $stand_id);
    foreach ($url_info->fetchAll(PDO::FETCH_ASSOC) as $val) {
        $url_name = $val['vie_nom'];
        $url_path = $val['vie_video'];
        $url_id = $val['vie_id'];
        $url_sta_id = $val['sta_id'];
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Url</title>
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
                    <?php if ($_SESSION['username'] == 'admin') : ?>
                        <li>
                            <a href="./addStand.php">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Stand
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="./addVideotheque.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Védeothèque
                        </a>
                    </li>
                    <li>
                        <a href="./AddStandDocumentation.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Documentaire stand
                        </a>
                    </li>
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
                                                Accueil / Ajout Youtube Url
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
                    <div id="vid_container">
                        <!-- lib videotheque -->
                        <form action="" method="post">
                            <div class="form-group">
                                <label>
                                    <h4>Nom vidéothèque:</h4>
                                </label>
                                <?php if ($_SESSION['username'] != 'admin') : ?>
                                    <input required placeholder="Saisir le nom du vidéothèque" class="form-control form-control-sm" type="text" name="videotheque_name" id="videotheque_name" value="<?= $url_name ?>">
                                <?php endif; ?>
                                <?php if ($_SESSION['username'] == 'admin') : ?>
                                    <input required placeholder="Saisir le nom du vidéothèque" class="form-control form-control-sm" type="text" name="videotheque_name" id="videotheque_name" value="">
                                <?php endif; ?>
                            </div>

                            <div class="form-group">
                                <label>
                                    <h4>Selectionez un stand</h4>
                                </label> <br>
                                <select name="standList" class="form-control form-control-sm" id="standList">
                                    <?php foreach ($stand->getAllStand()->fetchAll(PDO::FETCH_OBJ) as $val) : ?>
                                        <?php if ($val->sta_id == $url_sta_id) : ?>
                                            <option value="<?= $val->sta_id ?>" selected><?= $val->sta_nom ?></option>
                                        <?php endif; ?>
                                        <?php if ($val->sta_id != $url_sta_id) : ?>
                                            <option value="<?= $val->sta_id ?>"><?= $val->sta_nom ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div id="vidUpload">
                                <div class="mt-5 mb-5">
                                    <div class="form-group">
                                        <label>
                                            <h4>Télécharger une vidéo:</h4>
                                        </label><br>
                                        <div class="form-check">
                                            <?php if ($_SESSION['username'] != 'admin') : ?>
                                                <input required placeholder="Saisir le url du vidéo" class="form-control" type="text" name="video_url" id="video_url" value="<?= $url_path ?>">
                                            <?php endif; ?>
                                            <?php if ($_SESSION['username'] == 'admin') : ?>
                                                <input required placeholder="Saisir le url du vidéo" class="form-control" type="text" name="video_url" id="video_url">
                                            <?php endif; ?>

                                            <button type="button" class="btn btn-info form-control" id="click_to_check"><i class="fab fa-youtube"></i></button>
                                        </div>
                                        <iframe id="frame_display" width="1066" height="500" src="" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                    </div>
                                </div>
                            </div>
                            <!-- submit button -->
                            <div class="mt-5 mb-5">
                                <center>
                                    <button type="submit" class="btn btn-primary btn-lg" name="addLibrary" id="addLibrary">Terminer!</button>
                                </center>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </section>

        <!-- msgs -->
        <div class="alert alert-danger animated" role="alert" id="errorMsg">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Erreur!</h4>
            SVP! remplissez le formulaire...
        </div>

        <div class="alert alert-success animated" role="alert" id="successMsg">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Succès!</h4>
        </div>

        <div class="alert alert-success animated" role="alert" id="successAdded">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Succès!</h4>
            Vidéothèque a été ajouté!
        </div>

        <div class="alert alert-success animated" role="alert" id="successPassed">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Succès!</h4>
            étape passée!
        </div>
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
        $('#frame_display').hide();
        $('#finish_addition').hide();
        $('#successAdded').hide();
        $('#successMsg').hide();
        $('#errorMsg').hide();
        $('#successPassed').hide();
        $('#to_logo').hide();
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
            //live verifying youtube video url
            function GrabVideo(url) {
                $('#frame_display').attr('src', url);
                $('#frame_display').slideToggle();
            }

            $('#click_to_check').click(function() {
                if ($('[name="video_url"]').val() == "") {
                    $('#errorMsg').slideToggle();
                    setTimeout(function() {
                        $('#errorMsg').slideToggle();
                    }, 3000);
                } else
                    GrabVideo($('[name="video_url"]').val());
            })

            $('[name="addLibrary"]').click(function(e) {
                e.preventDefault();
                url = $('[name="video_url"]').val();
                name = $('[name="videotheque_name" ]').val();
                stand = $('#standList option:selected').val();
                console.log(stand)
                if (name != "" && url != "") {
                    $.ajax({
                        url: '../handlers/url_handlers/addUrlHandler.php',
                        method: 'post',
                        data: {
                            url: url,
                            name: name,
                            stand: stand
                        },
                        success: function(response) {
                            if (response == 1) {
                                $('#successAdded').slideToggle();
                                setTimeout(function() {
                                    $('#successAdded').slideToggle();
                                    window.location.replace("./addUrl.php");
                                }, 3000);
                            } else {
                                alert(response)
                            }
                        },
                        error: function(error) {
                            alert(error.getAllResponseHeaders());
                        }
                    })
                } else
                    alert("nope you cant!");
            })

        })
    </script>

</body>

</html>