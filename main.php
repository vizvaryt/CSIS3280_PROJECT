<?php

//Config
require_once('inc/config.inc.php');
//Entities
require_once('inc/Entity/Book.class.php');
require_once('inc/Entity/User.class.php');
require_once('inc/Entity/Page.class.php');
//Utility Classes
require_once('inc/Utility/PDOAgent.class.php');
require_once('inc/Utility/BookDAO.class.php');
require_once('inc/Utility/UserDAO.class.php');


// initialize the BookDAO
BookDAO::initialize('Book');
UserDAO::initialize('User');

// check if there's a GET to perform delete
if(!empty($_GET)){
    if($_GET['action'] == 'delete'){
        BookDAO::deleteBook($_GET['isbn']);
    }
}

//Process any post data
if (!empty($_POST)) {
    //Assemble the book
    $nb = new Book();
    $nb->setISBN($_POST['isbn']);
    $nb->setAuthor($_POST['author']);
    $nb->setTitle($_POST['title']);
    $nb->setPrice($_POST['price']);
    $nb->setPublishDate($_POST['publishDate']);
    $nb->setEdition($_POST['edition']);
    $nb->setDescription($_POST['description']);
    $nb->setLanguage($_POST['language']);
    $nb->setFiction($_POST['fiction']);
    $nb->setAvailability($_POST['availability']);
    $nb->setBestseller($_POST['bestseller']);
    $nb->setSoldPerYear($_POST['soldPerYear']);
    $nb->setSoldPerMonth($_POST['soldPerMonth']);
    $nb->setSoldPerWeek($_POST['soldPerWeek']);
    $nb->setEditorsPick($_POST['editorsPick']);
    $nb->setTextbook($_POST['textbook']);
    $nb->setPurchased($_POST['purchased']);
    $nb->setPurchasedUser($_POST['purchasedUser']);
    
    if(isset($_POST['action'])){
        // edit form
        BookDAO::editBook($nb);
    }
    else{
        //Add the book to the database
        BookDAO::createBook($nb);
    }
}

// get the books
$books = BookDAO::getBooks();

// display the page
Page::$title = "CSIS3280 PROJECT BOOKSTORE";
Page::header();
if(!empty($_GET) && ($_GET['action'] == "edit")){
    Page::showEditForm(BookDAO::getBook($_GET['isbn']));   
}else{
    Page::showAddForm();
}

Page::listBooks($books);
Page::footer();

