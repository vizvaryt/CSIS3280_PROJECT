<?php

class Book  {

    private $ISBN;
    private $Title;
    private $Author;
    private $Price;
    private $PublishDate;
    private $Edition;
    private $Description;
    private $Language;
    private $Fiction;
    private $Availability;
    private $Bestseller;
    private $SoldPerYear;
    private $SoldPerMonth;
    private $SoldPerWeek;
    private $EditorsPick;
    private $Textbook;
    private $Purchased;
    private $PurchasedUser;
    private $InCart;
    private $Image;
    

    //Getters
    function getISBN(): string {
        return $this->ISBN;
    }

    function getAuthor(): string {
        return $this->Author;
    }

    function getTitle(): string {
        return $this->Title;
    }

    function getPrice(): float {
        return $this->Price;
    }

    function getPublishDate(): string {
        return $this->PublishDate;
    }

    function getEdition(): string {
        return $this->Edition;
    }

    function getDescription(): string {
        return $this->Description;
    }

    function getLanguage(): string {
        return $this->Language;
    }

    function getFiction(): bool {
        return $this->Fiction;
    }

    function getAvailability(): bool {
        return $this->Availability;
    }

    function getBestseller(): bool {
        return $this->Bestseller;
    }

    function getSoldPerYear(): int {
        return $this->SoldPerYear;
    }

    function getSoldPerMonth(): int {
        return $this->SoldPerMonth;
    }

    function getSoldPerWeek(): int {
        return $this->SoldPerWeek;
    }

    function getEditorsPick(): bool {
        return $this->EditorsPick;
    }

    function getTextbook(): bool {
        return $this->Textbook;
    }

    function getPurchased(): bool {
        return $this->Purchased;
    }

    function getPurchasedUser(): string {
        return $this->PurchasedUser;
    }

    function getInCart(): bool {
        return $this->InCart;
    }

    function getImage(): string {
        return $this->Image;
    }
    
    //Setters

    function setISBN(string $isbn){
        $this->ISBN = $isbn;
    }

    function setAuthor(string $author){
        $this->Author = $author;
    }

    function setTitle(string $title){
        $this->Title = $title;
    }

    function setPrice(float $price){
        $this->Price = $price;
    }

    function setPublishDate(string $publishDate){
        $this->PublishDate = $publishDate;
    }

    function setEdition(string $edition){
        $this->Edition = $edition;
    }

    function setDescription(string $description){
        $this->Description = $description;
    }

    function setLanguage(string $language){
        $this->Language = $language;
    }

    function setFiction(bool $fiction){
        $this->Fiction = $fiction;
    }

    function setAvailability(bool $availability){
        $this->Availability = $availability;
    }

    function setBestseller(bool $bestseller){
        $this->Bestseller = $bestseller;
    }

    function setSoldPerYear(int $soldPerYear){
        $this->SoldPerYear = $soldPerYear;
    }

    function setSoldPerMonth(int $soldPerMonth){
        $this->SoldPerMonth = $soldPerMonth;
    }

    function setSoldPerWeek(int $soldPerWeek){
        $this->SoldPerWeek = $soldPerWeek;
    }

    function setEditorsPick(bool $editorsPick){
        $this->EditorsPick = $editorsPick;
    }

    function setTextbook(bool $textbook){
        $this->Textbook = $textbook;
    }

    function setPurchased(bool $purchased){
        $this->Purchased = $purchased;
    }

    function setPurchasedUser(string $purchasedUser){
        $this->PurchasedUser = $purchasedUser;
    }

    function setInCart(bool $inCart){
        $this->InCart = $inCart;
    }

    function setImage(string $image){
        $this->Image = $image;
    }

    
}

?>