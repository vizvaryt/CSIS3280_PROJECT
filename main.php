<?php

//Config
require_once('inc/config.inc.php');
//Entities
require_once('inc/Entity/Book.class.php');
require_once('inc/Entity/User.class.php');
require_once('inc/Entity/homePage.class.php');
require_once('inc/Entity/bestSellersPage.class.php');
require_once('inc/Entity/editorsPicksPage.class.php');
require_once('inc/Entity/textbookPage.class.php');
require_once('inc/Entity/contactPage.class.php');
require_once('inc/Entity/bookDetailPage.class.php');
require_once('inc/Entity/loginPage.class.php');
require_once('inc/Entity/myAccountPage.class.php');
require_once('inc/Entity/orderedPage.class.php');
require_once('inc/Entity/myCartPage.class.php');
require_once('inc/Entity/purchaseCnfrmPage.class.php');
//Utility Classes
require_once('inc/Utility/PDOAgent.class.php');
require_once('inc/Utility/BookDAO.class.php');
require_once('inc/Utility/UserDAO.class.php');
require_once('inc/Utility/LoginManager.class.php');


//Initialize the DAOs
BookDAO::initialize('Book');
UserDAO::initialize('User');

//Initialize session
session_start();

//Get all books for display on main page
$books = BookDAO::getBooks();

//If logout button was pressed, unset the $_SESSION var and destroy the session
if(!empty($_POST['logout'])) {
    unset($_SESSION);
    session_destroy();
}

//Login functionality using POST form
if(!empty($_POST['email'])){

    //Get user based on POSTed email
    $authUser = UserDAO::getUser($_POST['email']);

    //Verify password using HASH
    if($authUser && $authUser->verifyPassword($_POST['password'])){

        //Setting 'loggedin' state using user email
        $_SESSION['loggedin'] = $authUser->getEmail();
    }
    else {
        //If the DAO returns null or any other unexpected result, redirect back to the login page and display notification
        $_GET['page'] = "invalidLogin";
    }

}

//If firstName was POSTed, then run register functionality
if (isset($_POST['firstName'])) {
    $_GET['page'] = "myAccount";
    $newUser = new User();

    $newUser->setEmail($_POST['emailReg']);
    $newUser->setFirstName($_POST['firstName']);
    $newUser->setLastName($_POST['lastName']);
    $newUser->setPhoneNumber($_POST['phoneNumber']);
    $newUser->setAddress($_POST['address']);
    
    $rawDate = $_POST['dateOfBirth'];
    $dateObj = DateTime::createFromFormat('Y-m-d', $rawDate);
    $formattedDate = $dateObj->format('Y-m-d');
    $newUser->setDateOfBirth($formattedDate);

    $newUser->setPassword(password_hash($_POST['password'], PASSWORD_DEFAULT));
    $newUser->setCurrentCart("");
    $newUser->setPurchasedBooks("");

    UserDAO::createUser($newUser);
    $_SESSION['loggedin'] = $newUser->getEmail();
}

if (isset($_POST['newPassword'])) {
    $user = UserDAO::getUser($_SESSION['loggedin']);
    if ($user->verifyPassword($_POST['oldPassword'])) {
        $user->setPassword($_POST['newPassword']);
        UserDAO::editUserPassword($user);
        $_GET['page'] = "validPasswordChange"; 
    }
    else {
        $_GET['page'] = "invalidPasswordChange"; 
    }
}

if (isset($_POST['bookISBN'])) {
    $_GET['page'] = "order";
    $user = UserDAO::getUser($_SESSION['loggedin']);
    $user->addBookToCart($_POST['bookISBN']);
    UserDAO::updateCurrentCart($user->getEmail(), $user->getCurrentCartString());

    $book = BookDAO::getBook($_POST['bookISBN']);
    $book->setInCart(TRUE);
    BookDAO::setInCart($book, TRUE);
}

if (isset($_POST['removeCartISBN'])) {
    $_GET['page'] = "myCart";
    $user = UserDAO::getUser($_SESSION['loggedin']);
    $user->removeBookFromCart($_POST['removeCartISBN']);
    UserDAO::updateCurrentCart($user->getEmail(), $user->getCurrentCartString());
}

if (isset($_POST['purchaseCart'])) {
    $_GET['page'] = "purchaseConfirmation";
    $listISBN = explode(',', $_POST['purchaseCart']);

    foreach ($listISBN as $ISBN) {
        $book = BookDAO::getBook($ISBN);
        $book->setPurchased(TRUE);
        $book->setAvailability(FALSE);
        $book->setPurchasedUser($_SESSION['loggedin']);
        BookDAO::updateBookPurchase($book);
    }

    $user = UserDAO::getUser($_SESSION['loggedin']);
    $user->setCurrentCart("");
    UserDAO::updateCurrentCart($user->getEmail(), $user->getCurrentCartString());

}

//Router Logic

//TODO add 404 page
//First Router level, checks 'page' value from navbar hrefs
if (isset($_GET['page'])) {
    switch ($_GET['page']) {
        case 'homePage':
            homePage::header();
            homePage::navBar();
            homePage::searchBar();
            homePage::bookGallery($books);
            homePage::footer();
            break;
        case 'bestSellers':
            $bestSellers = BookDAO::getBestsellers();
            bestSellersPage::header();
            bestSellersPage::navBar();
            bestSellersPage::searchBar();
            bestSellersPage::bookGallery($bestSellers);
            bestSellersPage::footer();
            break;
        case 'editorsPicks':
            $editorsPicks = BookDAO::getEditorsPicks();
            editorsPicksPage::header();
            editorsPicksPage::navBar();
            editorsPicksPage::searchBar();
            editorsPicksPage::bookGallery($editorsPicks);
            editorsPicksPage::footer();
            break;
        case 'textbooks':
            $textbooks = BookDAO::getTextbooks();
            textbookPage::header();
            textbookPage::navBar();
            textbookPage::searchBar();
            textbookPage::bookGallery($textbooks);
            textbookPage::footer();
            break;
        case 'contact':
            contactPage::header();
            contactPage::navBar();
            contactPage::body();
            contactPage::footer();
            break;
        case 'detail':
            $book = BookDAO::getBook($_GET['book']);
            bookDetailPage::header($book);
            bookDetailPage::navBar();
            bookDetailPage::bookDetail($book);
            bookDetailPage::footer();
            break;
        case 'login':
            loginPage::header();
            loginPage::navBar();
            loginPage::loginForm(FALSE);
            loginPage::registerForm();
            loginPage::footer();
            break;
        case 'myAccount':
            $user = UserDAO::getUser($_SESSION['loggedin']);
            myAccountPage::header();
            myAccountPage::navBar();
            myAccountPage::userInfo($user, 0);
            myAccountPage::footer();
            break;
        case 'invalidPasswordChange':
            $user = UserDAO::getUser($_SESSION['loggedin']);
            myAccountPage::header();
            myAccountPage::navBar();
            myAccountPage::userInfo($user, 1);
            myAccountPage::footer();
            break;
        case 'validPasswordChange':
            $user = UserDAO::getUser($_SESSION['loggedin']);
            myAccountPage::header();
            myAccountPage::navBar();
            myAccountPage::userInfo($user, 2);
            myAccountPage::footer();
            break;
        case 'invalidLogin':
            loginPage::header();
            loginPage::navBar();
            loginPage::loginForm(TRUE);
            loginPage::registerForm();
            loginPage::footer();
            break;
        case 'order':
            $book = BookDAO::getBook($_POST['bookISBN']);
            orderedPage::header();
            orderedPage::navBar();
            orderedPage::orderConfirmation($book);
            orderedPage::footer();
            break;
        case 'myCart':
            $user = UserDAO::getUser($_SESSION['loggedin']);
            $myCartBooks = $user->getCurrentCart();
            myCartPage::header();
            myCartPage::navBar();
            myCartPage::bookList($myCartBooks);
            myCartPage::footer();
            break;
        case 'purchaseConfirmation':
            purchaseCnfrmPage::header();
            purchaseCnfrmPage::navBar();
            purchaseCnfrmPage::purchaseConfirmation();
            purchaseCnfrmPage::footer();
            break;
        default:
            // Handle 404 page or redirect to a default page
            break;
    }

//Second Router level, checks for 'option' and 'query' values from the search bar
} else {
    if (isset($_GET['option'])) {
        switch ($_GET['option']){
            case 'bestsellers':
                $bestSellers = BookDAO::getBestsellers();
                bestSellersPage::header();
                bestSellersPage::navBar();
                bestSellersPage::searchBar();
                bestSellersPage::bookGallery($bestSellers);
                bestSellersPage::footer();
                break;
            case 'fiction':
                $fictionBooks = BookDAO::getFiction();
                homePage::header();
                homePage::navBar();
                homePage::searchBar();
                homePage::bookGallery($fictionBooks);
                homePage::footer();
                break;
            case 'nonfiction':
                $nonFictionBooks = BookDAO::getNonFiction();
                homePage::header();
                homePage::navBar();
                homePage::searchBar();
                homePage::bookGallery($nonFictionBooks);
                homePage::footer();
                break;
            case 'textbooks':
                $textbooks = BookDAO::getTextbooks();
                textbookPage::header();
                textbookPage::navBar();
                textbookPage::searchBar();
                textbookPage::bookGallery($textbooks);
                textbookPage::footer();
                break;
            case 'english':
                $englishBooks = BookDAO::getEnglish();
                homePage::header();
                homePage::navBar();
                homePage::searchBar();
                homePage::bookGallery($englishBooks);
                homePage::footer();
                break;
            case 'otherlanguage':
                $otherLanguageBooks = BookDAO::getOtherLanguage();
                homePage::header();
                homePage::navBar();
                homePage::searchBar();
                homePage::bookGallery($otherLanguageBooks);
                homePage::footer();
                break;
        }
    }
    elseif (isset($_GET['query'])) {
        $searchedBooks = BookDAO::searchBooks($_GET['query']);
        homePage::header();
        homePage::navBar();
        homePage::searchBar();
        homePage::bookGallery($searchedBooks);
        homePage::footer();
    }
    //Third Router level, if no URI values are present, render the basic homepage
    else {
        homePage::header();
        homePage::navBar();
        homePage::searchBar();
        homePage::bookGallery($books);
        homePage::footer();
    }
}

