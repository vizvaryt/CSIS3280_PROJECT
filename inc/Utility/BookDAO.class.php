<?php

class BookDao {

    //Place to store the PDO Agent/Service class    
    private static $db;

    // you must initialize the PDOAgent
    static function initialize(string $className)   {                
        self::$db = new PDOAgent($className);
    }
    
    // function to create (insert) book
    static function createBook(Book $newBook) : int {
        $insertBook = "INSERT INTO Books (
            ISBN, Author, Title, Price,
            PublishDate, Edition, Description, Language,
            Fiction, Availability, Bestseller, SoldPerYear,
            SoldPerMonth, SoldPerWeek, EditorsPick, Textbook,
            Purchased, PurchasedUser
            ) ";
        $insertBook .= "VALUES (
            :isbn, :author, :title, :price,
            :publishDate, :edition, :description, :language,
            :fiction, :availability, :bestseller, :soldPerYear,
            :soldPerMonth, :soldPerWeek, :editorsPick, :textbook,
            :purchased, :purchasedUser
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

        self::$db->execute();

        return self::$db->lastInsertId();
    }

    // function to get (select) book(s)
    static function getBooks() : Array {        
        $selectAll = "SELECT * FROM Books";
        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();

    }

    // function to delete book, we should use try catch
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

    static function getBook(String $isbn) : Book {        
        $selectBook = "SELECT * FROM Books WHERE ISBN = :isbn";

        self::$db->query($selectBook);
        self::$db->bind(":isbn",$isbn);
        self::$db->execute();
        return self::$db->singleResult();

    }

    // update
    // TODO needs work
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

        self::$db->execute();

        return self::$db->rowCount();
    }

}

?>