<?php

    class bestSellersPage {

        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Bookstore Bestsellers</title>
                        <link rel="stylesheet" href="css/styles2.css">
                        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
                        <link rel="icon" href="./favicon.ico" type="image/x-icon">
                    </head>
                    <body>
            <?php
        }

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

        static function navBar() {
            ?>
                <div class="topnav">
                    <a class="navLeft" href="main.php?page=homePage">Home</a>
                    <a class="navLeft activeLeft" href="main.php?page=bestSellers">Bestsellers</a>
                    <a class="navLeft" href="main.php?page=editorsPicks">Editor's Picks</a>
                    <a class="navLeft" href="main.php?page=textBooks">Textbooks</a>
                    <a class="navLeft" href="main.php?page=contact">Contact</a>
                    <a class="navRight" href="main.php?page=myAccount">My Account</a>
                    <a class="navRight" href="main.php?page=myCart">My Cart</a>
                </div>
            <?php
        }

        static function searchBar() {
            ?>
                <div class="searchBar">
                    <form id="searchForm">
                        <input id="searchBox" type="text" placeholder="search over 350,000 books!">
                        <button id=searchButton type="submit"><i class="fas fa-search"></i></button>
                        <br>
                        <button class="toggle-button">Bestsellers</button>
                        <button class="toggle-button">Fiction</button>
                        <button class="toggle-button">Non-Fiction</button>
                        <button class="toggle-button">Textbooks</button>
                        <button class="toggle-button">English</button>
                        <button class="toggle-button">Other Language</button>
                    </form>
                </div>
            <?php
        }

        static function bookGallery($bookArray) {
            ?>
            <div class="bookContainer">
            <?php
            foreach ($bookArray as $book) {
                ?>
                    <div class="bookCard">
                        <img src="<?php echo $book->getImage(); ?>" alt="<?php echo $book->getTitle(); ?>">
                        <h2><?php echo $book->getTitle(); ?></h2>
                        <h3><?php echo "$".$book->getPrice(); ?></h3>
                        <p>By <?php echo $book->getAuthor(); ?></p>
                    </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
    }

?>