<?php
/**
 * Created by PhpStorm.
 * User: kaspercools
 * Date: 18/03/15
 * Time: 06:44
 */

namespace model;

class Book {
    /**
     * var @string
     */
    private $title;

    /**
     * var @string
     */
    private $ISBN;

    /**
     * var @int
     */
    private $edition;

    /**
     * var @int
     */
    private $year;

    /**
     * var @string
     */
    private $category;

    /**
     * var @string
     */
    private $publisher;

    /**
     * var @int
     */
    private $quantity;

    /**
     * var @int
     */
    private $price;

    /**
     * var @array
     */
    private $authors;

    public function __construct(){
        $this->authors=[];
    }

    /**
     * @return mixed
     */
    public function getISBN()
    {
        return $this->ISBN;
    }

    /**
     * @param mixed $ISBN
     */
    public function setISBN($ISBN)
    {
        $this->ISBN = $ISBN;
    }

    /**
     * @return mixed
     */
    public function getCategory()
    {
        return $this->category;
    }

    /**
     * @param mixed $category
     */
    public function setCategory($category)
    {
        $this->category = $category;
    }

    /**
     * @return mixed
     */
    public function getEdition()
    {
        return $this->edition;
    }

    /**
     * @param mixed $edition
     */
    public function setEdition($edition)
    {
        $this->edition = $edition;
    }

    /**
     * @return mixed
     */
    public function getPrice()
    {
        return $this->price;
    }

    /**
     * @param mixed $price
     */
    public function setPrice($price)
    {
        $this->price = $price;
    }

    /**
     * @return mixed
     */
    public function getPublisher()
    {
        return $this->publisher;
    }

    /**
     * @param mixed $publisher
     */
    public function setPublisher($publisher)
    {
        $this->publisher = $publisher;
    }

    /**
     * @return mixed
     */
    public function getQuantity()
    {
        return $this->quantity;
    }

    /**
     * @param mixed $quantity
     */
    public function setQuantity($quantity)
    {
        $this->quantity = $quantity;
    }

    /**
     * @return mixed
     */
    public function getTitle()
    {
        return $this->title;
    }

    /**
     * @param mixed $title
     */
    public function setTitle($title)
    {
        $this->title = $title;
    }

    /**
     * @return mixed
     */
    public function getYear()
    {
        return $this->year;
    }

    /**
     * @param mixed $year
     */
    public function setYear($year)
    {
        $this->year = $year;
    }

    /**
     * @return mixed
     */
    public function getAuthors()
    {
        return $this->authors;
    }

    /**
     * @param mixed $author
     */
    public function setAuthors($authors)
    {
        $this->authors = $authors;
    }

    public function addAuthor(Author $author){
        $this->authors[]=$author;
    }
} 