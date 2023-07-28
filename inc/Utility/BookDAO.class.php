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
            Purchased, PurchasedUser, Image
            ) ";
        $insertBook .= "VALUES (
            :isbn, :author, :title, :price,
            :publishDate, :edition, :description, :language,
            :fiction, :availability, :bestseller, :soldPerYear,
            :soldPerMonth, :soldPerWeek, :editorsPick, :textbook,
            :purchased, :purchasedUser, :image
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

    //Function to DELETE a book
    //TODO make this actually work and log error
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

            //echo $e->getMessage(); // should echo it in the log file
            //self::$db->debugDumpParams();
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

    //Function to UPDATE book attributes
    //TODO needs work before it will function
    static function editBook(Book $newBook) : int   {
        $editBook = "UPDATE Books SET Author=:author, Title=:title, Price=:price ";
        $editBook .= "WHERE ISBN=:isbn";

        self::$db->query($editBook);
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
        self::$db->bind(":image", $newBook->getImage());

        self::$db->execute();

        return self::$db->rowCount();
    }

}

?>