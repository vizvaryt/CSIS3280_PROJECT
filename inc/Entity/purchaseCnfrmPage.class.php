<?php

    require_once('inc/Utility/LoginManager.class.php');

    class purchaseCnfrmPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Bookstore Purchase Confirmation</title>
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
                        <a href="main.php?page=contact">Contact Us</a>
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
                    <a class="navLeft" href="main.php?page=contact">Contact</a>
                    <?php
                        if(LoginManager::verifyLogin()) {
                            echo '<a class="navRight" href="main.php?page=myAccount">My Account</a>';
                        }
                        else {
                            echo '<a class="navRight" href="main.php?page=login">Login / Register</a>';
                        }
                    ?>
                    <a class="navRight" href="main.php?page=myCart">My Cart</a>
                </div>
            <?php
        }

        //Displays Purchase Confirmation
        static function purchaseConfirmation() {
            ?>
                <!-- Top Level Book container for the whole body (flex) -->
                <div class=bookContainer>
                    <!-- Second Level container for the text displayed in the body of this page -->
                    <div class="textContainer">
                        <h2>Your books have been purchased!</h2>
                        <hr>
                        <p>
                            Your card has been charged. <br>
                            Your books will be delivered in 5-10 business days.
                        </p>
                        <h3>You can view your purchased books by accessing your account page.</h3>
                    </div>
                </div>
            <?php
        }
    }

?>