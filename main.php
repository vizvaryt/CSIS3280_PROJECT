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
//Utility Classes
require_once('inc/Utility/PDOAgent.class.php');
require_once('inc/Utility/BookDAO.class.php');
require_once('inc/Utility/UserDAO.class.php');


//Initialize the DAOs
BookDAO::initialize('Book');
UserDAO::initialize('User');

//Get all books for display on main page
$books = BookDAO::getBooks();

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
            bookDetailPage::header();
            bookDetailPage::navBar();
            bookDetailPage::bookDetail($book);
            bookDetailPage::footer();
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

