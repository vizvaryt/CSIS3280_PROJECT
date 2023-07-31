<?php

    require_once('inc/Utility/LoginManager.class.php');

    class orderedPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Bookstore Add To Cart</title>
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
                            echo '<a class="navRight" href="main.php?page=myCart">My Cart</a>';
                        }
                        else {
                            echo '<a class="navRight" href="main.php?page=login">Login / Register</a>';
                        }
                    ?>
                </div>
            <?php
        }

        //Displays Purchase Notification
        static function orderConfirmation($book) {
            ?>
                <!-- Top Level Book container for the whole body (flex) -->
                <div class=bookContainer>
                    <!-- Second Level container for the bookCard that has been modified for this page -->
                    <div class="bookCardDetail">
                        <img src="<?php echo $book->getImage(); ?>" alt="<?php echo $book->getTitle(); ?>">
                    </div>
                    <!-- Second Level container for the text displayed in the body of this page -->
                    <div class="textContainer">
                        <h2>"<?php echo $book->getTitle(); ?>"<br> Has been added to your cart!</h2>
                        <hr>
                        <p>
                            You may resume shopping, or go to your cart now to finalize your order.
                        </p>
                    </div>
                </div>
            <?php
        }
    }

?>