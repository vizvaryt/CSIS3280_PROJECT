<?php

    require_once('inc/Utility/LoginManager.class.php');

    class contactPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Bookstore Contact</title>
                        <link rel="stylesheet" href="css/styles2.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                        <link rel="icon" href="./favicon.ico" type="image/x-icon">
                    </head>
                    <body>
            <?php
        }

        //Displays footer section
        static function footer() {
            ?>
                    </body>
                    <footer>
                        Copyright Bookstore 2023 -
                        <a href="">Contact Us</a>
                    </footer>
                </html>
            <?php
        }

        //Displays navbar section
        static function navBar() {
            ?>
                <div class="topnav">
                    <a class="navLeft" href="main.php?page=homePage">Home</a>
                    <a class="navLeft" href="main.php?page=bestSellers">Bestsellers</a>
                    <a class="navLeft" href="main.php?page=editorsPicks">Editor's Picks</a>
                    <a class="navLeft" href="main.php?page=textbooks">Textbooks</a>
                    <a class="navLeft activeLeft" href="main.php?page=contact">Contact</a>
                    <?php
                        if(LoginManager::verifyLogin()) {
                            echo '<a class="navRight" href="main.php?page=myAccount">My Account</a>';
                            echo '<a class="navRight" href="main.php?page=myCart">My Cart</a>';
                        }
                        else {
                            echo '<a class="navRight" href="main.php?page=login">Login / Register</a>';
                        }
                    ?>
                </div>
            <?php
        }

        //Displays contactPage body
        static function body() {
            ?>
                <div class="contactBody">
                    <h1>Tristan Vizvary's Bookstore</h1>
                    <p>This bookstore was created by Tristan Vizvary for his CSIS3280 class project.</p>
                </div>
            <?php
        }
    }

?>