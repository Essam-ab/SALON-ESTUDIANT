<?php
include "../handlers/session_handlers/sessionStarter.php";
include "config.php";
if (isset($_POST['logout'])) {
    include  "../handlers/session_handlers/sessionDestroyer.php";
    header("location: ../index.php?");
    exit();
}
$stand_name = $stand->getStandName($_GET['stand_id']);
if (!$stand_name->rowCount())
    echo "cant get stand_name ^^!";
else
    foreach ($stand_name->fetchAll(PDO::FETCH_OBJ) as $val)
        $stand_name = $val->sta_nom;

if (isset($_GET['stand_id'])) {
    $stmt = $stand->getAllStandDocumentation($_GET['stand_id']);
    if ($stmt->rowCount()) {
        foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $val) {
            $path = $val['doc_nom'];
        }
    }

    $get = $stand->getStand((int) $_GET['stand_id']);
    if ($get->rowCount()) {
        foreach ($get->fetchAll(PDO::FETCH_ASSOC) as $val) {
            $stand_desc = $val['sta_description'];
            $stand_email = $val['sta_email'];
            if ($val['sta_image'] == null)
                $stand_image = '../template/img/modèle%20stand.png';
            else
                $stand_image = '../' . $val['sta_image'];
        }
    }



    $get = $stand->getStandAudio($_GET['stand_id']);
    if ($get->rowCount()) {
        foreach ($get->fetchAll(PDO::FETCH_ASSOC) as $val) {
            $stand_audio = $val['sta_audio'];
        }
    }
}

$color = 'red;'
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $_SESSION['username'] ?></title>
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="./assets/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/bootstrap.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="../assets/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="../assets/loader/loading-bar.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="../assets/css/style.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" href="../assets/css/template.css">
    <!--===============================================================================================-->
    <style>
        body {
            background: white;
            overflow-x: hidden
        }

        .main_home_stand {
            background: url(<?= $stand_image ?>);
            background-size: cover;
            background-repeat: no-repeat;
            background-position: center;
            height: 550px;
            width: 1035px;
            margin: 0 auto;
            margin-top: 25px;
            box-shadow: 2px 2px 14px 5px rgba(0, 0, 0, 0.5);
        }

        .message_toggle {
            position: fixed;
            bottom: 0;
            right: 0;
            text-decoration: none;
            border-radius: 0px;
            padding: 10px;
            box-shadow: 2px 2px 10px 2px rgba(0, 0, 0, 0.7) !important;
            z-index: 111 !important;
        }

        .active_icon {
            background: #58e5e2 !important;
            border-color: #58e5e2 !important;
            color: white !important
        }

        .icons_container i {
            padding: 5px !important;
            transform: scale(2)
        }

        .icons_container i.fa-exclamation {
            padding: 5px 10px !important;
        }

        .icons_left a,
        .icons_right a {
            margin-right: 20px;
        }

        @media screen and (max-width: 600px) {
            .message_toggle {
                position: absolute;
                bottom: 0;
                right: 0;
            }
        }
    </style>
    <style>
        .chatting_app {
            margin-top: -40% !important;
        }
    </style>
</head>

<body>
    <?php if (!empty($stand_audio)) : ?>
        <audio src="../audio/<?= $stand_audio ?>" id="playAudio" autoplay></audio>
    <?php endif; ?>
    <script>
        document.onload = function() {
            document.getElementById('playAudio').play();
        }
    </script>
    <style>
        .message_toggle.animated {
            animation-duration: 1.5s;
            animation-iteration-count: infinite;
        }

        .message_toggle.animated i {
            color: #ef0303;
        }

        .fa-bell.animated {
            animation-duration: 1.5s;
            animation-iteration-count: infinite;
        }
    </style>
    <div class="all-content">
        <a href="#" id="toggle_message_app" class="message_toggle btn btn-primary">
            Messages
        </a>
        <div class="main_home_stand">

        </div>
        <div class="icons_container container">
            <div class="icons_left">
                <a class="me-right" name="standLogout" id="home_view" tabindex="0" data-toggle="tooltip" title="Revenir au stand">
                    <i class="fas fa-arrow-left"></i>
                </a>
                <a id="toggle_doc" class="me-right" tabindex="0" data-toggle="tooltip" title="Télécharger le/les brochure(s)">
                    <i class="fas fa-arrow-down"></i>
                </a>
                <a id="toggle_video_library" class="me-right" tabindex="0" data-toggle="tooltip" title="Vidéothèque">
                    <i class="fas fa-play" name="toggle_active"></i>
                </a>
                <a class="me-right me-right-fix" id="toggle_desc" tabindex="0" data-toggle="tooltip" title="Information">
                    <i class="fas fa-exclamation" name="toggle_active"></i>
                </a>
            </div>
            <div class="icons_right">
                <a class="me-left" tabindex="0" data-toggle="tooltip" id="toggle_mail" title="Mail">
                    <i class="far fa-envelope" name="toggle_active"></i>
                </a>
            </div>
        </div>
        <style>
            body {
                overflow-y: hidden;
            }

            .stand_link {
                margin-top: 20px;
            }

            .stand_link a {
                text-decoration: none !important;
            }

            #chat_message_list.home_chat {
                overflow-y: hidden;
                background: #eeeeee;
                box-shadow: 1px 0px 0px #c7d1d6;
                user-select: none;
            }

            #chat_message_list.home_chat img {
                width: 45%;
                place-content: center;
                place-items: center;
                place-self: center;
                transform: translateY(87px) scale(0.5);
            }

            .chatting_app {
                transition: all 0.5s;
                margin-top: -25%;
                margin-left: 5%;
                transform: translate(180px, -65%);
            }

            .chatting_app #chat_container {
                width: 60%;
                box-shadow: 2px 2px 2px 2px rgba(0, 0, 0, 0.5);
            }

            .chatting_app #chat_title {
                border-radius: 0px;
            }

            .chatting_app #search_container {
                border-radius: 0px;
            }

            #chat_form input {
                padding: 13px;
                padding-bottom: 15px;
                width: 90%;
            }

            .chatting_app .close_message_app {
                text-decoration: none;
                color: #77ece9;
                font-size: 36;
            }

            .close_message_app i {
                margin-left: -10px;
                margin-top: 10px;
                position: absolute;
                font-size: 30px;
            }

            @media screen and (max-width:600px) {
                #chat_container {
                    height: 50vh;
                    width: 50vw
                }

                #chat_container {
                    background: none !important;
                }

                .chatting_app {
                    background: none !important;
                }

                .chatting_app {
                    margin-top: -25%;
                    margin-left: 0%;
                    transform: translate(180px, -65%);
                }

                #chat_container {
                    display: grid;
                    grid:
                        'search_container chat_title'50px 'conversation_list chat_message_list'1fr "new_message_container chat_form"70px;
                    min-width: 755px;
                    max-width: 800px;
                }

                #chat_message_list {
                    background: white;

                    #chat_form form {
                        transform: translate(-18%, 0px);
                    }

                    font-size: 14px !important
                }

                .message_text {
                    font-size: 14px !important
                }

                #chat_form,
                #chat_message_list,
                #chat_title {
                    width: 55%;
                }

                .conversation {
                    padding: 0px 10px 0px 10px;
                }

                #chat_message_list.home_chat img {
                    transform: translateY(25px) scale(0.65);
                }

                .chatting_app {
                    margin-left: 1% !important;
                    position: absolute !important;
                    transition: all 0.5s !important;
                    left: 0px !important;
                    bottom: 10% !important;
                    margin-top: 0px !important;
                    transform: none !important;
                }

                #chat_container {
                    min-width: 700px;
                    max-width: 800px;
                }

                #chat_form form {
                    transform: translateX(-18%);
                }

                a#post_message {
                    height: 54px !important;
                }
            }

            #search_container,
            #conversation_list,
            #new_message_container {
                background: #091e38;
            }

            .conversation {
                border-bottom: 2px solid #ffd437;
            }

            .chatting_app .close_message_app {
                color: #091e38;
            }

            .chatting_app .close_message_app:hover {
                color: #e47a57;
            }

            .chatting_app #search_container {
                background: #ffd437;
            }

            #chat_form input {
                width: 80%;
            }

            .chatting_app {
                margin-top: -40%;
            }

            @media(max-width:420px) {

                #chat_form,
                #chat_message_list,
                #chat_title {
                    width: 60% !important;
                }

                #chat_container {
                    min-width: 500px !important;
                    max-width: 500px !important;
                    transform: scale(0.8) !important;
                    min-width: 600px !important;
                    max-width: 500px !important;
                }

                #chat_title {
                    width: 70%;
                    font-size: 12px;
                }

                .chatting_app {
                    margin-left: -12% !important;
                }
            }

            @media(max-width:320px) {

                #chat_form,
                #chat_message_list,
                #chat_title {
                    width: 60% !important;
                }

                #chat_container {
                    min-width: 500px !important;
                    max-width: 500px !important;
                    transform: translate(-8%, -10%) scale(0.7) !important;
                    min-width: 600px !important;
                    max-width: 500px !important;
                }

                #chat_title {
                    width: 70%;
                    font-size: 12px;
                }

                .chatting_app {
                    margin-left: -12% !important;
                }
            }
        </style>
        <div class="chatting_app animated">
            <div id="chat_container">
                <div id="search_container">
                    <a href="#" id="toggle_message_app" class="close_message_app">
                        <i class="fas fa-times-circle"></i>
                    </a>
                    <p class="text-center text-white text-capitalize font-weight-bold mt-3">
                        utilisateurs
                    </p>
                </div>
                <div id="conversation_list">

                </div>
                <div id="new_message_container">

                </div>
                <div id="chat_title">
                    <span> Voir toutes les personnes en ligne</span>
                </div>

                <div id="chat_message_list" class="home_chat">
                    <img src="../assets/img/home_chat.png" alt="">
                </div>
                <div id="chat_form">
                </div>
            </div>
        </div>

        <!-- stand description -->
        <div class="stand_description animated" id="stand_description">
            <span id="close_desc">
                <i class="fas fa-times-circle"></i>
            </span>
            <h2>Nom:</h2>
            <p><?= $stand_name ?></p>
            <h2>Description:</h2>
            <p><?= $stand_desc ?></p>
        </div>

        <!-- stand mail -->
        <div class="stand_mail">
            <div class="mail_title">
                <h4 class="text-center mt-2">Envoyer un mail</h4>
                <h6><?= $stand_email ?></h6>
            </div>
            <div class="mail_form">
                <div class="mail_form_container">
                    <div class="mb-3">
                        <form action="" method="POST" id="send_mail_form">
                            <textarea class="form-control" id="mail_input" name="mail_input" value="" placeholder="Message ici" required></textarea>
                            <button class="btn btn-primary form-control" type="submit" name="send_mail" id="send_mail">Envoyer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- stand video library -->
        <div class="stand_library animated">
            <div class="container-box">
                <span id="close_library">
                    <i class="fas fa-times-circle"></i>
                </span>
                <?php
                $v = $videotheque->getAllVideothequeInStand((int) $_GET['stand_id']);

                if ($v->rowCount()) {
                    $output = "";
                    $i = 1;
                    foreach ($v->fetchAll(PDO::FETCH_ASSOC) as $val) {
                        $another_name = "";
                        if ($i % 3 == 0 && $i != 1)
                            $another_name = "fix_third";
                        if ($val['vie_type'] == 'path')
                            $output .= "<div class='box' name='box' id='" . $another_name . "'>
                                           
                                            <div class='vid-box'>
                                                <video controls preload='metadata'>
                                                    <source src='../StandBackOffice/videos/" . $val['vie_video'] . "'type='video/mp4'>
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            <div class='details'>
                                                <div class='content'>
                                                    <h2 class='text-center'> " . $val['vie_nom']  . "</h2>
                                                    <hidden-content class='d-none'>" . $val['vie_id']  . "</hidden-content>
                                                </div>
                                            </div>
                                            </div>";
                        else
                            $output .= "<div class='box' name='box' id='" . $another_name . "'><div class='vid-box'>
                                                    <div class='video_frame_wrapper'><iframe width='560' height='315' src='" . $val['vie_video'] . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>
                                                </div>
                                                <div class='details'>
                                                    <div class='content'>
                                                        <h2 class='text-center'> " . $val['vie_nom']  . "</h2>
                                                        <hidden-content class='d-none'>" . $val['vie_id']  . "</hidden-content>
                                                    </div>
                                                </div>
                                                </div>";
                        $i++;
                    }
                    echo $output;
                } else
                    echo "<h5 class='text-danger'>videotheque est vide!</h5>";

                ?>
            </div>
        </div>
        <!-- stand documentation -->
        <style>
            .stand_documentation {
                background: #fff;
                width: 38%;
                height: 100vh;
                position: fixed;
                top: 0;
                padding: 20px;
                color: #000;
                border-right: 50px solid #091e38;
            }

            span#close_doc {
                position: absolute;
                top: 5px;
                right: 10px;
                font-size: 36px;
                color: #ffd437;
                transition: all .2s;
                cursor: pointer;
            }

            .stand_documentation h2 {
                color: #091e38;
            }

            @media screen and (max-width: 600px) {
                .stand_documentation {
                    width: 75%;
                }
            }
        </style>
        <div class="stand_documentation animated" id="stand_documentation">
            <span id="close_doc">
                <i class="fas fa-times-circle"></i>
            </span>
            <h2>Télécharger le/les brochure(s):</h2>
            <?php
            $stmt = $stand->getAllStandDocumentation($_GET['stand_id']);
            if ($stmt->rowCount()) {
                foreach ($stmt->fetchAll(PDO::FETCH_ASSOC) as $val) {
                    $path = $val['doc_nom'];
                    echo '
                    <a href="../StandBackOffice/documentations/' . $path . '" class="me-right" tabindex="0" data-toggle="tooltip" title="Télécharger un documentation">
                    ' . $path . '
                </a><br><br>
                    ';
                }
            } else
                echo "<h6 class='text-danger'>Pas de documentation!</h6>";
            ?>
        </div>
    </div>

    <div class=" loadingio-spinner-ripple-8qkb06zpvbs" id="loader">
        <div class="ldio-s00q76hkpb">
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- emty message warning -->
    <div class="alert alert-warning animated" role="alert" id="emptyMessage">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Alerte!</h4>
        Vous ne pouvez pas envoyer un message vide.
    </div>

    <!-- loged out of stand -->
    <div class="alert alert-warning animated" role="alert" id="loggedOutStand">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Alerte!</h4>
        Vous êtes maintenant déconnecter de cette stand.
    </div>

    <!-- email sent -->
    <div class="alert alert-success animated" role="alert" id="mailSent">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Succès!</h4>
        Email envoyé.
    </div>

    <!--===============================================================================================-->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="https://kit.fontawesome.com/b99e675b6e.js"></script>
    <!--===============================================================================================-->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/bootstrap/js/popper.js"></script>
    <script src="../assets/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/tilt/tilt.jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="../node_modules/jquery/dist/jquery.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/loader/loading-bar.js"></script>
    <!--===============================================================================================-->
    <div class="lds-dual-ring"></div>
    <style>
        .lds-dual-ring {
            display: inline-block;
            width: 80px;
            height: 80px;
            transform: translate(78vw, -47vh) !important;
        }

        .lds-dual-ring:after {
            content: " ";
            display: block;
            width: 64px;
            height: 64px;
            margin: 8px;
            border-radius: 50%;
            border: 6px solid #7b33d2;
            border-color: #7b33d2 transparent #6b79fd transparent;
            animation: lds-dual-ring 1.2s linear infinite;
        }

        @keyframes lds-dual-ring {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>

    <script>
        //loader hide
        $('.lds-dual-ring').hide();
        $('#mailSent').hide();
        //mail input
        $('.stand_mail').hide()
        $('#toggle_mail').click(function() {
            $('.stand_mail').slideToggle()
        })

        $('[name="toggle_active"]').click(function() {
            $(this).toggleClass('active_icon')
        })


        /*===========*library stand*===========*/
        /*=====================================================================================*/
        $('.stand_library').addClass('d-none');
        $('#toggle_video_library').click(function() {
            if (!$('.stand_library').hasClass('slideInLeft')) {
                $('.stand_library').removeClass('d-none');
                $('.stand_library').removeClass('slideOutLeft');
                $('.stand_library').addClass('slideInLeft');
            }
        })
        $('#close_library').click(function() {
            if ($('.stand_library').hasClass('slideInLeft')) {
                $('.stand_library').removeClass('slideInLeft');
                $('.stand_library').addClass('slideOutLeft');
            }
            $('.fa-play').toggleClass('active_icon')
        })


        /*===========*desc stand*===========*/
        /*=====================================================================================*/
        $('#stand_description').addClass('d-none');
        $('#toggle_desc').click(function() {
            if (!$('#stand_description').hasClass('slideInLeft')) {
                $('#stand_description').removeClass('d-none');
                $('#stand_description').removeClass('slideOutLeft');
                $('#stand_description').addClass('slideInLeft');
            } else if ($('#stand_description').hasClass('slideInLeft')) {
                $('#stand_description').removeClass('slideInLeft');
                $('#stand_description').addClass('slideOutLeft');
            }
        })
        $('#close_desc').click(function() {
            if ($('#stand_description').hasClass('slideInLeft')) {
                $('#stand_description').removeClass('slideInLeft');
                $('#stand_description').addClass('slideOutLeft');
            }
            $('.fa-exclamation').toggleClass('active_icon')
        })

        /*===========*doc stand*===========*/
        /*=====================================================================================*/
        $('#stand_documentation').addClass('d-none');
        $('#toggle_doc').click(function() {
            if (!$('#stand_documentation').hasClass('slideInLeft')) {
                $('#stand_documentation').removeClass('d-none');
                $('#stand_documentation').removeClass('slideOutLeft');
                $('#stand_documentation').addClass('slideInLeft');
            } else if ($('#stand_documentation').hasClass('slideInLeft')) {
                $('#stand_documentation').removeClass('slideInLeft');
                $('#stand_documentation').addClass('slideOutLeft');
            }
            $('.fa-arrow-down').toggleClass('active_icon')
        })
        $('#close_doc').click(function() {
            if ($('#stand_documentation').hasClass('slideInLeft')) {
                $('#stand_documentation').removeClass('slideInLeft');
                $('#stand_documentation').addClass('slideOutLeft');
            }
            $('.fa-arrow-down').toggleClass('active_icon')
        })

        /*=====================================================================================*/

        $(".hamburger").click(function() {
            $(".wrapper").toggleClass("collapsed");
        });

        // $('.inst_available').addClass('d-none');
        $('#toggle_inst_msg').click(function() {
            $('.stand_chat_container').slideToggle();
        })

        window.history.forward();
        $('.all-content').hide();
        $('#loggedOutStand').hide();
        $('#emptyMessage').hide();
        $('#loader').show();
        setTimeout(() => {
            $('#loader').fadeToggle();
            $('.all-content').fadeToggle();
        }, 300);


        /*===========*home chat goes here*===========*/
        $('.chatting_app').hide();
        $('#toggle_message_app').click(function() {
            if (!$('.chatting_app').hasClass('slideInRight')) {
                $('.chatting_app').removeClass('slideOutRight');
                $('.chatting_app').css('margin-left', '28%');
                $('.chatting_app').show().addClass('slideInRight');
            } else {
                $('.chatting_app').removeClass('slideInRight');
                $('.chatting_app').show().addClass('slideOutRight');
                $('.chatting_app').css('margin-left', '60%');
            }
        })
        $('.close_message_app').click(function() {
            $('.chatting_app').removeClass('slideInRight');
            $('.chatting_app').show().addClass('slideOutRight');
            $('.chatting_app').css('margin-left', '60%');
        })

        $('.message_box').hide();
        $(document).ready(function() {
            /*===========*sending emails*===========*/
            /*=====================================================================================*/
            $('#send_mail_form').submit(function(e) {
                e.preventDefault();
                sender = "<?= $stand_email ?>";
                message = $('[name = "mail_input"]').val();
                $('.lds-dual-ring').fadeToggle();
                $.ajax({
                    url: '../handlers/form_handlers/mailSend.php',
                    method: 'post',
                    data: {
                        message: message,
                        receiver_mail: sender
                    },
                    success: function(response) {
                        $('#mail_input').removeAttr('value');
                        $('#mailSent').fadeToggle();
                        setTimeout(() => {
                            $('#mailSent').fadeToggle();
                        }, 1000);
                    },
                    complete: function() {
                        $('.lds-dual-ring').fadeToggle();
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            })


            /*===========*fetch all stand chiefs*===========*/
            /*=====================================================================================*/
            $('<center color="#fff"><hr width="80%" color="#fff"><p style="color:white; margin-top:-15px">Chef Stand</ps></center>').appendTo('#conversation_list')
            var chefs = [];

            function fetchAllInStandChiefs() {
                var stand = '<?= $_GET['stand_id'] ?>';

                $.ajax({
                    url: '../handlers/stand_chief_handlers/getAllStandChiefs.php',
                    method: 'post',
                    data: {
                        stand: stand
                    },
                    success: function(response) {
                        if (response != 0) {
                            data = jQuery.parseJSON(response);
                            for (let i = 0; i < data.length; i++) {
                                if (data[i].logged == "yes") {
                                    log = "Online";
                                    color = "greenyellow";
                                } else {
                                    log = "Offline";
                                    color = "red";
                                }
                                chefs.push(data[i].username);
                                output = '<div class="conversation" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                    '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                    '</div></div>';
                                $('#conversation_list').append(output);
                            }
                            $('<center color="#fff"><hr width="80%" color="#fff"><p style="color:white; margin-top:-15px">Autre</ps></center>').appendTo('#conversation_list')
                        } else {
                            $('.inst_list').html('<h5 class="text-center mt-5 text-dark">Aucun Chef Online</h5>');
                        }
                    },
                    error: function(response) {
                        alert(error.getAllHeaders());
                    }
                })
            }

            /*===========*fetching not read messages for the active class*===========*/
            /*=====================================================================================*/
            function fetchChiefsUnreadMessages() {
                var stand = '<?= $_GET['stand_id'] ?>';
                $.ajax({
                    url: '../handlers/chat_home_handlers/getLastMessageStatus.php',
                    method: 'post',
                    success: function(response) {
                        if (response != 0) {
                            status_messages = jQuery.parseJSON(response)
                            //loading all online and offline users in stand
                            $.ajax({
                                url: '../handlers/stand_chief_handlers/getAllInStandChiefs.php',
                                method: 'post',
                                data: {
                                    stand: stand
                                },
                                success: function(response) {
                                    data = jQuery.parseJSON(response);
                                    for (let i = 0; i < data.length; i++) {
                                        unread = '';
                                        classe = '';
                                        background = '';
                                        for (let j = 0; j < status_messages.length; j++) {
                                            if (data[i].username == status_messages[j]) {
                                                unread = "<i class=\"fas fa-exclamation-circle\" style=\"color: yellow\"></i>";
                                                background = "style='background:rgba(0, 123, 255, 0.5)'";
                                                classe = "unread";
                                            }
                                        }
                                        if (data[i].user_logged == "yes") {
                                            log = "Online";
                                            color = "greenyellow";
                                        } else {
                                            log = "Offline";
                                            color = "red";
                                        }
                                        output = '<div class="conversation ' + classe + '" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username + ' ' + unread +
                                            '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                            '</div></div>';
                                        $('#conversation_list').append(output);

                                    }
                                },
                                complete: function() {
                                    $('<center color="#fff"><hr width="80%" color="#fff"><p style="color:white; margin-top:-15px">Autre</ps></center>').appendTo('#conversation_list')
                                },
                                error: function(error) {
                                    console.log(error.getAllResponseHeaders());
                                }
                            })
                        } else {
                            fetchAllInStandChiefs();
                        }
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            }
            fetchChiefsUnreadMessages();

            /*=====================================================================================*/
            /*===========*fetch all stand users*===========*/
            /*=====================================================================================*/
            stand_id = '<?= $_GET['stand_id'] ?>';
            //fetch all online users function
            var users = [];

            function fetchAllInStandUsers(count) {
                $.ajax({
                    url: '../handlers/home_handlers/getAllOnlineUsers.php',
                    method: 'post',
                    data: {
                        stand_id: stand_id,
                        // checkStandStatus: 'true'
                        getOtherSpokenWith: 'true'
                    },
                    success: function(response) {
                        if (response != 0) {
                            data = jQuery.parseJSON(response);
                            for (let i = 0; i < data.length; i++) {
                                if (data[i].user_logged == "yes") {
                                    log = "Online";
                                    color = "greenyellow";
                                } else {
                                    log = "Offline";
                                    color = "red";
                                }
                                if (!chefs.includes(data[i].username) && !users.includes(data[i].username)) {
                                    users.push(data[i].username);
                                    output = '<div class="conversation" name="user_private_chat" id_conversation=' + count + ' id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                        '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                        '</div></div>';
                                    $('#conversation_list').append(output);
                                }
                            }
                        } else {
                            $('#conversation_list').append('<h6 class="text-center mt-3 text-info">Aucun utilisateur en ligne</h6>');
                        }
                    },
                    error: function(response) {
                        console.log(error.getAllHeaders());
                    }
                })
            }

            //fetching not read messages for the active class
            unread_users = [];

            function fetchUnreadMessages(count) {
                $.ajax({
                    url: '../handlers/chat_home_handlers/getLastMessageStatus.php',
                    method: 'post',
                    success: function(response) {
                        if (response != 0) {
                            status_messages = jQuery.parseJSON(response)
                            //loading all online and offline users in stand
                            $.ajax({
                                url: '../handlers/home_handlers/getAllOnlineUsers.php',
                                method: 'post',
                                data: {
                                    stand_id: stand_id,
                                    // checkStandStatus: 'true'
                                    getOtherSpokenWith: 'true'
                                },
                                success: function(response) {
                                    if (response != 0) {
                                        data = jQuery.parseJSON(response);
                                        last_added_user = '';
                                        for (let i = 0; i < data.length; i++) {
                                            unread = '';
                                            for (let j = 0; j < status_messages.length; j++) {
                                                if (data[i].username == status_messages[j])
                                                    unread = "unread";
                                            }
                                            if (data[i].user_logged == "yes") {
                                                log = "Online";
                                                color = "greenyellow";
                                                if (!unread_users.includes(data[i].username)) {
                                                    unread_users.push(data[i].username);
                                                    output = '<div class="conversation ' + unread + '" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                                        '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                                        '</div></div>';
                                                    $('#conversation_list').prepend(output);
                                                    $('#toggle_message_app').toggleClass('animated bounce');
                                                    if (!$('#toggle_message_app').find('fa-bell'))
                                                        $('#toggle_message_app').append('<i class="fas fa-bell animated wobble"></i>');
                                                }
                                            }
                                        }
                                    } else
                                        console.log(response)
                                },
                                error: function(error) {
                                    console.log(error.getAllResponseHeaders());
                                }
                            })
                        } else {
                            fetchAllInStandUsers(count);
                        }
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
                setTimeout(function() {
                    fetchUnreadMessages(++count);
                }, 5000);
            }
            count = 0;
            fetchUnreadMessages(count);

            //updating status when user see the unread message 
            $(document).on('click', '[name="user_private_chat"].unread', function() {
                var sender = $(this).attr('id');
                $(this).removeClass('unread');
                $('#toggle_message_app').toggleClass('animated bounce');
                $('#toggle_message_app').html("Messages")
                $.ajax({
                    url: '../handlers/chat_handlers/updateMessageStatus.php',
                    method: 'post',
                    data: {
                        sender: sender
                    },
                    success: function(response) {
                        if (reponse == 1) {
                            fetchUnreadMessages();
                        }
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            })

            //loading all messages
            function loadMessages(username) {
                $.ajax({
                    url: '../handlers/chat_home_handlers/getAllMessages.php',
                    method: 'post',
                    data: {
                        username: username
                    },
                    success: function(response) {
                        if (response != 0) {
                            data = jQuery.parseJSON(response)
                            var output = "";
                            for (let i = 0; i < data.length; i++) {
                                image = '';
                                if (data[i].sender != username)
                                    user_class = "you_message";
                                else {
                                    user_class = "other_message";
                                    image = '<img src="../assets/img/user_pic/default.png" alt="user_picture">';
                                }
                                output += '<div class="message_row ' + user_class + '"><div class="message_content">' + image + '<div class="message_text ">' + data[i].content + '</div> <div class="message_time">' + data[i].date + '</div></div></div>';
                            }
                            $('#chat_message_list').html(output);
                        } else {
                            output = '<div class="message_row you_message" style="justify-content: center;justify-items: center;"><div class="message_content"><div class="message_text "> Parlez avec ' + username + ' Allez y, écrivez quelque chose!</div> <div class="message_time"></div></div></div>';
                            $('#chat_message_list').html(output);
                        }
                    },
                    error: function(response) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            }
            $('[name="user_private_chat"]').toggleClass('active');
            setTimeout(function() {
                $(document).on('click', '[name="user_private_chat"]', function() {
                    $('#chat_message_list').removeClass('home_chat');
                    $('#chat_form').html('<form action="" method="post"><a href="" class="btn btn-primary" name="post_message" id="post_message"><i class="fas fa-paper-plane"></i></a><input type="text" placeholder="type a message" name="post_input" id="post_input"></form>')
                    $('[name="user_private_chat"]').removeClass('active')
                    $(this).toggleClass('active')
                    //loading messages
                    username = $(this).attr('id');
                    $("div#chat_title").html('<span>' + username + '</span><a href="#"> <i class="fas fa-trash-alt"></i></a>');
                    console.log();
                    loadMessages(username);

                    //posting new messages
                    $("#post_input").keyup(function(event) {
                        event.preventDefault();
                        if (event.keyCode === 13) {
                            $("#post_message").click();
                        }
                    });
                    $('#post_message').on('click', function(e) {
                        e.preventDefault();
                        var msg = $('#post_input').val();
                        var sender = '<?= $_SESSION['username'] ?>';
                        var receiver = $("div#chat_title span").text();
                        if (msg != "") {
                            $.ajax({
                                url: '../handlers/chat_handlers/addNewMessage.php',
                                method: 'post',
                                data: {
                                    sender: sender,
                                    receiver: receiver,
                                    msg: msg
                                },
                                success: function(response) {
                                    if (response == 1) {
                                        $('#post_input').val('')
                                        loadMessages(receiver);
                                    }
                                },
                                error: function(response) {
                                    console.log(error.getAllResponseHeaders())
                                }
                            })
                        } else {
                            $('#emptyMessage').fadeToggle();
                            setTimeout(() => {
                                $('#emptyMessage').fadeToggle();
                            }, 3000);
                        }
                    })
                })
            }, 300);


            /*===========*logout of stand handlers*===========*/
            /*=====================================================================================*/
            $('[name="standLogout"]').click(function() {
                let username = "<?= $_SESSION['username'] ?>",
                    stand = "<?= $_GET['stand_id'] ?>"
                $.ajax({
                    url: '../handlers/stand_handler/logoutStandHandler.php',
                    method: 'post',
                    data: {
                        username: username,
                        stand_id: stand
                    },
                    success: function(response) {
                        window.location.replace('http://localhost/StandVideotheque/views/stand.php');
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            })

            /*===========*logout handler*===========*/
            /*=====================================================================================*/
            $('[name="logout"]').click(function() {
                $.ajax({
                    url: '../handlers/stand_handler/logoutStandHandler.php',
                    method: 'post',
                    data: {
                        username: "<?= $_SESSION['username'] ?>",
                        stand: "<?= $_GET['stand_id'] ?>"
                    },
                    success: function(response) {
                        $('#loggedOutStand').show().addClass('slideInRight');
                        setTimeout(() => {
                            $('#loggedOutStand').show().addClass('slideOutRight');
                        }, 1000);
                        $.ajax({
                            url: '../handlers/session_handlers/sessionDestroyer.php',
                            method: 'post',
                            success: function(response) {
                                //
                            },
                            error: function(error) {
                                console.log(error.getAllResponseHeaders());
                            }
                        })
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            })
        })
    </script>
</body>

</html>