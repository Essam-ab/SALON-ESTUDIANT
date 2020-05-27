<?php
include "./classes/db.php";
include "./classes/stand.php";
include "../handlers/session_handlers/sessionStarter.php";
$stand = new Stand();
if (isset($_SESSION['username'])) {
    $result = $stand->checkStandChef($_SESSION['username']);
    if ($result->rowCount()) {
        foreach ($result->fetchAll(PDO::FETCH_ASSOC) as $val) {
            $stand_id = $val['sta_id'];
        }
    }
} else
    header('location ../index.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Accueil</title>
    <link rel="stylesheet" href="assets/css/bootstrap.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/cards.css">
    <link rel="stylesheet" href="./assets/css/chat-app.css">
    <style>
        body {
            background: white;
            overflow-y: hidden;
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

        #chat_message_list.home_chat {
            overflow-y: hidden;
            background: #eeeeee;
            box-shadow: 1px 0px 0px #c7d1d6;
            user-select: none;
        }

        .chatting_app {
            margin-top: -183px;
        }

        #chat_message_list.home_chat img {
            width: 45%;
            place-content: center;
            place-items: center;
            place-self: center;
            transform: translateY(87px) scale(0.65);
        }

        #chat_container {
            margin-top: 100px !important;
        }

        .message_text {
            font-size: 16px !important;
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
                <nav><img src="../template/logo/Estudian_logo.png" alt="logo"></nav>
                <ul>
                    <?php if ($_SESSION['username'] == 'admin') : ?>
                        <li>
                            <a href="./views/addStand.php">
                                <i class="fa fa-plus-circle" aria-hidden="true"></i>
                                Stand
                            </a>
                        </li>
                    <?php endif; ?>
                    <li>
                        <a href="./views/addVideotheque.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Védeothèque
                        </a>
                    </li>
                    <li>
                        <a href="./views/addUrl.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Youtube Url
                        </a>
                    </li>
                    <li>
                        <a href="./views/AddStandDocumentation.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Documentaire stand
                        </a>
                    </li>
                    <li>
                        <a href="./views/addLiveStreamStand.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Live-Stream
                        </a>
                    </li>
                    <li>
                        <a href="./views/addStandChief.php">
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            Chef stand
                        </a>
                    </li>
                </ul>
            </div>
        </div>
        <section id="home">
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
                                                Accueil
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
                                                <a href="../views/home.php">
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
                            <span> Voir toutes les personnes en ligne</span>
                        </div>

                        <div id="chat_message_list" class="home_chat">
                            <img src="../assets/img/home_chat.png" alt="">
                        </div>
                        <div id="chat_form">
                        </div>
                    </div>
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
        var users = [];
        stand_id = '<?= $stand_id ?>';
        $(document).ready(function() {
            //fetch all online users function
            function fetchAllInStandUsers() {
                $.ajax({
                    url: '../handlers/home_handlers/getAllOnlineUsers.php',
                    method: 'post',
                    data: {
                        stand_id: stand_id,
                        checkStandStatus: 'true'
                    },
                    success: function(response) {
                        if (response != 0) {
                            data = jQuery.parseJSON(response);
                            for (let i = 0; i < data.length; i++) {
                                if (data[i].user_logged == "yes") {
                                    log = "Online";
                                    color = "greenyellow";
                                    if (!users.includes(data[i].username)) {
                                        users.push(data[i].username);
                                        output = '<div class="conversation" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                            '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                            '</div></div>';
                                        $('#conversation_list').append(output);
                                    }
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
                    data: {
                        stand_id: stand_id,
                        checkStandStatus: 'true'
                    },
                    success: function(response) {
                        if (response != 0) {
                            status_messages = jQuery.parseJSON(response)
                            //loading all online and offline users in stand
                            $.ajax({
                                url: '../handlers/home_handlers/getAllOnlineUsers.php',
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
                                            if (!unread_users.includes(data[i].username)) {
                                                unread_users.push(data[i].username);
                                                output = '<div class="conversation ' + unread + '" name="user_private_chat" id="' + data[i].username + '"> <img src="../assets/img/user_pic/default.png" alt="user_picture"> <div class = "title-text" > ' + data[i].username +
                                                    '</div><div class="created_date"></div><div class="conversation_message"><i class="fas fa-map-marker" style="color: ' + color + '"></i>  ' + log +
                                                    '</div></div>';
                                                $('#conversation_list').prepend(output);
                                            }
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
                            output = '<div class="message_row you_message" style="justify-content: center;justify-items: center;"><div class="message_content"><div class="message_text "> Parlez avec ' + username + ' ? Allez, écriver quelque chose!</div> <div class="message_time"></div></div></div>';
                            $('#chat_message_list').html(output);
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
                        var sender = '<?= $_SESSION['username'] ?> ';
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