<?php

    class loginPage {

        //Displays header section
        static function header() {
            ?>
                <!DOCTYPE html>
                <html lang="en">
                    <head>
                        <meta charset="UTF-8">
                        <meta name="viewport" content="width=device-width, initial-scale=1.0">
                        <meta http-equiv="X-UA-Compatible" content="ie=edge">
                        <title>BookMania Login</title>
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
                        </div>
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
                            echo '<a class="navRight" href="main.php?page=myCart">My Cart</a>';
                        }
                        else {
                            echo '<a class="navRight" href="main.php?page=login">Login / Register</a>';
                        }
                    ?>
                </div>
                <div class="formContainer">
            <?php
        }

        //Displays the login form with a check to see if the last attempt was invalid
        static function loginForm($invalid) {
            ?>
                    <div class="loginContainer">
                        <h1>Login</h1>
                        <form class="loginForm" action="main.php" method="POST">
                            <div class="loginFormRow">
                            <label for="email">Email:</label>
                            <input type="text" id="email" name="email" required> <br>
                            </div>
                            <div class="loginFormRow">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required> <br>
                            </div>
                            <button type="submit">Login</button>
                        </form>
                        <?php
                        if($invalid) {
                            echo '<h2>Invalid Email or Password</h2>';
                        }
                        ?>
                    </div>
            <?php
        }

        //Displays the registration form
        static function registerForm() {
            ?>
                    <div class="registerContainer">
                        <h1>Register</h1>
                        <form class="loginForm" action="main.php" method="POST">
                            <div class="loginFormRow">
                            <label for="emailReg">Email:</label>
                            <input type="text" id="emailReg" name="emailReg" required> <br>
                            </div>
                            <div class="loginFormRow">
                            <label for="firstName">First Name:</label>
                            <input type="text" id="firstName" name="firstName" required> <br>
                            </div>
                            <div class="loginFormRow">
                            <label for="lastName">Last Name:</label>
                            <input type="text" id="lastName" name="lastName" required> <br>
                            </div>
                            <div class="loginFormRow">
                            <label for="phoneNumber">Phone Number:</label>
                            <input type="text" id="phoneNumber" name="phoneNumber" required> <br>
                            </div>
                            <div class="loginFormRow">
                            <label for="address">Address:</label>
                            <input type="text" id="address" name="address" required> <br>
                            </div>
                            <div class="loginFormRow">
                            <label for="dateOfBirth">Date of Birth:</label>
                            <input type="date" id="dateOfBirth" name="dateOfBirth" style="width: 171.6px;" required> <br>
                            </div>
                            <div class="loginFormRow">
                            <label for="password">Password:</label>
                            <input type="password" id="password" name="password" required> <br>
                            </div>
                            <button type="submit">Register</button>
                        </form>
                    </div>
            <?php
        }

        

    }

?>