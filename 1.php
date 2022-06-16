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
    100 => 10,
    200 => 10,
];


$drinks = [
    'coffee' => 120,
    'capuccino' => 200,
    'latte' => 250
];


$insertedAmount = 0;

while (true) {
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

echo "You choose: " . $chooseDrink . PHP_EOL;
echo "Your change: " . $returnAmount . PHP_EOL;




