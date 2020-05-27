<?php
include "../handlers/session_handlers/sessionStarter.php";
include "config.php";
if (isset($_POST['logout'])) {
    include  "../handlers/session_handlers/sessionDestroyer.php";
    header("location: ../index.php?");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceuil</title>
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
</head>

<body>
    <div class="all-content">
        <header>
            <div class="wrapper">
                <nav>
                    <div class="top_navbar">
                        <div class="hamburger">
                            <div class="one"></div>
                            <div class="two"></div>
                            <div class="three"></div>
                        </div>
                        <div class="top_menu">
                            <div class="logo">
                                Logo
                            </div>
                            <div class="logo">
                                <?= $_SESSION['username'] ?>
                            </div>
                            <ul>
                                <li><a href="#" tabindex="0" id="toggle_message_app" data-toggle="tooltip" title="Voir vos messages" data-animation="true">
                                        <i class="fas fa-comments"></i>
                                    </a>
                                </li>
                                <li><a href="#" tabindex="0" data-toggle="tooltip" title="Votre Profile" data-animation="true">
                                        <i class="fas fa-user"></i>
                                    </a></li>
                                <li>
                                    <form method="POST" action="home.php">
                                        <button tabindex="0" data-toggle="tooltip" title="Déconnexion" data-animation="true" type="submit" href="#" name="logout">
                                            <i class="fas fa-sign-out-alt"></i>
                                        </button></form>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="sidebar">
                        <ul>
                            <li><a id_stand="<?= $_GET['stand_id'] ?>" name="standLogout" id="home_view">
                                    <span class="icon"><i class="fab fa-houzz"></i></span>
                                    <span class="title">Home</span>
                                </a></li>
                            <li><a id_stand="<?= $_GET['stand_id'] ?>" name="standLogout" class="active" id="stand_view">
                                    <span class="icon"><i class="fas fa-book-open"></i></span>
                                    <span class="title">Stand</span>
                                </a></li>
                            <li><a id_stand="<?= $_GET['stand_id'] ?>" name="standLogout" id="library_view">
                                    <span class="icon"><i class="fas fa-step-forward"></i></span>
                                    <span class="title">Conférences</span>
                                </a></li>
                            <?php if ($_SESSION['username'] == 'admin') : ?>
                                <li><a id_stand="<?= $_GET['stand_id'] ?>" name="standLogout" id="office_view">
                                        <span class="icon"><i class="fas fa-briefcase"></i></span>
                                        <span class="title">BackOffice</span>
                                    </a>
                                </li>
                            <?php endif; ?>
                        </ul>
                    </div>
                </nav>
                <div class="main_container">
                    <div class="indicator-wrapper">
                        <div class="container">
                            <div class="indicate">
                                <div class="nav-indicator-right">
                                    <h3>Vidéothèque</h3>
                                </div>
                                <div class="nav-indicator-left">
                                    <h6>
                                        <a id_stand="<?= $_GET['stand_id'] ?>" name="standLogout" id="stand_view" class="indicator-link">Stand</a>
                                        /
                                        <a href="./standHome.php?stand_id=<?= $_GET['stand_id'] ?>" class="indicator-link">Stand n°<?= $_GET['stand_id'] ?></a> / Vidéothèque </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                    <style>
                        #chat_container {
                            height: 70vh;
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
                            transform: translateY(87px) scale(0.65);
                        }

                        .chatting_app {
                            transform: translate(173px, -76px);
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
                    </style>
                    <div class="chatting_app">
                        <div id="chat_container">
                            <div id="search_container">
                                <p class="text-center text-white text-capitalize font-weight-bold mt-3">
                                    utilisateurs
                                </p>
                                <!-- <input type="text" placeholder="Search" name="" id=""> -->
                            </div>
                            <div id="conversation_list">
                            </div>
                            <div id="new_message_container">
                                <!-- here add new conversation -->
                                <!-- <a href="">
                                    +
                                </a> -->
                            </div>
                            <div id="chat_title">
                                <span>Voire tous personne sure HomeChat!</span>
                            </div>

                            <div id="chat_message_list" class="home_chat">
                                <!-- here display the messages each row holds a single message -->
                                <img src="../assets/img/home_chat.png" alt="">
                            </div>
                            <div id="chat_form">
                            </div>
                        </div>
                    </div>
                    <style>
                        #forPhp {
                            position: fixed !important;
                            top: 80%;
                            right: 5%;
                            width: 20vw;
                        }

                        .documentation_content a {
                            text-decoration: none;
                            font-size: 17px;
                            font-weight: 600;
                        }

                        .file_group {
                            margin-top: 20px;
                            padding: 20px
                        }

                        .file_group h4.doc_link {
                            color: #c850c0;
                        }

                        .file_group a.doc_link {
                            color: #2e4ead;
                        }
                    </style>
                    <div class="documentation_content">
                        <div class="file_group">
                            <div class="container-box">
                                <style>
                                    .container-box .video_frame_wrapper iframe {
                                        height: 170px !important;
                                        width: 300px !important
                                    }
                                </style>
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
                                            $output .= "<div class='box' name='box' id='" . $another_name . "'><div class='vid-box'>
                                                <video controls preload='metadata'>
                                                    <source src='../StandBackOffice/videos/" . $val['vie_video'] . "'type='video/mp4'>
                                                    Your browser does not support the video tag.
                                                </video>
                                            </div>
                                            <div class='details d-none'>
                                                <div class='content'>
                                                <button type='button' class='close' data-dismiss='modal' id='close-details' aria-label='Close'>
                                                    <span aria-hidden='true'>&times;</span>
                                                    </button>
                                                    <h2> " . $val['vie_nom']  . "</h2>
                                                    <p>Lorem ipsum dolor sit amet consectetur.</p>
                                                    <hidden-content class='d-none'>" . $val['vie_id']  . "</hidden-content>
                                                </div>
                                            </div>
                                            </div>";
                                        else
                                            $output .= "<div class='box' name='box' id='" . $another_name . "'><div class='vid-box'>
                                                    <div class='video_frame_wrapper'><iframe width='560' height='315' src='" . $val['vie_video'] . "' frameborder='0' allow='accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture' allowfullscreen></iframe></div>
                                                </div>
                                                <div class='details d-none'>
                                                    <div class='content'>
                                                    <button type='button' class='close' data-dismiss='modal' id='close-details' aria-label='Close'>
                                                        <span aria-hidden='true'>&times;</span>
                                                        </button>
                                                        <h2> " . $val['vie_nom']  . "</h2>
                                                        <p>Lorem ipsum dolor sit amet consectetur.</p>
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
                    </div>
                </div>
            </div>
        </header>


    </div>

    <div class=" loadingio-spinner-ripple-8qkb06zpvbs" id="loader">
        <div class="ldio-s00q76hkpb">
            <div></div>
            <div></div>
        </div>
    </div>

    <!-- loged out of stand -->
    <div class="alert alert-warning animated" role="alert" id="loggedOutStand">
        <button type="button" class="close" data-dismiss="alert">&times;</button>
        <h4>Alerte!</h4>
        Vous êtes maintenant déconnecter de cette stand.
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
    <script src="https://mozilla.github.io/pdf.js/build/pdf.js"></script>
    <!--===============================================================================================-->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfobject/2.1.1/pdfobject.min.js"></script>
    <!--===============================================================================================-->
    <script src="../assets/js/script.js"></script>
    <!--===============================================================================================-->
    <script>
        $('.container-box .box:first-child .content').css('margin-left', '20px')

        $(".hamburger").click(function() {
            $(".wrapper").toggleClass("collapsed");
        });
        window.history.forward();
        $('.chatting_app').hide();
        $('.all-content').hide();
        $('#loggedOutStand').hide();
        $('#emptyMessage').hide();
        $('#loader').show();
        setTimeout(() => {
            $('#loader').fadeToggle();
            $('.all-content').fadeToggle();
        }, 300);

        $('#close-details').click(function() {
            $('.details').css('opacity', '0')
        })

        $('.details').hover(function() {
            $('.details').css('opacity', '')
        })
        $(document).ready(function() {
            //logout of stand handle
            $('[name="standLogout"]').click(function() {
                //logging out of stand
                var username = "<?= $_SESSION['username'] ?>";
                var stand_id = $(this).attr('id_stand');
                var stand_id = "<?= $_GET['stand_id'] ?>";
                var location = $(this).attr('id');
                if (location == 'home_view')
                    location = 'http://localhost/StandVideotheque/views/home.php';
                else if (location == "stand_view")
                    location = 'http://localhost/StandVideotheque/views/stand.php';
                else if (location == "library_view")
                    location = 'http://localhost/StandVideotheque/views/videoLibrary.php';
                else
                    location = 'http://localhost/StandVideotheque/StandBackOffice/index.php';
                $.ajax({
                    url: '../handlers/stand_handler/logoutStandHandler.php',
                    method: 'post',
                    data: {
                        username: username,
                        stand_id: stand_id
                    },
                    success: function(response) {
                        if (response == 1) {
                            $('#loggedOutStand').fadeToggle();
                            setTimeout(() => {
                                $('#loggedOutStand').fadeToggle();
                                window.location.replace(location);
                            }, 1000);
                        } else {
                            alert(response)
                        }
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            })

            //logout of stand and the site
            $('[name="logout"]').click(function() {
                //logging out of stand then loging out of the app
                var username = "<?= $_SESSION['username'] ?>";
                var stand_id = $(this).attr('id_stand');
                var stand_id = "<?= $_GET['stand_id'] ?>";
                $.ajax({
                    url: '../handlers/stand_handler/logoutStandHandler.php',
                    method: 'post',
                    data: {
                        username: username,
                        stand_id: stand_id
                    },
                    success: function(response) {
                        $.ajax({
                            url: '../handlers/session_handlers/sessionDestroyer.php',
                            method: 'post',
                            success: function(response) {
                                window.location.replace('http://localhost/StandVideotheque/index.php');
                            }
                        })
                    },
                    error: function(error) {
                        console.log(error.getAllResponseHeaders());
                    }
                })
            })

            /*===========*home chat goes here*===========*/

            $('#toggle_message_app').click(function() {
                $('.chatting_app').slideToggle();
            })
            /*=====================================================================================*/
            //fetch all online users function
            function fetchAllInStandUsers() {
                $.ajax({
                    url: '../handlers/home_handlers/getAllOnlineUsers.php',
                    method: 'post',
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
                                output = '<div class="conversation" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                    '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                    '</div></div>';
                                $('#conversation_list').append(output);
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
            function fetchUnreadMessages() {
                $.ajax({
                    url: '../handlers/chat_home_handlers/getLastMessageStatus.php',
                    method: 'post',
                    success: function(response) {
                        if (response != 0) {
                            status_messages = jQuery.parseJSON(response)
                            //loading all online and offline users in stand
                            $.ajax({
                                url: '../handlers/chat_home_handlers/getAllInSiteUsers.php',
                                method: 'post',
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
                                        output = '<div class="conversation ' + unread + '" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                            '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                            '</div></div>';
                                        $('#conversation_list').append(output);
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
            }
            fetchUnreadMessages();

            /*===========*updating status when user see the unread message *===========*/
            /*=====================================================================================*/
            $(document).on('click', '[name="user_private_chat"].unread', function() {
                var sender = $(this).attr('id');
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
                            output = '<div class="message_row you_message" style="justify-content: center;justify-items: center;"><div class="message_content"><div class="message_text "> parlez avec ' + username + ' ^_^? Allez, écrire quelque chose!</div> <div class="message_time"></div></div></div>';
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
        })
    </script>
</body>

</html>