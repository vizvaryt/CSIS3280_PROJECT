<?php

    require_once('./inc/Utility/BookDAO.class.php');

    class myAccountPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>Bookstore My Account</title>
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

        static function userInfo($user, $state) {
            ?>
            <div class="userInfoContainer">
                <div class="textContainer">
                    <h2>My Account</h2>
                    <hr>
                    <p>
                        <b>Name: </b> <?php echo $user->getFirstName() . " " . $user->getLastName();?> <br>
                        <b>Email: </b> <?php echo $user->getEmail();?> <br>
                        <b>Date of Birth: </b> <?php echo $user->getDateOfBirth();?> <br>
                        <b>Phone Number: </b> <?php echo $user->getPhoneNumber();?> <br>
                        <b>Address: </b> <?php echo $user->getAddress();?> <br>
                    </p>
                <form class="loginForm" action="main.php" method="POST">
                    <button type="submit" name="logout" value="TRUE">Logout</button>
                </form>
                <h3>Password Update</h3>
                <form class="loginForm" action="main.php" method="POST">
                    <div class="loginFormRow">
                        <label for="oldPassword">Old Password:</label>
                        <input type="password" id="oldPassword" name="oldPassword" required>
                    </div>
                    <div class="loginFormRow">
                        <label for="newPassword">New Password:</label>
                        <input type="password" id="newPassword" name="newPassword" required>
                    </div>
                    <button type="submit">Change Password</button>
                </form>
                <?php
                    switch($state) {
                        case 0:
                            break;
                        case 1:
                            echo '<h3>Invalid Password</h3>';
                            break;
                        case 2:
                            echo '<h3>Password Updated</h3>';
                            break;
                    }
                ?>
                </div>
                <div class="textContainer">
                    <h2>Your Purchased Books</h2>
                    <hr>
                    <ul>
                    <?php
                        $purchasedBooks = BookDAO::getPurchasedBooks($user->getEmail());
                        foreach ($purchasedBooks as $book) {
                            echo '<li>' . $book->getTitle() . ' - $' . number_format($book->getPrice(), 2) . '</li>';
                        }
                    ?>
                    </ul>
                </div>
            </div>
            <?php
        }


    }

?>