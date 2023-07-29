<?php

    require_once('inc/Utility/LoginManager.class.php');

    class bookDetailPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>UPDATE ME</title>
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

        //Displays the bookDetail body of the page
        static function bookDetail($book) {
            ?>
                <!-- Top Level Book container for the whole body (flex) -->
                <div class=bookContainer>
                    <!-- Second Level container for the bookCard that has been modified for this page -->
                    <div class="bookCardDetail">
                        <img src="<?php echo $book->getImage(); ?>" alt="<?php echo $book->getTitle(); ?>">
                        <h3><?php echo "$".$book->getPrice(); ?></h3>
                    </div>
                    <!-- Second Level container for the text displayed in the body of this page -->
                    <div class="textContainer">
                        <h2><?php echo $book->getTitle(); ?></h2>
                        <h3><?php echo $book->getAuthor(); ?></h3>
                        <hr>
                        <p><?php echo $book->getDescription(); ?></p>
                        <hr>
                        <p>
                            <b>Price:</b> $<?php echo $book->getPrice(); ?> <br>
                            <b>Language:</b> <?php echo $book->getLanguage(); ?> <br>
                            <b>Date of Publishing:</b> <?php echo $book->getPublishDate(); ?> <br>
                            <b>Edition:</b> <?php echo $book->getEdition(); ?> <br>
                            <b>ISBN:</b> <?php echo $book->getISBN(); ?> <br>
                            <b><?php 
                                if (!$book->getFiction()) {
                                    echo "Non Fiction";
                                }
                                else {echo "Fiction";}
                            ?> </b> <br> <br>
                            <b>Sales Statistics:</b>
                            <ul>
                                <li><b>Sold Per Year:</b> <?php echo $book->getSoldPerYear(); ?> units</li>
                                <li><b>Sold Per Month:</b> <?php echo $book->getSoldPerMonth(); ?> units</li>
                                <li><b>Sold Per Week:</b> <?php echo $book->getSoldPerWeek(); ?> units</li>
                            </ul>
                        </p>
                        <!-- Third Level container for the orderForm. Currently does not work -->
                        <!-- TODO make this work once the user session works -->
                        <div class="orderForm">
                        <h2>Order Book</h2>
                        <form method="post">
                            <label for="quantity">Quantity:</label>
                            <input type="number" id="quantity" name="quantity" min="1" value="1">
                            <button type="submit">Order</button>
                        </form>
                    </div>
                    </div>
                </div>
            <?php
        }
    }

?>