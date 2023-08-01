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
                        <title>BookMania Contact</title>
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
                        Copyright BookMania 2023 -
                        <a href="TeamNumber03.php?page=contact">Contact Us</a>
                    </footer>
                </html>
            <?php
        }

        //Displays navbar section
        static function navBar() {
            ?>
                <div class="topnav">
                    <a class="navLeft" href="TeamNumber03.php?page=homePage">Home</a>
                    <a class="navLeft" href="TeamNumber03.php?page=bestSellers">Bestsellers</a>
                    <a class="navLeft" href="TeamNumber03.php?page=editorsPicks">Editor's Picks</a>
                    <a class="navLeft" href="TeamNumber03.php?page=textbooks">Textbooks</a>
                    <a class="navLeft activeLeft" href="TeamNumber03.php?page=contact">Contact</a>
                    <?php
                        if(LoginManager::verifyLogin()) {
                            echo '<a class="navRight" href="TeamNumber03.php?page=myAccount">My Account</a>';
                            echo '<a class="navRight" href="TeamNumber03.php?page=myCart">My Cart</a>';
                        }
                        else {
                            echo '<a class="navRight" href="TeamNumber03.php?page=login">Login / Register</a>';
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
                    <p>You can contact us at 123-456-7890 or contact@bookmania.net</p>
                </div>
            <?php
        }
    }

?>