<?php
include "config.php";
include "../../handlers/session_handlers/sessionStarter.php";
$result = $stand->getStandChief($_SESSION['username']);
if ($result->rowCount()) {
    $stand_id = 0;
    $vid_name = "";
    $vid_path = "";
    $vid_id = 0;
    $vid_sta_id = 0;
    foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $val)
        $stand_id = $val['sta_id'];
    $vid_info = $videotheque->getVideotheque((int) $stand_id);
    foreach ($vid_info->fetchAll(PDO::FETCH_ASSOC) as $val) {
        $vid_name = $val['vie_nom'];
        $vid_path = $val['vie_video'];
        $vid_id = $val['vie_id'];
        $vid_sta_id = $val['sta_id'];
    }
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Videotheque</title>
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
                        <a href="./addUrl.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Youtube Url
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
                                                Accueil / Ajout Video
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
            <!--  $vid_name
            $vid_path
            $vid_id 
            $vid_sta_id -->
            <div class="main-body">
                <div class="container">
                    <div id="vid_container">
                        <form action="../handlers/form_handlers/redirectVideotheque.php" id="addVid" method="post">
                            <div class="form-group">
                                <label>
                                    <h4>Nom vidéothèque:</h4>
                                </label>
                                <?php if ($_SESSION['username'] != 'admin') : ?>
                                    <input required placeholder="Saisir le nom du vidéothèque" class="form-control form-control-sm" type="text" name="videotheque_name" id="videotheque_name" value="<?= $vid_name ?>">
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
                                        <?php if ($val->sta_id == $vid_sta_id) : ?>
                                            <option value="<?= $val->sta_id ?>" selected><?= $val->sta_nom ?></option>
                                        <?php endif; ?>
                                        <?php if ($val->sta_id != $vid_sta_id) : ?>
                                            <option value="<?= $val->sta_id ?>"><?= $val->sta_nom ?></option>
                                        <?php endif; ?>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <!-- submit button -->
                            <div class="mt-5 mb-5">
                                <center>
                                    <button type="submit" class="btn btn-primary btn-lg" name="addCartouche" id="btnAddCartouche">Étape Suivant =></button>
                                </center>
                            </div>
                        </form>
                    </div>

                    <div class="container" id="vidUpload">
                        <form action="./addVideotheque.php" method="post" enctype="multipart/form-data">
                            <div class="mt-5 mb-5">
                                <div class="form-group">
                                    <label>
                                        <h4>Télécharger une vidéo:</h4>
                                    </label><br>
                                    <input type="file" name="file" id="file_change" class="btn btn-primary">
                                    <input type="submit" value="Terminer!" id="upload_video" name="upload_video" class="btn btn-primary">
                                </div>
                            </div>
                        </form>
                        <?php
                        if (isset($_POST['upload_video'])) {
                            $name = $_FILES['file']['name'];
                            $tmp = $_FILES['file']['tmp_name'];
                            move_uploaded_file($tmp, "../videos/" . $name);
                            $last_added = $videotheque->getLastAddedVideotheque();
                            if ($last_added->rowCount()) {
                                foreach ($last_added->fetchAll(PDO::FETCH_ASSOC) as $video)
                                    $id = $video['vie_id'];
                                $update = $videotheque->updateVideothequeVideo($id, $name);
                            }
                        }
                        ?>
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
            stand a été ajouté!
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
        $('#vidUpload').hide();
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
            $('#btnAddCartouche').click(function(event) {
                event.preventDefault();
                var arr = {
                    "nom_vid": $('#videotheque_name').val(),
                    "stand": $('#standList option:selected').val(),
                    "video": ""
                }

                if ((arr.nom_vid != "")) {
                    $.ajax({
                        url: '../handlers/form_handlers/redirectVideotheque.php?nom_vid=' + arr.nom_vid + '&stand_id=' + arr.stand,
                        method: 'post',
                        data: {
                            data: JSON.stringify(arr),
                            stand_id: arr.stand
                        },
                        success: function(response) {
                            $('#successPassed').slideToggle();
                            $('#addVid').fadeToggle()
                            $('#vidUpload').fadeToggle(3000);
                            setTimeout(function() {
                                $('#successPassed').slideToggle();
                            }, 3000);
                        },
                        error: function(error) {
                            console.log(error);
                        }
                    })
                } else {
                    $('#errorMsg').slideToggle();
                    $('#activateStep1').addClass('falseStep')
                    setTimeout(function() {
                        $('#errorMsg').slideToggle();
                    }, 3000);
                }
            })
        })
    </script>

</body>

</html>