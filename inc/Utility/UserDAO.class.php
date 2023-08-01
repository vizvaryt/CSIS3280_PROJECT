<?php

class UserDAO {
    
    private static $db;

    static function initialize(string $className) {
        self::$db = new PDOAgent($className);
    }

    //create User
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

    //read all users
    static function getUsers() : Array {
        $selectAll = "SELECT * FROM Users";
        self::$db->query($selectAll);
        self::$db->execute();
        return self::$db->resultSet();
    }

    //get specific user based on email
    static function getUser($email) {
        $select = "SELECT * FROM Users WHERE Email = :email";

        try{
            self::$db->query($select);
            self::$db->bind(":email", $email);
            self::$db->execute();

            if(self::$db->rowCount() != 1){
                throw new Exception("An error occured fetching the user {$email}");
            }
        }catch (Exception $e){
            $error = $e->getMessage();
            // echo $error;
            return null;
        }

        return self::$db->singleResult();

    }

    //delete specific user based on email
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
            return false;
        }
        return true;
    }

    //update user's password
    static function editUserPassword(User $newUser) : int {
        $editUser = "UPDATE Users SET Password=:password ";
        $editUser .= "WHERE Email=:email";

        self::$db->query($editUser);
        self::$db->bind(":email", $newUser->getEmail());
        self::$db->bind(":password", $newUser->getPassword());

        self::$db->execute();

        return self::$db->rowCount();

    }

    //update user's current cart
    static function updateCurrentCart(string $email, string $newCart) : int  {
        $edit = "UPDATE Users SET CurrentCart=:newCart WHERE Email=:email";

        self::$db->query($edit);
        self::$db->bind(":newCart", $newCart);
        self::$db->bind(":email", $email);
        self::$db->execute();

        return self::$db->rowCount();
    }

    //select current user's cart
    static function selectCurrentCart(string $email) : string  {
        $select = "SELECT CurrentCart FROM Users WHERE Email=:email";

        self::$db->query($select);
        self::$db->bind(":email", $email);
        self::$db->execute();

        return self::$db->singleResult();
    }
    

}

?>