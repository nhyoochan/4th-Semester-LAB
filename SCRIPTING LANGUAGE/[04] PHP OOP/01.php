<?php
class Book
{
  public $title;
  public $author;
  public $price;

  public function __construct($title, $author, $price)
  {
    $this->title = $title;
    $this->author = $author;
    $this->price = $price;
    echo "Book '$this->title' by $this->author created.<br>";
  }

  public function __destruct()
  {
    echo "Object destroyed: '$this->title' by $this->author.<br>";
  }

  public function displayDetails()
  {
    echo "Title: $this->title<br>Author: $this->author<br>Price: $$this->price<br><br>";
  }
}

$book1 = new Book("The 48 Laws of Power", "Robert Greene", 30.40);
$book2 = new Book("The Psychology of Money", "Morgan Housel", 25.66);

$book1->displayDetails();
$book2->displayDetails();

unset($book1);
unset($book2);
