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

    function verifyPassword(string $passwordToVerify){
        return password_verify($passwordToVerify, $this->getPassword());
    }

    function addBookToCart(string $ISBN) {
        $this->CurrentCart .= $ISBN . ",";
    }

    function removeBookFromCart(string $ISBN) {
        $currentCart = $this->getCurrentCart();
        $pos = array_search($ISBN, $currentCart);
        unset($currentCart[$pos]);
        $this->setCurrentCart(implode(',',$currentCart)); 
    }

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
    function getDateOfBirth(): string {
        return $this->DateOfBirth;
    }
    function getPassword(): string {
        return $this->Password;
    }
    function getCurrentCart(): Array {
        return explode(',',$this->CurrentCart);
    }
    function getCurrentCartString(): string {
        return $this->CurrentCart;
    }
    function getPurchasedBooks(): Array {
        return explode(',',$this->PurchasedBooks);
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
    function setDateOfBirth(string $dateOfBirth){
        $this->DateOfBirth = $dateOfBirth;
    }
    function setPassword(string $password){
        $this->Password = password_hash($password, PASSWORD_DEFAULT);
    }
    function setCurrentCart(string $currentCart){
        $this->CurrentCart = $currentCart;
    }
    function setPurchasedBooks(string $purchasedBooks){
        $this->PurchasedBooks = $purchasedBooks;
    }
}

?>