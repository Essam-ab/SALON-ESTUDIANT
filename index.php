<?php
include "config.php";
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <title>Acceuil | Login</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- fonts -->
    <link href="https://fonts.googleapis.com/css?family=Quicksand:700&display=swap" rel="stylesheet">
    <!--===============================================================================================-->
    <!-- icons -->
    <link rel="icon" type="image/png" href="./assets/icons/favicon.ico" />
    <!-- styles -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/css/bootstrap.css">
    <!--===============================================================================================-->
    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="assets/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="./assets/css/util.css">
    <link rel="stylesheet" type="text/css" href="./assets/css/main.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="./assets/loader/loading-bar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="./assets/css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="./assets/css/template.css">
    <!--===============================================================================================-->
    <style>
        body {
            overflow: hidden
        }

        .shadow-lg {
            padding: 50px;
        }

        @media screen and (max-width:600px) {
            .input-fixer {
                width: 101% !important
            }

            .sign_text_container {
                display: none;
            }

            .container_in {
                background-size: cover;
                background-repeat: no-repeat;
                background-position: center center;
            }

            .shadow-lg {
                width: 100% !important;
                margin: auto;
                padding: 30px;
            }

            .sign_form_container {
                transform: translate(30%, -28%)
            }

            .sign_form_container h1 {
                font-size: 16px;
            }

            .sign_form_container span {
                font-size: 14px;
            }

            .sign_form_container .form-row {
                width: 105%;
                margin-bottom: 0px;
            }

            .sign_form_container .form-group {
                width: 100%;
                margin: 0px auto;
                margin-bottom: 2px;
            }

            .sign_form_container .form-group.select {
                width: 100%;
                margin-bottom: 2px;
            }

            .logo_container {
                transform: translate(2vw, 2vh) scale(0.8);
                height: 15vh;
                width: 25vw;
            }
        }

        .inner_title_box {
            background: #000;
            width: 29%;
            padding: 10px 10px 10px 10px;
            margin-bottom: 20px;
        }

        .inner_title_box h1 {
            font-family: 'Quicksand', 'Poppins', sans-serif;
            color: white;
        }

        .back_title_box {
            background: #77ece9;
            padding: 35px;
            width: 29%;
            position: absolute;
            transform: translate3d(-20px, -50px, 10px);
            z-index: -1;
        }

        .all-content {
            background: #eff1f5;
        }

        .student_img {
            position: fixed;
            background: url("./template/img/img_3.png");
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            height: 100vh;
            width: 100vw;
            transform: scale(0.6) translate(8%, 4vh);
        }

        .student_hat {
            position: fixed;
            background: url(./template/img/img_4.png);
            background-repeat: no-repeat;
            background-position: center;
            background-size: contain;
            height: 100px;
            width: 100px;
            transform: translate(51.8vw, 13.5vh);
        }

        .inner_title_logos {
            margin: 10px 0px 0px 20px;
        }

        .inner_title_logos img:first-child {
            width: 70px
        }

        .inner_title_logos img:nth-child(2) {
            width: 50px
        }

        .logo_side_rain {
            position: fixed;
            right: 25%;
        }

        .logo_side_rain img {
            width: 80%
        }

        .btn-primary {
            border-color: transparent !important;
        }
    </style>
</head>

<body>
    <div class="all-content">
        <div class="container_in">
            <div class="logo_side_rain">
                <img src="./template/img/img_1.png" alt="">
            </div>
            <div class="student_img">
                <div class="student_hat">
                </div>
            </div>
            <nav>
                <style>
                    .logo_container {
                        background: none;
                    }
                </style>
                <div class="logo_container">
                    <img src="template/logo/Estudian_logo.png" alt="">
                </div>
            </nav>
            <div id="signin">
                <div class="sign_container_in">
                    <div class="sign_text_container">
                        <div class="inner_title_box">
                            <h1>BIENVENUE</h1>
                            <div class="back_title_box"></div>
                        </div>
                        <span>Visitez Le Salon VIRTUEL <br> de l'orientation <br> & des études <br> à l'étranger</span>
                        <p>
                            Des universités, un conseiller <br>
                            d’orientation et des organismes <br>
                            d’accompagnement <br>
                            sont à votre disposition
                        </p>

                        <div class="inner_title_logos">
                            <img src="./template/logo/logo_desinfect.png" alt="logo">
                            <img src="./template/logo/logo_right_side_desinfect.png" alt="logo">
                        </div>
                    </div>
                    <div class="sign_form_container">
                        <style>
                            .shadow-lg {
                                width: 76%;
                            }

                            .shadow-lg {
                                padding: 40px;
                                line-height: 0px !important;
                                transform: scale(0.8);
                            }
                        </style>
                        <div class="shadow-lg bg-white">
                            <h1>
                                Visitez Salon VIRTUEL
                                de l'orientation <br>
                                & des études à l'étranger
                            </h1>
                            <div id="toggle_sign_up">
                                <form action="" method="post" id="signup_form">
                                    <span>S'inscrire ?</span>
                                    <div class="form-row mt-4">
                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Nom" required>
                                        </div>

                                        <div class="form-group col-md-6">
                                            <input type="text" class="form-control" name="last_name" id="last_name" placeholder="Prénom" required>
                                        </div>
                                    </div>
                                    <div class="form-group select">
                                        <div class="form-group">
                                            <select id="inputNiveau" name="inputNiveau" class="form-control input-fixer">
                                                <option value="Default" selected>Vous êtes?</option>
                                                <option value="Etudiant">Etudiant</option>
                                                <option value="Lycéen">Lycéen</option>
                                                <option value="Jeune">Jeune Diplômé(e)</option>
                                                <option value="Parent">Parent</option>
                                                <option value="Enseignant">Enseignant</option>
                                                <option value="Autre">Autre</option>
                                            </select>
                                            <!-- <input type="text" class="form-control input-fixer" name="level" id="level" placeholder="Niveau" required> -->
                                        </div>
                                    </div>
                                    <div class="form-group select">
                                        <div class="form-group">
                                            <select id="inputRegion" name="inputRegion" class="form-control input-fixer">
                                                <option value="default" selected>Region</option>
                                                <?php foreach ($region->getAllRegions()->fetchAll(PDO::FETCH_ASSOC) as $val) : ?>
                                                    <option value="<?= $val['reg_id'] ?>"><?= $val['reg_nom'] ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <input type="email" class="form-control input-fixer" name="email" id="email" placeholder="Email" required>
                                    </div>
                                    <div class="form-group ">
                                        <input type="text" class="form-control input-fixer" id="phone_number" nom="phone_number" placeholder="Télèphone" required>
                                    </div>

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control" name="password" placeholder="Mot de passe" required>
                                        </div>
                                        <div class="form-group col-md-6">
                                            <input type="password" class="form-control" name="verify_password" placeholder="Vérification mdp" required>
                                        </div>
                                    </div>
                                    <center style="margin-top: 30px;"><button type="submit" name="submit_sign_in" class="btn btn-primary">Valider</button></center>
                                </form>

                                <div class="change_to_up" id="change_to_in">
                                    <a href="#"><span>Vous êtes déjà inscrit ?</span></a>
                                </div>
                            </div>
                            <div id="toggle_sign_in">
                                <form action="" method="post" id="signin_form">
                                    <span>Se connecter !</span>
                                    <div class="form-group mt-3">
                                        <input type="email" class="form-control" id="this_is_an_email" placeholder="Email">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control" id="this_is_a_secret" placeholder="Mot de passe">
                                    </div>
                                    <center style="margin-top: 30px;"><button type="submit" name="submit_sign_up" class="btn btn-primary">Valider</button></center>
                                </form>

                                <div class="change_to_up" id="change_to_up">
                                    <a href="#"><span>Vous n'avez pas de compte ?</span></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <style>
                .footer_rain {
                    place-self: center;
                }

                .footer_rain img {
                    width: 200px;
                    position: fixed;
                    bottom: 0;
                    margin-left: -10%;
                }
            </style>

            <footer>
                <div class="footer_left">
                    <img src="./template/logo/Logo_avec_contour.png" alt="logo">
                    <p><small> Partenaire média </small></p>
                </div>
                <div class="footer_rain">
                    <img src="./template/img/img_5.png" alt="">
                </div>
                <div class="footer_right">
                    <p><small> Powered by DIGILINKS</small></p>
                </div>
            </footer>
        </div>

        <div class="loadingio-spinner-ripple-8qkb06zpvbs" id="loader">
            <div class="ldio-s00q76hkpb">
                <div></div>
                <div></div>
            </div>
        </div>

        <!--===============================================================================================-->
        <!-- flash messages here -->
        <!-- errormsgs -->
        <div class="alert alert-danger animated" role="alert" id="errorMsg">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Erreur</h4>
            SVP! remplissez le formulaire...
        </div>
        <!-- successmsg -->
        <div class="alert alert-success animated" role="alert" id="successMsg">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Succès!</h4>
        </div>
        <!-- successsignup -->
        <div class="alert alert-success animated" role="alert" id="successSignup">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Succès</h4>
            vous êtes maintenant inscrit!
        </div>
        <!-- successadd -->
        <div class="alert alert-success animated" role="alert" id="successAdded">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Succès</h4>
            stand a été ajouté!
        </div>
        <!-- successpass -->
        <div class="alert alert-success animated" role="alert" id="successPassed">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Succès</h4>
            étape passée!
        </div>
        <!-- email or pass is incorrect -->
        <div class="alert alert-danger animated" role="alert" id="emailExist">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Erreur</h4>
            Email déjà exist!
        </div>
        <!-- username exist -->
        <div class="alert alert-danger animated" role="alert" id="usernameExist">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Erreur</h4>
            le numéro de téléphone doit être 8 numéros!
        </div>
        <!-- phone wrong -->
        <div class="alert alert-danger animated" role="alert" id="phoneWrong">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Erreur</h4>
            Mot de passe invalid!
        </div>
        <!-- email exist -->
        <div class="alert alert-danger animated" role="alert" id="incorrectCred">
            <button type="button" class="close" data-dismiss="alert">&times;</button>
            <h4>Erreur</h4>
            Email ou mot de passe invalide!
        </div>
        <!--===============================================================================================-->

        <!--===============================================================================================-->
        <!-- <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script> -->
        <!--===============================================================================================-->
        <script src="./node_modules/jquery/dist/jquery.min.js"></script>
        <!--===============================================================================================-->
        <script src="./assets/bootstrap/js/popper.js"></script>
        <script src="./assets/bootstrap/js/bootstrap.min.js"></script>
        <!--===============================================================================================-->
        <script src="./assets/select2/select2.min.js"></script>
        <!--===============================================================================================-->
        <script src="./assets/tilt/tilt.jquery.min.js"></script>
        <!--===============================================================================================-->
        <script src="./assets/loader/loading-bar.js"></script>
        <!--===============================================================================================-->
        <script>
            $('.js-tilt').tilt({
                scale: 1.1
            })
        </script>
        <!--===============================================================================================-->
        <script src="./assets/js/main.js"></script>
        <!--===============================================================================================-->
        <script>
            // preventing back button
            $('#toggle_sign_in').hide();
            window.history.forward();
            $('#change_to_in').click(function() {
                $('#toggle_sign_up').slideToggle();
                $('#toggle_sign_in').slideToggle();
            })
            $('#change_to_up').click(function() {
                $('#toggle_sign_in').slideToggle();
                $('#toggle_sign_up').slideToggle();
            })

            // starting flash message
            $('#successAdded').hide();
            $('#phoneWrong').hide();
            $('#successMsg').hide();
            $('#errorMsg').hide();
            $('#successPassed').hide();
            $('#successSignup').hide();
            $('#incorrectCred').hide();
            $('#emailExist').hide();
            $('#usernameExist').hide();

            $('.all-content').hide();
            $('#loader').show();
            setTimeout(() => {
                $('#loader').fadeToggle();
                $('.all-content').fadeToggle();
            }, 300);

            $('#signup').hide();
            $(document).ready(function() {
                $('#create_account').click(function() {
                    $('#signin').slideToggle();
                    $('#signup').slideToggle();
                })
                $('#already_have_account').click(function() {
                    $('#signin').slideToggle();
                    $('#signup').slideToggle();
                })

                //sign up handling
                $("form#signup_form").submit(function(e) {
                    e.preventDefault();
                    var f_name = $('#first_name').val();
                    var l_name = $('#last_name').val();
                    // var username = $('#username').val();
                    var email = $("#email").val();
                    var password = $('[name="password"]').val();
                    //added
                    var region = $('#inputRegion option:selected').val();
                    var niveau = $('#inputNiveau option:selected').text();
                    // var niveau = $('[name="level"]').val();
                    console.log(niveau)
                    var phone_number = $('#phone_number').val();
                    var verify_password = $('[name="verify_password"]').val();
                    var username = f_name + " " + l_name;
                    //checking if email existence
                    if (password == verify_password) {
                        $.ajax({
                            url: './handlers/form_handlers/checkExist.php',
                            method: 'post',
                            data: {
                                email: email
                            },
                            success: function(response) {
                                if (response == 1) { //exist
                                    $('#emailExist').slideToggle();
                                    setTimeout(function() {
                                        $('#emailExist').slideToggle();
                                    }, 2000);
                                } else { //not exist
                                    $.ajax({
                                        url: './handlers/form_handlers/signUpHandler.php',
                                        method: "post",
                                        data: {
                                            f_name: f_name,
                                            l_name: l_name,
                                            username: username,
                                            email: email,
                                            password: password,
                                            region: region,
                                            niveau: niveau,
                                            phone_number: phone_number
                                        },
                                        success: function(response) {
                                            if (response == 1) {
                                                $('#successSignup').slideToggle();
                                                setTimeout(function() {
                                                    $('#successSignup').slideToggle();
                                                }, 2000);
                                                $('.all-content').hide();
                                                $('#loader').show();
                                                $.ajax({
                                                    url: './handlers/form_handlers/signInHandler.php',
                                                    method: 'post',
                                                    data: {
                                                        email: email,
                                                        password: password,
                                                        username: username
                                                    },
                                                    success: function(response) {
                                                        if (response == 1) {
                                                            $('#loader').fadeToggle();
                                                            $('.all-content').fadeToggle();
                                                            setTimeout(function() {
                                                                $('#loader').fadeToggle();
                                                                window.location.replace("./views/home.php");
                                                            }, 1000);
                                                        } else { //0 or error message means credentiel dosen't exist    
                                                            $('#incorrectCred').slideToggle();
                                                            setTimeout(function() {
                                                                $('#incorrectCred').slideToggle();
                                                            }, 3000);
                                                        }
                                                    }
                                                })
                                            } else {
                                                //
                                            }
                                        },
                                        error: function(error) {
                                            console.log(error.getAllResponseHeaders());
                                        }
                                    })
                                }
                            }
                        })
                    } else {
                        $('#phoneWrong').slideToggle();
                        setTimeout(function() {
                            $('#phoneWrong').slideToggle();
                        }, 2000);
                    }

                });

                //login handling
                $("form#signin_form").submit(function(e) {
                    e.preventDefault();
                    var email = $('#this_is_an_email').val();
                    var password = $('#this_is_a_secret').val();
                    $.ajax({
                        url: './handlers/form_handlers/fetchUsername.php',
                        method: 'post',
                        data: {
                            email: email
                        },
                        success: function(response) {
                            if (response != 0) {
                                $.ajax({
                                    url: './handlers/form_handlers/signInHandler.php',
                                    method: 'post',
                                    data: {
                                        email: email,
                                        password: password,
                                        username: response
                                    },
                                    success: function(response) {
                                        // alert(response)
                                        if (response == 1) {
                                            $('#loader').fadeToggle();
                                            $('.all-content').fadeToggle();
                                            setTimeout(function() {
                                                $('#loader').fadeToggle();
                                                window.location.replace("./views/home.php");
                                            }, 1000);
                                        } else if (response == 0) {
                                            //password is wrong
                                            $('#incorrectCred').slideToggle();
                                            setTimeout(function() {
                                                $('#incorrectCred').slideToggle();
                                            }, 3000);
                                        } else {
                                            //email is wrong
                                            $('#incorrectCred').slideToggle();
                                            setTimeout(function() {
                                                $('#incorrectCred').slideToggle();
                                            }, 3000);
                                        }
                                    }
                                })
                            } else {
                                //email is wrong
                                $('#incorrectCred').slideToggle();
                                setTimeout(function() {
                                    $('#incorrectCred').slideToggle();
                                }, 3000);
                            }
                        }
                    })


                })
            })
        </script>

</body>

</html>