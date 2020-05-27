<?php
include "../handlers/session_handlers/sessionStarter.php";
include "config.php";
if (isset($_POST['logout'])) {
    include  "../handlers/session_handlers/sessionDestroyer.php";
    header("location: ../index.php?loggedOut");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Conférences</title>
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
            overflow-y: scroll;
            overflow-x: hidden
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

        @media screen and (max-width:600px) {
            .message_toggle {
                position: absolute;
                bottom: auto;
                right: 0;
            }

            .logo_container {
                transform: translate(9vw, -8vh) scale(0.8) !important;
                height: 15vh !important;
                width: 25vw !important;
            }

            .brand_left {
                transform: translateX(10px) scale(1);
            }

            .nav_brand {
                width: 97%;
                height: 29%;
                right: 1%;
            }

            .brand_right {
                display: none;
            }

            .brand_left>img:first-child {
                position: absolute;
                top: -28%;
                left: -15%;
                width: 70%;
                filter: grayscale(1);
            }
        }
    </style>
</head>

<body>
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
        <div class="collapse_navbar d-none">
            <i class="fas fa-angle-double-right"></i>
        </div>
        <div class="home_container" id="nav_items_collapse">
            <nav>
                <div class="logo_container">
                </div>

                <ul>
                    <li name="toggle_nav_item"><a href="./home.php">
                            Accueil
                        </a></li>
                    <li name="toggle_nav_item"><a href="./stand.php">
                            E. Orientation
                        </a></li>
                    <li name="toggle_nav_item" class="active_item"><a href="./videoLibrary.php">
                            L. Conférences
                        </a></li>
                    <li name="toggle_nav_item"><a href="./coach.php?stand_id=1">
                            C. Orientation
                        </a></li>
                    <?php if ($_SESSION['auth'] == 'yes') : ?>
                        <li name="toggle_nav_item"><a href="../StandBackOffice/index.php" id="toggle_message_app">
                                BackOffice
                            </a>
                        </li>
                    <?php endif; ?>
                </ul>
            </nav>
            <div class="logout_container">
                <form method="POST" action="home.php">
                    <button tabindex="0" data-toggle="tooltip" title="Déconnexion" data-animation="true" type="submit" href="#" name="logout">
                        <i class="fas fa-sign-out-alt"></i>
                    </button></form>
            </div>
        </div>
        <section>
            <div class="nav_brand">
                <div class="brand_left">
                    <img src="../template/img/home_6.png" alt="">
                    <h2>
                        SALON VIRTUEL <br>
                        DE L'ORIENTATION <br>
                        & des ETUDEs à l'etranger
                    </h2>
                    <div class="bottom_icons">
                        <img src="../template/icons/Calque 20.png" alt="img">
                        <img src="../template/icons/Calque 15.png" alt="img">
                        <img src="../template/icons/Calque 24.png" alt="img">
                        <img src="../template/icons/Calque 22.png" alt="img">
                        <img src="../template/icons/Calque 25.png" alt="img">
                        <img src="../template/icons/Calque 19.png" alt="img">
                        <img src="../template/icons/Calque 21.png" alt="img">
                        <img src="../template/icons/Calque 23.png" alt="img">
                        <img src="../template/icons/Calque 18.png" alt="img">
                        <img src="../template/icons/Calque 13.png" alt="img">
                        <img src="../template/icons/Calque 14.png" alt="img">
                        <img src="../template/icons/Calque 12.png" alt="img">
                        <img src="../template/icons/Calque 16.png" alt="img">
                        <img src="../template/icons/Calque 17.png" alt="img">
                    </div>
                    <img src="../template/img/home_5.png" alt="">
                </div>
                <div class="brand_right">
                    <img src="../template/img/home_1.png" alt="img">
                    <img src="../template/img/home_2.png" alt="img">
                    <img src="../template/img/home_4.png" alt="">
                </div>
            </div>
        </section>
    </div>
    <style>
        .container-box .video_frame_wrapper iframe {
            height: 170px;
            width: 300px
        }

        .main_container {
            position: absolute;
            top: 33%;
            left: 18%;
        }

        .container-box {
            width: 1200px !important;
        }

        .video_frame_wrapper {
            margin-left: 15% !important;
        }

        .video_frame_wrapper h2 {
            color: #091e38;
        }

        .container-box .video_frame_wrapper iframe {
            height: 53vh !important;
            width: 64vw !important;
        }

        .video_frame_wrapper {
            margin-left: 0% !important;
        }

        @media screen and (max-width:600px) {
            .container-box .video_frame_wrapper iframe {
                height: 53vh !important;
                width: 64vw !important;
            }

            .container-box .video_frame_wrapper iframe {
                height: 48vh !important;
                width: 94vw !important;
            }

            .video_frame_wrapper {
                margin-left: -6% !important;
            }
        }

        @media(max-width:360px) {
            .nav_brand {
                width: 97%;
                height: 29%;
                right: -1%;
            }

            div.home_container {
                width: 20% !important;
            }

            .container-box .video_frame_wrapper iframe {
                height: 40vh !important;
                width: 90vw !important;
            }

            .video_frame_wrapper {
                margin-left: -3% !important;
            }
        }

        @media(max-width:420px) {
            .nav_brand {
                width: 97%;
                height: 29%;
                right: -1%;
            }

            div.home_container {
                width: 20% !important;
            }

            .container-box .video_frame_wrapper iframe {
                height: 40vh !important;
                width: 87vw !important;
            }

            .video_frame_wrapper {
                margin-left: -5% !important
            }
        }

        @media(max-width:320px) {
            div.home_container {
                width: 20% !important;
            }

            .video_frame_wrapper {
                margin-left: -3% !important;
            }

            .container-box .video_frame_wrapper iframe {
                height: 48vh !important;
                width: 102vw !important;
            }

            .nav_brand {
                position: absolute;
                z-index: -1;
                width: 100%;
                height: 29%;
                right: -11%;
                top: 35px;
            }

            .nav_brand {
                width: 97%;
                height: 29%;
                right: -5%;
            }

            .brand_left {
                transform: translate(10px, -25%) scale(0.8);
            }

            .home_container .logo_container {
                margin-top: 60px;
            }

            .brand_left>img:first-child {
                top: 10%;
            }

            .brand_left>img:last-child {
                top: 23%;
            }

            .containers_container {
                top: 28% !important;
                left: 10% !important;
            }

            .bottom_icons {
                margin-left: -33px !important;
            }

            .bottom_icons img {
                width: 13px !important;
            }
        }

        /* added */
        /*
        .container-box .video_frame_wrapper iframe {
            height: 53vh !important;
            width: 45vw !important;
            position: absolute;
            left: 38%;
        }

        .prog_container {
            height: 500px;
            width: 20%;
        }

        .prog_conf {
            overflow-y: scroll;
            background: url(../assets/img/programe_conf.png);
            background-position: center;
            background-size: contain;
            background-repeat: no-repeat;
            height: 100%;
            width: 100%
        }*/
    </style>
    <div class="main_container">
        <div class="container-box">
            <!-- <div class="prog_container">
                <div class="prog_conf">
                </div>
            </div> -->
            <?php
            $v = $videotheque->getAllLiveStreams();
            if ($v->rowCount()) {
                $output = "";
                foreach ($v->fetchAll(PDO::FETCH_ASSOC) as $val) {
                    $output .= "<div class='video_frame_wrapper'>
                                        <h2>" . $val['live_nom'] . "</h2>
                                        <iframe width='560' height='315' src='" . $val['live_video'] . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen autoplay = 'autoplay'></iframe>
                                    </div>";
                }
                echo $output;
            } else
                echo "<h4 class='text-danger'>Pas de live-streams!</h4>";
            ?>
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
            margin-top: 5% !important;
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
                <span>Voir toutes les personnes en ligne</span>
            </div>

            <div id="chat_message_list" class="home_chat">
                <img src="../assets/img/home_chat.png" alt="">
            </div>
            <div id="chat_form">
            </div>
        </div>
    </div>

    </div>

    <div class="loadingio-spinner-ripple-8qkb06zpvbs" id="loader">
        <div class="ldio-s00q76hkpb">
            <div></div>
            <div></div>
        </div>
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

    <style>
        .hide {
            opacity: 0;
        }
    </style>
</body>
<script>
    $(".details").fadeToggle();
    $(".hamburger").click(function() {
        $(".wrapper").toggleClass("collapsed");
    });
    window.history.forward();
    $('.all-content').hide();
    $('#loader').show();
    setTimeout(() => {
        $('#loader').fadeToggle();
        $('.all-content').fadeToggle();
    }, 300);

    $('#close-details').click(function() {
        $('.details').css('opacity', '0')
        $(this).find('div.details').hide().css('transform', '');
    })

    $('.details').hover(function() {
        $('.details').css('opacity', '')
    })

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

    if ($(this).width() <= 600) {
        $('.collapse_navbar').removeClass('d-none');
        $('#nav_items_collapse').addClass('d-none');
        $('.home_container').css('width', '45%').addClass('slideInLeft animated')
    } else {
        $('.home_container').css('width', '').removeClass(' slideOutLeft slideInLeft animated')
    }
    $(window).resize(function() {
        if ($(this).width() <= 600) {
            $('.home_container').css('width', '45%').addClass('slideInLeft animated')
        } else {
            $('.home_container').css('width', '45%').addClass('slideOutLeft animated')
        }
    })


    $('.collapse_navbar').click(function() {
        if (!$('#nav_items_collapse').hasClass('return_collapsed')) {
            $('#nav_items_collapse').removeClass('slideOutLeft');
            $('#nav_items_collapse').removeClass('d-none').addClass('slideInLeft animated');
            $('.collapse_navbar').addClass('collapse_rotate');
            $('#nav_items_collapse').addClass('return_collapsed')
        } else {
            $('.collapse_navbar').removeClass('collapse_rotate');
            $('#nav_items_collapse').removeClass('slideInLeft');
            $('#nav_items_collapse').addClass('slideOutLeft animated');
            $('#nav_items_collapse').removeClass('return_collapsed')
        }
    })
    $('.close_message_app').click(function() {
        $('.chatting_app').removeClass('slideInRight');
        $('.chatting_app').show().addClass('slideOutRight');
        $('.chatting_app').css('margin-left', '60%');
    })
    /*=================================================*/
    $(document).ready(function() {
        //fetch all online users function
        var users = [];

        function fetchAllInStandUsers() {
            $.ajax({
                url: '../handlers/home_handlers/getAllOnlineUsers.php',
                method: 'post',
                data: {
                    removeNoneSpokenWith: 'yes'
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
                            if (!users.includes(data[i].username)) {
                                users.push(data[i].username);
                                output = '<div class="conversation" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                    '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                    '</div></div>';
                                $('#conversation_list').append(output);
                            }
                        }
                    } else {
                        $('#conversation_list').html('<h4 class="text-center mt-5 text-dark">Aucun utilisateur en ligne</h4>');
                    }
                },
                error: function(response) {
                    alert(error.getAllHeaders());
                }
            })
        }

        //fetching not read messages for the active class
        unread_users = [];

        function fetchUnreadMessages() {
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
                                removeNoneSpokenWith: 'yes'
                            },
                            success: function(response) {
                                data = jQuery.parseJSON(response);
                                for (let i = 0; i < data.length; i++) {
                                    unread = '';
                                    for (let j = 0; j < status_messages.length; j++) {
                                        if (data[i].username == status_messages[j])
                                            unread = "unread";
                                    }
                                    if (data[i].user_logged == "yes") {
                                        log = "Online";
                                        color = "greenyellow";
                                    } else {
                                        log = "Offline";
                                        color = "red";
                                    }
                                    if (!unread_users.includes(data[i].username)) {
                                        unread_users.push(data[i].username);
                                        output = '<div class="conversation ' + unread + '" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                            '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                            '</div></div>';
                                        $('#conversation_list').append(output);
                                        $('#conversation_list').prepend(output);
                                        $('#toggle_message_app').toggleClass('animated bounce');
                                        if (!$('#toggle_message_app').find('fa-bell'))
                                            $('#toggle_message_app').append('<i class="fas fa-bell animated wobble"></i>');
                                    }
                                }
                            },
                            error: function(response) {
                                alert(error.getAllHeaders());
                            }
                        })
                    } else {
                        fetchAllInStandUsers();
                    }
                },
                error: function(error) {
                    alert(error.getAllResponseHeaders());
                }
            })
            setTimeout(function() {
                fetchUnreadMessages();
            }, 5000);
        }
        fetchUnreadMessages();

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
                    alert(error.getAllResponseHeaders());
                }
            })
        })

        //loading all messages

        function loadMessages(username) {
            removeUser = [];
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
                        removeUser.push(username)

                    }
                },
                error: function(response) {
                    alert(error.getAllResponseHeaders());
                }
            })
        }
        $('[name="user_private_chat"]').toggleClass('active')
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
                                alert(error.getAllResponseHeaders())
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

    })
</script>

<!-- <script>
 /*=====================================================================================*/
        //fetch all online users function
        var users = [];

        function fetchAllInStandUsers() {
            $.ajax({
                url: '../handlers/home_handlers/getAllOnlineUsers.php',
                method: 'post',
                data: {
                    removeNoneSpokenWith: 'yes'
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
                                output = '<div class="conversation" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                    '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                    '</div></div>';
                                $('#conversation_list').append(output);
                            }
                        }
                    } else {
                        $('#conversation_list').html('<h4 class="text-center mt-5 text-dark">Aucun utilisateur en ligne</h4>');
                    }
                },
                error: function(response) {
                    alert(error.getAllHeaders());
                }
            })
        }

        /*===========*fetching not read messages for the active class*===========*/
        /*=====================================================================================*/
        unread_users = [];

        function fetchUnreadMessages() {
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
                                removeNoneSpokenWith: 'yes'
                            },
                            success: function(response) {
                                data = jQuery.parseJSON(response);
                                for (let i = 0; i < data.length; i++) {
                                    unread = '';
                                    for (let j = 0; j < status_messages.length; j++) {
                                        if (data[i].username == status_messages[j])
                                            unread = "unread";
                                    }
                                    if (data[i].user_logged == "yes") {
                                        log = "Online";
                                        color = "greenyellow";
                                    } else {
                                        log = "Offline";
                                        color = "red";
                                    }
                                    if (!unread_users.includes(data[i].username)) {
                                        unread_users.push(data[i].username);
                                        output = '<div class="conversation ' + unread + '" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                            '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                            '</div></div>';
                                        // $('#conversation_list').append(output);
                                        $('#conversation_list').prepend(output);
                                        $('#toggle_message_app').toggleClass('animated bounce');
                                        if (!$('#toggle_message_app').find('fa-bell'))
                                            $('#toggle_message_app').append('<i class="fas fa-bell animated wobble"></i>');
                                    }
                                }
                            },
                            error: function(response) {
                                alert(error.getAllHeaders());
                            }
                        })
                    } else {
                        fetchAllInStandUsers();
                    }
                },
                error: function(error) {
                    alert(error.getAllResponseHeaders());
                }
            })
            setTimeout(function() {
                fetchUnreadMessages(++count);
            }, 5000);
        }
        fetchUnreadMessages();

        /*===========*updating status when user see the unread message *===========*/
        /*=====================================================================================*/
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
                    alert(error.getAllResponseHeaders());
                }
            })
        })

        /*===========*loading all messages*===========*/
        /*=====================================================================================*/
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
                    alert(error.getAllResponseHeaders());
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
                                alert(error.getAllResponseHeaders())
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
</script> -->

</html>