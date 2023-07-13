<?php

class User {
    
    private $Email;
    private $FirstName;
    private $LastName;
    private $PhoneNumber;
    private $Address;
    private $DateOfBirth;
    private $Password;
    private $CurrentCart;
    private $PurchasedBooks;

    //Getters
    function getEmail(): string {
        return $this->Email;
    }
    function getFirstName(): string {
        return $this->FirstName;
    }
    function getLastName(): string {
        return $this->LastName;
    }
    function getPhoneNumber(): string {
        return $this->PhoneNumber;
    }
    function getAddress(): string {
        return $this->Address;
    }
    function getDateOfBirth(): DateTime {
        return $this->DateOfBirth;
    }
    function getPassword(): string {
        return $this->Password;
    }
    function getCurrentCart(): string {
        return $this->CurrentCart;
    }
    function getPurchasedBooks(): string {
        return $this->PurchasedBooks;
    }

    //Setters
    function setEmail(string $email){
        $this->Email = $email;
    }
    function setFirstName(string $firstName){
        $this->FirstName = $firstName;
    }
    function setLastName(string $lastName){
        $this->LastName = $lastName;
    }
    function setPhoneNumber(string $phoneNumber){
        $this->PhoneNumber = $phoneNumber;
    }
    function setAddress(string $address){
        $this->Address = $address;
    }
    function setDateOfBirth(DateTime $dateOfBirth){
        $this->DateOfBirth = $dateOfBirth;
    }
    function setPassword(string $password){
        $this->Password = $password;
    }
    function setCurrentCart(string $currentCart){
        $this->CurrentCart = $currentCart;
    }
    function setPurchasedBooks(string $purchasedBooks){
        $this->PurchasedBooks = $purchasedBooks;
    }
}

?>