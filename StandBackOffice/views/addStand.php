<?php
include "config.php";
include "../../handlers/session_handlers/sessionStarter.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil | Stand</title>
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
                                                Accueil / Ajout Stand
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
                    <div id="article_container">
                        <form action="../handlers/form_handlers/addStand.php" id="addStand" method="post">
                            <!-- lib article -->
                            <div class="form-group">
                                <label>
                                    <h4>Nom stand:</h4>
                                </label>
                                <input required placeholder="Saisir le nom du stand" class="form-control form-control-sm" type="text" name="stand_name" id="stand_name">
                            </div>

                            <!-- description article -->
                            <div class="form-group">
                                <label>
                                    <h4>Description:</h4>
                                </label>
                                <input required placeholder="Saisir une description" class="form-control form-control-sm" type="text" name="stand_desc" id="stand_desc">
                            </div>

                            <!-- submit button -->
                            <div class="mt-5 mb-5">
                                <center>
                                    <button type="submit" class="btn btn-primary btn-lg" name="addCartouche" id="btnAddCartouche">Étape Suivant =></button>
                                </center>
                            </div>
                        </form>
                    </div>

                    <!-- photo article -->
                    <form action="" class="" id="picUpload" method="post">
                        <div class="mt-5 mb-5">
                            <div class="form-group">
                                <label>
                                    <h4>Télécharger une image:</h4>
                                </label> <br>
                                <input type="file" id="image_upload" name="image_upload" class="form-controlk-sm mb-3">
                                <input type="button" id="click_upload" name="click_upload" class="form-control-sm btn-primary btn" value="Upload">
                                <center>
                                    <button type="button" class="btn btn-primary btn-lg" id="to_logo">Étape Suivant =></button>
                                </center>
                            </div>
                        </div>
                    </form>

                    <form action="" class="" id="logoUpload" method="post">
                        <div class="mt-5 mb-5">
                            <div class="form-group">
                                <label>
                                    <h4>Télécharger un logo:</h4>
                                </label> <br>
                                <input type="file" id="image_upload_logo" name="image_upload_logo" class="form-controlk-sm mb-3">
                                <input type="button" id="click_upload_logo" name="click_upload_logo" class="form-control-sm btn-primary btn" value="Upload">
                                <center>
                                    <button type="button" class="btn btn-primary btn-lg" id="finish_addition">Terminer!</button>
                                </center>
                            </div>
                        </div>
                    </form>
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
        $('#picUpload').hide();
        $('#logoUpload').hide();
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
                    "stand_name": $("#stand_name").val(),
                    "stand_desc": $("#stand_desc").val(),
                    "image_location": "",
                    "logo_location": ""
                }

                if ((arr.stand_desc != "" && arr.stand_name != "")) {
                    $.ajax({
                        url: '../handlers/form_handlers/addStand.php',
                        method: 'post',
                        data: {
                            data: JSON.stringify(arr)
                        },
                        success: function(response) {
                            var data = jQuery.parseJSON(response)
                            $('#successPassed').slideToggle();
                            $('#addStand').fadeToggle()
                            $('#picUpload').fadeToggle(3000);
                            setTimeout(function() {
                                $('#successPassed').slideToggle();
                            }, 3000);

                            //upload image button click
                            $('#click_upload').click(function() {
                                if ($('#image_upload').val() == "") {
                                    $('#click_upload').attr('aria-disabled', 'true')
                                } else {
                                    $('#click_upload').attr('aria-disabled', 'false')
                                }

                                var form_data = new FormData();
                                var files = $('#image_upload')[0].files[0];
                                form_data.append('file', files);
                                $.ajax({
                                    url: '../handlers/upload.php?type=image',
                                    method: 'post',
                                    data: form_data,
                                    contentType: false,
                                    processData: false,
                                    success: function(response) {
                                        if (response != 0) {
                                            data.image_location = response;
                                            $.ajax({
                                                url: '../handlers/addImageHanlder.php',
                                                method: 'post',
                                                data: {
                                                    data: JSON.stringify(data)
                                                },
                                                success: function(response) {
                                                    var data = jQuery.parseJSON(response);
                                                    $('#to_logo').fadeToggle();
                                                    $('#successPassed').slideToggle();
                                                    setTimeout(function() {
                                                        $('#successPassed').slideToggle();
                                                    }, 2000);
                                                    $('#to_logo').click(function() {
                                                        $('#picUpload').fadeToggle();
                                                        $('#logoUpload').fadeToggle();

                                                        //upload logo button click
                                                        $('#click_upload_logo').click(function() {
                                                            if ($('#image_upload_logo').val() == "") {
                                                                $('#click_upload_logo').attr('aria-disabled', 'true')
                                                            } else {
                                                                $('#click_upload_logo').attr('aria-disabled', 'false')
                                                            }

                                                            var form_data = new FormData();
                                                            var files = $('#image_upload_logo')[0].files[0];
                                                            form_data.append('file', files);
                                                            $.ajax({
                                                                url: '../handlers/upload.php?type=logo',
                                                                method: 'post',
                                                                data: form_data,
                                                                contentType: false,
                                                                processData: false,
                                                                success: function(response) {
                                                                    if (response != 0) {
                                                                        data.logo_location = response;
                                                                        $.ajax({
                                                                            url: '../handlers/addImageHanlder.php',
                                                                            method: 'post',
                                                                            data: {
                                                                                data: JSON.stringify(data)
                                                                            },
                                                                            success: function(response) {
                                                                                var data = jQuery.parseJSON(response);
                                                                                $('#finish_addition').fadeToggle();
                                                                                $('#successAdded').slideToggle();
                                                                                setTimeout(function() {
                                                                                    $('#successAdded').slideToggle();
                                                                                    // window.location.replace("./addStand.php");
                                                                                }, 2000);
                                                                                $('#finish_addition').click(function() {
                                                                                    $.ajax({
                                                                                        url: '../handlers/form_handlers/addStandFinalize.php',
                                                                                        method: 'post',
                                                                                        data: {
                                                                                            data: JSON.stringify(data)
                                                                                        },
                                                                                        success: function(response) {
                                                                                            // alert(response)
                                                                                            window.location.replace("./addStand.php");
                                                                                        }
                                                                                    })
                                                                                })
                                                                            },
                                                                            error: function(error) {
                                                                                console.log(error)
                                                                            }
                                                                        })
                                                                    } else {
                                                                        console.log("File has not been updated+response=" + response);
                                                                    }
                                                                }
                                                            })
                                                        })
                                                    })
                                                },
                                                error: function(error) {
                                                    console.log(error)
                                                }
                                            })
                                        } else {
                                            console.log("File has not been updated+response=" + response);
                                        }
                                    }
                                })
                            })
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