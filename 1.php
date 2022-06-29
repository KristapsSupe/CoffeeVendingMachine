<?php
// kafijas aparats
// maka monetas
// 5 - 1
// 3 - 2
// 5 - 5

//iemet monetas sakuma
// iemest 10, 3 - neeksiste, ieliekt -2 kopa =2 -- 0.12$
// iemest vel monetu vai pirkt produktu
// izvelies dzerienu

//atlikums jaizdod monetas 1.00$, 1.07$ izdod sakot no lielakas monetas

$wallet = [
    1 => 10,
    2 => 0,
    5 => 10,
    10 => 10,
    20 => 10,
    50 => 10,
    100 => 10,
    200 => 10,
];


$drinks = [
    'coffee' => 120,
    'capuccino' => 200,
    'latte' => 250
];


$insertedAmount = 0;

while (true)
{
    foreach ($drinks as $name => $price) {
        echo "$name - $price | ";
    }
    echo PHP_EOL;
    echo "-------------------------" . PHP_EOL;

    foreach ($wallet as $coin => $amount) {
        echo "$coin ($amount) | ";
    }
    echo PHP_EOL;

    $userInput = (int)readline("Insert coins: ");

    if (!isset($wallet[$userInput])) {
        echo 'Invalid coin.';
        exit;
    }

    if ($wallet[$userInput] <= 0) {
        echo 'You dont have such coin';
        exit;
    }

    $wallet[$userInput] -= 1;
    $insertedAmount += $userInput;

    echo 'Inserted amount: ' . $insertedAmount . PHP_EOL;

    if ($insertedAmount >= 120) {
        break;
    }
}

$chooseDrink = readline("Choose drink: ");

if (!isset($drinks[$chooseDrink])) {
    echo 'No such drink.';
    exit;
}

if ($insertedAmount < $drinks[$chooseDrink]) {
    echo 'Not enough coins.';
    exit;
}

$returnAmount = $insertedAmount - $drinks[$chooseDrink];

if ($returnAmount === 0) {
    echo "No change" . PHP_EOL;
}

$returnCoins200 = (intdiv($returnAmount, 200));
$balance200 = $returnAmount - ($returnCoins200 * 200);

$returnCoins100 = (intdiv($balance200, 100));
$balance100 = $balance200 - ($returnCoins100 * 100);

$returnCoins50 = (intdiv($balance100, 50));
$balance50 = $balance100 - ($returnCoins50 * 50);

$returnCoins20 = (intdiv($balance50, 20));
$balance20 = $balance50 - ($returnCoins20 * 20);

$returnCoins10 = (intdiv($balance20, 10));
$balance10 = $balance20 - ($returnCoins10 * 10);

$returnCoins5 = (intdiv($balance10, 5));
$balance5 = $balance10 - ($returnCoins5 * 5);

$returnCoins2 = (intdiv($balance5, 2));
$balance2 = $balance5 - ($returnCoins2 * 5);

$returnCoins1 = (intdiv($balance2, 1));
$balance1 = $balance2 - ($returnCoins1 * 5);


echo "Here is your drink: " . $chooseDrink . PHP_EOL;
echo "Your change: " . $returnAmount . PHP_EOL;

echo "Return 200 Coins: " . $returnCoins200 . PHP_EOL;
echo "Return 100 Coins: " . $returnCoins100 . PHP_EOL;
echo "Return 50 Coins: " . $returnCoins50 . PHP_EOL;
echo "Return 20 Coins: " . $returnCoins20 . PHP_EOL;
echo "Return 10 Coins: " . $returnCoins10 . PHP_EOL;
echo "Return 5 Coins: " . $returnCoins5 . PHP_EOL;
echo "Return 2 Coins: " . $returnCoins2 . PHP_EOL;
echo "Return 1 Coins: " . $returnCoins1 . PHP_EOL;