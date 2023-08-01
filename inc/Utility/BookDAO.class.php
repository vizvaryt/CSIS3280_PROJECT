<?php

class BookDAO {

    //DB var for the PDOAgent
    private static $db;

    //Initializing PDOAgent
    static function initialize(string $className)   {                
        self::$db = new PDOAgent($className);
    }
    
    //Function for INSERT book
    static function createBook(Book $newBook) : int {
        $insertBook = "INSERT INTO Books (
            ISBN, Author, Title, Price,
            PublishDate, Edition, Description, Language,
            Fiction, Availability, Bestseller, SoldPerYear,
            SoldPerMonth, SoldPerWeek, EditorsPick, Textbook,
            Purchased, PurchasedUser, InCart, Image
            ) ";
        $insertBook .= "VALUES (
            :isbn, :author, :title, :price,
            :publishDate, :edition, :description, :language,
            :fiction, :availability, :bestseller, :soldPerYear,
            :soldPerMonth, :soldPerWeek, :editorsPick, :textbook,
            :purchased, :purchasedUser, :inCart, :image
            )";

        self::$db->query($insertBook);
        self::$db->bind(":isbn", $newBook->getISBN());
        self::$db->bind(":author", $newBook->getAuthor());
        self::$db->bind(":title", $newBook->getTitle());
        self::$db->bind(":price", $newBook->getPrice());
        self::$db->bind(":publishDate", $newBook->getPublishDate());
        self::$db->bind(":edition", $newBook->getEdition());
        self::$db->bind(":description", $newBook->getDescription());
        self::$db->bind(":language", $newBook->getLanguage());
        self::$db->bind(":fiction", $newBook->getFiction());
        self::$db->bind(":availability", $newBook->getAvailability());
        self::$db->bind(":bestseller", $newBook->getBestseller());
        self::$db->bind(":soldPerYear", $newBook->getSoldPerYear());
        self::$db->bind(":soldPerMonth", $newBook->getSoldPerMonth());
        self::$db->bind(":soldPerWeek", $newBook->getSoldPerWeek());
        self::$db->bind(":editorsPick", $newBook->getEditorsPick());
        self::$db->bind(":textbook", $newBook->getTextbook());
        self::$db->bind(":purchased", $newBook->getPurchased());
        self::$db->bind(":purchasedUser", $newBook->getPurchasedUser());
        self::$db->bind(":inCart", $newBook->getInCart());
        self::$db->bind(":image", $newBook->getImage());

        self::$db->execute();

        return self::$db->lastInsertId();
    }
    
    //Function that SELECTs ALL books
    static function getBooks() : Array {        
        $selectAll = "SELECT * FROM Books";
        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();

    }

    //Function that SELECTs all purchased books by the user
    static function getPurchasedBooks(string $purchasedUser) : Array {        
        $select = "SELECT * FROM Books WHERE PurchasedUser=:purchasedUser";

        self::$db->query($select);
        self::$db->bind(":purchasedUser", $purchasedUser);

        self::$db->execute();
        
        return self::$db->resultSet();

    }

    //Function that SELECTs all of the available books
    static function getAvailableBooks() : Array {        
        $select = "SELECT * FROM Books WHERE Availability = TRUE";

        self::$db->query($select);

        self::$db->execute();
        
        return self::$db->resultSet();

    }

    //Function to DELETE a book
    static function deleteBook(string $isbn) : bool {
        $deleteBook = "DELETE FROM Books WHERE ISBN = :isbn";
        try{
            self::$db->query($deleteBook);
            self::$db->bind(":isbn", $isbn);
            self::$db->execute();    

            if(self::$db->rowCount() != 1){
                throw new Exception("An error occurred deleting the book {$isbn}");
            }

        }catch(Exception $e){

            return false;
        }
        

        return true;
    }

    //Function to SELECT a single book based on ISBN, used to get to bookDetailPage via main.php router
    static function getBook(String $isbn) : Book {        
        $selectBook = "SELECT * FROM Books WHERE ISBN = :isbn";

        self::$db->query($selectBook);
        self::$db->bind(":isbn",$isbn);
        self::$db->execute();
        return self::$db->singleResult();

    }

    //Function to SELECT books with Bestseller = TRUE
    static function getBestsellers() : Array {
        $select = "SELECT * FROM Books WHERE Bestseller = TRUE";

        self::$db->query($select);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to SELECT books with EditorsPick = TRUE
    static function getEditorsPicks() : Array {
        $select = "SELECT * FROM Books WHERE EditorsPick = TRUE";

        self::$db->query($select);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to SELECT books with Textbook = TRUE
    static function getTextbooks() : Array {
        $select = "SELECT * FROM Books WHERE Textbook = TRUE";

        self::$db->query($select);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to SELECT books with Fiction = TRUE
    static function getFiction() : Array {
        $select = "SELECT * FROM Books WHERE Fiction = TRUE";

        self::$db->query($select);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to SELECT books with Fiction = FALSE
    static function getNonFiction() : Array {
        $select = "SELECT * FROM Books WHERE Fiction = FALSE";

        self::$db->query($select);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to SELECT books with Language = 'English'
    static function getEnglish() : Array {
        $select = "SELECT * FROM Books WHERE Language = 'English'";

        self::$db->query($select);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to SELECT books with Language != 'English'
    static function getOtherLanguage() : Array {
        $select = "SELECT * FROM Books WHERE Language NOT LIKE 'English'";

        self::$db->query($select);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to SELECT books based on query provided from searchbox user input,
    //Searches only the Description, Author, Title, and Language columns
    static function searchBooks($query) : Array {
        $select = "SELECT * FROM Books WHERE CONCAT(Description, Author, Title, Language) LIKE :query";
    
        self::$db->query($select);
        self::$db->bind(":query", "%".$query."%");
        self::$db->execute();
        return self::$db->resultSet();
    }

    //Function to update a book to purchased status along with the user that purchased it
    static function updateBookPurchase(Book $newBook) : int   {
        $editBook = "UPDATE Books SET Availability=:availability, Purchased=:purchased, PurchasedUser=:purchasedUser ";
        $editBook .= "WHERE ISBN=:isbn";

        self::$db->query($editBook);
        self::$db->bind(":isbn", $newBook->getISBN());
        self::$db->bind(":availability", $newBook->getAvailability());
        self::$db->bind(":purchased", $newBook->getPurchased());
        self::$db->bind(":purchasedUser", $newBook->getPurchasedUser());

        self::$db->execute();

        return self::$db->rowCount();
    }

    //Function that sets a book as inCart status
    static function setInCart(Book $newBook, bool $inCart) : int {
        $editBook = "UPDATE Books SET InCart = :inCart WHERE ISBN = :isbn";

        self::$db->query($editBook);
        self::$db->bind(":isbn", $newBook->getISBN());
        self::$db->bind(":inCart", $inCart);

        self::$db->execute();

        return self::$db->rowCount();
    }

}

?>