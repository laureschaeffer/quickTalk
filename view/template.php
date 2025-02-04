<?php

use Service\Message; 

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/remixicon/4.6.0/remixicon.css" integrity="sha512-kJlvECunwXftkPwyvHbclArO8wszgBGisiLeuDFwNM8ws+wKIw0sv1os3ClWZOcrEB2eRXULYUsm8OVRGJKwGA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="./public/style.css">
    <title><?= $title ?? 'Home'; ?></title>
</head>
<body>
    
    <header id="header">
        <nav id="nav">
            <a href="index.php?action=home" class="nav__logo">QuickTalk</a>

            <div class="nav__menu" id="nav-menu">
                <ul class="nav__list">
                    <?php
                    // if user connected 
                    if(isset($_SESSION["user"])){ ?>
                        <li class="nav__item"><a class="nav__link" href="index.php?action=chat">Chat</a></li>
                        <li class="nav__item"><a class="nav__link" href="index.php?action=logout">Logout</a></li>
                    <?php 
                    } else { ?>
                        <li class="nav__item"><a class="nav__link" href="index.php?action=login">Login</a></li>
                    <?php 
                    } ?>
                </ul>

                <!-- close button -->
                <div class="nav__close" id="nav-close">
                    <i class="ri-close-line"></i>
                </div>
            </div>

            <div class="nav__toggle" id="nav-toggle">
                <i class="ri-menu-4-line"></i>
            </div>
        </nav>
    </header>

    <!-- here alert message -->
    <?= Message::showMessage() ?>

    <main>
        <?= $content ?>
    </main>

    <script src="./public/main.js"></script>
</body>
</html>