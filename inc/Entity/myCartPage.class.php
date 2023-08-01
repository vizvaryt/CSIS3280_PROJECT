<?php

    require_once('inc/Utility/LoginManager.class.php');
    require_once('inc/Utility/BookDAO.class.php');
    class myCartPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>BookMania My Cart</title>
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

        //Displays the all of the books in the current user's cart along with buttons to remove them, their prices, and a grandtotal determined by tax and shipping additives
        static function bookList($bookArray) {
            $subTotalPrice = 0;
            $shippingTax = 0;
            $totalPrice = 0;
            $listISBN = array ();
            ?>
                <div class="cartContainer">
                    <h1>My Cart</h1>
                    <div class="myCartList">
                        <?php
                        if (!empty($bookArray) && ($bookArray[0] !== "")) {
                            array_pop($bookArray);
                            foreach ($bookArray as $bookRaw) {
                                $book = BookDAO::getBook($bookRaw);
                                ?>
                                    <div class="myCartBook">
                                        <p class="myCartBookTitle"><?php echo $book->getTitle(); ?> - $<?php echo number_format($book->getPrice(), 2); ?></p>
                                        <form action="main.php" method="POST">
                                            <input type="hidden" id="removeCartISBN" name="removeCartISBN" value="<?php echo $book->getISBN(); ?>">
                                            <button type="submit" class="myCartRemoveButton">Remove</button>
                                        </form>
                                    </div>
                                <?php
                                $subTotalPrice += $book->getPrice();
                                $shippingTax = 10.00 + ($subTotalPrice*0.12);
                                $totalPrice = $subTotalPrice + $shippingTax;
                                array_push($listISBN, $book->getISBN());
                            }
                            ?>
                                <h3>Subtotal: $<?php echo number_format($subTotalPrice, 2);?></h3>
                                <h3>Shipping & Tax: $<?php echo number_format($shippingTax, 2);?></h3>
                                <h2>Total: $<?php echo number_format($totalPrice, 2);?></h2>
                                <form action="main.php" method="POST">
                                    <input type="hidden" id="purchaseCart" name="purchaseCart" value="<?php echo implode(',', $listISBN); ?>">
                                    <button type="submit" class="purchaseCartButton">Buy Now</button>
                                </form>
                            <?php
                        }
                        else {
                            ?>
                                <h2>Your cart is empty!</h2>
                            <?php
                        }
                        ?>
                    </div>
                </div>
            <?php
        }

    }

?>