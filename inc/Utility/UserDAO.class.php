<?php

//TODO needs a ton of work and COMMENTING before we can use it for the user session

class UserDAO {
    
    private static $db;

    static function initialize(string $className) {
        self::$db = new PDOAgent($className);
    }

    //create
    static function createUser(User $newUser) : int {
        $insertUser = "INSERT INTO Users (
            Email, FirstName, LastName, PhoneNumber, Address,
            DateOfBirth, Password, CurrentCart, PurchasedBooks
            )";
        $insertUser .= "VALUES (
            :email, :firstName, :lastName, :phoneNumber, :address,
            :dateOfBirth, :password, :currentCart, :purchasedBooks
            )";

        self::$db->query($insertUser);
        self::$db->bind(":email", $newUser->getEmail());
        self::$db->bind(":firstName", $newUser->getFirstName());
        self::$db->bind(":lastName", $newUser->getLastName());
        self::$db->bind(":phoneNumber", $newUser->getPhoneNumber());
        self::$db->bind(":address", $newUser->getAddress());
        self::$db->bind(":dateOfBirth", $newUser->getDateOfBirth());
        self::$db->bind(":password", $newUser->getPassword());
        self::$db->bind(":currentCart", $newUser->getCurrentCart());
        self::$db->bind(":purchasedBooks", $newUser->getPurchasedBooks());

        self::$db->execute();

        return self::$db->lastInsertId();
    }

    //read all
    static function getUsers() : Array {
        $selectAll = "SELECT * FROM Users";
        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //delete
    static function deleteUser(string $email) : bool {
        $deleteUser = "DELETE FROM Books WHERE EMAIL = :email";
        try{
            self::$db->query($deleteUser);
            self::$db->bind(":email", $email);
            self::$db->execute();

            if(self::$db->rowCount() != 1){
                throw new Exception("An error occurred deleting the user {$email}");
            }

        }catch(Exception $e){
            //echo $e->getMessage(); // should echo it in the log file
            //self::$db->debugDumpParams();
            return false;
        }
        return true;
    }

    //update
    //TODO needs work
    static function editUser(User $newUser) : int {
        $editUser = "UPDATE Users SET 
        FirstName=:firstName, LastName=:lastName, PhoneNumber=:phoneNumber, Address=:address, 
        DateOfBirth=:dateOfBirth, Password=:password, CurrentCart=:currentCart,
        PurchasedBooks=:purchasedBooks
        ";
        $editUser .= "WHERE Email=:email";

        self::$db->query($editUser);
        self::$db->bind(":email", $newUser->getEmail());
        self::$db->bind(":firstName", $newUser->getFirstName());
        self::$db->bind(":lastName", $newUser->getLastName());
        self::$db->bind(":phoneNumber", $newUser->getPhoneNumber());
        self::$db->bind(":address", $newUser->getAddress());
        self::$db->bind(":dateOfBirth", $newUser->getDateOfBirth());
        self::$db->bind(":password", $newUser->getPassword());
        self::$db->bind(":currentCart", $newUser->getCurrentCart());
        self::$db->bind(":purchasedBooks", $newUser->getPurchasedBooks());

        self::$db->execute();

        return self::$db->rowCount();

    }
    

}

?>