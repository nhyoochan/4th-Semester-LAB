<?php
class BankAccount
{
  // Private properties
  private $accountNumber;
  private $holderName;
  private $balance;

  // Constructor to initialize values
  public function __construct($accountNumber, $holderName, $balance = 0)
  {
    $this->accountNumber = $accountNumber;
    $this->holderName = $holderName;
    $this->balance = $balance;
  }

  // Setter and Getter for accountNumber
  public function setAccountNumber($accountNumber)
  {
    $this->accountNumber = $accountNumber;
  }
  public function getAccountNumber()
  {
    return $this->accountNumber;
  }

  // Setter and Getter for holderName
  public function setHolderName($holderName)
  {
    $this->holderName = $holderName;
  }
  public function getHolderName()
  {
    return $this->holderName;
  }

  // Setter and Getter for balance
  public function setBalance($balance)
  {
    $this->balance = $balance;
  }
  public function getBalance()
  {
    return $this->balance;
  }

  // Method to deposit money
  public function deposit($amount)
  {
    if ($amount > 0) {
      $this->balance += $amount;
      echo "Deposited NPR $amount in " . $this->getAccountNumber() . ". New balance: NPR $this->balance.<br>";
    } else {
      echo "Deposit amount must be positive.<br>";
    }
  }

  // Method to withdraw money
  public function withdraw($amount)
  {
    if ($amount > 0) {
      if ($amount <= $this->balance) {
        $this->balance -= $amount;
        echo "Withdrew NPR $amount from " . $this->getAccountNumber() . ". New balance: NPR $this->balance.<br>";
      } else {
        echo "Insufficient funds! NPR $amount Withdrawal failed from " . $this->getAccountNumber() . ".<br>";
      }
    } else {
      echo "Withdrawal amount must be positive.<br>";
    }
  }

  // Method to display account details
  public function displayDetails()
  {
    echo "Account Number: $this->accountNumber<br>";
    echo "Holder Name: $this->holderName<br>";
    echo "Balance: NPR $this->balance<br><br>";
  }
}

// Create BankAccount objects
$account1 = new BankAccount("1001", "John Doe", 500);
$account2 = new BankAccount("1002", "Anup Rawal", 1000);

// Display account details
$account1->displayDetails();
$account2->displayDetails();

// Perform deposit and withdrawal
$account1->deposit(150);    // Depositing money into account1
$account1->withdraw(100);   // Withdrawing money from account1

$account2->deposit(200);    // Depositing money into account2
$account2->withdraw(500);   // Withdrawing money from account2
$account2->withdraw(2000);  // Trying to withdraw more than balance

echo "<br>";

// Display updated account details
$account1->displayDetails();
$account2->displayDetails();
