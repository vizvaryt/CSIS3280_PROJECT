<?php

    class textbookPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Bookstore Textbooks</title>
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
                    <a class="navLeft activeLeft" href="main.php?page=textbooks">Textbooks</a>
                    <a class="navLeft" href="main.php?page=contact">Contact</a>
                    <a class="navRight" href="main.php?page=myAccount">My Account</a>
                    <a class="navRight" href="main.php?page=myCart">My Cart</a>
                </div>
            <?php
        }

        //Displays searchbar section and form
        static function searchBar() {
            ?>
                <div class="searchBar">
                    <form id="searchForm" action="main.php" method="GET">
                        <input id="searchBox" type="text" name="query" placeholder="search over 350,000 books!">
                        <button id=searchButton type="submit"><i class="fas fa-search"></i></button>
                        <br>
                        <button class="toggle-button" name="option" value="bestsellers">Bestsellers</button>
                        <button class="toggle-button" name="option" value="fiction">Fiction</button>
                        <button class="toggle-button" name="option" value="nonfiction">Non-Fiction</button>
                        <button class="toggle-button" name="option" value="textbooks">Textbooks</button>
                        <button class="toggle-button" name="option" value="english">English</button>
                        <button class="toggle-button" name="option" value="otherlanguage">Other Language</button>
                    </form>
                </div>
            <?php
        }

        //Displays bookgallery section
        static function bookGallery($bookArray) {
            ?>
            <div class="bookContainer">
            <?php
            foreach ($bookArray as $book) {
                ?>
                    <div class="bookCard">
                        <a href="main.php?page=detail&book=<?php echo $book->getISBN(); ?>">
                        <img src="<?php echo $book->getImage(); ?>" alt="<?php echo $book->getTitle(); ?>">
                        <h2><?php echo $book->getTitle(); ?></h2>
                        <h3><?php echo "$".$book->getPrice(); ?></h3>
                        <p>By <?php echo $book->getAuthor(); ?></p>
                        </a>
                    </div>
                <?php
            }
            ?>
            </div>
            <?php
        }
    }

?>