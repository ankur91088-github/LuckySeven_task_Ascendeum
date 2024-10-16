<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<p>
    Welcome To Lucky 7 Game
</p>
<div>
    Place you bet.
    <a href="index.php?bet=belowSeven">Below 7</a>
    <br>
    <a href="index.php?bet=LuckySeven">Lucky 7</a> <br>
    <a href="index.php?bet=aboveSeven">Above 7</a>
</div>

<div>
<a href="index.php?reset=true">reset Balance</a><br>
<a href="index.php?reset=false">Contiune Playing</a>
</div>
</div>
</body>
</html>
<?php
session_start();
function rollDice()
{
    $dice =  rand(1,6);
    return $dice;
}

if(isset($_REQUEST['bet']))
{
    $bet = $_REQUEST['bet'];
    if(isset($_SESSION['balance']))
    {
        $balance= $_SESSION['balance'];
    }
    else{
        $balance =100;
    }
    if($balance<10)
    {
        echo "you dont have enough amount to play resetting your balance ";
      
    }else{
    game($bet,$balance);
    }
}
if(isset($_REQUEST['reset']))
{
    if($_REQUEST['reset'])
    {
       resetBalance();
    }
}
function updateBalance($bet,$total,$balance){
 
    if($bet =="belowSeven" && $total < 7)
    {
        $balance = $balance -10 +20;
        echo "you win ";
    }
    elseif($bet =="aboveSeven" && $total > 7){
        $balance = $balance -10 +20;
        echo "you win";
    }
    else if($bet=="LuckySeven" && $total == 7)
    {
        $balance = $balance -10 +30;
        echo "you win GOT LUCKY 7";
    }
    else{
        $balance = $balance -10;
        echo "you LOOSE";
    }
    $_SESSION['balance']=$balance;
    return $balance;
}

function diceSum()
{
    echo "dice 1 :".$dice1=  rollDice();
    echo "<br>";
    echo "dice 2 :".$dice2=  rollDice();
    echo "<br>";
    $sum = $dice1+ $dice2;
    return $sum;
}

function resetBalance()
{
    echo "reset balance";
    $_SESSION['balance'] = 100;
    // $balance =100/;
}

function game($bet,$balance)
{
echo "your Bet " .$bet."<br>";
$sum = diceSum();
echo "dice total=" .$sum."<br>";
$balance = updateBalance($bet,$sum,$balance);
echo "<br>your Current Balance = ".$balance;

}
?>noelin@ascendeum.com
 